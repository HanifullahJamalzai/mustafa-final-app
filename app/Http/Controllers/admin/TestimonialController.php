<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use DateTimeZone;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::all(); 
        return view('admin.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.testimonial.form");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validation HomeWork
        //dd($request->all());
        
        $testimonial = new Testimonial();
        $testimonial['name'] = $request->name;
        $testimonial['designation'] = $request->designation;
        $testimonial['description'] = $request->description;
        if($request->photo){
            date_default_timezone_set("Asia/Kabul"); 
            $fileName = 'testimonial_'.date('Ymd-His').'_'.rand(10,100000).'.'.$request->photo->extension();
            $request->photo->storeAs('public/testimonial', $fileName);
            $testimonial['photo'] = "/storage/testimonial/$fileName";
        }        
        $testimonial->save();
        //Alert HomeWork
        return redirect('admin/testimonial');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        @unlink(public_path().'/'.$testimonial->photo);
        $testimonial->delete();
        return back();
    }
}