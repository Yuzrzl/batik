<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PesananController extends Controller
{
    public function post(Request $request)
    {

        $tglpesan = Carbon::now()->toRfc850String();
        $tgljadi = Carbon::now()->addDay(30)->toRfc850String();

        $pesanan = Pesanan::where('cart_id', $request->cart_id)->first();
        // if (isset($pesanan)) {
        // } else {
        //     Pesanan::create([
        //         'id_pesanan' => 'PB - 000' . rand(),
        //         'order_id' => null,
        //         'cart_id' => $request->cart_id,
        //         'alamat' => $request->alamat,
        //         'resi' => $request->resi,
        //         'status' => $request->status,
        //         'tanggal_pesan' => $tglpesan,
        //         'tanggal_jadi' => $tgljadi,
        //     ]);
        // }
        return redirect('pay');
    }
}
