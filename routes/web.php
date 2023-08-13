<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PengelolaController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PromosiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Home
Route::get('/', [HomeController::class, 'index'])->name('HomePage');
Route::get('/infoBerita', [HomeController::class, 'bindex']);
Route::get('/detailberita/{id}', [HomeController::class, 'berita']);
Route::get('/lwisata', [HomeController::class, 'wisata']);
Route::get('/detailwisata/{id}', [HomeController::class, 'dwisata']);

// Login & Register
Route::get('/register', [AuthController::class, 'rindex']);
Route::post('/register', [AuthController::class, 'rstore']);
Route::get('/login', [AuthController::class, 'lindex'])->name('login');
Route::post('/login',[AuthController::class,'store']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Admin
Route::resource('/admin', AdminController::class);
Route::resource('/pengelola', PengelolaController::class);
Route::resource('/user', UserController::class);
Route::get('/transaksilist', [AdminController::class, 'transaksi']);


// Pengelola
Route::resource('/wisata', WisataController::class);
Route::post('/wisata', [WisataController::class, 'store'])->name('wisata');
Route::put('/pengelola/wisata/{id}',[WisataController::class, 'update'])->name('wisata');
Route::resource('/berita', BeritaController::class);
Route::resource('/promosi', PromosiController::class);
Route::resource('/category', CategoryController::class);
Route::get('/wisata', [WisataController::class,'index'])->name('wisata.index');
Route::post('/wisata', [WisataController::class,'store'])->name('wisata.store');
Route::get('/pesanan', [PromosiController::class, 'pesanan']);
Route::get('/pesanan/{id}', [PromosiController::class, 'show']);
// verifikasi pembayaran
Route::get('/verify', [PromosiController::class, 'verify']);
Route::get('/block', [PromosiController::class, 'block']);

// User
Route::get('/profile', PenggunaController::class);
Route::post('/profile', [PenggunaController::class, 'update']);
Route::get('/detail/{id}', [PenggunaController::class, 'dcart']);
Route::post('/pesan/{id}', [PenggunaController::class, 'pesan']);
Route::put('/upload/{id}', [PenggunaController::class, 'epesan']);
Route::get('/check-out', [PenggunaController::class, 'check_out']);
Route::get('/konfirmasi', [PenggunaController::class, 'konfirmasi']);
Route::get('/history',  [PenggunaController::class, 'index']);
Route::get('/struk/{id}', [PenggunaController::class, 'struk']);
Route::post('/komen/{id}', [PenggunaController::class, 'insert']);

Route::post('/wisata', [WisataController::class, 'store'])->name('wisata');
Route::put('/pengelola/wisata/{id}',[WisataController::class, 'update'])->name('wisata');

Route::get('search',[WisataController::class, 'searchWisata'] );
