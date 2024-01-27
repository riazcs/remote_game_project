<?php

use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;

// Main Page Route
Route::get('/', [GameController::class, 'home'])->name('home');
Route::group(['middleware' => ['auth']], function () {
});
Route::get('/dashboard', [Analytics::class, 'index'])->name('dashboard-analytics');
Route::resource('contents', GameController::class);
Route::get('/{link}', [GameController::class, 'show'])->name('signle_game.show');
