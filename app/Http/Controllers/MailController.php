<?php

namespace App\Http\Controllers;

use App\Models\retur;
use App\Models\User;
use App\Mail\ReturMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index($id){
        $retur  = retur::findOrFail($id);
        //$user = User::where('user_id', $retur->id);
        return view('admin.retur.mail' ,compact('retur'));
    }

    public function send(Request $request){
        
        Mail::to($request->email)->send(new ReturMail($request->body));
        return back();
    }
}
