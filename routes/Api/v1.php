<?php

use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Auth\RegisterController;
use App\Http\Controllers\Api\V1\User\LogoutController;
use App\Http\Controllers\Api\V1\User\MeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes For V1
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [LoginController::class, '__invoke'])->name('login');
Route::post('register', [RegisterController::class, '__invoke'])->name('register');

Route::group(['as' => 'user.', 'prefix' => 'user', 'middleware' => 'auth:sanctum'], function () {
    Route::get('me', [MeController::class, '__invoke'])->name('me');
    Route::post('logout', [LogoutController::class, '__invoke'])->name('logout');
});
