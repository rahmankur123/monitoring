<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\AnggaranController;
use App\Http\Controllers\ValidasiController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\RealisasiController;
use App\Http\Controllers\EvaluasiController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\LpjController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);


Route::get('/', [LandingController::class, 'index']);
Route::prefix('admin')
    ->middleware(['auth','role:admin'])
    ->group(function () {

    
    Route::get('/kegiatan/draft', [KegiatanController::class, 'index']);
    Route::get('/kegiatan/proses', [KegiatanController::class, 'proses']);
    Route::get('/kegiatan/selesai', [KegiatanController::class, 'selesaikan']);
    Route::get('/kegiatan/create', [KegiatanController::class, 'create']) ;
    Route::post('/kegiatan/store', [KegiatanController::class, 'store']);
    Route::get('/kegiatan/edit/{id}', [KegiatanController::class, 'edit']);
    Route::post('/kegiatan/update/{id}', [KegiatanController::class, 'update']);
    Route::post('/kegiatan/submit/{id}', [KegiatanController::class, 'submit']);
    Route::get('/kegiatan/{id}/anggaran', [KegiatanController::class, 'listAnggaran']);

    // ACTION WORKFLOW
    Route::post('/kegiatan/submit/{id}', [KegiatanController::class, 'submit']);
    Route::post('/kegiatan/mulai/{id}', [KegiatanController::class, 'mulai']);
    Route::post('/kegiatan/selesai/{id}', [KegiatanController::class, 'selesai']);
    Route::post('/kegiatan/batal/{id}', [KegiatanController::class, 'batal']);

    Route::get('/evaluasi/{kegiatan_id}', [EvaluasiController::class, 'index']);
    Route::post('/evaluasi/store', [EvaluasiController::class, 'store']);
    Route::get('/galeri/{kegiatan_id}', [GaleriController::class, 'index']);
    Route::post('/galeri/store', [GaleriController::class, 'store']);
    Route::post('/galeri/delete/{id}', [GaleriController::class, 'destroy']);

    Route::get('/kegiatan/{kegiatan_id}/detail-selesai', [KegiatanController::class, 'detailSelesai']);


Route::get('/laporan/kegiatan', [KegiatanController::class, 'laporan']);
Route::get('/laporan/kegiatan/pdf', [KegiatanController::class, 'exportKegiatan']);
Route::get('/laporan/kas', [KasController::class, 'laporan']);
Route::get('/laporan/kas/pdf', [KasController::class, 'exportKas']);
Route::get('/', [DashboardController::class, 'admin']);
});

Route::prefix('bendahara')
    ->middleware(['auth','role:bendahara'])
    ->group(function () {
    Route::get('/anggaran/{kegiatan_id}/create', [AnggaranController::class, 'create']);
    Route::get('/anggaran/{kegiatan_id}/list', [AnggaranController::class, 'list']);
    Route::get('/anggaran/{kegiatan_id}/edit', [AnggaranController::class, 'edit']);
    Route::get('/anggaran/draft', [AnggaranController::class, 'index']);
    Route::get('/anggaran/proses', [AnggaranController::class, 'proses']);
    Route::get('/anggaran/selesai', [AnggaranController::class, 'selesai']);
    Route::post('/anggaran/store', [AnggaranController::class, 'store']);
    Route::post('/anggaran/update', [AnggaranController::class, 'update']);

    Route::get('/kas', [KasController::class, 'index']);
    Route::get('/kas/create', [KasController::class, 'create']);
    Route::post('/kas/store', [KasController::class, 'store']);

    Route::get('/realisasi/{kegiatan_id}', [RealisasiController::class, 'create']);
    Route::post('/realisasi/store', [RealisasiController::class, 'store']);
    Route::get('/realisasi', [RealisasiController::class, 'index']);
    Route::get('/realisasi/{kegiatan_id}/list', [RealisasiController::class, 'list']);
    Route::get('/realisasi/{kegiatan_id}/edit', [RealisasiController::class, 'edit']);
Route::post('/realisasi/update/{kegiatan_id}', [RealisasiController::class, 'update']);
Route::post('/realisasi/delete/{id}', [RealisasiController::class, 'destroy']);

Route::get('/lpj/{kegiatan_id}/edit', [LpjController::class, 'edit']);
Route::post('/lpj/update/{kegiatan_id}', [LpjController::class, 'update']);
Route::post('/lpj/delete/{id}', [LpjController::class, 'destroy']);

    Route::get('/lpj/{kegiatan_id}', [LpjController::class, 'create']);
    Route::post('/lpj/store', [LpjController::class, 'store']);

    Route::get('/kegiatan/{kegiatan_id}/detail-selesai', [KegiatanController::class, 'detailSelesai']);

    Route::get('/laporan/kegiatan', [KegiatanController::class, 'laporan']);
Route::get('/laporan/kegiatan/pdf', [KegiatanController::class, 'exportKegiatan']);
Route::get('/laporan/kas', [KasController::class, 'laporan']);
Route::get('/laporan/kas/pdf', [KasController::class, 'exportKas']);

Route::get('/', [DashboardController::class, 'bendahara']);

});

Route::prefix('takmir')
    ->middleware(['auth','role:takmir'])
    ->group(function () {

    // 🔴 LIST (status)
    Route::get('/kegiatan/draft', [ValidasiController::class, 'index']);
    Route::get('/kegiatan/proses', [ValidasiController::class, 'proses']);
    Route::get('/kegiatan/selesai', [ValidasiController::class, 'selesai']);

    // 🔴 DETAIL (BEDAKAN URL!)
    Route::get('/kegiatan/detail/{id}', [ValidasiController::class, 'show']);

    // 🔴 ACTION
    Route::post('/kegiatan/{id}/approve', [ValidasiController::class, 'approve']);
    Route::post('/kegiatan/{id}/reject', [ValidasiController::class, 'reject']);

    Route::get('/evaluasi/{kegiatan_id}', [EvaluasiController::class, 'index']);
    Route::post('/evaluasi/store', [EvaluasiController::class, 'store']);

    Route::get('/kegiatan/{id}/detail-selesai', [KegiatanController::class, 'detailSelesai']);

    Route::get('/laporan/kegiatan', [KegiatanController::class, 'laporan']);
Route::get('/laporan/kas', [KasController::class, 'laporan']);
Route::get('/laporan/kas/pdf', [KasController::class, 'exportKas']);
Route::get('/laporan/kegiatan/pdf', [KegiatanController::class, 'exportKegiatan']);
Route::get('/', [DashboardController::class, 'takmir']);
});