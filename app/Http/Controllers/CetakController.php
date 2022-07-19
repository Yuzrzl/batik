<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Cart;
use Illuminate\Http\Request;

class CetakController extends Controller
{
    public function cetak_pesanan(Request $request){
        $alamat = Alamat::where('user_id', auth()->user()->id)->get();
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        return view('cetak.test',compact('carts','alamat'));
    }
}
