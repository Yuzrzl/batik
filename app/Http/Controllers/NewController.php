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
        $products= DB::table('products')->get();
        return view('welcome',['products' => $products]);
    }
    public function index()
    {
        $products= DB::table('products')->get();
        return view('home',['products' => $products]);
    }

    public function contact(){
        return view('template.contact');
    }
}
