<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Lot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LotController extends Controller
{

    // метод для вывода лотов на home страницу с показом времени до конца аукциона и выводом первой картинки
    public function index()
    {
        //получаем время до конца аукциона
        $lots = Lot::all()->map(function ($lot) {
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

        return view('lot', compact('lot'));
    }
}
