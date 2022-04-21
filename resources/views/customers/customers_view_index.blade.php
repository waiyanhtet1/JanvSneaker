@extends('layouts.master')

@section('content')
<div class="content">
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Customers List</h1>
                <small>Customers list who log into our website.</small>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#" style="color: rgb(44 61 61);">Home</a></li>
                    <li class="breadcrumb-item active text-dark">Customers List</li>
                </ol>
            </div>
        </div>
    </div>
</div>
    <section class="content">
        <div class="card shadow-lg">
            {{-- <div class="card-header">
                <a href="/users/create" class="btn btn-dark shadow-lg">New<i class="fa fa-plus ml-2"></i></a>
            </div> --}}
            <div class="card-body">
                <table id="example2" class="table table-striped table-bordered table-hover main-table">
                    <thead>
                        <tr class="text-center">
                            <th> Full Name</th>
                            <th> Email</th>
                            <th>View detail</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($customers as $customer)
                        <tr class="text-center">
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>
                                <a href="{{ route('customer_show',$customer) }}" class="btn btn-dark"> <i class="fa-solid fa-circle-info"></i></a>
                            </td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
</div>
@endsection