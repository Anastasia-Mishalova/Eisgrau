<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Bid;
use App\Models\Lot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

    public function create()
    {
        $qualities = DB::table('lot_qualities')->get(); // для вывода степени сохранности и описания
        return view('create-auction', compact('qualities'));
    }
    public function store(Request $request)
    {
        // Валидирую форму
        $validated = $request->validate([
            'title' => 'required|string|max:150',
            'descr' => 'required|string|max:2500',
            'quality_id' => 'required|exists:lot_qualities,id',
            'starting_price' => 'required|numeric|min:0',
            'auction_end' => 'required|date|after:now',
            'quality_id' => 'required|exists:lot_qualities,id',
            'photos.*' => 'image|mimes:jpeg,jpg,png|max:5120',
        ]);

        // Проверяю что фоток 10 штук
        if ($request->hasFile('photos') && count($request->file('photos')) > 10) {
            return back()->withErrors(['photos' => 'Можно загрузить не более 10 изображений!'])->withInput();
        }

        // Сохраняю лот 
        $lotId = DB::table('lots')->insertGetId([
            // 'seller_id' => auth()->id(), 
            'seller_id' => 1, // временно, пока не будет авторизация TODO НЕ ЗАБЫТЬ ЗАМЕНИТЬ!!!!!!!!!!!!!!!!
            'title' => $validated['title'],
            'descr' => $validated['descr'],
            'quality_id' => $validated['quality_id'],
            'starting_price' => $validated['starting_price'],
            'current_price' => $validated['starting_price'],
            'auction_start' => now(),
            'auction_end' => $validated['auction_end'],
            'lot_status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Сохраняю фотки с именами 1_1, 1_2 и тд
        if ($request->hasFile('photos')) {
            $files = $request->file('photos');

            foreach ($files as $index => $photo) {
                $number = $index + 1;
                $extension = $photo->getClientOriginalExtension();
                $filename = "{$lotId}_{$number}.{$extension}";
                $path = $photo->storeAs('images/lots', $filename, 'public');

                DB::table('photos_lots')->insert([
                    'lot_id' => $lotId,
                    'photo_url' => 'storage/' . $path,
                    'created_at' => now(),
                ]);
            }
        }

        return redirect()->route('home')->with('success', 'Лот успешно добавлен!');
    }

    //для деланья ставки
   public function placeBid(Request $request, $id)
{
    $user = Auth::user();
    $lot = Lot::with('bids')->findOrFail($id);

    if ($lot->auction_end && now()->greaterThan($lot->auction_end)) {
        return back()->with('error', 'Аукцион завершён');
    }

    $lastBid = $lot->bids()->latest()->first();
    if ($lastBid && $lastBid->user_id === $user->id) {
        return back()->with('error', 'Нельзя делать две ставки подряд');
    }

    $validated = $request->validate([
        'bid_amount' => 'required|integer|min:1',
    ]);

    $bidAmount = $validated['bid_amount'];
    $min = max($lot->starting_price, $lot->current_price + 1);
    if ($bidAmount < $min) {
        return back()->with('error', "Ставка должна быть не меньше $min");
    }

    Bid::create([
        'lot_id' => $lot->id,
        'user_id' => $user->id,
        'bid_amount' => $bidAmount,
    ]);

    $lot->current_price = $bidAmount;
    $lot->save();

    return back();
}
}
