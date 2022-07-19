<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index(){
        return view('admin.retur.mail');
    }

    public function send(Request $request){
        $request->validate([
            'nama'=>'required',
            'email'=>'required',
            'pesan'=>'required',
        ]);
    }
}
