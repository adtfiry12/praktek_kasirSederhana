<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

// pengguna
Route::get('pengguna', [
    PenggunaController::class, 'index'
]);
Route::get('pengguna/create', [
    PenggunaController::class, 'create'
]);
Route::post('pengguna/store', [
    PenggunaController::class, 'store'
]);
Route::get('pengguna/edit/{id}', [
    PenggunaController::class, 'edit'
]);
Route::post('pengguna/update/{id}', [
    PenggunaController::class, 'update'
]);
Route::get('pengguna/delete/{id}', [
    PenggunaController::class, 'destroy'
]);

// pelanggan

Route::get('pelanggan', [
    PelangganController::class, 'index'
]);
Route::get('pelanggan/create', [
    PelangganController::class, 'create'
]);
Route::post('pelanggan/store', [
    PelangganController::class, 'store'
]);
Route::get('pelanggan/edit/{id}', [
    PelangganController::class, 'edit'
]);
Route::post('pelanggan/update/{id}', [
    PelangganController::class, 'update'
]);
Route::get('pelanggan/delete/{id}', [
    PelangganController::class, 'destroy'
]);

Route::get('kategori', [
    KategoriController::class, 'index'
]);
Route::get('kategori/create', [
    KategoriController::class, 'create'
]);
Route::post('kategori/store', [
    KategoriController::class, 'store'
]);
Route::get('kategori/edit/{id}', [
    KategoriController::class, 'edit'
]);
Route::post('kategori/update/{id}', [
    KategoriController::class, 'update'
]);
Route::get('kategori/delete/{id}', [
    KategoriController::class, 'destroy'
]);

// barang
Route::get('barang', [
    BarangController::class, 'index'
]);
Route::get('barang/create', [
    BarangController::class, 'create'
]);
Route::post('barang/store', [
    BarangController::class, 'store'
]);
Route::get('barang/edit/{id}', [
    BarangController::class, 'edit'
]);
Route::post('barang/update/{id}', [
    BarangController::class, 'update'
]);
Route::get('barang/delete/{id}', [
    BarangController::class, 'destroy'
]);


//transaksi
Route::get('transaksi', [
    TransaksiController::class, 'index'
]);
Route::get('transaksi/create', [
    TransaksiController::class, 'create'
]);
Route::post('transaksi/store', [
    TransaksiController::class, 'store'
]);
Route::get('transaksi/edit/{id}', [
    TransaksiController::class, 'edit'
]);
Route::get('transaksi/update/{id}', [
    TransaksiController::class, 'update'
]);
Route::get('transaksi/delete/{id}', [
    TransaksiController::class, 'destroy'
]);

// search
Route::get('/caripelanggan', [
    TransaksiController::class, 'cari'
]);

Route::get('/caribarang', [
    TransaksiController::class, 'caribarang'
]);