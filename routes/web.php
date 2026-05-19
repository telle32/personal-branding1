<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Admin Portfolio CRUD
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('portfolio', PortfolioController::class);
});
