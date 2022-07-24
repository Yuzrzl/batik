<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class NewController extends Controller
{
    public function wel()
    {
        $products= Product::paginate(12);
        return view('welcome',compact('products'));
    }
    public function index()
    {
        $products = Product::paginate(12);
        return view('home', compact('products'));
    }

    public function contact(){
        return view('template.contact');
    }
}
