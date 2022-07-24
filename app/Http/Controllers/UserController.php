<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $users = User::where('name','LIKE','%'.$request->search.'%')->paginate(5);
        }else {
            $users = User::paginate(10);
        }

        return view('admin.users.index', compact('users'));
    }
}
