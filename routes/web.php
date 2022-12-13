<?php

use Illuminate\Support\Facades\Route;
use App\Models\tabel1;
use App\Models\tabel2;
use App\Models\tabel3;
use App\Models\tabel4;
use App\Models\tabel5;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KandunganController;
use App\Http\Controllers\KegunaanController;
use App\Http\Controllers\PetunjukController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\KeunggulanController;

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

Route ::get('/', [HomeController::class, 'index']);

Route ::get('/kandungan', [KandunganController::class, 'index'])->name('kandungan_index');

Route ::get('/kegunaan', [KegunaanController::class, 'index'])->name('kegunaan_index');

Route ::get('/petunjuk', [PetunjukController::class, 'index'])->name('petunjuk_index');

Route ::get('/tentang', [TentangController::class, 'index'])->name('tentang_index');

Route ::get('/keunggulan', [KeunggulanController::class, 'index'])->name('keunggulan_index');



// bikin database
// setting koneksi database
// cara bikin model
// cara memanggil tabel (model)
// cara menampilkan data di view (blade)

// kolom diskrip, $data->diskrip

// 
// 

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/blog', function () {
    return view('blog');
});
Route::get('/blog-details', function () {
    return view('blog-details');
});

