<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Customer;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartContoller extends Controller
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

        $orders = Orders::whereIn('status',[1])->get();

        if ($customer) {
            $count = Orders::where('customer_id', $customer->id)
        ->where('status', [1])
        ->count();
        }  else {
            $count = 0;
        }
        return view('cart_page.cart_index',compact('orders','customer','count'));
    }

    public function cancel(Orders $order){
        $order->status = config('res.order_status.cancel');
        $order->save();
        return back()->with('message','Order have been Cancel!');
    }
    

    public function checkout(Request $request){
        $data = $request->except('_token');
        foreach($data as $key => $value){

            $order = Orders::where('id',$key)->update(array(
                'status'=>config('res.order_status.check_out')
            ));

            // dd($originQty); 
            $originQtys = Products::select('qty')->where('id',$value)->get()->toArray();
            foreach ($originQtys as $originalQty){
                // echo $originalQty['qty'];
                $qty = Products::where('id',$value)->update(array(
                    'qty' => $originalQty['qty'] - 1
                ));
            }
        }
        return back()->with('success','Your Orders have been placed!');
    }

}
