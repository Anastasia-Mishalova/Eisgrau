<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LotController;


//домашняя страница
Route::get('/', [LotController::class, 'index'])->name('home');


//показ конкретного лота
Route::get('/lots/{lot}', [LotController::class, 'show'])->name('lots.show');

//показ страницы Создание аукциона и POST при отправке данных на создание аука
Route::get('/create-auction', [LotController::class, 'create'])->name('lots.create');
Route::post('/create-auction', [LotController::class, 'store'])->name('lots.store');