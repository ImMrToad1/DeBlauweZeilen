<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CursusenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('login', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::get('register', [RegisterController::class, 'index']);
Route::post('register', [RegisterController::class, 'create'])->name('register.create');

Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/cursus', [CursusenController::class, 'index'])->name('cursusen.index');

Route::middleware(['auth'])->group(function () {
    Route::post('/cursus', [CursusenController::class, 'create'])->name('cursusen.create');


    Route::get('/cursus/{cursus}/edit', [CursusenController::class, 'edit'])->name('cursusen.edit');
    Route::put('/cursus/{cursus}', [CursusenController::class, 'update'])->name('cursusen.update');

    Route::delete('/cursus/{cursus}', [CursusenController::class, 'delete'])->name('cursusen.delete');
});
