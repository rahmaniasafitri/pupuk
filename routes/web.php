<?php

use Illuminate\Support\Facades\Route;
use App\Models\tabel1;
use App\Models\tabel2;
use App\Models\tabel3;
use App\Models\tabel4;
use App\Models\tabel5;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardProduk;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

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
Route ::get('/kandungan', [HomeController::class, 'kandungan'])->name('kandungan_index');
Route ::get('/kegunaan', [HomeController::class, 'kegunaan'])->name('kegunaan_index');
Route ::get('/petunjuk', [HomeController::class, 'petunjuk'])->name('petunjuk_index');
Route ::get('/tentang', [HomeController::class, 'tentang'])->name('tentang_index');
Route ::get('/keunggulan', [HomeController::class, 'keunggulan'])->name('keunggulan_index');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);


// ADMIN PAGE
Route::group(['prefix'=> 'admin','middleware'=>['auth']], function(){
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/feedback', [DashboardController::class, 'feedback']);
    Route::get('/post', [DashboardController::class, 'post']);
    Route::get('/setting', [DashboardController::class, 'setting']);
    
    Route::get('/produk', [DashboardProduk::class, 'index']);
    Route::post('/produk', [DashboardProduk::class, 'postHandler']);
});


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

