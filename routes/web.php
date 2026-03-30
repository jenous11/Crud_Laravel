<?php

use Illuminate\Support\Facades\Route;



Route::view('/','layout.app');
Route::view('/about-us','about')->name('about');
// Route::view('/about-us','about');
Route::view('/contact','contact')->name('contact');
Route::view('/home','home')->name('home');
