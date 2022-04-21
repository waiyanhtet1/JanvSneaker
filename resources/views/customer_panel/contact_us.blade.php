@extends('layouts.customer')
@section('content')
<section class="content p-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item ">Contact Us</li>
      </ol>
    <!-- Default box -->
    <div class="card contact-us">
        @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  {{Session::get('success')}}
                </div>
              @endif 
      <div class="card-body row">
        <div
          class="col-lg-6 text-center d-flex align-items-center justify-content-center"
        >
          <div>
            <h2><strong>JANV</strong></h2>
            <p class="lead mb-5 ws-25">
              No (123),Main Street,Anytown,<br />Yangon,Myanmar.
            </p>
            <div class="social-media">
              <ul>
                <li>
                  <a href="#"><i class="fab fa-facebook"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fab fa-twitter"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fab fa-linkedin"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          @if ($customer)
              
            <form action="{{ route('contact_us_post') }}" method="POST">
                @csrf
          <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" id="inputName" class="form-control" value="{{$customer->name}}" name="contact_name" />
          </div>
          <div class="form-group">
            <label for="inputEmail">E-Mail</label>
            <input type="email" id="inputEmail" class="form-control" value="{{$customer->email}}" name="contact_email"/>
          </div>
          <div class="form-group">
            <label for="inputSubject">Subject</label>
            <input type="text" id="inputSubject" class="form-control" name="contact_subject"/>
          </div>
        <span class="text-danger"> @error('contact_subject') {{$message}} @enderror </span>

          <div class="form-group">
            <label for="inputMessage">Message</label>
            <textarea
              id="inputMessage"
              class="form-control"
              rows="4" name="contact_message"
            ></textarea>
          </div>
        <span class="text-danger"> @error('contact_message') {{$message}} @enderror </span>

          <div class="form-group">
            <input
              type="submit"
              class="btn"
              value="Send message"
            />
          </div>
        </form>
        @else
          <div class="p-5">
            <span class="p-5">You have to <a href="/customerlogin">Login</a> or <a href="/customersignup">Signup</a> to Contact Us.</span>
          </div>
        @endif
        </div>
      </div>

    </div>
  </section>
@endsection