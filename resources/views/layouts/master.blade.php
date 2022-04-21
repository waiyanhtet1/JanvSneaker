<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JANV</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    {{-- <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <!-- general css  -->
    <link rel="stylesheet" href="/css/index.css">
    {{-- data table --}}
  <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    {{-- toaster alert --}}
    <link rel="stylesheet" href="/plugins/toastr/toastr.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                {{-- <li class="nav-item mr-3">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">Log Out</button>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: rgb(29 30 30 / 96%)">
            <a href="#" class="brand-link" style="border: none;">
                <span class="brand-text ml-5">JANV Sneakers</span>
            </a>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="border-bottom:1px solid #4e6081;">
                    <div class="image">
                        <img src="/images/{{Auth::user()->image}}" style="width: 40px;height: 40px; border-radius: 50%" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block text-white">{{ auth()->user()->name }}</a>
                    </div>
                    {{-- @endif --}}
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                       
                        <li class="nav-item nav-item1">
                            <a href="/orderlist" class="nav-link  {{ Request::segment(1) == 'orderlist' ? 'active bg-white':'' }}" style="background-color:transparent">
                                <i class="fa-solid fa-box-open nav-icon"></i>
                                <p>
                                    Orders List
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/users" class="nav-link {{ Request::segment(1) == 'users' ? 'active bg-white':'' }}">
                                <i class="fa-solid fa-people-group nav-icon"></i>
                                <p>Users List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/roles" class="nav-link {{ Request::segment(1) == 'roles' ? 'active bg-white':'' }}">
                                <i class="fa-solid fa-person-circle-check nav-icon"></i>
                                <p>User Roles List</p>
                            </a>
                        </li>

                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active" style="background-color:rgb(86 92 98)">
                                <i class="fa-solid fa-street-view nav-icon"></i>
                                <p class="text-white">
                                    Customers
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/customers" class="nav-link {{Request::segment(1) == 'customers'?'active bg-white':'' }}">
                                    <i class="fa-solid fa-street-view nav-icon"></i>
                                    <p>Customers List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/customers_contact" class="nav-link {{Request::segment(1) == 'customers_contact'?'active bg-white':'' }}">
                                    <i class="fa-solid fa-comment nav-icon"></i>
                                    <p>Contact Mails</p>
                                </a>
                            </li>
                            </ul>
                        </li>

                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active" style="background-color:rgb(86 92 98)">
                                <i class="fa-solid fa-boxes-packing nav-icon"></i>
                                <p class="text-white">
                                    All Products
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/products" class="nav-link {{Request::segment(1)=='products'?'active bg-white':''}} ">
                                        <i class="fa-solid fa-box-archive nav-icon"></i>
                                        <p>Products</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/categories" class="nav-link {{Request::segment(1)=='categories'?'active bg-white':''}} ">
                                        <i class="fa-solid fa-shoe-prints nav-icon"></i>
                                        <p>Categories</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper">

            @yield('content')
            
        </div>
        <!-- aside  -->
        <aside class="control-sidebar control-sidebar-dark">
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- end of aside  -->
        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2021-2022 <a href="#" style="color:rgb(44 61 61)">JANV</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/dist/js/adminlte.min.js"></script>
    <!-- DataTables  & Plugins -->
<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/plugins/jszip/jszip.min.js"></script>
<script src="/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Toastr -->
    <script src="/plugins/toastr/toastr.min.js"></script>

    <script>
    $(function () {
        $('#example2').DataTable({
      "paging": true,
      "pageLength": 5,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    });
// toast alert
  $(document).ready(function() {
            toastr.options.timeOut = 10000;
            @if(Session::has('message'))
                toastr.success('{{ Session::get('message') }}');
            @endif
        });
// validation error message
      @if(count($errors) > 0)
          @foreach($errors->all() as $error)
              toastr.error("{{ $error }}");
          @endforeach
      @endif
    </script>
</body>

</html>