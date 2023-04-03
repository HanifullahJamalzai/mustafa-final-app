<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\Featured;
use Illuminate\Http\Request;

class landingController extends Controller
{
    public function index(){
        $featured = Featured::all();
        return view('landing.index',compact('featured'));
    }
}
