@extends('layouts.master')

@section('content')
<div class="content">
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Users List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#" style="color: rgb(44 61 61);">Home</a></li>
                    <li class="breadcrumb-item active text-dark">Users List</li>
                </ol>
            </div>
        </div>
    </div>
</div>
    <section class="content">
        <div class="card shadow-lg">
            <div class="card-header">
                <a href="/users/create" class="btn btn-dark shadow-lg">New<i class="fa fa-plus ml-2"></i></a>
            </div>
            <div class="card-body">
                <table id="example2" class="table table-striped table-bordered table-hover main-table">
                    <thead>
                        <tr class="text-center">
                            <th> Profile</th>
                            <th> Full Name</th>
                            <th>Gender</th>
                            <th>Role</th>
                            <th> Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $user)
                        <tr class="text-center"> 
                            <td><img alt="Avatar" class="table-avatar" style="width: 60px;height: 60px; border-radius: 50%" src="{{ url('/images/'.$user->image) }}">
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->gender }}</td>
                            <td>{{ $user->roles->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                <a href="/users/{{$user->id}}/edit" class="btn btn-dark"> <i class="fas fa-arrow-circle-right"></i></a>
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