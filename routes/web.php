<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\DatasetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Models\HasilPrediksi;

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
// Route::get('/dashboard2', [DashboardController::class, 'index2']);
Route::get('/data-mahasiswa', [MahasiswaController::class, 'index'])->name('data-mahasiswa')->middleware('auth');

Route::get('/hasil-prediksi', [MahasiswaController::class, 'riwayatPrediksi'])->name('hasil-prediksi')->middleware('auth');

Route::get('/data-prediksi-mhs', [MahasiswaController::class, 'data_prediksi'])->name('data-prediksi-mhs')->middleware('auth');
Route::post('/impor-data', [MahasiswaController::class, 'import'])->name('impor-data');
Route::get('/tambah-data-mhs', [MahasiswaController::class, 'tambah_data_mhs'])->name('tambah-data')->middleware('auth');
Route::post('/proses-tambah-data', [MahasiswaController::class, 'store'])->name('proses-tambah-data');
Route::get('/update-data-mhs/{id}', [MahasiswaController::class, 'update_data_mhs'])->name('update-data')->middleware('auth');
Route::put('/proses-update-data/{id}', [MahasiswaController::class, 'proses_update'])->name('proses-update');
Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'hapus'])->name('hapus-data');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'proses_login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/preview-import', [MahasiswaController::class, 'previewImport'])->name('preview-import');
Route::post('/proses-import', [MahasiswaController::class, 'prosesImport'])->name('proses-import');
// Route::post('/mahasiswa/prediksi', [MahasiswaController::class, 'prediksiKelulusan'])->name('mahasiswa.prediksi');
Route::post('/mahasiswa/prediksi', [MahasiswaController::class, 'prediksiKelulusan2'])->name('mahasiswa.prediksi2');
// Route::post('/mahasiswa/prediksi2', [MahasiswaController::class, 'prediksi2'])->name('mahasiswa.prediksi2');

Route::post('/prediksi-massal', [MahasiswaController::class, 'prediksiKelulusanMassal'])->name('prediksi.massal');



// Route::post('/upload-dataset', [DatasetController::class, 'uploadDataset']);
Route::post('/upload-dataset', [ModelController::class, 'uploadDataset'])->name('upload.dataset');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'proses_register']);

// Route::post('/mahasiswa/{id}/prediksi', [MahasiswaController::class, 'prediksi'])->name('mahasiswa.prediksi');
