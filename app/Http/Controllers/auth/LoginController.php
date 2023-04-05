<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email|min:10|max:255',
            'password' => 'required'
        ]);
        if(!auth()->attempt(['email' => $request->email, 'password' => $request->password])){
            session()->flash('error', 'Email or Password donot match!');
            return back();
        }
        
        else{
            auth()->attempt(['email' => $request->email, 'password' => $request->password], $request->remember);
            session()->flash('success', 'Welcome to Dashboard!');
        return  redirect('admin');
        }
    }
}
