@extends('admin.layouts.admin_frontend_layout')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">					
    <form action="{{ url('admin/category/'.$category->id) }}" method="POST" id="category-form" name="category-form" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Delete Category</h1>
            </div>
            <div class="col-sm-5 text-right">
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
            <div class="col-sm-0 text-right">
               <a href="{{ route('categories.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Default box -->
    <div class="container-fluid">
            <div class="card">
                <div class="card-body">	

                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-2">
                                <label for="name">Name : </label> {{ $category->name }}
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-2">
                                <label for="slug">Slug :</label> {{ $category->slug }} 
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="mb-2">
                                <label for="status">Status : </label> {{ ($category->status== 0 ? "Block" : "Active") }}
                            </div>
                        </div>

                        <div class="col-md-3">
                            @if (empty($category->image))
                                    <div class="mb-3">
                                        <label for="status">Image : </label>
                                        <span>Empty</span>
                                    </div>
                                </div>
                            </div>
                            @else
                                    <div class="mb-3">
                                        <label for="status">Image : </label>
                                    </div>
                                </div>
                            </div>
                                    <img src="{{ asset($category->image) }}" width="960" height="600" class="img img-responsive" />
                            @endif

                </div>							
            </div>
        </form>
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->

@endsection

