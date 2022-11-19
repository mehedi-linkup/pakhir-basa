<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index()
    {
        $pages = Page::latest()->get();
        return view('admin.pagelist.index', compact('pages'));
    }
    public function store(Request $request)
    {
        try {
            $page = new Page();
            $page->name = $request->name;
            $page->display_name = $request->display_name;
            $page->save();
            return back()->with('success', 'Page Created Successfully');
        } catch (\Throwable $th) {
            // throw $th;
            return back()->with('error', 'Page Created unsuccessfully');
        }
    }
}
