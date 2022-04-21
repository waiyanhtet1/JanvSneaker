@extends('layouts.customer')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item ">Sign Up</li>
  </ol>
<div class="content p-5">
<div class="register-box mx-auto">

<div class="card shadow-lg">
<div class="card-body register-card-body">
<p class="login-box-msg">Register a new membership</p>
<form action="{{ route('customer_signup_store') }}" method="post">
    @if (Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif 
    @if (Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}}</div>
    @endif 
@csrf
<span class="text-danger"> @error('name') {{$message}} @enderror </span>
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Full name" name="name" value="{{old('name')}}">
        <div class="input-group-append">
        <div class="input-group-text">
        <span class="fas fa-user"></span>
        </div>
        </div>
    </div>

<span class="text-danger"> @error('email') {{$message}} @enderror </span>
    <div class="input-group mb-3">
        <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
        <div class="input-group-append">
        <div class="input-group-text">
        <span class="fas fa-envelope"></span>
        </div>
        </div>
    </div>

<span class="text-danger"> @error('password') {{$message}} @enderror </span>
    <div class="input-group mb-3">
        <input type="password" class="form-control" placeholder="Password" name="password" value="{{old('password')}}">
        <div class="input-group-append">
        <div class="input-group-text">
        <span class="fas fa-eye-slash" id="showPassword"></span>
        </div>
        </div>
    </div>

<span class="text-danger"> @error('phone') {{$message}} @enderror </span>
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Phone Number 09XXXXXXXXX" name="phone" value="{{old('phone')}}">
        <div class="input-group-append">
        <div class="input-group-text">
        <span class="fas fa-phone"></span>
        </div>
        </div>
    </div>

<span class="text-danger"> @error('address') {{$message}} @enderror </span>
    <div class="input-group mb-3">
        <textarea name="address" class="form-control" cols="30" rows="1" placeholder="Address">{{old('address')}}</textarea>
        <div class="input-group-append">
        <div class="input-group-text">
        <span class="fas fa-home"></span>
        </div>
        </div>
    </div>

    <div class="row">
        <div class="col-8">
        <div class="icheck-primary">
            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
            <label for="agreeTerms">
            I agree to the <a href="#">terms</a>
            </label>
        </div>
        </div>

        <div class="col-4">
        <button type="submit" class="btn btn-block">Register</button>
        </div>

    </div>
</form>

<a href="{{ route('customer_login') }}" class="text-center">I already have a membership</a>
</div>

</div>
</div>
</div>

@endsection
