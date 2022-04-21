@extends('layouts.customer')
@section('content')
<div class="content p-5">
<div class="invoice p-3 mb-3">
<!-- title row -->

@if (Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  {{Session::get('success')}}
                </div>
@endif
<div class="row">
  <div class="col-12 table-responsive">
    <table class="table table-hover main-table">
      <thead>
        <tr>
        <th>Order ID #</th>
        <th>Image</th>
        <th>Name</th>
        <th>Size</th>
        <th>Price</th>
        <th></th>
      </tr>
      </thead>
      <tbody>
    <form action="{{ route('order_checkout') }}" method="POST">
          @csrf
        @foreach ($orders as $order)   
        @if ($customer->name == $order->customer->name)
            
        <tr>
          <td>{{$order->order_id}}</td>
          <td><img src="{{url('/images/'.$order->product->image)}}" alt="" width="100" height="100"></td>
          <td>{{ $order->product->name }}</td>
          <td>{{ $order->size }}</td>
          <td>$ {{ $amounts[]= $order->product->price }}</td>
          <td><input type="text" name="{{$order->id}}" value="{{$order->product_id}}" style="display: none"></td>
          <td><a href="/order/{{$order->id}}/cancel" class="btn">Cancel</a></td>
        </tr>

        @endif
        @endforeach   
      
      </tbody>
    </table>
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

<div class="row">
  <!-- accepted payments column -->
  <div class="col-6">

  </div>
  <!-- /.col -->
  <div class="col-6">

    <div class="table-responsive">
      <table class="table">
        <tr>            
            @php
              $total = 0;
              $amounts[]=0;
            @endphp
            @foreach ($amounts as $amount)
              @php
                $total +=  $amount;     
              @endphp
            @endforeach  
            <th style="width:50%">Subtotal:</th>
            <td>$ {{$total}}</td>

        </tr>
        <tr>
          <th>Shipping:</th>
          <td>$5.80</td>
        </tr>
        <tr>
          <th>Total:</th>
          <td>${{ $total + 5.80}}</td>
        </tr>
      </table>
    </div>
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
<div class="row mt-4">
  <div class="col-sm-12 col-md-12 col-lg-6 pl-4">
    <span>We will sent your orders to this Content Infromation.</span>

    @if ($count >= "1" )
        
    <div class="from-group mt-3">
      <label for="">Name:</label>
      <input type="text" class="form-control w-75"  disabled value="{{$customer->name}}">
    </div>
    <div class="from-group">
      <label for="">Email:</label>
      <input type="email" class="form-control w-75" disabled value="{{$customer->email}}">
    </div>
    <div class="from-group">
      <label for="">Phone:</label>
      <input type="number" class="form-control w-75" disabled value="{{$customer->phone}}">
    </div>
    <div class="from-group">
      <label for="">Address:</label>
      <textarea name="" id="" cols="30" rows="3" class="form-control w-75" disabled>{{$customer->address}}</textarea>
    </div>
    @endif


  </div>
  <div class="col-sm-12 col-md-12 col-lg-6">
      <p class="lead">Payment Methods:</p>
      <label>
        <input type="radio" name="payment" value="visa">
        <img src="../../dist/img/credit/visa.png" alt="Visa">
      </label>
      <label>
        <input type="radio" name="payment" value="master" >
        <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
      </label>
      <label>
        <input type="radio" name="payment" value="express" >
        <img src="../../dist/img/credit/american-express.png" alt="American Express">
      </label>
      <label>
        <input type="radio" name="payment" value="paypal">
        <img src="../../dist/img/credit/paypal2.png" alt="Paypal">
      </label>
      <br>
      <label>
        <input type="radio" name="payment" value="cod" checked>
        <img src="/images/cash-on-delivery-icon-14.png" alt="Paypal" width="100px">
      </label>
       <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
      Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
      plugg
      dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
      </p>
  </div>
</div>

<!-- this row will not appear when printing -->
<div class="row no-print mt-5">
  <div class="col-12">
    {{-- <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> --}}
    <button type="submit" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
      Payment
    </button>
  </div>
</div>
</form>
</div>
</div>
@endsection