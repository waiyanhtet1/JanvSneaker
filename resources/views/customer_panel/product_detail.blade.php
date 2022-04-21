@extends('layouts.customer')
@section('content')
  
      <!-- Main content -->
      <section class="content p-4 shadow-lg">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active"> <a href="/allproducts">All Products</a></li>
              <li class="breadcrumb-item">{{ $product->name }}</li>
            </ol>
        <!-- Default box -->
        <div class="card card-solid">
          <div class="card-body">
            <form action="{{route('order_submit')}}" method="POST">
              @csrf
              @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  {{Session::get('success')}}
                </div>
              @endif 
            <div class="row">
              <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none">
                </h3>
                <div class="col-12">
                  <img
                    src="{{ url('/images/'.$product->image) }}"
                    class="product-image"
                    alt="Product Image"
                  />
                </div>
                <div class="col-12 product-image-thumbs">
                  <div class="product-image-thumb active">
                    <img src="{{ url('/images/'.$product->image) }}" alt="Product Image" />
                  </div>
                  <div class="product-image-thumb">
                    <img src="{{ url('/left_images/'.$product->left_image) }}" alt="Product Image" />
                  </div>
                  <div class="product-image-thumb">
                    <img src="{{ url('/right_images/'.$product->right_image) }}" alt="Product Image" />
                  </div>
                  <div class="product-image-thumb">
                    <img src="{{ url('/front_images/'.$product->front_image) }}" alt="Product Image" />
                  </div>
                  <div class="product-image-thumb">
                    <img src="{{ url('/back_images/'.$product->back_image) }}" alt="Product Image" />
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6">
                <h3 class="my-3">
                  {{$product->name}}
                </h3>

                <hr />

            
                
                <div class="mt-4">
                    <h5>Description</h5>
                    <p>{{ $product->description }}</p>
                </div>

                <div class="mt-4">
                    <h5>Color</h5>
                    <p style="text-transform: uppercase;">{{ $product->color }}</p>
                </div>

                <h5 class="mt-3">Size</h5>
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <select class="form-select form-control form-select-sm mb-3" aria-label=".form-select-lg example" name="size">
                            <option selected disabled>Open this select size</option>
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                            <option value="44">44</option>
                            <option value="45">45</option>
                            <option value="46">46</option>
                          </select>
                          <span class="text-danger"> @error('size') {{$message}} @enderror </span>

                    </div>
                    <div class="col-md-6 col-lg-6">
                      <input type="text" name="product_id" value="{{$product->id}}" style="display: none;">
                    </div>
                </div>

                <div class="bg-gray py-2 px-3 mt-4 text-center">
                  <h2 class="mb-0">$ {{ $product->price }}</h2>
                  <h4 class="mt-0">
                    <small>Ex Tax: $1.00 </small>
                  </h4>
                </div>

                <div class="mt-4 d-flex justify-content-end">
                @if ($customer)
                    <button class="btn btn-lg btn-flat">
                      <i class="fas fa-cart-plus fa-lg mr-2"></i>
                      Add to Cart
                    </button>
                @else
                    <span class="mr-5">You have to <a href="/customerlogin">Login</a> or <a href="/customersignup">Signup</a> to place this order</span>
                    <button class="btn btn-lg btn-flat" disabled >
                      <i class="fas fa-cart-plus fa-lg mr-2"></i>
                      Add to Cart
                    </button>
                    
                @endif
                </div>

              </div>
            </div>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </section>
@endsection