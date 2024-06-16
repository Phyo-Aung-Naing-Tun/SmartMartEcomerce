<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
   

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth','verified'])->name('users.')->prefix('users')->group(function(){
Route::get('/',[UserController::class,'index'])->name('index');
});

Route::middleware(['auth','verified'])->name('products.')->prefix('products')->group(function(){
    Route::get('/',[ProductController::class,'index'])->name('index');
    });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';