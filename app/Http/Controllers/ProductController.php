<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = Products::count();
        $products = Products::latest()->paginate(9);
        return view('products.products_index',compact('products','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return view('products.products_create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {
        $product = new Products();
        $product->name = $request->product_name;
        $product->category_id = $request->product_category;
        $product->price = $request->product_price;
        $product->qty = $request->product_qty;
        $product->color = $request->product_color;

        // main image
        $imageName = date('YmdHis') . '.' .request()->product_image->getClientOriginalExtension();
        request()->product_image->move(public_path('images'),$imageName);
        $product->image = $imageName;

        // left image
        $imageLeft = date('YmdHis') . '.' .request()->product_left_image->getClientOriginalExtension();
        request()->product_left_image->move(public_path('left_images'),$imageLeft);
        $product->left_image = $imageLeft;

        // right image
        $imageRight = date('YmdHis') . '.' .request()->product_right_image->getClientOriginalExtension();
        request()->product_right_image->move(public_path('right_images'),$imageRight);
        $product->right_image = $imageRight;

        // front image
        $imageFront = date('YmdHis') . '.' .request()->product_front_image->getClientOriginalExtension();
        request()->product_front_image->move(public_path('front_images'),$imageFront);
        $product->front_image = $imageFront;

        // back image
        $imageBack = date('YmdHis') . '.' .request()->product_back_image->getClientOriginalExtension();
        request()->product_back_image->move(public_path('back_images'),$imageBack);
        $product->back_image = $imageBack;

        $product->description = $request->product_description;

        $product->available = 'yes';
        $product->save();
        return redirect('/products')->with('message','New Product have been Added!');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $product)
    {
        $categories = Categories::all();
        return view('products.products_edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $product)
    {
        request()->validate([
            'product_name' => 'required|max:255',
            'product_category' => 'required',
            'product_price' => 'required|numeric',
            'product_qty' => 'required|numeric',
            'product_description' => 'required',
            'product_color' => 'required',
        ]);
        $product->name = $request->product_name;
        $product->category_id = $request->product_category;
        $product->price = $request->product_price;
        $product->qty = $request->product_qty;
        $product->color = $request->product_color;

        // main image
        if($request->product_image){
            $imageName = date('YmdHis') . '.' .request()->product_image->getClientOriginalExtension();
            request()->product_image->move(public_path('images'),$imageName);
            $product->image = $imageName;
        }
         // left image
         if($request->product_left_image){
             $imageLeft = date('YmdHis') . '.' .request()->product_left_image->getClientOriginalExtension();
             request()->product_left_image->move(public_path('left_images'),$imageLeft);
             $product->left_image = $imageLeft;
         }
        //  right image
        if($request->product_right_image){
            $imageRight = date('YmdHis') . '.' .request()->product_right_image->getClientOriginalExtension();
            request()->product_right_image->move(public_path('right_images'),$imageRight);
            $product->right_image = $imageRight;
        }
        // front image
        if($request->product_front_image){
            $imageFront = date('YmdHis') . '.' .request()->product_front_image->getClientOriginalExtension();
            request()->product_front_image->move(public_path('front_images'),$imageFront);
            $product->front_image = $imageFront;
        }
        // back image
        if($request->product_back_image){
            $imageBack = date('YmdHis') . '.' .request()->product_back_image->getClientOriginalExtension();
            request()->product_back_image->move(public_path('back_images'),$imageBack);
            $product->back_image = $imageBack;
        }

        $product->description = $request->product_description;

        if($request->product_available == null){
            $product->available = 'no';
        } else {
            $product->available = 'yes';
        }
        
        $product->save();
        return redirect('/products')->with('message','Product have been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
        $product->delete();
        return redirect('/products')->with('message','Product have been Removed!');
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
        $count = Products::count();
        return view('products.products_index',compact('products','count'));
    }
}
