<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = Brand::all();
        return view('admin.brand.index', compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required', 'max:60',
            'image'      => 'required|max:1024||Image|mimes:jpg,png,jpeg,bmp',
            'ip_address' => 'max:15'
        ]);
        $brand             = new Brand();
        $brand->name       = $request->name;
        $brand->image      = $this->imageUpload($request, 'image', 'uploads/brand');
        $brand->save_by    = Auth::user()->id;
        $brand->ip_address = $request->ip();
        $brand->save();
        return back()->with('success', 'brand added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::where('id', $id)->first();
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name'       => 'required', 'max:60',
            'image'      => 'max:1024||Image|mimes:jpg,png,jpeg,bmp',
            'ip_address' => 'max:15'
        ]);


        $brand             = Brand::where('id', $id)->first();
        $Image = '';
        if ($request->hasFile('image')) {
            if (!empty($brand->image) && file_exists($brand->image)) {
                unlink($brand->image);
            }
            $Image = $this->imageUpload($request, 'image', 'uploads/brand');
        } else {
            $Image = $brand->image;
        }
        $brand->name       = $request->name;
        $brand->image      = $Image;
        $brand->updated_by    = Auth::user()->id;
        $brand->ip_address = $request->ip();
        $brand->save();
        return redirect()->route('brand.index')->with('success', 'brand updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::where('id', $id)->first();
        if ($brand->image) {
            @unlink($brand->image);
        }
        $brand->delete();
        return redirect()->route('brand.index')->with('success', 'brand Deleted Successfully');
    }
}
