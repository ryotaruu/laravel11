<?php

use App\Http\Controllers\FrontEnd\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEnd\ServiceController;

Route::get('/', function () {
    return view('FrontEnd.pages.home.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('home')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::post('serviced', [ServiceController::class, 'serviced'])->name('go.to.service');
    });
    Route::middleware('auth')->group(function () {
        Route::get('service/{service}', [HomeController::class, 'home_service'])->name('in.service');
    });
});

require __DIR__.'/auth.php';
