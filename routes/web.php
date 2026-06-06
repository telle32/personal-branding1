<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Admin CRUD
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('portofolio', PortfolioController::class)->parameters(['portofolio' => 'portfolio']);
    Route::resource('testimonial', TestimonialController::class);
    Route::resource('skill', SkillController::class);
    Route::resource('service', ServiceController::class);
});
