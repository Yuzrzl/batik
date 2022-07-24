<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{
    public function daftar_produk(Request $request)
    {
        if ($request->has('search')) {
            $products = Product::where('product_name', 'LIKE', '%' . $request->search . '%')->paginate(10);
        } else {
            $products = Product::paginate(10);
        }

        return view('admin.produk.daftar_produk', compact('products'));
    }
    public function tambah_produk()
    {
        return view('admin.produk.tambah_produk');
    }

    public function simpan(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'harga' => 'required',
            'gambar' => 'required|image',
            'kategori' => 'required',
            'deskripsi' => 'required',
        ]);
        $data = $request->except(['_token']);

        if ($request->file('gambar')) {
            $namaGbr = time() . '.' . $request->file('gambar')->extension();
            $data['gambar'] = $request->file('gambar')->move('data_file/', $namaGbr);
        }
        Product::insert($data);

        Product::all();
        return redirect('daftar_produk');
    }

    public function edit($id)
    {
        $data = Product::findOrFail($id);
        return view('admin.produk.ubah_produk')->with([
            'products' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'harga' => 'required',
            'gambar' => 'image',
            'kategori' => 'required',
            'deskripsi' => 'required',
        ]);

        $item = Product::findOrFail($id);
        $data = $request->except(['_token']);

        if ($request->file('gambar')) {

            if ($item->gambar != '') {
                unlink($item->gambar);
            }

            $namaGbr = time() . '.' . $request->file('gambar')->extension();
            $data['gambar'] = $request->file('gambar')->move('data_file/', $namaGbr);
        }
        $item->update($data);
        return redirect('daftar_produk');
    }

    public function destroy($id)
    {
        $item = Product::findOrFail($id);
        unlink($item->gambar);
        $item->delete();
        return redirect()->back();
    }
}
