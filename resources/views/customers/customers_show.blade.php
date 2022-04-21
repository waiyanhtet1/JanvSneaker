@extends('layouts.master')

@section('content')
<div class="content">
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Customer "{{ $customer->name }}" Detail</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#" style="color: rgb(44 61 61);">Home</a></li>
                    <li class="breadcrumb-item active text-dark">{{$customer->name}}'s detail</li>
                </ol>
            </div>
        </div>
    </div>
</div>
    <section class="content">
        <div class="card shadow-lg">
            <div class="card-header">
                <a href="/customers" class="btn btn-dark shadow-lg"><i class="fas fa-arrow-left mr-2"></i>Back</a>
            </div>
            <div class="card-body">
                    <table class="table table-striped table-bordered table-hover main-table">
                        <tr class="text-center">
                           <td class="text-bold">Full Name</td>      
                           <td> {{$customer->name}} </td>      
                        </tr>
                        <tr class="text-center">
                            <td class="text-bold">Email</td>      
                            <td>{{ $customer->email }}</td>
                        </tr>
                        <tr class="text-center">
                            <td class="text-bold">Phone</td>      
                            <td>{{ $customer->phone }}</td>
                        </tr>
                        <tr class="text-center">
                            <td class="text-bold">Address</td>      
                            <td>{{ $customer->address }}</td>
                        </tr>
                        <tr class="text-center">
                            <td class="text-bold">Join At</td>      
                            <td>{{ $customer->created_at->diffForHumans() }}</td>
                        </tr>
                </table>
            </div>
        </div>
            <!-- /.card-body -->
        
        <!-- /.card -->

    </section>
</div>
@endsection