@extends('admin.app')
@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
    
</div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Subcategory</h4>
                <p class="card-description">
                    @if(session()->has('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
                @if(session()->has('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                </p>
                <form class="forms-sample" action="{{route('subcategories.update',[$subcategories->id])}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PATCH">
                    @csrf
                    <input type="hidden" name="id" value="{{$subcategories->id}}" />
                    <div class="form-group">
                        <label>Add Category<span style="color: red;">*</span></label>
                        <select name="category" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" value="{{$subcategories->category_id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span style="color: red;"> @error('category') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>SubCategory<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="subcat" id="subcat" value="{{$subcategories->title}}" required>
                    </div>
                    <span style="color: red;"> @error('subcat') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Subcategory Image<span style="color: red;">*</span></label>
                        <input type="file" class="form-control" name="catimg" id="catimg" value="{{$subcategories->image}}" required>
                    </div>
                    <span style="color: red;"> @error('catimg') {{$message}} @enderror</span>
                    <div class="form-group pb-3">
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" name="save" class="btn btn-primary mr-2">Update</button>
                    <!-- <button class="btn btn-light">Cancel</button> -->
                </form>
            </div>
        </div>
    </div>
</div>
@endsection