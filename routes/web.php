<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/about-us', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::view('/article', 'article')->name('article');

Route::resource('posts', PostController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

//admin routes
Route::middleware(['auth' ,'admin'])->prefix('admin')->group(function(){
Route::get('/',[AdminController::class,'index'])->name('admin.index');
Route::delete('/posts/{post}',[AdminController::class,'destroyPost'])->name('admin.destroyPost');
Route::delete('/users/{user}',[AdminController::class,'destroyUser'])->name('admin.destroyUser');
Route::get('/posts/{post}/edit',[AdminController::class,'editPost'])->name('admin.editPost');
Route::put('/posts/{post}',[AdminController::class,'updatePost'])->name('admin.updatePost');
});


Route::get('/dashboard',[PostController::class,'dashboard'])->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';
