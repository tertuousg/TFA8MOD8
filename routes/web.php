<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\Auth\RegistrationController;
Route::redirect('/', '/customers');
Route::middleware('guest')->group(function () {
 Route::get('/login',[SessionController::class,'create'])->name('login');
 Route::post('/login',[SessionController::class,'store']);
 Route::get('/register',[RegistrationController::class,'create'])->name('register');
 Route::post('/register',[RegistrationController::class,'store']);
});
Route::post('/logout',[SessionController::class,'destroy'])->middleware('auth')->name('logout');
Route::middleware('auth')->group(function () {
 Route::resource('customers',CustomerController::class);
 Route::resource('users',UserController::class);
});
