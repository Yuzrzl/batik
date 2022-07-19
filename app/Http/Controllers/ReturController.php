<?php

namespace App\Http\Controllers;

use App\Models\retur;
use Illuminate\Http\Request;

class ReturController extends Controller
{
    public function index()
    {
        return view('retur.retur');
    }

    public function store(Request $request)
    {
        $data = retur::create([
            'user_id' => auth()->user()->id,
            'keluhan' => $request->keluhan,
            'transaksi' => $request->transaksi,
            'gambar' => $request->gambar,
            'deskripsi' => $request->deskripsi
        ],);

        if ($request->file('gambar')) {
            $namaGbr = time() . '.' . $request->file('gambar')->extension();
            $data['gambar'] = $request->file('gambar')->move('data_file/', $namaGbr);
        }

        return redirect()->back();
    }

    public function admin()
    {
        $returs = retur::paginate()->all();
        return view('admin.retur.retur', compact('returs'));
    }

    public function detail($id){
        $retur = retur::findOrFail($id);
        return view('admin.retur.detail_retur',compact('retur'));
    }
}
