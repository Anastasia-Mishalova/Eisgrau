<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LotController;


//домашняя страница
Route::get('/', [LotController::class, 'index'])->name('home');


//показ конкретного лота
Route::get('/lots/{lot}', [LotController::class, 'show'])->name('lots.show');