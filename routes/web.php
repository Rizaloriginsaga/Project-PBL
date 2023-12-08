<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrestasiController;

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

Route::get('/',[PrestasiController::class, 'index']);

//prestasi 
Route::get('tampil-prestasi',[PrestasiController::class, 'index']);

Route::get('tambah-prestasi',[PrestasiController::class, 'create'])->name('create_prestasi');
Route::post('tampil-prestasi',[PrestasiController::class, 'store'])->name('store_prestasi');

Route::get('/prestasi/ubah-prestasi/{id}',[PrestasiController::class, 'edit'])->name('edit_prestasi');
Route::post('/prestasi/ubah-prestasi/{id}',[PrestasiController::class, 'update'])->name('update_prestasi');

Route::get('/prestasi/verifikasi-prestasi/{id}',[PrestasiController::class, 'verify'])->name('verify_prestasi');
Route::post('/verifikasi/{id}', [PrestasiController::class, 'verifikasi']);
Route::post('/unverifikasi/{id}', [PrestasiController::class, 'unverifikasi']);

Route::get('/prestasi/lihat-prestasi/{id}',[PrestasiController::class, 'view'])->name('view_prestasi');

Route::post('hapus-prestasi/{id}',[PrestasiController::class, 'destroy'])->name('delete_prestasi');

Route::get('ExportExcelPrestasi',[PrestasiController::class, 'exportExcelPrestasi'])->name('excel');
