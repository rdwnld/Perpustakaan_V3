<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;

// LOGIN
Route::get('/', [LoginController::class, 'index']);
Route::post('/proses_login', [LoginController::class, 'proses_login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index']);

//USERS
Route::get('/users', [UsersController::class, 'index']);
// CREATE
Route::get('/tambahuser', [UsersController::class, 'tambah']);
Route::post('/userstore', [UsersController::class, 'userstore']);
// CREATE END

// EDIT
Route::post('/useredit/{user_id}', [UsersController::class, 'useredit']);
Route::get('/edit/{user_id}', [UsersController::class, 'edit']);
// EDIT END

// DELETE
Route::delete('/delete/{user_id}', [UsersController::class, 'delete']);
// DELETE END


// ANGGOTA
Route::get('/daftar', [DaftarController::class, 'index']);
Route::get('/cetak', [CetakController::class, 'index']);


// BUKU
Route::get('/buku', [BukuController::class, 'index']);


// TRANSAKSI
Route::get('/peminjaman', [PeminjamanController::class, 'index']);
Route::get('/pengembalian', [PengembalianController::class, 'index']);
