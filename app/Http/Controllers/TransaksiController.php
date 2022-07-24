<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Alamat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pesanan;

class TransaksiController extends Controller
{
    public static function index(Request $request)
    {
        $orders = Order::where('user_id', auth()->user()->id)->get();

        return view('transaksi.transaksi', compact('orders',));
    }

    public function test(){
        
        $orders = Order::where('user_id', auth()->user()->id)->get();

        for ($i = 0; $i < sizeof($orders); $i++) {
            $pesanan[$i] = Pesanan::where('order', $orders[$i]->id)->get();
        }
        $alamat = Alamat::where('user_id', auth()->user()->id)->get();
        return view('transaksi.detail_pesanan', compact('pesanan','orders','alamat'));
    }

    public function pembayaran()
    {
        $alamat = Alamat::where('user_id', auth()->user()->id)->get();
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        return view('transaksi.pembayaran', compact('carts', 'alamat')) ;
    }
}
