@extends('layouts.customer')
@section('content')
    <div class="content">
        
    <section class="content pt-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"> All Products</li>
          </ol>
        <!-- Default box -->
        <div class="card shadow-lg">
            <div class="card-body">

                <div class="d-flex justify-content-center mb-5">
                    
                    <div class="card-tools ml-5">
                        <form action="{{ route('products_search') }}" method="GET">
                        <div class="input-group shadow-lg">
                            <input type="text" name="query" class="form-control" placeholder="Search Products" value="{{ request()->input('query')}}">
                            <div class="input-group-append">
                            <button type="submit" class="btn-sm btn-dark">
                                <i class="fas fa-search"></i>
                            </button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>

            <div class="row">
    
        <div class="container">
            @foreach ($products as $product)
            <div class="card">
                <div class="content">
                    <div class="imgBx">
                        <img src="{{ url('/images/'.$product->image) }}">
                    </div>
                    <div class="contentBx">
                        <h3>{{ $product->name }}<br><span>Brands: {{$product->category->name}}</span></h3>
                    </div>
                </div>
                <ul class="sci">
                    @if ($product->available == 'no' || $product->qty == 0)
                        <li>
                        OUT OF STOCK 
                        </li>
                    @else
                        <li>
                        $ {{$product->price}}
                        </li>
                        <li>
                        <a href="{{ route('product_detail',$product) }}">Buy</a>
                        </li>
                    @endif
                </ul>
            </div>
            @endforeach
        </div>
    
                    {{-- row --}}
                </div>
                </div>
    
                {{-- <div class="mx-auto">
                    {{$products->links()}}
                  </div> --}}
            </div>    
            
            
            <!-- /.card -->
        </section>
    </div>
@endsection