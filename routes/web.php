<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CursusenController;
use App\Http\Controllers\RegisterController;


Route::get('tinker', function (Request $request) {
// dd(Auth::check());
dd(User::All()->toArray());
// dd(Auth::user()->name);
});
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');


// Route::get('login', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'create'])->name("register.create");

Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/cursus', [CursusenController::class, 'index'])->name('cursusen.index');

Route::middleware(['auth'])->group(function () {
    Route::post('/cursus', [CursusenController::class, 'create'])->name('cursusen.create');

    Route::get("profile", [ProfileController::class , "index"])->name("profile");
    Route::post("profile", [ProfileController::class , "edit"])->name("profile.edit");

    Route::get('/cursus/{cursus}/edit', [CursusenController::class, 'edit'])->name('cursusen.edit');
    Route::put('/cursus/{cursus}', [CursusenController::class, 'update'])->name('cursusen.update');

    Route::delete('/cursus/{cursus}', [CursusenController::class, 'delete'])->name('cursusen.delete');
});
