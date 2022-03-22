<?php

use App\Models\DataPegawai;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    $data = DataPegawai::all();
    return view('welcome', compact('data'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pegawai', [App\Http\Controllers\DataPegawaiController::class, 'index']);
Route::post('/pegawai', [App\Http\Controllers\DataPegawaiController::class, 'store'])->name('store');

Route::get('/masuk', [App\Http\Controllers\PresensiController::class, 'index']);
Route::post('/masuk', [App\Http\Controllers\PresensiController::class, 'store'])->name('masuk.store');

Route::get('/keluar', [App\Http\Controllers\PresensiController::class, 'keluar']);
Route::post('/keluar', [App\Http\Controllers\PresensiController::class, 'kstore'])->name('keluar.store');

// Form Pulang
Route::get('pulang/{id}', [\App\Http\Controllers\PresensiController::class, 'pulang'])->name('pulang');
