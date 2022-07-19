<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Midtrans\Snap;
use App\Models\Cart;
use App\Models\User;
use Midtrans\Config;
use App\Models\Order;
use App\Models\Alamat;
use App\Models\Pesanan;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PayController extends Controller
{
    public function index(Request $request)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        //get user
        $request->get($name = auth()->user()->name);
        $email = auth()->user()->email;
        $telp = auth()->user()->telp;

        $alamat = Alamat::where('user_id', auth()->user()->id)->get();
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        // return $carts;
        // $pesanan = Pesanan::where('cart_id', $request->cart_id);

        $cart = [];
        for ($i = 0; $i < sizeof($carts); $i++) {
            $cart[$i]['id'] = $carts[$i]->product_id;
            $cart[$i]['name'] = $carts[$i]->product->product_name;
            $cart[$i]['quantity'] = $carts[$i]->jumlah;
            $cart[$i]['price'] = $carts[$i]->product->harga;
        }

        // return $cart;
        $total = 0;
        for ($i = 0; $i < sizeof($cart); $i++) {
            $produk = Product::find($cart[$i]['id']);
            $harga = $produk->harga;
            $jml = $cart[$i]['quantity'];
            $tot = $harga * $jml;
            $total += $tot;
        }
        // return $total;

        // return $cart[0]['id'];
        $params = array(
            'transaction_details' => array(
                'order_id' => 'Tr-' . rand(),
                'gross_amount' => $total,
            ),
            'item_details' =>
            $cart,
            'customer_details' => array(
                'first_name' => $name,
                'last_name' => '',
                'email' => $email,
                'phone' => $telp,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('payment.pay', compact('alamat', 'carts'), ['snap_token' => $snapToken]);
    }

    public function pay_post(Request $request)
    {
        $tglpesan = Carbon::now()->toRfc850String();
        $tgljadi = Carbon::now()->addDay(30)->toRfc850String();
        $alamat = Alamat::where('user_id', auth()->user()->id)
            ->first();
        $alamat_lengkap = $alamat->alamat . ', ' . $alamat->destination . ', ' . $alamat->kodepos;
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($carts as $cart) {
            $cart_id = $cart->id;
        }


        User::all();
        $json = json_decode($request->get('json'));
        $order = new Order();
        $order->id;
        $order->user_id = auth()->user()->id;
        $order->status = $json->transaction_status;
        $order->transaction_id = $json->transaction_id;
        $order->order_id = $json->order_id;
        $order->payment_type =  $json->payment_type;
        $order->gross_amount = isset($json->gross_amount) ? $json->gross_amount : null;
        $order->payment_code = isset($json->payment_code) ? $json->payment_code : null;
        $order->pdf_url = isset($json->pdf_url) ? $json->pdf_url : null;
        $order->save();

        Pesanan::create(
            [
                'id_pesanan' => 'PB - 000' . rand(),
                'order' => $order->id,
                'order_id' => $json->order_id,
                'cart_id' =>  $cart_id,
                'alamat' => $alamat_lengkap,
                'status' => 'Pesanan Diproses',
                'tanggal_pesan' => $tglpesan,
                'tanggal_jadi' => $tgljadi,
            ]
        );
        //$id_order = Order::where('id', auth()->user()->id);

        return redirect()->route('transa');
    }
}
