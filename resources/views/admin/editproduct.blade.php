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
                <h4 class="card-title">Edit Activities</h4>
                <p class="card-description">
                    @if(session()->has('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
                @if(session()->has('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                </p>
                <form class="forms-sample" action="{{route('products.update',[$products->id])}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PATCH">
                    @csrf
                    <div class="form-group">
                        <label>Add Country<span style="color: red;">*</span></label>
                        <select name="country" class="form-control">
                            <option value="">Select Country</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}" {{($country->id==$products->country_id) ? 'selected' : ''}}>{{$country->country}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span style="color: red;"> @error('country') {{$message}} @enderror</span>

                    <div class="form-group">
                        <label>Add State<span style="color: red;">*</span></label>
                        <select name="state" class="form-control">
                            <option value="">Select State</option>
                            @foreach($states as $state)
                            <option value="{{$state->id}}">{{$state->state}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span style="color: red;"> @error('state') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Add District<span style="color: red;">*</span></label>
                        <select name="dist" class="form-control">
                            <option value="">Select District</option>
                            @foreach($districts as $district)
                            <option value="{{$district->id}}">{{$district->district}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span style="color: red;"> @error('dist') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Add City<span style="color: red;">*</span></label>
                        <select name="city" class="form-control">
                            <option value="">Select City</option>
                            @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->city}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span style="color: red;"> @error('city') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Location site</label>
                        <select name="lsite" class="form-control">
                            <option value="">Select Location site</option>
                            @foreach($locationsites as $location)
                            <option value="{{$location->id}}">{{$location->location_site}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span style="color: red;"> @error('lsite') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Acitivity Category<span style="color: red;">*</span></label>
                        <select name="category" class="form-control">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span style="color: red;"> @error('category') {{$message}} @enderror</span>
                    <input type="hidden" name="id" value="{{$products->id}}" />
                    <div class="form-group">
                        <label>Activities<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="actitity" id="subcat" value="{{$products->title}}">
                    </div>
                    <div class="form-group">
                        <label>Acitivity Image<span style="color: red;">*</span></label>
                        <input type="file" class="form-control" name="actimg" id="actimg" value="{{$products->image}}">
                        <img class="mt-1" src="{{asset('image/'. $products->image)}} " width="100px" height="70" />
                    </div>
                    <!-- <div class="form-group">
                        <label>Acitivity Price<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="price" value="{{$products->price}}" id="price">
                    </div>
                    <span style="color: red;"> @error('price') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Acitivity Discount Price<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="dprice" value="{{$products->discount_price}}" id="dprice">
                    </div>
                    <span style="color: red;"> @error('dprice') {{$message}} @enderror</span> -->
                    <div class="form-group">
                        <label>All Acitivity Image<span style="color: red;">*</span></label>
                        <input type="file" class="form-control" name="allimage[]" multiple id="image" value="{{$products->image}}">
                        @foreach($images as $image)
                        <img class="mt-1" src="{{asset('/'. $image->image)}}" width="100px" height="70" />
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label>Descripion<span style="color: red;">*</span></label>
                        <textarea class="form-control" name="desc" id="editor">{{$products->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Short Description<span style="color: red;">*</span></label>
                        <textarea class="form-control" name="sdesc" id="Eeditor">{{$products->short_description}}</textarea>
                    </div>
                    <div class="form-group pb-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
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