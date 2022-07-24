<?php

namespace App\Http\Controllers;

use App\Models\retur;
use Illuminate\Http\Request;

class ReturController extends Controller
{
    public function index()
    {
        return view('retur.new_retur');
    }

    public function store(Request $request)
    {
       
        $data = $request->except(['_token']);

        if ($request->file('gambar')) {
            $namaGbr = time() . '.' . $request->file('gambar')->extension();
            $data['gambar'] = $request->file('gambar')->move('data_file/', $namaGbr);
        }

        retur::insert($data);

        
        return redirect()->back();
    }

    public function simpan(Request $request){
        $this->validate($request, [
            'keluhan' => 'required',
            'transaksi' => 'required',
            'gambar' => 'required|image',
            'deskripsi' => 'required',
        ]);

        $data = $request->except(['_token']);

        if ($request->file('gambar')) {
            $namaGbr = time() . '.' . $request->file('gambar')->extension();
            $data['gambar'] = $request->file('gambar')->move('data_file/', $namaGbr);
        }

        retur::insert($data);

        return redirect('home');
    }

    public function admin()
    {
        $returs = retur::paginate(10);
        return view('admin.retur.retur', compact('returs'));
    }

    public function detail($id){
        $retur = retur::findOrFail($id);
        return view('admin.retur.detail_retur',compact('retur'));
    }
}
