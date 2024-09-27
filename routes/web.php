<?php
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Models\User;


Route::get('tinker', function() {
    Auth()->logout();
});
Route::middleware(['auth'])->group(function () {



});


Route::middleware(['guest'])->group(function () {


Route::get('login', [LoginController::class, 'index']);
Route::get('register', [RegisterController::class, 'index']);
Route::post('register', [RegisterController::class, 'create'])->name("register.create");

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name("login.store");


});

Route::get('/', [HomeController::class, 'index'])->name("home");


// Route::post('login', [LoginController::class, 'index']);

