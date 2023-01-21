<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PesananController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [PenggunaController::class, 'index']);

Route::get('/mobil', [PenggunaController::class, 'mobil']);

Route::get('/mobil/{mobil}', [PenggunaController::class, 'detailMobil']);

Route::get('/mobil/{mobil}/pesan', [PenggunaController::class, 'order'])->middleware('auth');

Route::post('/pesan', [PenggunaController::class, 'createOrder'])->middleware('auth');

Route::get('/pesanan', [PenggunaController::class, 'orders'])->middleware('auth');

Route::get('/pesanan/{pesanan}', [PenggunaController::class, 'orderDetail'])->middleware('auth');

Route::get('/merek', [PenggunaController::class, 'merek']);

Route::get('/merek/{merek:slug}', [PenggunaController::class, 'singleMerek']);

Route::get('/user/{user:username}', [PenggunaController::class, 'profile']);

Route::get('/edit-profile', [PenggunaController::class, 'editProfile']);

Route::put('/edit-profile', [PenggunaController::class, 'updateProfile']);

Route::group(['prefix' => 'admin'], function () {
  Route::get('/', [AdminController::class, 'index'])->name('admin_home');

  Route::get('/login', [AdminController::class, 'login'])->middleware('guest');

  Route::resource('/merek', MerekController::class);

  Route::resource('/mobil', MobilController::class);

  Route::resource('/pemesanan', PesananController::class);
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
