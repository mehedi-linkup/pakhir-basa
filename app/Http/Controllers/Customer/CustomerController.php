<?php

namespace App\Http\Controllers\Customer;

use Carbon\Carbon;
use App\Models\Area;
use App\Models\Order;
use App\Models\Thana;
use App\Models\Customer;
use App\Models\District;
use Illuminate\Support\Str;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    
    public function customer()
    {
        if (Auth::guard('customer')->check()) {
            Session::flash('message', 'You have already login');
            return redirect()->route('checkout.index');
        }
        else{
            return view('website.customer.login');
        }
        
    }

    public function AuthCheck(Request $request)
    {
        $request->validate([
            // 'userphone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
            'email' => 'required',
            'password' => 'required',
        ]);
        $credential = $request->only('password');
        $credential['email'] = $request->email;
        if (Auth::guard('customer')->attempt($credential)) {
            session()->flash('message', 'Login Successfully !');
            return redirect()->route('customer.panel');
            //  return redirect()->route('checkout.user');
            // return back();

        } else {
            Session::flash('error', 'Email or password not match');
            return redirect()->back();
        }

    }
    public function AuthCheckInPage(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credential = $request->only('password');
        $credential['email'] = $request->email;
        if (Auth::guard('customer')->attempt($credential)) {
            session()->flash('message', 'Login Successfully !');
            return redirect()->route('checkout.index');

        } else {
            Session::flash('error', 'Email or password not match');
            return redirect()->back();
        }

    }
    public function signUp() {
        if (Auth::guard('customer')->check()){
            Session::flash('message', 'You have already login');
            return redirect()->route('checkout.user');
        }
        else{
            // $district = District::all();
            // $thana = Thana::all();
            // $area = Area::all();
            return view('website.customer.signup');
        }
        
    }

    public function customerStore(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'phone' => 'required|unique:customers|regex:/^01[13-9][\d]{8}$/|min:11',
            'password' => 'required|string|min:1',
            'ip_address' => 'max:15'
        ]);
        $customer = new Customer();
        $code = 'C' . $this->generateCode('Customer');
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->password = Hash::make($request->password);
        $customer->ip_address = $request->ip();
        $customer->code = $code;
        $customer->status = 'a';
        $customer->save_by = 0;
        $customer->updated_by = 0;
        $customer->save();
        if($customer){
            Session::flash('message', 'Welcome');
            return redirect()->route('customer.panel');          
        }
    }
    public function acccountOpenOtp(){
        return view('website.customer.register_otp');
    }
    public function acccountOpenOtpStore(Request $request){
       $phone = $request->phone;
       $otp = $request->otp;
       $customer = Customer::where('phone',$phone)->where('otp',$otp)->first();
       if($customer){
        $customer->isVerified = '1';
         $customer->save();
        session()->flash('message', ' Successfully created your account  !');
         return redirect()->route('customer.panel');
       }
       else{
        return back()->with('error','Otp or mobile number wrong');
       }
       
       
    }

    public function registerResendOtp(){
        if (Auth::guard('customer')->check()){
            $otp = rand(1000,9999);
            $phone =  Auth::guard('customer')->user()->phone;
             $customer = Customer::where('phone',$phone)->first();
             $customer->otp = $otp;
             $customer->save();
            $message = "Please, reset your password by $otp. Don't share this anyone";
            $this->send_sms($phone , $message);
            return redirect()->route('customer.otp');
        }
    }

      public function customerUpdate(Request $request)
    {
        if (Auth::guard('customer')->check()){
            $this->validate($request, [
                'name' => 'required|max:100',
                'phone' => 'required|unique:customers,id|max:11',
                'email' => 'required|unique:customers,id|max:50',
                'address' => 'required',
                'ip_address' => 'max:17'
            ]);
            $customer = Customer::where('id',Auth::guard('customer')->user()->id)->first();
            $customerImage = '';
            
            if ($request->hasFile('profile_picture')) {
                $image_path = public_path('uploads/customer/' . $customer->profile_picture);
                $image_path_thumb = public_path('uploads/customer/thumb/' . $customer->thum_picture);
                if (file_exists($image_path)) {
                    @unlink($image_path);
                    $Image = $request->file('profile_picture');
                    $newImage = rand(0000, 9999) . $Image->getClientOriginalName();
                    Image::make($Image)->save('uploads/customer/' . $newImage);
                    $customer->profile_picture = $newImage;
                }
                if (file_exists($image_path_thumb)) {
                    @unlink($image_path_thumb);
                    $Image = $request->file('profile_picture');
                    $newImage = rand(0000, 9999) . $Image->getClientOriginalName();
                    Image::make($Image)->save('uploads/customer/thumb/' . $newImage);
                    $customer->thum_picture = $newImage;
                }
            }
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->address = $request->address;
            $customer->save();
            if ($customer) {
                Session::flash('message', 'Profile Update Successfully');
                return redirect()->back();
            } else {
                Session::flash('error', 'Profile Update fail');
                return back();
            }
        }
        
    }

    public function customerPasswordUpdate(Request $request)
    {
     
      
        $request->validate([
            'currentPass' => 'required',
            'password' => 'required|min:4|same:confirmed',
        ]);
        $currentPassword = Auth::guard('customer')->user()->password;
        if (Hash::check($request->currentPass, $currentPassword)) {
            if (!Hash::check($request->password, $currentPassword)) {
                $customer = Customer::find(Auth::guard('customer')->id());
                $customer->password = HasH::make($request->password);
                $customer->save();
                if ($customer) {
                    Session::flash('success', 'Password Update Successfully');
                    // Auth::guard('customer')->logout();
                    return back();
                } else {
                    Session::flash('error', 'Current password not match');
                    return back();
                }
            } else {
                Session::flash('error', 'Same as Current password');
                return back();
            }
        } else {
            Session::flash('error', '!Current password not match');
            return back();
        }
    }


    public function logout()
    {
        Auth::guard('customer')->logout();
        Session::flash('error', 'Logout Successfully');
        return redirect()->route('customer.login');
    }

    public function customerPanel()
    {
        if (Auth::guard('customer')->check()) {
            $order = Order::with('orderDetails')->where('customer_id', Auth::guard('customer')->user()->id)->latest()->get();
            return view('website.customer.dashboard', compact('order'));
        } else {
            return redirect()->route('customer.login');
        }
    }


    public function invoice($id)
    {
        if (Auth::guard('customer')->check()) {
            $total_amount = Order::where('id',$id)->first()->total_amount;
            $shipping_cost = Order::where('id',$id)->first()->shipping_cost;
            $order = OrderDetails::where('order_id', $id)->get();
            $invoice = Order::where('id',$id)->first();
            return view('website.customer.customer_invoice', compact('order','total_amount','shipping_cost','invoice'));
        } else {
            return redirect()->route('home');
        }
    }

    public function forgetPassword() {
        return view('website.customer.forgetEmail');
    }
    public function forgetPasswordStore(Request $request) {
        $request->validate([
            'email'=>'required|email|exists:customers,email'
        ],[
            'email.required' => 'You have to choose the file!',
            'email.exists' => 'The selected email have no account!'
        ]);

        $token = Str::random(64);
        DB::table('password_resets')->insert([
              'email'=>$request->email,
              'token'=>$token,
              'created_at'=>Carbon::now(),
        ]);

        // $app_name = CompanyProfile::first();
        $action_link = route('forget.password.form',['token'=>$token,'email'=>$request->email]);
        $body = "We have received a request to reset the password for <b>Pakhir Basa </b> account associated with ".$request->email.". You can reset your password by clicking the link below.";

        Mail::send('website.customer.email_pattern_forgot',['action_link'=>$action_link,'body'=>$body], function($message) use ($request){
             $message->from('info@pakhir-basa.com', 'Pakhir Basa');
             $message->to($request->email, 'Hi')
                     ->subject('Reset Password');
        });

        return back()->with('success', 'Your password reset link has been sent '.$request->email);
    }

  
    // public function forgetResetPasswordForm(Request $request){

    //     return view('website.customer.forgetOtpForm');
    // }
    public function resetForm(Request $request) {
        $token = $request->query('token');
        $email = $request->query('email');
        return view('website.customer.resetForm', compact('token', 'email'));
    }
    public function forgetPassOtpCheck(Request $request) {
        // dd($request->all());
        $phone = $request->phone;
        $otp = $request->otp;
        $customer = Customer::where('phone',$phone)->where('otp',$otp)->first();
        if($customer !=NULL){
            return redirect()->route('forget.password.reset.form');
        }
        else{
            return back()->with('error','your otp is wrong');
        }
     
    }

    public function forgetpasswordResetUpdate(Request $request){
        $request->validate([
            'email'=>'required|email|exists:customers,email',
            'password' => 'required|min:1|same:confirmed',
        ]);

        $check_token = DB::table('password_resets')->where([
            'email'=>$request->email,
            'token'=>$request->token,
       ])->first();


        if(!$check_token){
            return back()->withInput()->with('fail', 'Invalid token');
        } else {
            $customer = Customer::where('email', $request->email)->first();
            if($customer != NULL){
                $customer->password = Hash::make($request->password);
                $customer->save();

                DB::table('password_resets')->where([
                    'email'=>$request->email
                ])->delete();
                
                return redirect()->route('customer.login')->with('success','Your password reset successfully');
            }
            else{
                return back()->with('error','Your password reset fail!');
            }
        }


    }
}
