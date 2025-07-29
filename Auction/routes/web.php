<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LotController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\AdminLoginController;


// Домашняя страница
Route::get('/home', [LotController::class, 'index'])->name('home');
Route::get('/', [LotController::class, 'index'])->name('home');


// Показ конкретного лота
Route::get('/lots/{lot}', [LotController::class, 'show'])->name('lots.show');

// Показ страницы Создание аукциона и POST при отправке данных на создание аука
Route::get('/create-auction', [LotController::class, 'create'])->name('lots.create');
Route::post('/create-auction', [LotController::class, 'store'])->name('lots.store');

// Вход и регистрация 
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

// Обработка форм входа и регистрации
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);

// Выход из акка
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Профиль пользователя
Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile-update');

// FAQ и Что такое аукцион
Route::view('/faq', 'faq')->name('faq');
Route::view('/auction-info', 'auction-info')->name('auction-info');

// Политика конфиденциальности и Пользовательское соглашение
Route::view('/privacy-policy', 'privacy-policy')->name('privacy-policy');
Route::view('/terms-of-service', 'terms-of-service')->name('terms-of-service');


// Для деланья ставки
Route::post('/lots/{id}/bid', [LotController::class, 'placeBid'])->name('lot.placeBid');

// Для истории сделанных ставок
Route::get('/lots/{id}', [LotController::class, 'show'])->name('lot.show');

// Для смены пароля
Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.password.update');

// Для страницы Стать продавцом
Route::get('/create-seller', [SellerController::class, 'create'])->name('seller.create');
Route::post('/store', [SellerController::class, 'store'])->name('seller.store');
Route::get('/create-auction', [LotController::class, 'create'])->name('lots.create');

// Для подачи жалобы 
Route::post('/lots/{lot}/complaint', [ComplaintController::class, 'store'])->name('complaints.store');

//АДМИНКА
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
Route::get('/admin/home', [AdminController::class, 'home'])->name('admin.home');
Route::delete('/admin/lots/{id}', [AdminController::class, 'destroyLot'])->name('admin.lots.destroy');
Route::post('/admin/users/{id}/ban', [AdminController::class, 'banUser'])->name('admin.users.ban');
Route::patch('/admin/users/{id}/unban', [AdminController::class, 'unbanUser'])->name('admin.users.unban');
Route::get('/admin/search', [AdminController::class, 'ajaxSearch'])->name('admin.search');
Route::get('/lots/filtered', [LotController::class, 'filtered'])->name('lots.filtered');
Route::post('admin/complaints/{id}/update-status', [AdminController::class, 'updateStatus'])->name('admin.complaints.updateStatus');





// Route::get('/admin/home', fn() => view('admin.home-admin'))->name('admin.home');
Route::get('/admin/info', fn() => view('admin.info-admin'))->name('admin.info');
Route::get('/admin/faq', fn() => view('admin.faq-admin'))->name('admin.faq');
