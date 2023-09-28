<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Auth;
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
	Route::get('/user', function () {
		return Auth::user();
	});
	Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::controller(AuthController::class)->group(function () {
	Route::post('/register', 'register')->name('register');
	Route::post('/login', 'login')->name('login');
});
