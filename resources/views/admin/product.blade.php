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
                <h4 class="card-title">Add Packages</h4>
                <p class="card-description">
                    @if(session()->has('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
                @if(session()->has('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                </p>
                <form class="forms-sample" action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Tour Package<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="tpackage" id="tpackage" required>
                    </div>
                    <span style="color: red;"> @error('tpackage') {{$message}} @enderror</span>
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
                        <label>Add Subcategory<span style="color: red;">*</span></label>
                        <select name="subcat" class="form-control" required>
                            <option value="">Select Subcategory</option>
                            @foreach($subcategories as $subcat)
                            <option value="{{$subcat->id}}">{{$subcat->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span style="color: red;"> @error('subcat') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Tour Image<span style="color: red;">*</span></label>
                        <input type="file" class="form-control" name="timg" id="timg" required>
                    </div>
                    <span style="color: red;"> @error('timg') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>All Images<span style="color: red;">*</span></label>
                        <input type="file" class="form-control" name="image[]" id="image" multiple required>
                    </div>
                    <span style="color: red;"> @error('image') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Price<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="price" id="price" required>
                    </div>
                    <span style="color: red;"> @error('price') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Discount Price<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="dprice" id="dprice" required>
                    </div>
                    <span style="color: red;"> @error('dprice') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Description<span style="color: red;">*</span></label>
                        <textarea type="text" class="form-control" name="desc" id="editor" required></textarea>
                    </div>
                    <span style="color: red;"> @error('desc') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Short Description<span style="color: red;">*</span></label>
                        <textarea type="text" class="form-control" name="sdesc" id="sdesc" required></textarea>
                    </div>
                    <span style="color: red;"> @error('sdesc') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Rating<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="rating" id="rating" required>
                    </div>
                    <span style="color: red;"> @error('rating') {{$message}} @enderror</span>
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