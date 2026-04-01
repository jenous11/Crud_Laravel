<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
Route::get('/', [HomeController::class, 'index'])->name('home');


// Route::view('/','layouts.app');
Route::view('/about-us','about')->name('about');
// Route::view('/about-us','about');
Route::view('/contact','contact')->name('contact');
// Route::view('/home','home')->name('home');

Route::view('article', 'article')->name('article');

