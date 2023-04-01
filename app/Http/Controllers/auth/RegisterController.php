<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request){
        // dd(request()->all());
        // dd($request->name);
        $request->validate([
            'name' => 'required|min:4|max:255',
            'email' => 'required|email|min:10|max:255',
            'password' => 'required|confirmed'
        ]);
        // dd($request->all());
        User::create(
            [
                'name' => $request->name,
                'email'=> $request->email,
                'password' => bcrypt($request->password)
            ]
            );
        return redirect('login');
    }
}
