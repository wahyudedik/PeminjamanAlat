<?php

use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['middleware' => ['auth', 'role:admin']], function () {
//     // Rute-rute yang hanya dapat diakses oleh pengguna dengan peran admin
//     Route::get('/admin/dashboard', 'AdminController@dashboard');
// });

// Rute-rute yang hanya dapat diakses oleh pengguna dengan peran siswa
Route::middleware(['auth', 'role:siswa'])->group(
    function () {
        Route::get('/profile', [\App\Http\Controllers\SiswaController::class, 'profile'])->name('siswa.profile');
    }
);

// Rute-rute yang hanya dapat diakses oleh pengguna dengan peran admin
Route::middleware(['auth', 'role:admin'])->group(
    function () {
        Route::get('/profile', [\App\Http\Controllers\AdminController::class, 'profile'])->name('admin.profile');
    }
);
