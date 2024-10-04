<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CursusenController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::post('/cursus', [CursusenController::class, 'create'])->name('cursusen.create');
Route::get('/cursus', [CursusenController::class, 'index'])->name('cursusen.index');

Route::get('/cursus/{cursus}/edit', [CursusenController::class, 'edit'])->name('cursusen.edit');
Route::put('/cursus/{cursus}', [CursusenController::class, 'update'])->name('cursusen.update');

Route::delete('/cursus/{cursus}', [CursusenController::class, 'delete'])->name('cursusen.delete');
