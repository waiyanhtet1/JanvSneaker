@extends('layouts.customer')
@section('content')
    

<div class="content-header">
    <div class="banner">
        <div class="banner-content">
            <h1>Welcome to JANV</h3>
            <p>Most of them are stock.If you can't find what you are looking for,feel free to contact us.We can find it for you.Thank you!</p>
            <div class="button">
            <a href="/contact_us"><button class="btn">Contact Us</button></a>
        </div>
        </div>
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="main-content-title">
  <h2>Available Products</h2>
</div>
<div class="content px-4">
  
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
    <!--cate-sessions  -->

    {{-- <div class="categories-title">
      <h2>Categories</h2>
    </div>
    <div class="categories">
      <div class="cate-img1"><button class="btn">JORDAN</button></div>
      <div class="cate-img2"><button class="btn">ADDIDAS</button></div>
      <div class="cate-img3"><button class="btn">NIKE</button></div>
      <div class="cate-img4"><button class="btn">VANS</button></div>
      <div class="cate-img5"><button class="btn">BEST SELLERS</button></div>
    </div> --}}
    <!-- /.row -->
  {{-- </div> --}}
  <!-- /.container-fluid -->
</div>
<div class="svg-section">
    <img src="/images/Jordan.png" alt="" width="100">
    <img src="/images/adidas.png" alt="" width="100">
    <img src="/images/nike.png" alt="" width="100">
  </div>

@endsection
