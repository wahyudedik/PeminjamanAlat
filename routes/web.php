<?php

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

// Route::group(['middleware' => ['auth', 'role:siswa']], function () {
//     // Rute-rute yang hanya dapat diakses oleh pengguna dengan peran siswa
//     Route::get('/siswa/dashboard', 'SiswaController@dashboard');
// });

