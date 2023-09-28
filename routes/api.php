<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->group(function () {
	Route::get('/user', [UserController::class, 'show'])->name('user.show');
	Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::controller(AuthController::class)->group(function () {
	Route::post('/register', 'register')->name('register');
	Route::post('/login', 'login')->name('login');
});
