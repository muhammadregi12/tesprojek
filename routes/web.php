<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PertandinganController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', [HomeController::class, 'index']);
Route::get('/', [AuthController::class, 'login'])->name('view.login');
Route::post('/login/proses', [AuthController::class, 'authenticated'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('view.dashboard');

    Route::get('/view/club', [ClubController::class, 'ViewClub'])->name('club.view');
    Route::post('/tambah/club', [ClubController::class, 'tambahclub'])->name('tambah.club');
    Route::get('/edit/club/{id}', [ClubController::class, 'editclub'])->name('edit.club');
    Route::post('/update/club', [ClubController::class, 'updateclub'])->name('update.club');
    Route::get('/delete/club/{id}', [ClubController::class, 'deleteclub'])->name('delete.club');

    Route::get('/pertandingan/club', [PertandinganController::class, 'viewpertandingan'])->name('view.pertandingan');
    Route::post('/hitung', [PertandinganController::class, 'simpanPertandingan'])->name('simpan.pertandingan');
    // Route::post('/multiple', [PertandinganController::class, 'multiplePertandingan'])->name('multiple.pertandingan');

    Route::get('view/klasemen', [PertandinganController::class, 'viewklasemen'])->name('view.klasemen');
});
