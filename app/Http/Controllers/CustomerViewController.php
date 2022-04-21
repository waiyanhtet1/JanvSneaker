<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerViewController extends Controller
{
    public function index(){
        $customers = Customer::all();
        return view('customers.customers_view_index',compact('customers'));
    }

    public function show(Customer $customer){
        return view('customers.customers_show',compact('customer'));
    }

    public function contact(){
        $contacts = Contact::orderBy('id','desc')->get();
        return view('customers.customers_contact',compact('contacts'));
    }
}
