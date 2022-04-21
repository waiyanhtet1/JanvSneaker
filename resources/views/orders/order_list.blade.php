@extends('layouts.master')

@section('content')
<div class="content">
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Orders List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#" style="color: rgb(44 61 61);">Home</a></li>
                    <li class="breadcrumb-item active text-dark">Orders List</li>
                </ol>
            </div>
        </div>
        <div class="card bg-light d-flex flex-fill p-3 mt-3 shadow-lg">
            <section class="content">
              <div class="container-fluid">
                <!-- Timelime example  -->
                <div class="row">
                  <div class="col-md-12">
                    <!-- The time line -->

                    <div class="row">
                    <div class="col-md-3 col-sm-6 col-lg-3">
                      <div class="info-box shadow-lg">
                        <span class="info-box-icon bg-info"><i class="fa-solid fa-boxes-stacked"></i></span>
                        
                        <div class="info-box-content">
                          <span class="info-box-text">Total Orders</span>
                          <span class="info-box-number">{{$count}}</span>
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-lg-3">
                      <div class="info-box shadow-lg">
                        <span class="info-box-icon bg-success"><i class="fa-solid fa-dolly"></i></span>
                        
                        <div class="info-box-content">
                          <span class="info-box-text">Delivered Orders</span>
                          <span class="info-box-number">{{$deliver}}</span>
                          
                        </div>
                      </div>
                    </div>
                    </div>

                    <div class="timeline">
                        @foreach ($orders as $order)
                            
                      <div class="time-label">
                        <span class="bg-success">{{$order->created_at->format('d M Y')}} </span>
                      </div>
                      <div>
                        <i class="fa fa-box-open bg-purple"></i>
                        <div class="timeline-item">
                          <span class="time"
                            ><i class="fas fa-clock"></i> 
                            {{$order->created_at->diffForHumans()}}
                            </span
                          >
                          <h3 class="timeline-header">
                            <!-- customer name here -->
                            <span class="text-info text-bold">{{$order->customer->name}}</span> place new order   <br>
                            Email : <span class="text-info text-bold">{{$order->customer->email}}</span>  <br> 
                            Phone : <span class="text-info text-bold">{{$order->customer->phone}}</span>  <br> 
                            Address : <span class="text-info text-bold">{{$order->customer->address}}</span>  
                          </h3>
    
                          <div class="timeline-body">
                              
                        <form action="" method="POST">
                          @csrf
                              <div class="order_table">
                                  <div>
                                     <span class="mr-2">Order iD -</span>{{$order->order_id}}
                                  </div>
                                  <div>
                                      <img src="{{url('/images/'.$order->product->image)}}" width="100" height="100">
                                  </div>
                                  <div>
                                      {{$order->product->name}}
                                  </div>
                                  <div>
                                     <span class="mr-2">Size -</span>{{$order->size}}
                                  </div>
                                  <div>
                                     $ {{$order->product->price}}
                                  </div>
                              </div>
                          </div>
                          <div class="timeline-footer">
                            <a href="/orderlistsubmit/{{$order->id}}/done" class="btn btn-dark btn-sm" type="submit">Check it Out</a>
                            
                          </div>
                        </form>
                        </div>
                      </div>

                      
                      
                      @endforeach

                </div>
              </div>
              <!-- /.timeline -->
            </section>
            <!-- /.content -->
            </div>
    </div>
</div>
    
</div>
@endsection