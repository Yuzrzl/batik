<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DetailProdukController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\RajaOngkirController;
use App\Http\Controllers\ReturController;
use App\Http\Controllers\TransaksiController;

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

Route::get('/', [NewController::class, 'wel'])->name('welcome');

Route::view('about', 'layouts.about');
Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [NewController::class, 'index'])->name('home');
    Route::get('contact', [NewController::class, 'contact']);
    //Route::view('about', 'admin.about');
    //Route::get('cetak', [CetakController::class, 'cetak_pesanan']);
    Route::get('cetak-transaksi/{id}',[CetakController::class, 'cetak_transaksi']);
    Route::get('cetak-pesanan/{id}',[CetakController::class, 'cetak_pesanan']);

    Route::middleware('role:admin')->group(function () {
        Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
        Route::get('users', [UserController::class, 'index'])->name('users.index');

        Route::get('/daftar_produk', [ProductController::class, 'daftar_produk'])->name('produk.daftar_produk');
        Route::get('/tambah_produk', [ProductController::class, 'tambah_produk'])->name('produk.tambah_produk');
        Route::post('/simpan_produk', [ProductController::class, 'simpan'])->name('produk.simpan');

        Route::get('edit_p/{id}', [ProductController::class, 'edit'])->name('produk.ubah_produk');
        Route::post('/update_p/{id}', [ProductController::class, 'update'])->name('produk.update');
        Route::get('destroy_p/{id}', [ProductController::class, 'destroy'])->name('produk.destroy');

        Route::get('pesanan', [AdminController::class, 'pesanan']);
        Route::get('respon-pesanan/{id}', [AdminController::class, 'edit']);
        Route::post('update_status/{id}', [AdminController::class, 'update']);
        Route::get('ctk-lap/', [AdminController::class, 'cetak_lap']);

        Route::get('ctk-pertgl/{tglawal}/{tglakhir}', [AdminController::class, 'cetak_pertanggal'])->name('ctk-pertgl');
        Route::get('ctk-pes', [AdminController::class, 'ctkpes']);
        
        Route::get('ctk-trans', [AdminController::class, 'ctktrans']);
        Route::get('ctk-pertgl-trans/{tglawal}/{tglakhir}', [AdminController::class, 'cetak_pertanggal_trans'])->name('ctk-pertgl-trans');


        Route::get('laporan-retur', [ReturController::class, 'admin']);
        Route::get('detail-retur/{id}', [ReturController::class, 'detail']);

        Route::get('mail/{id}', [MailController::class, 'index'])->name('mail');
        // Route::post('kirim_pesan', [MailController::class, 'wa']);

        Route::get('send-mail',[MailController::class, 'send']);

        Route::get('laporan-transaksi', [AdminController::class, 'index']);
    });
    Route::get('alamat', [HomeController::class, 'alamat']);
    Route::post('kirim', [HomeController::class, 'store']);
    Route::get('edit_alamat/{id}', [HomeController::class, 'edit']);
    Route::post('update-a/{id}', [HomeController::class, 'update']);

    Route::get(
        '/detail/{id}',
        [DetailProdukController::class, 'detail']
    )->name('detail.detail_produk');

    Route::get('cart', [CartController::class, 'cart'])->name('cart.cart');
    Route::post('/cart_plus', [CartController::class, 'store'])->name('cart.cart_plus');
    Route::get('hapus/{id}', [CartController::class, 'hapus'])->name('cart.hapus');
    Route::post('/plus', [CartController::class, 'plus']);
    Route::post('/minus', [CartController::class, 'minus']);

    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    //Route::post('/store_t', [TransaksiController::class, 'store']);
    Route::get('transaksi', [TransaksiController::class, 'index'])->name('transa');
    Route::get('pembayaran', [TransaksiController::class, 'pembayaran']);
    Route::get('/pesanan-detail', [TransaksiController::class, 'test']);

    Route::get('pay', [PayController::class, 'index']);
    Route::post('/pay', [PayController::class, 'pay_post']);

    Route::get('pengiriman', [RajaOngkirController::class, 'index']);
    Route::get('/province/{id}/cities', [RajaOngkirController::class, 'getCities']);

    Route::post('order', [PesananController::class, 'post']);

    Route::get('retur', [ReturController::class, 'index']);
    Route::post('retur-keluhan', [ReturController::class, 'simpan'])->name('retur.simpan');
});
