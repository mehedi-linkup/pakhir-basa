<?php

namespace App\Http\Controllers\Customer;

use Exception;
use Carbon\Carbon;
use App\Models\Area;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Thana;
use App\Models\Union;
use App\Models\Country;
use App\Models\Product;
use App\Models\District;
use App\Models\Division;
use App\Models\Inventory;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Str;
use App\Models\DeliveryTime;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    // public function checkout()
    // {
    //     $today = date("D");
    //     if($today == 'Sat'){
    //         $time = DeliveryTime::where('group_id',1)->get();
    //     }
    //     elseif($today == 'Sun'){
    //         $time = DeliveryTime::where('group_id',2)->get();
    //     }
    //     elseif($today == 'Mon'){
    //         $time = DeliveryTime::where('group_id',3)->get();
    //     }
    //     elseif($today == 'Tue'){
    //         $time = DeliveryTime::where('group_id',4)->get();
    //     }
    //     elseif($today == 'Wed'){
    //         $time = DeliveryTime::where('group_id',5)->get();
    //     }
    //     elseif($today == 'Thu'){
    //         $time = DeliveryTime::where('group_id',6)->get();
    //     }
    //     else{
    //         $time = DeliveryTime::where('group_id',7)->get();
    //     }

    //     $sum = 0;
    //     $price = 0;
    //     if (Auth::guard('customer')->check()) {
    //             $offer_product = Product::where('is_offer','1')->get()->pluck('id')->toArray();

    //             $data = DB::table('orders')
    //                     ->join('order_details',function($join){
    //                         $join->on('orders.id','=','order_details.order_id')
    //                         ->where('orders.customer_id',Auth::guard('customer')->user()->id);
    //                     })
    //                     ->get();
    //             if(count($data) > 0) {
    //                 $total_offer_buy = $data->sum('quantity');
    //                 $offer_limit = (int) Offer::first()->offer_limit_qty;
    //                 $available_qty = $offer_limit - $total_offer_buy;  
    //             }                       


    //         $area = Area::latest()->get();
    //         $thana = Thana::latest()->get();
    //         $product = Product::where('is_offer','>','0')->get();
    //         $sum = 0;
    //         $offer_product = Product::where('is_offer','1')->get()->pluck('id')->toArray();
    //         // dd($offer_product);

    //          $exist_order_tables =OrderDetails::where('customer_id',Auth::guard('customer')->user()->id)->whereDate('created_at', Carbon::today())->get()->pluck('product_id')->toArray();

    //         // return \Cart::getContent();
    //         foreach (\Cart::getContent() as $value) {                                    
    //             $id = $value->id;
    //             $product = Product::with('inventory')->where('id',$id)->first();
    //             $stock = $product->inventory->purchase;
    //             if($stock >= $value->quantity){
    //                 if(in_array($value->id, $offer_product)){

    //                     if(in_array($value->id, $exist_order_tables)){    
    //                         $price = $value->price* $value->quantity;
    //                         $offer_price = '';
    //                         foreach (\Cart::getContent() as $item) {

    //                             if($item->id == $value->id){
    //                                 $id = $value->id;
    //                                 $product = Product::with('inventory')->where('id',$id)->first();
    //                                 $stock = $product->inventory->purchase;
    //                                 if($stock >= $value->quantity){

    //                                     $item['attributes']['sum'] = $price;

    //                                 }
    //                                 $sum += $price;
    //                             }
    //                             else {
    //                                 $sum += '0';
    //                             }
    //                         }
    //                         continue;
    //                     }
    //                     else{
    //                         // dd('nai');
    //                         if($value->quantity > 1){
    //                             $discount_product =  Product::where('id',$value->id)->first();
    //                             $discount = $value->price/100*$discount_product->discount;
    //                             $discount_price = $discount_product->price - $discount;
    //                             foreach (\Cart::getContent() as $item) {
    //                                 if($item->id == $value->id){
    //                                 $id = $value->id;
    //                                 $product = Product::with('inventory')->where('id',$id)->first();
    //                                 $stock = $product->inventory->purchase;
    //                                 if($stock >= $value->quantity){

    //                                     $item['attributes']['sum'] = $discount_price;
    //                                     $item['attributes']['offer_price'] = $discount_price;
    //                                     $item['attributes']['quantity'] = '1';

    //                                 }

    //                                 }
    //                                 }
    //                             $exist_qty = $value->quantity - 1;
    //                             $second_price = $value->price * $exist_qty;
    //                             $price = $discount_price + $second_price;
    //                             $without_discount_price = $price -  $item['attributes']['offer_price'] = $discount_price;
    //                             $sum += $price;
    //                             foreach (\Cart::getContent() as $item) {
    //                                 if($item->id == $value->id){
    //                                     $id = $value->id;
    //                                     $product = Product::with('inventory')->where('id',$id)->first();
    //                                     $stock = $product->inventory->purchase;
    //                                     if($stock >= $value->quantity){
    //                                         $item['attributes']['sum'] += $second_price;
    //                                         $item['attributes']['exist_qty'] = $exist_qty;
    //                                         $item['attributes']['price'] = $price-$second_price;

    //                                         $sum += $price;
    //                                     }
    //                                     else{
    //                                         $sum += '0';
    //                                     }

    //                                 }
    //                                 }
    //                             continue;
    //                         } else {
    //                             $discount_product = Product::where('id', $value->id)->first();
    //                             $discount = $value->price / 100 * $discount_product->discount;
    //                             $price = $discount_product->price - $discount;

    //                             foreach (\Cart::getContent() as $item) {
    //                                 if($item->id == $value->id){
    //                                     $id = $value->id;
    //                                     $product = Product::with('inventory')->where('id',$id)->first();
    //                                     $stock = $product->inventory->purchase;
    //                                     if($stock >= $value->quantity){
    //                                         $item['attributes']['sum'] = $price;
    //                                         $item['attributes']['offer_price'] = $price;
    //                                         $item['attributes']['quantity'] = '1';
    //                                     }
    //                                     $sum += $price;
    //                                 }
    //                                 else{
    //                                     $sum += '0';
    //                                 }
    //                             }
    //                             continue;                           
    //                         }
    //                     }
    //                 }
    //                 $price = $value->quantity * $value->price;
    //                 foreach (\Cart::getContent() as $item) {
    //                     if($item->id == $value->id){
    //                         $item['attributes']['sum'] = $price;
    //                         $sum += $price;
    //                     }
    //                     else{
    //                         $sum += '0';
    //                     }
    //                     }
    //                 continue;
    //             }
    //         } 
    //         $district = District::all();
    //         // dd($sum);
    //         return view('website.customer.checkout',compact('area','product','sum','price','thana','district','time'));
    //     } else {
    //         return redirect()->route('customer.login');
    //     }
    // }
    public function checkout()
    {
        if (\Cart::getContent()->count() > 0) {

            $division = Division::get();
            $district = [];
            $thana = [];
            $union = [];

            $customer = Auth::guard('customer')->user();
            if($customer) {
                $district = District::where('division_id', $customer->division_id)->get();
                $thana = Thana::where('district_id', $customer->district_id)->get();
                if($customer->union_id && $customer->union_id != null) {
                    $union = Union::where('thana_id', $customer->thana_id)->get();
                }
            }

            $cartItems = \Cart::getContent();

            $customSubtotal = 0;
            foreach ($cartItems as $key => $item) {
                if ($item->attributes->offer_price == "" || $item->attributes->offer_price == null) {
                    $customSubtotal += $item->price * $item->quantity;
                } else {
                    $customSubtotal += $item->attributes->offer_price * $item->quantity;
                }
            }

            return view('website.checkout', compact('cartItems','division', 'district', 'union', 'thana', 'customSubtotal'));
        } else {
            Session::flash('message', 'Add Product First');
            return redirect()->route('cart.list');
        }
    }

    public function orderStore(Request $request)
    {
        $request->validate([
            // 'thana_id' => 'required',
            'name' => 'required',
            'ip_address' => 'max:15',
            'phone' => 'required|regex:/^(?:\+?88)?01[1345-9]\d{8}$/',
            'address' => 'max:250',
            'email' => 'required|regex:/^\\S+@\\S+\\.\\S+$/',
            'order_note' => 'max:500',
            's_name' => 'nullable|max:100',
            's_phone' => 'nullable|regex:/^(?:\+?88)?01[1345-9]\d{8}$/',
            's_email' => 'nullable|regex:/^\\S+@\\S+\\.\\S+$/',
            's_address' => 'max:250'
        ]);
        // return $request;
        $sum = 0;
        $last_invoice_no =  Order::whereDate('created_at', today())->latest()->take(1)->pluck('invoice_no');
        if (count($last_invoice_no) > 0) {
            $invoice_no = $last_invoice_no[0] + 1;
        } else {
            $invoice_no = date('ymd') . '000001';
        }
        // $area = Area::where('id', $request->area_id)->first();
        // if ($area) {
        //     $area_amount = $area->amount;
        // } else {
        //     $area_amount = 0;
        // }
        try {
            DB::beginTransaction();
            $order = new Order();
            $order->invoice_no = $invoice_no;
            $order->customer_id = $request->customer_id;
            $order->customer_name = $request->name;
            $order->customer_mobile = $request->phone;
            $order->customer_email = $request->email;
            $order->division_id = $request->division_id;
            $order->district_id = $request->district_id;
            $order->thana_id = $request->thana_id;
            $order->union_id = $request->union_id;
            $order->billing_address = $request->address;

            $order->s_name = $request->s_name;
            $order->s_phone = $request->s_phone;
            $order->s_email = $request->s_email;
            $order->s_division_id = $request->s_division_id;
            $order->s_district_id = $request->s_district_id;
            $order->s_thana_id = $request->s_thana_id;
            $order->s_union_id = $request->s_union_id;
            $order->s_address = $request->s_address;

            $order->shipping_cost = $request->shipping_cost;
            $order->total_amount = $request->total_amount + $request->shipping_cost;

            $order->order_note = $request->order_note;
            $order->delivery_date = $request->delivery_date;
            $order->time_id = $request->time_id;
            $order->ip_address = $request->ip();
            $order->save();
            $offer_product = Product::where('is_offer', '1')->get()->pluck('id')->toArray();
            // dd($offer_product);
            if (Auth::guard('customer')->user()) {
                $exist_order_tables = OrderDetails::where('customer_id', Auth::guard('customer')->user()->id)->whereDate('created_at', Carbon::today())->get()->pluck('product_id')->toArray();
            } else {
                $exist_order_tables = [];
            }

            foreach (\Cart::getContent() as $value) {
                if (in_array($value->id, $offer_product)) {
                    if (in_array($value->id, $exist_order_tables)) {
                        $id = $value->id;
                        $product = Product::with('inventory')->where('id', $id)->first();

                        $stock = $product->inventory->purchase;
                        if ($stock >= $value->quantity) {
                           
                            $orderDetails                  = new OrderDetails();
                            $orderDetails->order_id        = $order->id;
                            $orderDetails->product_id      = $value->id;
                            $orderDetails->product_name    = $value->name;
                            $orderDetails->customer_id     = Auth::guard('customer')->user() ? Auth::guard('customer')->user()->id : null;
                            $orderDetails->price           = $value->price;
                            $orderDetails->offer_price     = $value->attributes->offer_price;
                            $orderDetails->quantity        = $value->quantity;
                            $totalprice = $value->attributes->offer_price * $value->quantity;
                            $orderDetails->total_price     = $totalprice;
                            $orderDetails->message = "1st condition applied";
                            $orderDetails->save();
                            $sum += $totalprice;
                            $inventory           = Inventory::where('product_id', $value->id)->first();
                            $inventory->sales    = $value->quantity;
                            $inventory->purchase = $inventory->purchase - $value->quantity;
                            $inventory->sales    = $inventory->sales + $value->quantity;
                            $inventory->save();
                            continue;
                        }
                    } else {
                        $id = $value->id;
                        $product = Product::with('inventory')->where('id', $id)->first();

                        $stock = $product->inventory->purchase;
                        if ($stock + 1 > $value->quantity) {
                            if ($value->quantity > 1) {
                                $discount_product = Product::where('id', $value->id)->first();
                                $discount = $value->price / 100 * $discount_product->discount;
                                $discount_price = $discount_product->price - $discount;
                                $exist_qty                    = $value->quantity - 1;
                                $second_price                 = $value->price * $exist_qty;
                                $price                        = $discount_price + $second_price;
                                $orderDetails                 = new OrderDetails();
                                $orderDetails->order_id       = $order->id;
                                $orderDetails->product_id     = $value->id;
                                $orderDetails->product_name   = $value->name;
                                $orderDetails->customer_id    = Auth::guard('customer')->user() ? Auth::guard('customer')->user()->id : null;
                                $orderDetails->price          = $value->price;
                                $orderDetails->offer_price    = $value->attributes->offer_price;
                                $orderDetails->offer_quantity = $value->quantity;
                                $orderDetails->quantity       = $value->quantity;
                                $orderDetails->total_price    = $price;
                                $orderDetails->message = "2nd condition applied";
                                $orderDetails->save();
                                $inventory                    = Inventory::where('product_id', $value->id)->first();
                                $inventory->sales             = $value->quantity;
                                $inventory->purchase          = $inventory->purchase - $value->quantity;
                                $inventory->sales             = $inventory->sales + $value->quantity;
                                $inventory->save();
                                $sum += $price;
                                continue;
                                //  dd('offer 1 er beshi');
                            }
                        } else {
                            // dd('1 order ache');
                            $id = $value->id;
                            $product = Product::with('inventory')->where('id', $id)->first();

                            $stock = $product->inventory->purchase;
                            if ($stock >= $value->quantity) {
                                $discount_product            = Product::where('id', $value->id)->first();
                                $discount                    = $value->price / 100 * $discount_product->discount;
                                $price                       = $discount_product->price - $discount;
                                $orderDetails                = new OrderDetails();
                                $orderDetails->order_id      = $order->id;
                                $orderDetails->product_id    = $value->id;
                                $orderDetails->product_name  = $value->name;
                                $orderDetails->customer_id   = Auth::guard('customer')->user() ? Auth::guard('customer')->user()->id : null;
                                $orderDetails->offer_price   = $value->attributes->offer_price;
                                $orderDetails->price         = $value->price;
                                $orderDetails->quantity      = $value->quantity;
                                $orderDetails->offer_quantity = $value->attributes->quantity;
                                $orderDetails->total_price   = $price;
                                $orderDetails->message = "3rd condition applied";
                                $orderDetails->save();
                                $sum += $price;
                                $inventory            = Inventory::where('product_id', $value->id)->first();
                                $inventory->sales     = $value->quantity;
                                $inventory->purchase  = $inventory->purchase - $value->quantity;
                                $inventory->sales     = $inventory->sales + $value->quantity;
                                $inventory->save();
                                // dd('offer 1 ');
                                continue;
                            }
                        }
                    }
                }
                $id            = $value->id;
                $product       = Product::with('inventory')->where('id', $id)->first();

                $stock         = $product->inventory->purchase;

                if ($stock >= $value->quantity) {
                    $orderDetails                = new OrderDetails();
                    $orderDetails->order_id      = $order->id;
                    $orderDetails->product_id    = $value->id;
                    $orderDetails->product_name  = $value->name;
                    $orderDetails->customer_id   = Auth::guard('customer')->user() ? Auth::guard('customer')->user()->id : null;
                    $orderDetails->price         = $value->price;
                    $orderDetails->quantity      = $value->quantity;
                    $price                       = $value->quantity * $value->price;
                    $orderDetails->total_price   = $price;
                    $orderDetails->message = "without offer condition applied";
                    $orderDetails->save();
                    $sum += $price;
                    $inventory                   = Inventory::where('product_id', $value->id)->first();
                    $inventory->purchase         = $inventory->purchase - $value->quantity;
                    $inventory->sales            = $inventory->sales + $value->quantity;
                    $inventory->save();
                    continue;
                }
            }

            $order2 = Order::where('id', $order->id)->first();
            $order2->total_amount = $sum + 0;
            $order2->save();

            if ($sum < 1) {
                Order::where('id', $order->id)->delete();
                $customer_phone     = Auth::guard('customer')->user() ? Auth::guard('customer')->user()->phone : $request->phone;
                $name               = Auth::guard('customer')->user() ? Auth::guard('customer')->user()->name : $request->name;
                $customer_id        = Auth::guard('customer')->user() ? Auth::guard('customer')->user()->id : null;
                $message            = "$name .Sorry! Your order product out of stock. Your are most valuable for us. ";

                DB::commit();
                Session::flash('error', 'Order submit failed...May be out of stock');
                \Cart::clear();
                return redirect()->back();
            } else {
                $company            = CompanyProfile::first();
                // $admin_phone        = $company->phone_3;
                // $admin_phone_2      = $company->phone_4;
                // $admin_phone_3      = $company->phone_5;
                $customer_phone     = Auth::guard('customer')->user() ? Auth::guard('customer')->user()->phone : $request->phone;
                $name               = Auth::guard('customer')->user() ? Auth::guard('customer')->user()->name : $request->name;
                $customer_id        = Auth::guard('customer')->user() ? Auth::guard('customer')->user()->code : '';
                $msg                = " Order submit  $name . Invoice No. $order->invoice_no";
                $message            = "$name .Your order submited successfully. Invoice No. $order->invoice_no";
                // $this->send_sms($admin_phone , $msg);
                // $this->send_sms($admin_phone_2 , $msg);
                // $this->send_sms($admin_phone_3 , $msg);
                // $this->send_sms($customer_phone , $message);

                Mail::send('website.customer.customer_order_pattern',['msg'=>$message], function($message) use ($request){
                    $message->from('info@pakhir-basa.com', 'Pakhir Basa');
                    $message->to($request->email, 'Hi')
                            ->subject('Order Submission');
                });

                Mail::send('website.customer.owner_order_pattern',['msg'=>$msg], function($message) use ($request){
                    $message->from('info@pakhir-basa.com', 'Pakhir Basa');
                    $message->to('mbbabin99@gmail.com', 'Hi')
                            ->subject('New order added');
                });
                DB::commit();
                Session::flash('success', 'Order Submit successfully');
                \Cart::clear();

                // $mail =  $order2->email;
                // Mail::send(['html'=>'website.mail'], ['token' => $order2], function($message) use ($mail) {
                //   $message->to( $mail, 'PakhirBasa')->subject
                //     ('Pakhir Basa Confirmation Mail');
                //   $message->from('info@pakhir-basa.com','PakhirBasa');
                // });
                // if($order2){
                //     if($order->order == 1){
                //       Mail::send(['html'=>'website.mail'],    ['order2' => $order2], function($message) {
                //         $message->to('abdullah.linktach@gmail.com', 'PakhirBasa')->subject
                //           ('Pakhir Basa Confirmation Mail');
                //         $message->from('info@pakhir-basa.com','PakhirBasa');
                //       });
          
                //     }
                //     if($order->proccess == 1){
                //       Mail::send(['html'=>'website.mail'],    ['order2' => $order2], function($message) {
                //         $message->to('abdullah.linktach@gmail.com', 'PakhirBasa')->subject
                //           ('Pakhir Basa Confirmation Mail');
                //         $message->from('info@pakhir-basa.com','PakhirBasa');
                //       });
          
                //     }
                //     if($order->cancel == 1){
                //       Mail::send(['html'=>'website.mail'],    ['order2' => $order2], function($message) {
                //         $message->to('abdullah.linktach@gmail.com', 'PakhirBasa')->subject
                //           ('Pakhir Basa Confirmation Mail');
                //         $message->from('info@pakhir-basa.com','PakhirBasa');
                //       });
          
                //     }
                //   }
                return redirect()->route('home');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
            // return $e->getMessage();
            // Session::flash('error', 'order submit faild');
            // return back();
        }
    }
}
