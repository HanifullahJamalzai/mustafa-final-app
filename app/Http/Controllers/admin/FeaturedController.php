<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeaturedStoreValidation;
use App\Models\Featured;
use Illuminate\Http\Request;

class FeaturedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $featureds = Featured::all();
        return view('admin.featured.index', compact('featureds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FeaturedStoreValidation $request)
    {
        Featured::create($request->all());
        session()->flash('success', 'Record has been saved successfully!');
        return back();
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
    public function edit(Featured $featured)
    {
        $featureds = Featured::all();
        return view('admin.featured.index', compact('featured', 'featureds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Featured $featured)
    {
        //dd($request->all(), $featured);
        $featured->update([
            'icon' => $request->icon,
            'title' => $request->title,
            'description' => $request->description
        ]);
        session()->flash('success', 'Record has been Updated successfully!');
        //return redirect('/admin/featured');
        return redirect()->route('featured.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Featured::find($id)->delete();
        return back();
    }
}
