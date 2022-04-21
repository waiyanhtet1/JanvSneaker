@extends('layouts.master')

@section('content')
<div class="content">
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add New Category</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#" style="color: rgb(44 61 61);">Home</a></li>
                    <li class="breadcrumb-item active text-dark">Add New Category</li>
                </ol>
            </div>
        </div>
    </div>
</div>

    <section class="content">
        <div class="row" style="display: flex; justify-content: center; align-items: center;">
            <div class="col-lg-12">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <a href="/categories" class="btn btn-dark shadow-lg"><i class="fas fa-arrow-left mr-2"></i>Back</a>
                    </div>
                    <div class="card-body">

                    <form action="{{ route('category_store') }}" method="post" class="form_custom">
                        @csrf
                        <div class="form-group">
                            <label for="inputName">Category Name</label>
                            <input type="text" id="inputName" class="form-control" name="category_name" value="{{ old('category_name') }}">
                        </div>

                        <div class="form-group d-flex justify-content-end">
                            <button class="btn shadow-lg" type="submit" style="background-color:rgb(29 30 30 / 96%); color: white;">Add new category</button>
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