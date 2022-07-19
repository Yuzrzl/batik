<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Alamat;
use App\Models\Product;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pesanan;

class TransaksiController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->user()->id)->get();
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        $pesanan = Pesanan::where('cart_id', $carts[1]->id)->get();
        return view('transaksi.transaksi', compact('orders', 'pesanan', 'carts'));
    }

    public function pembayaran()
    {
        $alamat = Alamat::where('user_id', auth()->user()->id)->get();
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        return view('transaksi.pembayaran', compact('carts', 'alamat'));
    }
}
