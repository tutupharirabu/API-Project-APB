<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDetailRuangan;
use App\Http\Controllers\AdminStatusPengajuanController;
use App\Http\Controllers\AdminStatusRuanganController;
use App\Http\Controllers\DashboardPenyewaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MeminjamBarangController;
use App\Http\Controllers\MeminjamRuanganController;
use App\Http\Controllers\PenyewaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Authenticate
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('posts.login');
Route::get('/logout', [LoginController::class, 'logout']);

// Register penyewa
Route::get('/daftarPenyewa', [PenyewaController::class, 'create'])->name('daftarPenyewa');
Route::post('/daftarPenyewa/posts', [PenyewaController::class, 'store'])->name('posts.daftarPenyewa');

// Dashboard penyewa
Route::get('/dashboardPenyewa', [DashboardPenyewaController::class, 'create'])->name('penyewa.dashboard')->middleware('auth');

// PEMINJAMAN
// Peminjaman Ruangan
Route::get('/meminjamRuangan', [MeminjamRuanganController::class, 'create'])->name('penyewa.peminjamanRuangan')->middleware('auth');
Route::post('/meminjamRuangan/posts', [MeminjamRuanganController::class, 'store'])->name('posts.peminjamanRuangan')->middleware('auth');
Route::get('/get-ruangan-details',  [MeminjamRuanganController::class, 'getRuanganDetails'])->middleware('auth');

// Peminjaman Barang
Route::get('/meminjamBarang', [MeminjamBarangController::class, 'index'])->name('penyewa.peminjamanBarang')->middleware('auth');

// Admin lihat Daftar Ruangan
Route::get('/daftarRuanganAdmin', [AdminStatusRuanganController::class, 'index'])->name('admin.status')->middleware('auth');
Route::get('/detailRuanganAdmin', [AdminDetailRuangan::class, 'index'])->middleware('auth');

// Status Pengajuan
Route::get('/statusPengajuanAdmin', [AdminStatusPengajuanController::class, 'index'])->middleware('auth');
Route::post('/tambahRuanganAdmin/posts', [AdminStatusRuanganController::class, 'store'])->name('posts.ruangan')->middleware('auth');
Route::post('/statusPengajuanAdmin/{id}', [AdminStatusPengajuanController::class, 'update'])->name('update.pengajuan')->middleware('auth');

// Penyewa lihat status Ruangan
Route::get('/daftarRuanganPenyewa', [PenyewaController::class, 'index'])->name('daftarRuanganPenyewa')->middleware('auth');
Route::get('/detailRuanganPenyewa/{id}', [PenyewaController::class, 'show'])->name('detailRuanganPenyewa')->middleware('auth');

//Admin CRUD Ruangan
Route::get('/tambahRuanganAdmin', [AdminStatusRuanganController::class, 'create'])->middleware('auth');
Route::post('/upload',[AdminStatusRuanganController::class,'dropzone'])->name('dropzone.store')->middleware('auth');
Route::get('/editRuanganAdmin/{id}/edit', [AdminStatusRuanganController::class, 'edit'])->middleware('auth');
Route::put('/editRuanganAdmin/{id}', [AdminStatusRuanganController::class, 'update'])->name('update.ruangan')->middleware('auth');
Route::get('/daftarRuanganAdmin/{id}', [AdminStatusRuanganController::class, 'destroy'])->middleware('auth'); //delete
