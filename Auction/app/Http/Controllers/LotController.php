<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Lot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LotController extends Controller
{

    // метод для вывода лотов на home страницу с показом времени до конца аукциона и выводом первой картинки, поиска по названию и описанию
    public function index(Request $request)
    {
        $search = $request->input('req');

        $query = Lot::query();
        if ($search) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('descr', 'like', '%' . $search . '%');
        }
        $lots = $query->get()->map(function ($lot) {

            //получаем время до конца аукциона
            $now = Carbon::now();
            $end = Carbon::parse($lot->auction_end);
            $lot->time_left = $now->diff($end);

            // Получаем первую фотографию для этого лота для вывода в карточку лота
            $photo = DB::table('photos_lots')
                ->where('lot_id', $lot->id)
                ->orderBy('id')
                ->first();
            $lot->photo_url = $photo ? $photo->photo_url : null;

            return $lot;
        });
        return view('home', compact('lots'));
    }

    // метод для вывода отдельного лота на страницу с аукционом
    public function show($id)
    {
        $lot = Lot::findOrFail($id);

        // Получаем название категории для конкретного лота, чтобы потом вывести в lot.blade.php
        $quality = DB::table('lot_qualities')
            ->where('id', $lot->quality_id)
            ->value('title');
        $lot->quality_name = $quality;

        //получаем фоточки-красоточки для лота
        $photos = DB::table('photos_lots')
            ->where('lot_id', $lot->id)
            ->orderBy('id')
            ->get();

        //получаем сделанные ставки на лот
        $bids = DB::table('bids')
            ->where('lot_id', $lot->id)
            ->join('users', 'bids.user_id', '=', 'users.id')
            ->select('bids.*', 'users.first_name', 'users.last_name')
            ->orderByDesc('bids.bid_amount')
            ->get();

        return view('lot', compact('lot', 'photos', 'bids'));
    }
}
