@extends('layouts.master')

@section('content')
<div class="content">
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add New Product</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#" style="color: rgb(44 61 61);">Home</a></li>
                    <li class="breadcrumb-item active text-dark">Add New Product</li>
                </ol>
            </div>
        </div>
    </div>
</div>

    <section class="content">
        <div class="row" style="display: flex; justify-content: center; align-items: center;">
            <div class="col-lg-12">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <a href="/products" class="btn btn-dark shadow-lg"><i class="fas fa-arrow-left mr-2"></i>Back</a>
                    </div>
                    <div class="card-body">

                    <form action="/products" method="post" enctype="multipart/form-data" class="form_custom">
                        @csrf
                        <div class="form-group">
                            <label for="inputName">Product Name</label>
                            <input type="text" id="inputName" class="form-control" name="product_name" value="{{ old('product_name') }}">
                        </div>

                        <div class="form-group">
                            <label for="inputStatus"> Category</label>
                            <select id="inputStatus" class="form-control custom-select" name="product_category">
                                <option selected disabled>Choose Category</option> 
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="inputProjectLeader">Price</label>
                                    <input type="text" id="inputProjectLeader" class="form-control" name="product_price" value="{{ old('product_price') }}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="inputProjectLeader">Instock</label>
                                    <input type="text" id="inputProjectLeader" class="form-control" name="product_qty" value="{{ old('product_qty') }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="">Color</label>
                            <input type="text" class="form-control" name="product_color" value="{{ old('product_color') }}">
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="">Upload Main Image</label>
                                    <div class="custom-file">
                                        <input class="form-control" type="file"   name="product_image" accept="image/*">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="">Upload Left Image</label>
                                    <div class="custom-file">
                                        <input class="form-control" type="file" name="product_left_image" accept="image/*">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="">Upload Right Image</label>
                                    <div class="custom-file">
                                        <input class="form-control" type="file"  name="product_right_image" accept="image/*">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="">Upload Front Image</label>
                                    <div class="custom-file">
                                        <input class="form-control" type="file"  name="product_front_image" accept="image/*">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="">Upload Back Image</label>
                                    <div class="custom-file">
                                        <input class="form-control" type="file"  name="product_back_image" accept="image/*">
                                    </div>
                                </div>
                            </div>
                        </div> 

                        
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="product_description" id="" cols="30" rows="3" class="form-control">{{ old('product_description') }}</textarea>
                        </div>
                        


                        <div class="form-group d-flex justify-content-end">
                            <button class="btn shadow-lg" type="submit" style="background-color:rgb(29 30 30 / 96%); color: white;">Add new product</button>
                        </div>
                    </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>

</div>
@endsection