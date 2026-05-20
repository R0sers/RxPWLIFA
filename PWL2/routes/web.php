<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatriksController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KRSController;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});








Route::get('/mahasiswa', [MahasiswaController::class, 'index' ])->name('mahasiswa'); 
Route::get('/form-mahasiswa', [MahasiswaController::class, 'create' ])->name('form-mahasiswa'); 
Route::put('/mahasiswa/{npm}', [MahasiswaController::class, 'update' ])->name('mahasiswaupdate'); 
Route::post('/mahasiswa', [MahasiswaController::class, 'store' ])->name('mahasiswastore'); 
Route::get('/mahasiswa/{npm}/edit', [MahasiswaController::class, 'edit' ])->name('form-edit-mahasiswa'); 
Route::delete('/mahasiswa/{npm}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
Route::get('/show/{id}/detail-mahasiswa',[MahasiswaController::class, 'show'])->name('detail-mahasiswa');

Route::get('/dosen', [DosenController::class, 'index' ])->name('dosen'); 
Route::get('/form-dosen', [DosenController::class, 'create' ])->name('form-dosen'); 
Route::put('/dosen/{nidn}', [DosenController::class, 'update' ])->name('dosenupdate'); 
Route::post('/dosen', [DosenController::class, 'store' ])->name('dosenstore'); 
Route::get('/dosen/{nidn}/edit', [DosenController::class, 'edit' ])->name('form-edit-dosen'); 
Route::delete('/dosen/{nidn}', [DosenController::class, 'destroy'])->name('dosen.destroy');
Route::get('/show/{id}/detail-dosen',[DosenController::class, 'show'])->name('detail-dosen');

Route::get('/krs', [KRSController::class, 'index' ])->name('krs'); 
Route::get('/form-krs', [KRSController::class, 'create' ])->name('form-krs'); 
Route::put('/krs/{id}', [KRSController::class, 'update' ])->name('krsupdate'); 
Route::post('/krs', [KRSController::class, 'store' ])->name('krsstore'); 
Route::get('/krs/{id}/edit', [KRSController::class, 'edit' ])->name('form-edit-krs'); 
Route::delete('/krs/{id}', [KRSController::class, 'destroy'])->name('krs.destroy');
Route::get('/show/{id}/detail-krs',[KRSController::class, 'show'])->name('detail-krs');

Route::get('/matriks', [MatriksController::class, 'index' ])->name('matriks'); 
Route::get('/form-matriks', [MatriksController::class, 'create' ])->name('form-matriks'); 
Route::put('/matriks/{id}', [MatriksController::class, 'update' ])->name('matriksupdate'); 
Route::post('/matriks', [MatriksController::class, 'store' ])->name('matriksstore'); 
Route::get('/matriks/{id}/edit', [MatriksController::class, 'edit' ])->name('form-edit-matriks'); 
Route::delete('/matriks/{id}', [MatriksController::class, 'destroy'])->name('matriks.destroy');
Route::get('/show/{id}/detail-matriks',[MatriksController::class, 'show'])->name('detail-matriks');