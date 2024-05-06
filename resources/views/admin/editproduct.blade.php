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
                <form class="forms-sample" action="{{route('products.update',[$products->id])}}" method="POST"
                    enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PATCH">
                    @csrf
                    <input type="hidden" name="id" value="{{$products->id}}" />
                    <div class="form-group">
                        <label>Package<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="tpackage" id="subcat" value="{{$products->title}}"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Add Category<span style="color: red;">*</span></label>
                        <select name="category" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Add Subcategory<span style="color: red;">*</span></label>
                        <select name="subcat" class="form-control" required>
                            <option value="">Select Subcategory</option>
                            @foreach($subcategories as $subcategory)
                            <option value="{{$subcategory->id}}">{{$subcategory->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span style="color: red;"> @error('category') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Image<span style="color: red;">*</span></label>
                        <input type="file" class="form-control" name="timg" id="timg" value="{{$products->image}}"
                            required>
                    </div>
                    <div class="form-group">
                        <label>All Image<span style="color: red;">*</span></label>
                        <input type="file" class="form-control" name="image[]" multiple id="image" value="{{$products->image}}"
                            required>
                    </div>
                    <!-- <span style="color: red;"> @error('image') {{$message}} @enderror</span> -->
                    <div class="form-group">
                        <label>Price<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="price" id="price" value="{{$products->price}}"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Descount Price<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="dprice" id="dprice"
                            value="{{$products->discount_price}}" required>
                    </div>
                    <div class="form-group">
                        <label>Descripion<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="desc" id="desc" value="{{$products->description}}"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Short Description<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="sdesc" id="sdesc"
                            value="{{$products->short_description}}" required>
                    </div>
                    <div class="form-group">
                        <label>Rating<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="rating" id="rating" value="{{$products->rating}}"
                            required>
                    </div>
                    <!-- <span style="color: red;"> @error('catimg') {{$message}} @enderror</span> -->
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