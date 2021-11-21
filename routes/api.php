<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ParkinglotController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\UserParkingController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    // route untuk detail user
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    // route untuk logout
    Route::get('/logout', function (Request $request) {
        return $request->user()->tokens()->delete();
    });

    // mengembalikan semua data tempat Parkir
    Route::get('parkinglot', [ParkinglotController::class, 'index']);
    // mencari tempat parkir berdasarkan lokasi
    Route::get('parkinglot/{location}', [ParkinglotController::class, 'findParking']);

    // route set rating untuk tempat parkir
    Route::post('parkinglot/rating', [UserParkingController::class, 'sendRating']);
});
