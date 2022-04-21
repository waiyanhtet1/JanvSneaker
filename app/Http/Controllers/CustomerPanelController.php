<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Orders;
use App\Models\Customer;
// use Session;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomerPanelController extends Controller
{
    public function sessionValue(){
        $customer = array();
        if(Session::has('loginId')){
            $customer = Customer::where('id', '=', Session::get('loginId'))->first();
        }
        return $customer;
    }

    public function index(){
        $customer = $this->sessionValue();
        $products = Products::latest()->paginate(9);
        if ($customer) {
            $count = Orders::where('customer_id', $customer->id)
        ->where('status', [1])
        ->count();
        }  else {
            $count = 0;
        }
        return view('customer_panel.customer_index',compact('customer','products','count'));
    }

    public function login(){
        return view('customer_panel.customer_login');
    }

    public function signup(){
        return view('customer_panel.customer_signup');
    }

    public function signup_store(Request $request){
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required|min:5|max:12',
            'phone' => 'required|numeric|digits:11',
            'address' => 'required'
        ]);
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        $customer->phone = $request->phone;
        $customer->address = $request->address;

        $res = $customer->save();
        if($res){
            return redirect('/customerlogin')->with('success','You have been Registered! Login Now!');
        } else {
            return back()->with('fail','Something wrong!');
        }
    }

    public function login_store(Request $request){
        request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12',
        ]);
        $customer = Customer::where('email', '=', $request->email)->first();
        if($customer){
            if(Hash::check($request->password,$customer->password)){
                $request->session()->put('loginId',$customer->id);
                // $request->session(['loginId' => $customer->id]);
                return redirect('/');
            } else {
                return back()->with('fail','Incorrect Password!');
            }
        } else {
            return back()->with('fail','This email is not registered!');
        }
    }

    

    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
           return redirect('/');
        }
    }

    public function detail(Products $product){
        $customer = $this->sessionValue();
        if ($customer) {
            $count = Orders::where('customer_id', $customer->id)
        ->where('status', [1])
        ->count();
        }  else {
            $count = 0;
        }
        return view('customer_panel.product_detail',compact('product','customer','count'));
    }

    public function submit(Request $request){
        request()->validate([
            'size' => 'required'
        ]);
        $data = $request->except('_token');
        $order_id = 'janv#'. mt_rand(10000,99999);

        $customer = $this->sessionValue();
        $customer_id = $customer->id;

        $order = new Orders();
        $order->size = $request->size;
        $order->product_id = $request->product_id;
        $order->order_id = $order_id;
        $order->customer_id = $customer_id;
        $order->status = config('res.order_status.added');
        $order->save();
        return back()->with('success','Order have been added to the cart!');
    }


    public function allproduct(){
        $products = Products::orderBy('id','desc')->get();
        $customer = $this->sessionValue();
        if ($customer) {
            $count = Orders::where('customer_id', $customer->id)
        ->where('status', [1])
        ->count();
        }  else {
            $count = 0;
        }
        return view('customer_panel.all_product',compact('products','customer','count'));
    }

    public function search(Request $request){
        $query = $request->input('query');
        if($query != ''){
            $products = Products::where('name','like',"%$query%")
            ->orWhere('price','like',"%$query%")
            ->paginate(3);
        }
        else{
            $products = Products::latest()->paginate(9);
        }
        $customer = $this->sessionValue();
        if ($customer) {
            $count = Orders::where('customer_id', $customer->id)
        ->where('status', [1])
        ->count();
        }  else {
            $count = 0;
        }
        return view('customer_panel.all_product',compact('products','customer','count'));
    }

    public function contact_us(){
        $customer = $this->sessionValue();
        if ($customer) {
            $count = Orders::where('customer_id', $customer->id)
        ->where('status', [1])
        ->count();
        }  else {
            $count = 0;
        }
        return view('customer_panel.contact_us',compact('customer','count'));
    }

    public function contact_us_post(Request $request){
        request()->validate([
            'contact_subject' => 'required|max:255',
            'contact_message' => 'required'
        ]);
        $contact = new Contact();
        $contact->name = $request->contact_name;
        $contact->email = $request->contact_email;
        $contact->subject = $request->contact_subject;
        $contact->message = $request->contact_message;
        $contact->save();

        return back()->with('success','Your Message have been sent to Customer Team!');
    }
}
