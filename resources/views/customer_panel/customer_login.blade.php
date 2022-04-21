@extends('layouts.customer')

@section('content')
    
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item ">Login</li>
  </ol>
<div class="content p-5">
<div class="login-box mx-auto">

<div class="card shadow-lg py-4">
<div class="card-body login-card-body">
<p class="login-box-msg">Sign in to start your session</p>

<form action="{{ route('customer_login_store') }}" method="post">
    @if (Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif 
    @if (Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}}</div>
    @endif 
    @csrf

<div class="input-group mb-3">
    <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
        <div class="input-group-append">
        <div class="input-group-text">
        <span class="fas fa-envelope"></span>
        </div>
    </div>
</div>
<span class="text-danger"> @error('email') {{$message}} @enderror </span>


<div class="input-group mb-3">
    <input type="password" class="form-control" placeholder="Password" name="password" value="{{old('password')}}">
        <div class="input-group-append">
        <div class="input-group-text">
        <span class="fas fa-lock"></span>
        </div>
    </div>
</div>
<span class="text-danger"> @error('password') {{$message}} @enderror </span>


<div class="row">
<div class="col-8">

</div>

<div class="col-4">
<button type="submit" class="btn btn-block">Sign In</button>
</div>

</div>
</form>

<p class="mb-0">
<a href="{{ route('customer_signup') }}" class="text-center">Register a new membership</a>
</p>
</div>

</div>
</div>
</div>
@endsection
