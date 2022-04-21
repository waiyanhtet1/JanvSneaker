@extends('layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit "{{ $role->name }}" Role</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#" style="color: rgb(44 61 61);">Home</a></li>
                    <li class="breadcrumb-item active text-dark">Edit "{{$role->name}}"</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <section class="content">
        <div class="row" style="display: flex; justify-content: center; align-items: center;">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <a href="/roles" class="btn btn-dark shadow-lg"><i class="fas fa-arrow-left mr-2"></i>Back</a>
                    </div>
                    <div class="card-body">

                    <form action="{{ route('role_update',$role) }}" method="POST" class="form_custom">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="inputName">Role Name</label>
                            <input type="text" class="form-control" name="role_name" value="{{ old('role_name',$role->name) }}">
                        </div>
                        <small>Created: {{ $role->created_at->diffForHumans() }}</small> <br>
                        <small>Updated: {{ $role->updated_at->diffForHumans() }}</small>
                        <div class="form-group d-flex justify-content-end">
                            <button class="btn shadow-lg" type="submit" style="background-color:rgb(29 30 30 / 96%); color: white;">Edit</button>
                        </div>
                    </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                {{-- <div class="row">
                    <div class="col-lg-12">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Remove this User?</h3>
                        </div>
                        <div class="card-body">
                          <div id="accordion">
                            <div class="card card-danger">
                              <div class="card-header">
                                <h4 class="card-title w-100">
                                  <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                                    Danger Zone
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    <form action="/users/{{$user->id}}" method="post"> 
                                        @csrf
                                        @method('DELETE')
                                    <p>Want to remove "{{$user->name}}" user ?</p>
                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure want to delete this item?');">DELETE</button>
                                    </form>
                                </div>
                              </div>
                            </div>
    
                          </div>
                        </div>
                      </div>
                    </div>
                  </div> --}}
            </div>
        </div>
    </section>

</div>
@endsection