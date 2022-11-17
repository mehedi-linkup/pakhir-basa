<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\ChildCategory;
use App\Http\Controllers\Controller;

class ChildCategoryController extends Controller
{
    public function index() {
        $category = Category::all();
        $subcategory = SubCategory::latest()->get();
        $childcategory = ChildCategory::latest()->get();
        return view('admin.childcategory.index', compact('category', 'subcategory', 'childcategory'));
    }
}
