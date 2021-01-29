<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KtpController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\InterestController;
use App\Http\Controllers\NewLoginController;


Route::get('/login', function () {
    return view('pages.newlogin');
})->name('login');
Route::get('/newregister', function () {
    return view('pages.newregister');
})->name('newregister');

Route::post('/newsaveregister', [NewLoginController::class, 'newsaveregister'])->name('newsaveregister');
Route::post('/newlogin', [NewLoginController::class, 'newlogin'])->name('newlogin');
Route::get('/logout', [NewLoginController::class, 'logout'])->name('logout');


Route::get('/', [NewLoginController::class, 'index']);

Route::group(['middleware' => ['otentikasiuser']], function() {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/ktp', [KtpController::class, 'ktp'])->name('ktp');
    Route::post('/matchktp', [KtpController::class, 'matchktp'])->name('matchktp');

    Route::get('/location', [LocationController::class, 'location'])->name('location');
    Route::get('/matchlocation', [LocationController::class, 'matchlocation'])->name('matchlocation');

    Route::get('/interest', [InterestController::class, 'interest'])->name('interest');
});




