<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Area;
use App\Models\Blog;
use App\Models\Size;
use App\Models\Team;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Thana;
use App\Models\Union;
use App\Models\Banner;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Service;
use App\Models\Category;
use App\Models\District;
use App\Models\Management;
use App\Models\SubCategory;
use App\Models\DeliveryTime;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use PharIo\Manifest\Manifest;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{
    public function index()
    {
        $banner = Banner::latest()->get();
        $product = Product::latest()->get();
        $topcategory = Category::with('SubCategory')->orderBy('rank_id', 'ASC')->get();
        $topsubcategory = Subcategory::with('product')->latest()->get();
        $popularcategory = Category::with('product')->where('is_popular', 1)->orderBy('rank_id', 'ASC')->get();
        $recent = Product::latest()->take(24)->get();
        $popular = Product::latest()->where('is_popular', '1')->limit(24)->get();
        $new_arrival = Product::where('is_arrival', '1')->latest()->get();
        $offers_product = Product::where('is_offer', '1')->latest()->get();
        $home = Product::where('category_id', '8')->inRandomOrder()->limit(12)->get();
        $fullAd = Ad::where('status', 'a')->inRandomOrder()->limit(1)->get();
        // $brand = Brand::latest()->get();
        $cartAll = \Cart::getContent();
        return view('website.index', compact('banner', 'popularcategory', 'offers_product', 'topcategory', 'product', 'new_arrival', 'fullAd', 'popular', 'home', 'recent', 'topsubcategory'));
    }

    public function ProductDetails($slug)
    {
        $product = Product::with('category')->where('slug', $slug)->first();
        $productImage = ProductImage::where('product_id', $product->id)->get();
        if (isset($product->sub_category_id)) {
            $subCategory_id = $product->sub_category_id;
            $related = Product::where('sub_category_id', '=', $subCategory_id)->where('id', '!=', $product->id)->get();
        } 
        else {
            $category_id = $product->category_id;
            $related = Product::where('category_id', '=', $product->category->id)->where('id', '!=', $product->id)->limit('12')->get();
        }
        return view('website.productDetails', compact('product', 'productImage', 'related'));
    }


    // product details popup
    public function PopUpProduct($id)
    {
        $product = Product::with(['category', 'productImage'])->where('id', $id)->first();
        //  $product::with()->productImage['otherImage'] = asset($product->otherImage);
        $product['otherImage'] = $product->product_image;

        $product['image'] = asset('uploads/product/' . $product->image);
        return response()->json($product);
    }
  
    public function shopBanner()
    {
        return view('website.shopBanner');
    }



    public function CategoryWise($id)
    {
        // $product = Product::where('category_id', $id)->get();
        // $category_list = Category::where('category_id', $id)->first();
        // $categories = Category::all();
        // $category_wise_product = $category_list->product()->get();
        // $size = Size::latest()->get();
       
        //     return view('website.category', compact('product', 'size','categories','category_list'));
       
        $product = Product::where('category_id', $id)->paginate(12);
        $category_list = Category::where('id', $id)->first();
        $categories = Category::all();
        $category_wise_product = $category_list->product()->inRandomOrder()->get();
        return view('website.shop-boxed', compact('product','categories', 'category_wise_product',  'category_list'));
    }
    public function singleSubCategory($slug)
    {
        $Categorylist = Category::where('slug', $slug)->first();

        return view('website.subcategory_list', compact('Categorylist'));
    }

    public function shop(Request $req)
    {
        $size = Size::latest()->get();
        $color = Color::latest()->get();
        $product = Product::latest()->paginate(12);
        
        if($req->query('shop_view')) {
           
            if ($req->query('shop_view') == 'shop list sidebar') {
                return view('website.shop-list-sidebar', compact('product', 'size', 'color'));
            } else if ($req->query('shop_view') == 'shop list') {
                return view('website.shop-list', compact('product', 'size', 'color'));
            } else {
                return view('website.shop-boxed', compact('product', 'size', 'color'));
            }
        } else if($req->query('brand_filter')) {
            $brand_filter = $req->query('brand_filter');
            $product = Product::where('brand_id', $brand_filter)->paginate(12);
            $brandFilter = Brand::find($brand_filter);
            
            return view('website.shop-boxed', compact('product', 'size', 'color', 'brandFilter'));
        } else if($req->query('category_filter')) {
            $category_filter = $req->query('category_filter');
            $categoryFilter = Category::where('slug', $category_filter)->first();
            $product = Product::where('category_id', $categoryFilter->id)->latest()->paginate(12);
            return view('website.shop-boxed', compact('product', 'size', 'color', 'categoryFilter'));;
        } else if($req->query('subcategory_filter')) {
            $subcategory_filter = $req->query('subcategory_filter');
            $subcategoryFilter = SubCategory::where('slug', $subcategory_filter)->first();
            $product = Product::where('sub_category_id', $subcategoryFilter->id)->latest()->paginate(12);
            return view('website.shop-boxed', compact('product', 'size', 'color', 'subcategoryFilter'));
        } else if($req->query('newproduct_filter')) {
            $product = Product::where('is_arrival', '1')->latest()->paginate(12);
            $newproductFilter = count($product);
            return view('website.shop-boxed', compact('product', 'size', 'color', 'newproductFilter'));

        } else if($req->query('offerproduct_filter')) {
            $product = Product::where('is_offer', '1')->latest()->paginate(12);
            $offerproductFilter = count($product);
            return view('website.shop-boxed', compact('product', 'size', 'color', 'offerproductFilter'));
        } else {
            return view('website.shop-boxed', compact('product', 'size', 'color'));
        }
        

        // $category = Category::latest()->get();
        // $product = Product::inRandomOrder()->paginate(5);
        // $centerBigAds = Ad::where('status', 'a')->where('position', '4')->inRandomOrder()->limit(1)->get();
        // $leftAds = Ad::where('status', 'a')->where('position', '1')->inRandomOrder()->limit(1)->get();
        // return view('website.productsList', compact('product', 'category', 'centerBigAds', 'leftAds'));

    }


    public function SubCategoryWise($id)
    {
        $subcategory = SubCategory::find($id);
        $product = Product::where('sub_category_id', $id)->paginate(12);
        $subcategory_list = Category::where('id', $subcategory->category_id)->first();
        $categories = Category::all();
        $subcategory_wise_product = $subcategory_list->product()->inRandomOrder()->get();
        return view('website.shop-boxed', compact('product','categories', 'subcategory_wise_product',  'subcategory_list'));
    }
    public function productViewAjax($id)
    {
        $product = Product::with(['category', 'subcategory', 'productImage'])->findOrFail($id);
        $color = $product->color_id;
        $product_colors = explode(',',$color);
        $product_color = Color::whereIn('id', $product_colors)->get();
        $size = $product->size_id;
        $product_size = explode(',',$size);
        $product_size = Size::whereIn('id', $product_size)->get();
        
        return response()->json([
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size
        ]);
    }
    public function newsEvent()
    {
        $news = Blog::latest()->get();
        return view('website.newsEvent', compact('news'));
    }

    public function newsDetails($slug)
    {
        $category = Category::inRandomOrder()->limit(5)->get();
        $newArrival = Product::inRandomOrder()->limit(5)->get();
        $news = Blog::where('slug', $slug)->first();
        return view('website.newsDetails', compact('news', 'category', 'newArrival'));
    }
    public function contact()
    {
        return view('website.contact');
    }


    public function aboutWebsite()
    {
        $service = Service::latest()->get();
        $management = Management::all();
        return view('website.about', compact('management', 'service'));
    }
    public function privacyWebsite()
    {
        return view('website.privacy');
    }
    public function termCondition()
    {
        return view('website.terms_condition');
    }
    public function trackOrder()
    {
        return view('website.track');
    }

    // search
    public function getSearchSuggestions($keyword, $id=null)
    {
        if($id) {
            $product = Product::select('name')
            ->where('name', 'like', "%$keyword%")
            ->where('category_id', $id)
            ->get()->toArray();
            $mergedArray = $product;
        } else {
            $product = Product::select('name')
                ->where('name', 'like', "%$keyword%")
                ->get()->toArray();
    
            $category = Category::select('name as name')
                ->where('name', 'like', "%$keyword%")
                ->get()->toArray();
    
            $subcategory = SubCategory::select('name as name')
                ->where('name', 'like', "%$keyword%")
                ->get()->toArray();

            $mergedArray = array_merge($product, $category, $subcategory);
        }


        $search_results = [];

        foreach ($mergedArray as $sr) {
            $search_results[] = $sr['name'];
        }

        return response()->json($search_results);
    }

    public function productSearch()
    {
        if (request()->query('q')) {

            $categories = Category::all();
            // $centerBigAds = Ad::where('status', 'a')->where('position', '4')->take(1)->get();
            // $leftAds = Ad::where('status', 'a')->where('position', '1')->latest()->take(1)->get();

            $keyword = request()->query('q');
            $search_result = Product::Where('name', 'like', "%$keyword%")->get();

            return view('website.search', compact('search_result', 'keyword', 'categories'));
        }
        return redirect()->back();
    }

    public function allProduct()
    {
        $recent = Product::latest()->paginate(72);
        return view('website.allProduct', compact('recent'));
    }

    public function timeShow(Request $request)
    {
        $d_number = $request->day_pass;
        if ($d_number == 'Sat') {
            return  $time = DeliveryTime::where('group_id', 1)->get();
        } elseif ($d_number == 'Sun') {
            return $time = DeliveryTime::where('group_id', 2)->get();
        } elseif ($d_number == 'Mon') {
            return $time = DeliveryTime::where('group_id', 3)->get();
        } elseif ($d_number == 'Tue') {
            return  $time = DeliveryTime::where('group_id', 4)->get();
        } elseif ($d_number == 'Wed') {
            return  $time = DeliveryTime::where('group_id', 5)->get();
        } elseif ($d_number == 'Thu') {
            return $time = DeliveryTime::where('group_id', 6)->get();
        } else {
            return  $time = DeliveryTime::where('group_id', 7)->get();
        }
    }

    public function thanaChange(Request $request)
    {
        $thana = Thana::where('district_id', $request->district_id)->get();
        return response()->json($thana);
    }

    public function areaChange(Request $request)
    {
        $thana = Area::where('thana_id', $request->thana_id)->get();
        return response()->json($thana);
    }

    public function getDistrict($id) {
        $district = District::where('division_id', $id)->get();
        // $district = District::select(DB::raw("CONCAT('bd_name', '-' ,'name') AS ID"))->where('division_id', $id)->get();
        return response()->json($district);
    }

    public function getThana($id) {
        $thana = Thana::where('district_id', $id)->get();
        return response()->json($thana);
    }

    public function getUnion($id) {
        $union = Union::where('thana_id', $id)->get();
        return response()->json($union);
    }
}
