<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ChildCategory;
use App\Models\Color;
use App\Models\Inventory;
use App\Models\Size;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $product = Product::with('inventory')->latest()->get();
        return view('admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $color = Color::all();
        $size = Size::all();
        $category = Category::all();
        $product = Product::latest()->get();
        return view('admin.product.create', compact('category', 'product','color','size'));
    }

    public function getSubcategory($id)
    {
        $subCategory = SubCategory::where('category_id', $id)->get();
        return response()->json($subCategory);
    }

    public function getChildcategory($id)
    {
        $childCategory = ChildCategory::where('subcategory_id', $id)->get();
        return response()->json($childCategory);
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
            'name' => 'required|max:100',
            'category_id' => 'required',
            // 'sub_category_id' => 'required',
            'price' => 'required|max:10|regex:/^\d+(\.\d{1,2})?$/',
            'image' => 'required|image|mimes:jpg,png,gif,bmp',
            'otherImage*' => 'mimes:jpg,png,gif,bmp,webp,jpeg',
            'purchase' => 'required|min:1|max:10',
        ]);
        // return $request;
        $slug = Str::slug($request->name . '-' . time());
        $i = 0;
        while (true) {
            if (Category::where('slug', '=', $slug)->exists()) {
                $i++;
                $slug .= '_' . $i;
                continue;
            }
            break;
        }

        try{
            // DB::beginTransaction();
            $productCode = $this->generateCode('Product', 'P');
            
            $product = new Product();
            $product->name = $request->name;
            $product->color_id = $request->color_id;
            $product->size_id = $request->size_id;
            $product->slug = $slug;
            $product->code = $productCode;
            $product->category_id = $request->category_id;
            $product->sub_category_id = $request->sub_category_id;
            $product->child_category_id = $request->child_category_id;
            $product->price = $request->price;
            $product->discount = $request->discount;
            $product->is_popular = $request->is_popular ?? 0;
            $product->is_arrival = $request->is_arrival ?? 0;
            $product->is_offer = $request->is_offer ?? 0;
            $product->short_details = $request->short_details;
            $product->description = $request->description;

            $image = $request->file('image');
            $mainImage = 'p-' . time() . uniqid() . $image->getClientOriginalName();
            $thumbImage = 'thumb-' . time() . uniqid() . $image->getClientOriginalName();
            Image::make($image)->save('uploads/product/' . $mainImage);
            Image::make($image)->resize(300,338)->save('uploads/product/thumbnail/'.$thumbImage);

            $product->image = $mainImage;
            $product->thum_image = $thumbImage;
            $product->save_by = Auth::user()->id;
            $product->ip_address = $request->ip();
            $product->save();

            // $productImages = $this->imageUpload($request, 'otherImage', 'uploads/otherImage');
            // if (is_array($productImages) && count($productImages)) {
            //     foreach ($productImages as $image) {
            //         $imagePath = new ProductImage();
            //         $imagePath->product_id = $product->id;
            //         $imagePath->otherImage = $image;
            //         $imagePath->save();
            //     }
            // }
                $otherImage = $request->file('otherImage');
                if(is_array($otherImage) && count($otherImage) > 0) {
                    foreach ($otherImage as $key => $image) {

                        $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                        $extention = $image->getClientOriginalExtension();
                        $imageName = $name . '_' . uniqId() . '.' . $extention;
                        $image->move('uploads/otherImage', $imageName);            

                        $productImages = new ProductImage();
                        $productImages->product_id = $product->id;
                        $productImages->otherImage = $imageName;
                        $productImages->save();
                    }
                }
            
                $purchase = new Inventory();
                $purchase->product_id = $product->id;
                $purchase->purchase = $request->purchase;
                $purchase->save();
                if ($product) {
                Session::flash('success', 'Product Added Successfully');
                return back();
            }
            else{
                Session::flash('error', 'Product can not be added');
                return back();
            }

        }
        catch (\Throwable $th) {
            DB::rollBack();
            // Session::flash('faild', 'Product added faild');
            // // return back();
            throw $th;
        }
        
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

    public function removeImage($id)
    {
        try {
            $removeImage = ProductImage::find($id);
            if (!empty('uploads/otherImage/'.$removeImage->otherImage) && file_exists('uploads/otherImage/'.$removeImage->otherImage)) {
                unlink('uploads/otherImage/'.$removeImage->otherImage);
            }
            $removeImage->delete();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $color = Color::all();
        $size = Size::all();
        $product = Product::with('inventory')->where('slug', $slug)->first();
        $subcategory = Subcategory::where('category_id', $product->category_id)->get();
        $childcategory = ChildCategory::where('subcategory_id', $product->subcategory_id)->get();
        $category = Category::all();
        return view('admin.product.edit', compact('product', 'subcategory', 'childcategory', 'category','color','size'));
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
        // dd($request->all());
        $request->validate([
            'name' => 'required|max:100',
            'category_id' => 'required',
            'size_id' => 'max:3',
            'color_id' => 'max:3',
            'price' => 'required|max:18',
            'image' => 'image|mimes:jpg,png,gif,bmp,webp',
            'ip_address' => 'max:15',
            'otherImage' => 'max:500',
            'purchase' => 'required',
            'code' => 'max:18|unique:products,id',
        ]);

            $product = Product::find($id);
            $duplicate = Product::where('id', '!=', $id)->where('code', $request->code)->get();
            if (count($duplicate) > 0) {
            Session::flash('error', ' Product Code duplicate found ');
            return back();
            }
            else{
                $product_image = '';
            if ($request->hasFile('image')) {
                $image_path = public_path('uploads/product/' . $product->image);
                $image_path_thumb = public_path('uploads/product/thumbnail/' . $product->thum_image);
                if (file_exists($image_path)) {
                    @unlink($image_path);
                    @unlink($image_path_thumb);
                }
                $image = $request->file('image');
                $mainImage = 'p-' . time() . uniqid() . $image->getClientOriginalName();
                $thumbImage = 'thumb-' . time() . uniqid() . $image->getClientOriginalName();
    
                Image::make($image)->save('uploads/product/' . $mainImage);
                Image::make($image)->resize(300, 338)->save('uploads/product/thumbnail/' . $thumbImage);
                $product_image = $mainImage;
                $product->thum_image = $thumbImage;
            } else {
                $product_image = $product->image;
            }
            $slug = Str::slug($request->name . '-' . time());

            // $productSize = explode(',', $request->size_id);
            $product->size_id = $request->size_id;

            // $productColor = explode(',', $request->color_id);
            $product->color_id = $request->color_id;

            $product->name = $request->name;
            $product->slug = $slug;
            // $product->code = $request->code;
            $product->category_id = $request->category_id;
            $product->sub_category_id = $request->sub_category_id;
            $product->child_category_id = $request->child_category_id;
            $product->price = $request->price;
            $product->discount = $request->discount;
            $product->size_id = $request->size_id;
            $product->color_id = $request->color_id;
            $product->is_popular = $request->is_popular;
            $product->is_arrival = $request->is_arrival;
            $product->is_offer = $request->is_offer;
            $product->short_details = $request->short_details;
            $product->description = $request->description;
            $product->image = $product_image;
            $product->save_by = Auth::user()->id;
            $product->ip_address = $request->ip();
            $product->save();
    
            // multiple image
            // $productImages = $this->otherimageUpload($request, 'otherImage', 'uploads/otherImage');

            $productImage = $request->file('otherImage');
            if(is_array($productImage) && count($productImage) > 0) {
                foreach ($productImage as $key => $image) {
                    $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                    $extention = $image->getClientOriginalExtension();
                    $imageName = $name . '_' . uniqId() . '.' . $extention;
                    $image->move('uploads/otherImage', $imageName);            

                    $imagePath = new ProductImage();
                    $imagePath->product_id = $product->id;
                    $imagePath->otherImage = $imageName;
                    $imagePath->save();
                }
            }
    
            if ($request->purchase) {
                // dd($$request->purchase);
                $inventory = Inventory::where('product_id',$product->id)->first();
                $inventory->purchase = $request->purchase;
                $inventory->save();
            }
            if($product){
                Session::flash('success', 'Product update successfully');
                return redirect()->route('product.index');
            }
            else {
                Session::flash('errors', 'something went wrong');
                return redirect()->back();
            }
        
        }
    }
    public function otherimageUpload($request, $name, $directory)
    {
        $doUpload = function ($image) use ($directory) {
            $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $extention = $image->getClientOriginalExtension();
            $imageName = $name . '_' . uniqId() . '.' . $extention;
            $image->move($directory, $imageName);
            return $imageName;
        };
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $product = Product::find($id);
            $image_path = public_path('uploads/product/' . $product->image);
            $image_path_thumb = public_path('uploads/product/thumbnail/' . $product->thum_image);
            if (file_exists($image_path)) {
                @unlink($image_path);
                @unlink($image_path_thumb);
            }
            $productImage = ProductImage::where('product_id', $id)->get();
            if(isset($productImage) && count($productImage) > 0) {
                foreach ($productImage as $image) {
                    if(file_exists('uploads/otherImage/'.$image->otherImage)) {
                        unlink('uploads/otherImage/'.$image->otherImage);
                    }
                    $image->delete();
                }
            }
            Inventory::where('product_id',$id)->delete();
            $product->delete();
            return back()->with('success','product deleted successfully');
        } catch (\Throwable $th) {
            return back()->with('error','product delete failed');
        }
    }
}
