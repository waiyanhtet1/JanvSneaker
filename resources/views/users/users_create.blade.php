@extends('layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add New User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#" style="color: rgb(44 61 61);">Home</a></li>
                    <li class="breadcrumb-item active text-dark">Add New User</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <section class="content">
        <div class="row" style="display: flex; justify-content: center; align-items: center;">
            <div class="col-lg-12">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <a href="/users" class="btn btn-dark shadow-lg"><i class="fas fa-arrow-left mr-2"></i>Back</a>
                    </div>
                    <div class="card-body">

                    <form action="/users" method="post" enctype="multipart/form-data" class="form_custom">
                        @csrf
                        <div class="form-group">
                            <label for="inputName">Full Name</label>
                            <input type="text" id="inputName" class="form-control" name="user_name" value="{{ old('user_name') }}">
                        </div>

                        <div class="form-group">
                            <label for="inputName">Email Address</label>
                            <input type="email" id="inputName" class="form-control" name="user_email" value="{{ old('user_email') }}">
                        </div>

                        <div class="form-group">
                            <label for="inputClientCompany">Password</label>
                            <input type="password" id="inputClientCompany" class="form-control" name="user_pass" value="{{ old('user_pass') }}">
                        </div>

                        {{-- <div class="form-group">
                            <label for="inputClientCompany">Confirm Password</label>
                            <input type="password" id="inputClientCompany" class="form-control" name="user_confim" value="{{ old('user_confim') }}">
                        </div> --}}

                        <div class="form-group">
                            <label for="inputProjectLeader">Phone</label>
                            <input type="text" id="inputProjectLeader" class="form-control" name="user_phone" value="{{ old('user_phone') }}" placeholder="09XXXXXXXXX">
                        </div>

                        <div class="form-group">
                            <label for="inputStatus">Selector A Role</label>
                            <select id="inputStatus" class="form-control custom-select" name="user_role">
                                <option selected disabled>Choose Role</option> 
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Upload Profile Image</label>
                            <div class="custom-file">
                                <input class="form-control" type="file" id="formFile" name="user_image" accept="image/*">
                                {{-- <label class="custom-file-label" for="customFile"></label> --}}
                            </div>
                        </div>
                        <div class="form-gruop">
                            <label for="">Gender</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="user_gender" value="Male">
                                <label class="form-check-label" for="inlineRadio1">Male</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="user_gender" value="Female">
                                <label class="form-check-label" for="inlineRadio2">Female</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="user_gender" value="Notmention" checked>
                                <label class="form-check-label" for="inlineRadio2">Not Mention</label>
                              </div>
                        </div>
                        

                        <div class="form-group d-flex justify-content-end">
                            <button class="btn shadow-lg" type="submit" style="background-color:rgb(29 30 30 / 96%); color: white;">Add new user</button>
                        </div>
                    </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>

</div>
@endsection