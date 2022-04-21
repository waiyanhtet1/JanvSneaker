@extends('layouts.master')

@section('content')
<div class="content">
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit "{{ $product->name }}" Product</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#" style="color: rgb(44 61 61);">Home</a></li>
                    <li class="breadcrumb-item active text-dark">Edit "{{$product->name}}"</li>
                </ol>
            </div>
        </div>
    </div>
</div>

    <section class="content">
        <div class="row" style="display: flex; justify-content: center; align-items: center;">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <a href="/products" class="btn btn-dark shadow-lg"><i class="fas fa-arrow-left mr-2"></i>Back</a>
                    </div>
                    <div class="card-body">

                    <form action="/products/{{$product->id}}" method="POST" enctype="multipart/form-data" class="form_custom">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="inputName">Product Name</label>
                            <input type="text" id="inputName" class="form-control" name="product_name" value="{{ old('product_name',$product->name) }}">
                        </div>

                        <div class="form-group">
                            <label for="inputStatus">Select Category</label>
                            <select id="inputStatus" class="form-control custom-select" name="product_category">
                                <option selected disabled>Choose Category</option> 
                                @foreach ($categories as $cat)
                                    <option value="{{$cat->id}}"{{$cat->id == $product->category_id ? 'selected': ''}}>{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="inputProjectLeader">Price</label>
                                    <input type="text" id="inputProjectLeader" class="form-control" name="product_price" value="{{ old('product_price',$product->price) }}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="inputProjectLeader">Instock</label>
                                    <input type="text" id="inputProjectLeader" class="form-control" name="product_qty" value="{{ old('product_qty',$product->qty) }}">
                                </div>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="">Color</label>
                            <input type="text" class="form-control" name="product_color" value="{{ old('product_color',$product->color) }}">
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="">Main Image</label>
                                    <div class="custom-file">
                                        <img src="{{ url('/images/'.$product->image) }}" alt="" style="width: 150px; height: 150px; object-fit: contain;">
                                        <input class="form-control" type="file"  name="product_image" accept="image/*">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="">Left Image</label>
                                    <div class="custom-file">
                                        <img src="{{ url('/left_images/'.$product->left_image) }}" alt="" style="width: 150px; height: 150px; object-fit: contain;">
                                        <input class="form-control" type="file"  name="product_left_image" accept="image/*">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="">Right Image</label>
                                    <div class="custom-file">
                                        <img src="{{ url('/right_images/'.$product->right_image) }}" alt="" style="width: 150px; height: 150px; object-fit: contain;">
                                        <input class="form-control" type="file"  name="product_right_image" accept="image/*">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="">Front Image</label>
                                    <div class="custom-file">
                                        <img src="{{ url('/front_images/'.$product->front_image) }}" alt="" style="width: 150px; height: 150px; object-fit: contain;">
                                        <input class="form-control" type="file"  name="product_front_image" accept="image/*">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="">Back Image</label>
                                    <div class="custom-file">
                                        <img src="{{ url('/back_images/'.$product->back_image) }}" alt="" style="width: 150px; height: 150px; object-fit: contain;">
                                        <input class="form-control" type="file"  name="product_back_image" accept="image/*">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="product_description" id="" cols="30" rows="3" class="form-control">{{ old('product_description',$product->description) }}</textarea>
                        </div>

                        <div class="form-check mt-5">
                            <input class="form-check-input" type="checkbox" value="{{$product->available}}"{{$product->available== 'yes' ?'checked':''}}  name="product_available" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              Available
                            </label>
                          </div>

                        <div class="form-group d-flex justify-content-end mt-4">
                            <button class="btn shadow-lg w-25" type="submit"  style="background-color:rgb(29 30 30 / 96%); color: white;">Edit</button>
                        </div>
                    </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <div class="row">
                    <div class="col-lg-12">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Remove this Product?</h3>
                        </div>
                        <div class="card-body">
                          <div id="accordion">
                            <div class="card card-danger">
                              <div class="card-header">
                                <h4 class="card-title w-100">
                                  <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                                    Danger Zone
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    <form action="/products/{{$product->id}}" method="post"> 
                                        @csrf
                                        @method('DELETE')
                                    <p>Want to remove "{{$product->name}}" product ?</p>
                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure want to delete this item?');">DELETE</button>
                                    </form>
                                </div>
                              </div>
                            </div>
    
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </section>

</div>
@endsection