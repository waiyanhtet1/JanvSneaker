@extends('layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit "{{ $user->name }}" User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#" style="color: rgb(44 61 61);">Home</a></li>
                    <li class="breadcrumb-item active text-dark">Edit "{{$user->name}}"</li>
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
                        <a href="/users" class="btn btn-dark shadow-lg"><i class="fas fa-arrow-left mr-2"></i>Back</a>
                    </div>
                    <div class="card-body">

                    <form action="/users/{{$user->id}}" method="POST" enctype="multipart/form-data" class="form_custom">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="inputName">Full Name</label>
                            <input type="text" id="inputName" class="form-control" name="user_name" value="{{ old('user_name',$user->name) }}">
                        </div>

                        <div class="form-group">
                            <label for="inputName">Email Address</label>
                            <input type="email" id="inputName" class="form-control" name="user_email" value="{{ old('user_email',$user->email) }}">
                        </div>

                        {{-- <div class="form-group">
                            <label for="inputClientCompany">Password</label>
                            <input type="password" id="inputClientCompany" class="form-control" name="user_pass" value="{{ old('user_pass',$user->password) }}">
                        </div> --}}

                        {{-- <div class="form-group">
                            <label for="inputClientCompany">Confirm Password</label>
                            <input type="password" id="inputClientCompany" class="form-control" name="user_confim" value="{{ old('user_confim') }}">
                        </div> --}}

                        <div class="form-group">
                            <label for="inputProjectLeader">Phone</label>
                            <input type="text" id="inputProjectLeader" class="form-control" name="user_phone" value="{{ old('user_phone',$user->phone) }}">
                        </div>

                        <div class="form-group">
                            <label for="inputStatus">Selector A Role</label>
                            <select id="inputStatus" class="form-control custom-select" name="user_role">
                                <option selected disabled>Choose Role</option> 
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}"{{$role->id == $user->role_id ? 'selected': ''}} >{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Upload Profile Image</label>
                            <div class="custom-file">
                                <img src="{{ url('/images/'.$user->image) }}" alt="" style="width: 150px; height: 150px; object-fit: contain;">
                                <input class="form-control" type="file" id="formFile" name="user_image" accept="image/*">
                                {{-- <label class="custom-file-label" for="customFile"></label> --}}
                            </div>
                        </div>
                        <div class="form-gruop">
                            <label for="">Gender</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="user_gender" value="Male" {{$user->gender == 'Male' ? 'checked': ''}}>
                                <label class="form-check-label" for="inlineRadio1">Male</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="user_gender" value="Female" {{$user->gender == 'Female' ? 'checked': ''}}>
                                <label class="form-check-label" for="inlineRadio2">Female</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="user_gender" value="Notmention" {{$user->gender == 'Notmention' ? 'checked': ''}}>
                                <label class="form-check-label" for="inlineRadio2">Not Mention</label>
                              </div>
                        </div>
                        

                        <div class="form-group d-flex justify-content-end mt-4">
                            <button class="btn shadow-lg w-25" type="submit"  style="background-color:rgb(29 30 30 / 96%); color: white;">Edit</button>
                        </div>
                    </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <div class="row">
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
                  </div>
            </div>
        </div>
    </section>

</div>
@endsection