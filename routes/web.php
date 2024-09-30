<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;


Route::get('tinker', function (Request $request) {
// dd(Auth::check());
dd(User::All()->toArray());
// dd(Auth::user()->name);
});
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');


// Route::get('login', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name("login.store");


Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'create'])->name("register.create");


Route::middleware(['auth'])->group(function () {
    Route::get("profile", [ProfileController::class , "index"])->name("profile");
    Route::post("profile", [ProfileController::class , "edit"])->name("profile.edit");

});












