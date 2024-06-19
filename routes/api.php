<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mobile\RuanganController;
use App\Http\Controllers\mobile\PeminjamanController;
use App\Http\Controllers\Auth\AuthenticationController;

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

Route::get('/test', function () {
    return response ([
        'message' => 'API Jalan Brok~'
    ], 200);
});

// LOGIN & REGISTER
Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

// CRUD FORM PEMINJAMAN
Route::get('/ruangan', [RuanganController::class, 'index']);
Route::post('/peminjaman', [PeminjamanController::class, 'store']);

// STATUS PEMINJAMAN
Route::post('/status-peminjaman', [PeminjamanController::class, 'getStatusPeminjaman']);


