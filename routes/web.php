<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::prefix('admin')->middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('home', [HomeController::class, 'adminHome'])->name('admin.home');
});

Route::prefix('manager')->middleware(['auth', 'user-access:manager'])->group(function () {
  
    Route::get('home', [HomeController::class, 'managerHome'])->name('manager.home');
});
