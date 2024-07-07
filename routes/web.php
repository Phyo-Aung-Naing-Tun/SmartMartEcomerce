<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

Route::middleware(['auth','verified'])->name('roles.')->prefix('roles')->group(function(){
    Route::get('/', [RoleController::class, 'index'])->name('index');
    Route::post('/create', [RoleController::class, 'create'])->name('create');
    Route::get('/{role}/role', [RoleController::class, 'show'])->name('details');
    Route::post('/{role}/role', [RoleController::class, 'assign'])->name('assign-permssion');
    Route::delete('/{role}', [RoleController::class, 'destory'])->name('destory');
    Route::delete('/{role}/role/{permission}/permission',[RoleController::class, 'revoke'])->name('revoke-permission');

});

Route::middleware(['auth','verified'])->name('permissions.')->prefix('permissions')->group(function(){
    Route::get('/', [PermissionController::class, 'index'])->name('index');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';