<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ParameterController;
use App\Models\Kriteria;
use App\Http\Controllers\DataAnalisaController;
use App\Http\Controllers\DataAlternatifController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\RecomendationController;
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
Route::get('/wisata/{id}', [RecomendationController::class, 'detailWisata'])->name('wisata.detail');


// Login & Register
Route::get('/register', [AuthController::class, 'rindex']);
Route::post('/register', [AuthController::class, 'rstore']);
Route::get('/login', [AuthController::class, 'lindex'])->name('login');
Route::post('/login',[AuthController::class,'store']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Admin
Route::resource('/admin', AdminController::class);

Route::resource('/user', UserController::class);

// Pengelola
Route::resource('/wisata', WisataController::class);
Route::post('/wisata', [WisataController::class, 'store'])->name('wisata');
Route::put('/pengelola/wisata/{id}',[WisataController::class, 'update'])->name('wisata');
Route::resource('/berita', BeritaController::class);
Route::resource('/category', CategoryController::class);
Route::get('/wisata', [WisataController::class,'index'])->name('wisata.index');
Route::post('/wisata', [WisataController::class,'store'])->name('wisata.store');

// User
Route::get('/profile', PenggunaController::class);
Route::post('/profile', [PenggunaController::class, 'update']);
// Route::post('/wisata', [WisataController::class, 'store'])->name('wisata');
// Route::put('/pengelola/wisata/{id}',[WisataController::class, 'update'])->name('wisata');

Route::get('search',[WisataController::class, 'searchWisata'] );

// Rekomendasi
Route::resource('/kriteria', KriteriaController::class);
Route::post('/kriteria', [KriteriaController::class, 'store'])->name('kriteria');
Route::put('/admin/kriteria/{id}',[KriteriaController::class, 'update'])->name('kriteria');
Route::get('/kriteria', [KriteriaController::class,'index'])->name('kriteria.index');
Route::post('/kriteria', [KriteriaController::class,'store'])->name('kriteria.store');

//
// Route::middleware(['auth:web'])->group(function(){
    // Route::controller(PageController::class)->group(function(){
    //     Route::get('dashboard','dashboard')->name('page.home');
    // });
    Route::resource('kriteria', KriteriaController::class);
    Route::resource('parameter',ParameterController::class);
    Route::resource('dataanalisa',DataAnalisaController::class);
    Route::resource('dataalternatif',DataAlternatifController::class);

    //Admin rekomendasi
    Route::get('/rekomendasi', [RecomendationController::class, 'index'])->name('rekomendasi.index');
    Route::post('/rekomendasi', [RecomendationController::class, 'show'])->name('rekomendasi.show');

    //User rekomendasi
    Route::get('/rekomendasiuser', [RecomendationController::class, 'userindex'])->name('rekomendasi.userindex');
    Route::post('/rekomendasiuser', [RecomendationController::class, 'usershow'])->name('rekomendasi.usershow');

    Route::controller(PerhitunganController::class)->prefix('perhitungan')->group(function(){
        Route::get('create','create')->name('perhitungan.create');
        Route::post('store','store')->name('perhitungan.store');
        Route::get('hasil','index')->name('perhitungan.index');
        Route::get('matriks','matriks')->name('perhitungan.matriks');
    });
// });
