<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderlist(){
        $orders = Orders::where('status',[2])->get();
        $count = $orders->count();

        // $count = Orders::count();
        $deliver = Orders::where('status',[4])->count();
        return view('orders.order_list',compact('orders','count','deliver'));
    }

    public function ordersubmit(Orders $order){
        $order->status = config('res.order_status.done');
        $order->save();
        return back()->with('message','Order have been sent!');
    }
}
