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
    <div class="col-md-9 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Subcategory</h4>
                <p class="card-description">
                    @if(session()->has('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
                @if(session()->has('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                </p>
                <form class="forms-sample" action="{{route('subcategories.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Add Category<span style="color: red;">*</span></label>
                        <select name="category" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span style="color: red;"> @error('category') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Add Country<span style="color: red;">*</span></label>
                        <select name="country" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->country}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span style="color: red;"> @error('country') {{$message}} @enderror</span>

                    <div class="form-group">
                        <label>Add State<span style="color: red;">*</span></label>
                        <select name="state" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->state}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span style="color: red;"> @error('state') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Add District<span style="color: red;">*</span></label>
                        <select name="dist" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->district}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span style="color: red;"> @error('dist') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Add City<span style="color: red;">*</span></label>
                        <select name="city" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->city}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span style="color: red;"> @error('city') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>SubCategory<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="subcat" id="subcat" required>
                    </div>
                    <span style="color: red;"> @error('subcat') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Subcategory Image<span style="color: red;">*</span></label>
                        <input type="file" class="form-control" name="catimg" id="catimg" required>
                    </div>
                    <span style="color: red;"> @error('catimg') {{$message}} @enderror</span>
                    <div class="form-group pb-3">
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" name="save" class="btn btn-primary mr-2">Submit</button>
                    <!-- <button class="btn btn-light">Cancel</button> -->
                </form>
            </div>
        </div>
    </div>
</div>
@endsection