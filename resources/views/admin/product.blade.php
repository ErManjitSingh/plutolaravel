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
                <h4 class="card-title">Add Activities</h4>
                <p class="card-description">
                    @if(session()->has('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
                @if(session()->has('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                </p>
                <form class="forms-sample" action="{{route('product-store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Add Country<span style="color: red;">*</span></label>
                        <select name="country" class="form-control">
                            <option value="">Select Country</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->country}}</option>
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
                    <div class="form-group">
                        <label>Acitivity Name<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="actitity" id="actitity">
                    </div>
                    <span style="color: red;"> @error('actitity') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Activity Image<span style="color: red;">*</span></label>
                        <input type="file" class="form-control" name="actimg" id="actimg">
                    </div>
                    <span style="color: red;"> @error('actimg') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>All Activities Images<span style="color: red;">*</span></label>
                        <input type="file" class="form-control" name="image[]" id="image" multiple>
                    </div>
                    <span style="color: red;"> @error('image') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Description<span style="color: red;">*</span></label>
                        <textarea type="text" class="form-control" name="desc" id="text-editor"></textarea>
                    </div>
                    <span style="color: red;"> @error('desc') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Short Description<span style="color: red;">*</span></label>
                        <textarea type="text" class="form-control" name="sdesc" id="text-editor"></textarea>
                    </div>
                    <span style="color: red;"> @error('sdesc') {{$message}} @enderror</span>
                    <div class="form-group pb-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
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