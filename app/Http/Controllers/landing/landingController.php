<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class landingController extends Controller
{
    public function index(){
        return view('landing.index');
    }
    public function home(){
        return view('landing.index');
    }

    public function about(){
        return view('landing.about');
    }

    public function contact()
    {
        return view('landing.contact');
    }

    public function services()
    {
        return view('landing.services');
    }

    public function pricing()
    {
        return view('landing.pricing');
    }

}
