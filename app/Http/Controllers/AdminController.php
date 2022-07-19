<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.pesanan.laporan_transaksi', compact('orders'));
    }

    public function pesanan()
    {
        $pesanan = Pesanan::all();
        $cart = Cart::all()->sortByDesc('user_id');
        return view('admin.pesanan.pesanan', compact('pesanan', 'cart'));
    }

    public function edit(Request $request, $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $cart = Cart::where('id_cart');
        return view('admin.pesanan.edit_pesanan ', compact('pesanan','cart'));
    }

    public function update(Request $request, $id){
        $pesanan = Pesanan::findOrFail($id);
        $data = $request->except(['_token']);

        $pesanan->update($data);
        return redirect('pesanan');
    }
}
