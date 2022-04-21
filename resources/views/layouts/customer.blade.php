<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>JNAV</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    {{-- <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </head>
  <body class="hold-transition layout-top-nav">
    <div class="wrapper">
      <!-- Navbar -->
      <nav
        class="main-header navbar navbar-expand-lg navbar-dark py-3">
        <div class="container">
          <a href="/" class="navbar-brand">
            <!-- <img
              src="dist/img/AdminLTELogo.png"
              alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3"
              style="opacity: 0.8"
            /> -->
            <span class="brand-text font-weight-bold"><span style="color: bisque;">J</span>A<span style="color: bisque;">N</span>V <span style="color: bisque;">Snekaers</span></span>
          </a>

          <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
    
          <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a href="/" class="nav-link {{Request::segment(1)==''?'active':''}}">Home</a>
              </li>
              <li class="nav-item">
                <a href="/allproducts" class="nav-link {{Request::segment(1)=='allproducts'?'active':''}}">All Products</a>
              </li>
              <li class="nav-item">
                <a href="/contact_us" class="nav-link {{Request::segment(1)=='contact_us'?'active':''}}">Contact Us</a>
              </li> 
            </ul>

            <!-- SEARCH FORM -->
          </div>

          <!-- Right navbar links -->
          <ul class="order-1 order-lg-3 navbar-nav navbar-no-expand ml-auto">
            <!-- Messages Dropdown Menu -->
            @if(Session::has('loginId'))

              <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">{{ $customer->name }} </a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="{{ route('customer_logout') }}" class="dropdown-item">Log Out</a></li>
                </ul>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link" href="/order">
                      <i class="fas fa-cart-plus"></i>
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{$count}}</span>
                  </a>
                </li>

            @else

            <li class="nav-item">
              <a class="nav-link {{Request::segment(1)=='customersignup'?'active':''}}" href="{{ route('customer_signup') }}">
                Sign Up
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{Request::segment(1)=='customerlogin'?'active':''}}" href="{{ route('customer_login') }}">
                Log In
              </a>
            </li>

            @endif
                

            
          </ul>
        </div>
      </nav>
      <!-- /.navbar -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

            @yield('content')
            
      </div>
      
      <!-- /.content-wrapper -->
      <!-- Main Footer -->
      <footer class="main-footer pt-5" style="background-color: rgb(29 30 30 / 96%);">
        <div class="footer-container">
          <div class="logo-name" style="text-align: center;">
            <h2><b><span style="color: bisque;">J</span>A<span style="color: bisque;">N</span>V</b><br><span style="color: bisque;">Sneakers</span></h2>
          </div>
        <div class="location">
            <h2><b>Location</b></h2>
            <p><b>Address :</b>No (123),Main Street,Anytown,Yongon,<br>Myanmar.</p>
            
        </div>
        <div class="contact-info">
          <h2><b>Contact-info</b></h2>
          <p><b>Phone :</b> (+95)01234567</p>
            <p><b>Email :</b> you@someone.com</p>
        </div>
        <div class="social-media">
          <h2><b>Social-media</b></h2>
          <ul>
          <li><a href="#"><i class="fab fa-facebook"></i></a></li>
          <li><a href="#"><i class="fab fa-twitter"></i></a></li>
          <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
        </ul>
        </div>
        </div>
      </footer>
    </div>
    <!-- ./wrapper -->

   <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/dist/js/adminlte.min.js"></script>
    <script>
      $(document).ready(function () {
        $(".product-image-thumb").on("click", function () {
          var $image_element = $(this).find("img");
          $(".product-image").prop("src", $image_element.attr("src"));
          $(".product-image-thumb.active").removeClass("active");
          $(this).addClass("active");
        });
      });

    
    </script>
  </body>
</html>
