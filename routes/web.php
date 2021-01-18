<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KtpController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\InterestController;
use App\Http\Controllers\NewLoginController;

// use App\Http\Middleware\PreventBackButton;
Route::get('/', function () {
    return view('pages.newlogin');
});

// Route::group(['middleware' => 'PreventBackButton'], function () {});

    // Route::get('/register', [LoginController::class, 'register'])->name('register');
    // Route::get('/saveregister', [LoginController::class, 'saveregister'])->name('saveregister');
    // Route::get('/login', [LoginController::class, 'index'])->name('login');
    // Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/newregister', [NewLoginController::class, 'newregister'])->name('newregister');
    Route::get('/newsaveregister', [NewLoginController::class, 'newsaveregister'])->name('newsaveregister');
    
    Route::get('/newlogin', [NewLoginController::class, 'index'])->name('login');
    Route::post('/newlogin', [NewLoginController::class, 'newlogin'])->name('newlogin');



    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/ktp', [KtpController::class, 'ktp'])->name('ktp');
        Route::get('/location', [LocationController::class, 'location'])->name('location');
        Route::get('/interest', [InterestController::class, 'interest'])->name('interest');

    });




