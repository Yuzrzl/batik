<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;


class CartController extends Controller
{
    public function cart()
    {
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        return view('keranjang.cart', compact('carts'));
    }

    public function store(Request $request)
    {
        $cart = Cart::where('product_id', $request->product_id)
            ->where('user_id', auth()->user()->id)
            ->first();

        if (isset($cart)) {
            $jumlah = $cart->jumlah;
            $cart->jumlah = $jumlah + 1;
            $cart->save();
        } else {
            Cart::create([
                'user_id' => auth()->user()->id,
                'product_id' => $request->product_id,
                'jumlah' => 1,
            ]);
        }

        return redirect('cart');
    }

    public function plus(Request $request)
    {
        $cart = Cart::find($request->id_produk);
        $cart->jumlah = $cart->jumlah + 1;
        $cart->save();
        return redirect()->back();
    }

    public function minus(Request $request)
    {
        $cart = Cart::find($request->id_produk);
        $cart->jumlah = $cart->jumlah - 1;
        $cart->save();
        return redirect()->back();
    }

    public function hapus($id)
    {
        $item = Cart::findOrFail($id);
        $item->delete();
        return redirect()->back();
    }
}
