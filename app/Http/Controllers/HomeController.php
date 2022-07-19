<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Alamat;
use App\Models\City;
use App\Models\Order;
use App\Models\Product;
use App\Models\Province;
use App\Models\Transaksi;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::all();
        $product = Product::all();
        $orders = Order::all();
        return view('admin.dashboard', ['users' => $user, 'products' => $product, 'orders' => $orders]);
    }

    public function alamat()
    {
        $provinces = Province::all();
        $cities = City::all();
        return view('transaksi.alamat', compact('provinces', 'cities'));
    }

    public function store()
    {
        $alamat = Alamat::where('user_id', auth()->user()->id)
            ->first();
        if (isset($alamat)) {
        } else {
            Alamat::create(
                [
                    'user_id' => auth()->user()->id,
                ]
            );
        }
        return redirect('pembayaran');
    }

    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'origin' => 'required',
            'province_destination' => 'required',
            'destination' => 'required',
            'courier' => 'required',
            'alamat' => 'required',
            'kodepos' => 'required',
        ]);
        $alamats = Alamat::findOrFail($id);
        $data = $request->except(['_token']);
        $alamats->update($data);

        return redirect('pembayaran');
    }

    public function edit($id)
    {
        $alamats = Alamat::findOrFail($id);
        $provinces = Province::all();

        $cities = City::all();
        //$alamats = Alamat::where('user_id', auth()->user()->id)->get();
        return view('transaksi.update_alamat', compact('provinces', 'cities', 'alamats'));
    }
}
