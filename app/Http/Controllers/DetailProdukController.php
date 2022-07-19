<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailProdukController extends Controller
{
    public function detail($id)
    {
        $data = Product::findOrFail($id);
        return view('detail.detail_produk')->with([
            'products' => $data
        ]);
    }
}
