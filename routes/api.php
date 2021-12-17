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

    // detail tempat parkir berdasarkan id
    Route::get('parkinglot/detail/{id}', [ParkinglotController::class, 'show']);

    // route set rating untuk tempat parkir
    Route::post('parkinglot/rating', [UserParkingController::class, 'sendRating']);

    // route untuk pesan parkir
    Route::post('pesan', [UserParkingController::class, 'pesan_parkir']);

    // route untuk detail pesan parkir
    Route::get('pesan/detail', [UserParkingController::class, 'detail_pesanan']);

    // route untuk batal pesanan parkir 
    Route::get('pesan/batal', [UserParkingController::class, 'batalPesanan']);

    // route untuk sudah sampai tempat parkir
    Route::get('pesan/parked', [UserParkingController::class, 'sudahSampai']);

    // route untuk selesai parkir 
    Route::get('pesan/selesai', [UserParkingController::class, 'selesaiParkir']);
});
