<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class landingController extends Controller
{
    public function index(){
        return view('landing.index');
    }
}
