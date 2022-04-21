@extends('layouts.master')

@section('content')
<div class="content">
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Roles List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#" style="color: rgb(44 61 61);">Home</a></li>
                    <li class="breadcrumb-item active text-dark">Roles List</li>
                </ol>
            </div>
        </div>
    </div>
</div>
    <section class="content">
        <div class="row">
            <div class="col-sm-12 col-lg">
                <div class="card shadow-lg">
                    <div class="card-header">

                        <div class="card-tools">
                          <form action="{{ route('role_search') }}" method="GET">
                          <div class="input-group input-group-sm mt-1 shadow-lg" style="width: 250px;">
                            <input type="text" name="query" class="form-control float-right" placeholder="Search Role" value="{{ request()->input('query')}}">
                            <div class="input-group-append">
                              <button type="submit" class="btn btn-dark">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>
                          </form>
                        </div>
          
                      </div>
                    <div class="card-body">
                        <div class="row">
                    @foreach ($roles as $role)
                        <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="small-box shadow-lg" style="background-color: rgb(29 30 30 / 96%);color: white;">
                            <div class="inner">
                                <h5><b>{{ $role->name }}</b></h5>
                                <p>Created :</p>
                                <small>{{$role->created_at->diffForHumans()}}</small>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-person-circle-check text-white" style="font-size: 60px;"></i>
                            </div>
                            <a href="{{ route('role_edit',$role) }}" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                            </div>
                        </div>
                    @endforeach
                        </div>
                    </div>
                    <div class="mx-auto">
                        {{$roles->links()}}
                      </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-sm-12 col-lg-3">
                <div class="card collapsed-card shadow-lg" style="background-color: rgb(29 30 30 / 96%);color: white;">
                    <div class="card-header">
                      <h3 class="card-title">New Role</h3>
      
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body" style="background-color:white;">
                      <form action="{{ route('role_store') }}" method="POST">
                          @csrf
                          <div class="form-group">
                              <input type="text" class="form-control" name="role_name" placeholder="Enter Role Name">
                          </div>
                          <button type="submit" class="btn btn-dark float-right">Add</button>
                      </form>
                    </div>
                  </div>
            </div>
        </div>

    </section>
</div>
@endsection