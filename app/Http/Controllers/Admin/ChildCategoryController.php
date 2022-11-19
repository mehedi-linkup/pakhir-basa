<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\ChildCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class ChildCategoryController extends Controller
{
    public function index() {
        $category = Category::all();
        $subcategory = SubCategory::latest()->get();
        $childcategory = ChildCategory::latest()->get();
        return view('admin.childcategory.index', compact('category', 'subcategory', 'childcategory'));
    }
    public function list()
    {
        $childcategory = ChildCategory::latest()->get();
        return view('admin.childcategory.list', compact('childcategory'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|max:50',
            'image' => 'Image|mimes:jpg,png,jpeg,bmp',
            'ip_address' => 'max:15'
        ]);
        $unique_check = ChildCategory::where('category_id', $request->category_id)->where('name', $request->name)->get();
        $unique_check1 = ChildCategory::where('subcategory_id', $request->subcategory_id)->where('name', $request->name)->get();
        if (count($unique_check) > 0) {
            Session::flash('duplicate', 'duplicate name found under category ' . $request->category);
            return redirect()->back();
        } else if(count($unique_check1) > 0) {
            Session::flash('duplicate', 'duplicate name found under subcategory ' . $request->subcategory);
            return redirect()->back();
        } else {
            $slug = Str::slug($request->name . '-' . time());
            $childcategory = new ChildCategory();
            $childcategory->category_id = $request->category_id;
            $childcategory->subcategory_id = $request->subcategory_id;
            $childcategory->name = $request->name;
            $childcategory->slug = $slug;
            $childcategory->image = $this->imageUpload($request, 'image', 'uploads/childcategory');
            $childcategory->save_by = 1;
            $childcategory->ip_address = $request->ip();
            $childcategory->save();
            if ($childcategory) {
                Session::flash('success', 'childcategory added successfully');
                return redirect()->back();
            }
        }
    }
    public function edit($id)
    {
        $category = Category::all();
        $subcategory = SubCategory::all();
        $childcategory = ChildCategory::find($id);
        return view('admin.childcategory.edit', compact('category', 'subcategory', 'childcategory'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'image' => 'Image|mimes:jpg,png,jpeg,bmp',
        ]);
       
        $childcategory = ChildCategory::find($id);

        $duplicate = ChildCategory::where('id', '!=', $id)->where('category_id', $request->category_id)->where('name', $request->name)->get();
        $duplicate1 = ChildCategory::where('id', '!=', $id)->where('subcategory_id', $request->category_id)->where('name', $request->name)->get();
        if (count($duplicate) > 0) {
            Session::flash('duplicate', 'duplicate entry founded on category');
            return redirect()->back();
        } else if(count($duplicate1) > 0) {
            Session::flash('duplicate', 'duplicate entry founded on category');
            return redirect()->back();
        } else {
            $childcategoryImage = '';
            if ($request->hasFile('image')) {
                if (!empty($childcategory->image) && file_exists($childcategory->image)) {
                    unlink($childcategory->image);
                }
                $childcategoryImage = $this->imageUpload($request, 'image', 'uploads/childcategory');
            } else {
                $childcategoryImage = $childcategory->image;
            }

            $slug = Str::slug($request->name) . '-' . time();
            $childcategory->category_id = $request->category_id;
            $childcategory->subcategory_id = $request->subcategory_id;
            $childcategory->name = $request->name;
            $childcategory->slug = $slug;
            $childcategory->image = $childcategoryImage;
            $childcategory->updated_by = 1;
            $childcategory->save();
            if ($childcategory) {
                Session::flash('success', 'childcategory Update Successfully');
                return redirect()->route('childcategory.index');
            } else {
                Session::flash('error', 'Update Fail');
                return redirect()->bacK();
            }
        }
    }
    public function destroy($id)
    {
        $childcategory = ChildCategory::find($id);

        if (!empty($childcategory->image) && file_exists($childcategory->image)) {
            unlink($childcategory->image);
        }
        $childcategory->delete();
        if ($childcategory) {
            Session::flash('warning', 'Child Category Delete Successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Delete failed');
            return redirect()->back();
        }
    }
}
