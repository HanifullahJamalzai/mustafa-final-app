<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request){
        // dd(request()->all());
        $request->validate([
            'name' => 'required|min:4|max:255',
            'email' => 'required|email|min:10|max:255',
            'password' => 'required|confirmed'
        ]);
        dd($request->all());
        return "register controller";
    }
}
