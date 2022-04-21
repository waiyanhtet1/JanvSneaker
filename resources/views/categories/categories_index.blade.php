@extends('layouts.master')

@section('content')
<div class="content">
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Categories List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#" style="color: rgb(44 61 61);">Home</a></li>
                    <li class="breadcrumb-item active text-dark">Categories List</li>
                </ol>
            </div>
        </div>
    </div>
</div>
    <section class="content">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <a href="{{ route('category_create') }}" class="btn btn-dark shadow-lg">New<i class="fa fa-plus ml-2"></i></a>

                        <div class="card-tools">
                          <form action="{{ route('category_search') }}" method="GET">
                          <div class="input-group input-group-sm mt-1 shadow-lg" style="width: 250px;">
                            <input type="text" name="query" class="form-control float-right" placeholder="Search Category" value="{{ request()->input('query')}}">
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
                        <div class="row mt-3">
                          @foreach ($categories as $cat)
                          <div class="col-md-3 col-sm-6 col-lg-3">
                            <div class="info-box shadow-lg">
                              <span class="info-box-icon bg-dark"><i class="fa-solid fa-shoe-prints"></i></span>
                                  
                              <div class="info-box-content">
                                <span class="info-box-number">{{ $cat->name }}</span>
                                <a href="{{ route('category_edit',$cat) }}" class="text-secondary">
                                  More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                              </div>
                            </div>
                          </div>
                          @endforeach
                        </div>
                        </div>
                        <div class="mx-auto">
                          {{$categories->links()}}
                        </div>
                    <!-- /.card-body -->
                </div>
            
    </section>
</div>
@endsection