<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Alamat;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CetakController extends Controller
{
    public function cetak_pesanan(Request $request){
        $alamat = Alamat::where('user_id', auth()->user()->id)->get();
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        return view('cetak.test',compact('carts','alamat'));
    }

    public function cetak_transaksi($id){
        $transaksi = Order::findOrFail($id);
        return view('cetak.bukti_transaksi',compact('transaksi'));
    }
}
