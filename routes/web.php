<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/api', [ApiController::class, 'show']);
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profileUpdate');

    Route::get('/users', [UsersController::class, 'index'])->name('users')->middleware(['permission']);
    Route::get('/users/create', [UsersController::class, 'create'])->name('addUsers')->middleware(['permission']);
    Route::post('/users/store', [UsersController::class, 'store'])->name('saveUser')->middleware(['permission']);
});
