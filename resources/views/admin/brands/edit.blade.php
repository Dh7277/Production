@extends('admin.layouts.admin_frontend_layout')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Brand</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('brands.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <form action="{{ route('brands.update', $brand->id) }}" method="POST" name="subCategoryForm"  id="subCategoryId">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">								
                    <div class="row">	
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{ $brand->name }}" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name">	
                                @error('name')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" value="{{ $brand->slug }}" id="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="Slug">	
                                @error('slug')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>	
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option {{ ($brand->status == 1) ? 'Selected' : '' }} value="1">Active</option> 
                                    <option {{ ($brand->status == 0) ? 'Selected' : '' }} value="0">Block</option> 
                                </select>
                            </div>
                        </div>							
                    </div>
                </div>							
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('brands.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>

    </div>
    <!-- /.card -->
</section>
<!-- /.content -->

@endsection

