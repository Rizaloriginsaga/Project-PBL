<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LombaController;

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
    return view('layout.master');
});

Route::get('tampil-lomba', [LombaController::class, 'index'])->name('lomba.index');
Route::get('tambah-lomba', [LombaController::class, 'create'])->name('lomba.create');
Route::post('tampil-lomba', [LombaController::class, 'store'])->name('lomba.store');
Route::get('/lomba/edit/{id}', [LombaController::class, 'edit'])->name('lomba.edit');
Route::post('/lomba/edit/{id}', [LombaController::class, 'update'])->name('lomba.update');
Route::post('/lomba/delete/{id}', [LombaController::class, 'destroy'])->name('lomba.delete');
Route::get('/lomba/read/{id}', [LombaController::class, 'read'])->name('lomba.read');
Route::get('exportExcelProduk', [LombaController::class, 'exportExcelProduk'])->name('excel');
