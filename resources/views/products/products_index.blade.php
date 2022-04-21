@extends('layouts.master')

@section('content')
<div class="content">
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Products List</h1>
                <h6>Total Products - {{$count}}</h6>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#" style="color: rgb(44 61 61);">Home</a></li>
                    <li class="breadcrumb-item active text-dark">Products List</li>
                </ol>
            </div>
        </div>
    </div>
</div>
    <section class="content">
        <!-- Default box -->
        <div class="card shadow-lg">
            <div class="card-header">
                <a href="/products/create" class="btn btn-dark shadow-lg">New<i class="fa fa-plus ml-2"></i></a>
                <div class="card-tools">
                    <form action="{{ route('product_search') }}" method="GET">
                    <div class="input-group input-group-sm mt-2 shadow-lg" style="width: 250px;">
                      <input type="text" name="query" class="form-control float-right" placeholder="Search Products" value="{{ request()->input('query')}}">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-dark">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                    </form>
                  </div>
            </div>
            <div class="card-body">
            <div class="row">

                @foreach ($products as $product)
                    
                <div class="col-lg-4">
                    <div class="card shadow-lg">
                        <div class="card-body main-product">
                            <div class="col-6">
                                <div class="main-product-img">
                                    <img class="" src="{{ url('/images/'.$product->image) }}" alt="">
                                    <div>
                                    <p class="d-inline">Product Status </p>
                                    @if ($product->available == 'yes')
                                        <span class="badge bg-success">Available</span>
                                    @else
                                        <span class="badge bg-danger">Unavailable</span> 
                                    @endif
                                    </div>
                                </div>

                                @if ($product->qty < 3)
                                    <span class="badge bg-warning">Warning : Instock</span> 
                                @endif

                            </div>
                            <div class="col-6">
                                <div class="row g-3 main-product-details">
                                    <div class="col-md-12 product-details">
                                        <span class="text-bold">Name:</span>
                                        <span>{{ $product->name }}</span>
                                    </div>
                                    <div class="col-12 product-details">
                                        <span class="text-bold">Category : </span> 
                                        <span>{{ $product->category->name }}</span>
                                    </div>
                                    <div class="col-12 product-details">
                                        <span class="text-bold">InStock : </span> 
                                        <span>{{ $product->qty }}</span>
                                    
                                    </div>
                                    <div class="col-12 product-details">
                                        <span class="text-bold">Price : </span>
                                        <span>{{ $product->price }}</span> $</div>
                                    <div class="col-12 m-4">
                                        <a href="/products/{{$product->id}}/edit"><Button class="btn btn-dark" ><i class="fa-solid fa-pencil mr-1 shadow-lg"></i> Edit</Button></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                
                @endforeach

                {{-- row --}}
            </div>
            </div>

            <div class="mx-auto">
                {{$products->links()}}
              </div>
        </div>    
        
        
        <!-- /.card -->
    </section>
</div>
@endsection