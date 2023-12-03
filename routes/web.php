<?php

use App\Http\Controllers\AuthController;
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



Route::get('login', [AuthController::class, 'login_view'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('proses_login');
Route::get('register', [AuthController::class, 'register_view'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('proses_register');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['login:admin']], function () {
        Route::get('/edit-profile/{username}', [AuthController::class, 'edit_profile_view'])->name('edit_profile');
        Route::post('/edit-profile/{username}', [AuthController::class, 'edit_profile'])->name('edit_profile');
    });
    Route::group(['middleware' => ['login:mahasiswa']], function () {
        Route::get('/edit-profile/{username}', [AuthController::class, 'edit_profile_view'])->name('edit_profile');
        Route::post('/edit-profile/{username}', [AuthController::class, 'edit_profile'])->name('edit_profile');
    }); //test
});
