<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{
    public function index(Request $request) 
    {
        if ($request->has('search')) {
            $orders = Order::where('status', 'LIKE', '%' . $request->search . '%')->paginate(10);
        } else {
            $orders = Order::paginate(10);
        }
        return view('admin.pesanan.laporan_transaksi', compact('orders'));
    }

    public function pesanan(Request $request)
    {
        if ($request->has('search')) {
            $pesanan = Pesanan::where('id_pesanan', 'LIKE', '%' . $request->search . '%')->paginate(10);
        } 
        else {
            $pesanan = Pesanan::paginate(10);
        }
        return view('admin.pesanan.pesanan', compact('pesanan'));
    }
    
    public function cetak_lap(Request $request)
    {
        $pesanan = Pesanan::all();
        return view('admin.pesanan.ctklap', compact('pesanan'));
    }

    public function ctkpes(){
        return view('admin.pesanan.lap-pertanggal');
    }

    public function ctktrans(){
        return view('admin.pesanan.ctk-tgltrans');
    }



    public function cetak_pertanggal(Request $request){
        $tglakhir = $request->tglakhir;
        $tglawal =$request->tglawal;
        $pesanan = Pesanan::whereBetween('created_at',[$tglawal, $tglakhir])->get();
         //dd(["Tanggal Awal : ". $tglawal, "Tanggal Akhri ". $tglakhir]);
         return view('admin.pesanan.ctkpertgl',compact('pesanan'));
    }
    public function cetak_pertanggal_trans(Request $request){
        $tglakhir = $request->tglakhir;
        $tglawal =$request->tglawal;
        $orders = Order::whereBetween('created_at',[$tglawal, $tglakhir])->get();
         //dd(["Tanggal Awal : ". $tglawal, "Tanggal Akhri ". $tglakhir]);
         return view('admin.pesanan.tgl_trans',compact('orders'));
    }

    public function edit(Request $request, $id)
    {
        $pesanan = Pesanan::findOrFail($id);

        $isi = Pesanan::findOrFail($id)->orders->item_cart;
        $test = json_decode($isi, true);

        return view('admin.pesanan.edit_pesanan ', compact('pesanan','isi'));
    }

    public function update(Request $request, $id){
        $pesanan = Pesanan::findOrFail($id);
        $data = $request->except(['_token']);

        $pesanan->update($data);
        return redirect('pesanan');
    }
}
