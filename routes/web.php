<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Models\User;



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');


Route::get('login', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name("login.store");


Route::get('register', [RegisterController::class, 'index']);
Route::post('register', [RegisterController::class, 'create'])->name("register.create");


Route::middleware(['auth'])->group(function () {

});












