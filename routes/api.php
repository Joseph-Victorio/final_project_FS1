<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\KelasController;
use App\Http\Controllers\Api\ListAlatController;
use App\Http\Controllers\Api\InformasiController;
use App\Http\Controllers\Api\TransaksiController;
use App\Http\Controllers\Api\InstrukturController;

// INFORMASI
// index
Route::get('/Informasi', [InformasiController::class, 'index'])->name('api.informasi.index');
// store
Route::post('/Informasi/store', [InformasiController::class, 'store'])->name('api.informasi.store');
// update
Route::post('/Informasi/update/{id}', [InformasiController::class, 'update'])->name('api.informasi.update');
// destroy
Route::delete('/Informasi/destroy/{id}', [InformasiController::class, 'destroy'])->name('api.informasi.destroy');
// detail
Route::get('/Informasi/detail/{id}', [InformasiController::class, 'show'])->name('api.informasi.detail');

// KELAS
// index
Route::get('Kelas', [KelasController::class, 'index'])->name('api.Kelas.index');
// store
Route::post('Kelas/store', [KelasController::class, 'store'])->name('api.Kelas.store');
// update
Route::post('Kelas/update/{id}', [KelasController::class, 'update'])->name('api.Kelas.update');
// destroy
Route::delete('Kelas/destroy/{id}', [KelasController::class, 'destroy'])->name('api.Kelas.destroy');
// detail
Route::get('Kelas/detail/{id}', [KelasController::class, 'show'])->name('api.Kelas.detail');

// Instructur
// index
Route::get('Instruktur', [InstrukturController::class, 'index'])->name('api.index');
// store
Route::post('Instruktur/store', [InstrukturController::class, 'store'])->name('api.Instruktur.store');
// update
Route::post('Instruktur/update/{id}', [InstrukturController::class, 'update'])->name('api.Instruktur.update');
// destroy
Route::delete('Instruktur/destroy/{id}', [InstrukturController::class, 'destroy'])->name('api.Instruktur.destroy');
// show
Route::get('Instruktur/show/{id}', [InstrukturController::class, 'show'])->name('api.Instruktur.show');

// Listing Alat
// index
Route::get('Alat', [ListAlatController::class, 'index'])->name('api.Alat.index');
// store
Route::post('Alat/store', [ListAlatController::class, 'store'])->name('api.Alat.store');
// update
Route::post('Alat/update/{id}', [ListAlatController::class, 'update'])->name('api.Alat.update');
// destroy
Route::delete('Alat/destroy/{id}', [ListAlatController::class, 'destroy'])->name('api.Alat.destroy');
// show
Route::get('Alat/show/{id}', [ListAlatController::class, 'show'])->name('api.Alat.show');

// TRANSAKSI
Route::get('Transaksi', [TransaksiController::class, 'index'])->name('api.Transaksi.index');
