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
                <h4 class="card-title">Edit Category</h4>
                <p class="card-description">
                    @if(session()->has('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
                @if(session()->has('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                </p>
                <form class="forms-sample" action="{{route('categories.update',[$categories->id])}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PATCH">
                    @csrf
                    <input type="hidden" name="id" value="{{$categories->id}}" />
                    <div class="form-group">
                        <label>Add Country<span style="color: red;">*</span></label>
                        <select name="country" class="form-control">
                            <option value="">Select Category</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}" {{($country->id==$categories->country_id) ? 'selected' : ''}}>{{$country->country}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span style="color: red;"> @error('country') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Add State<span style="color: red;">*</span></label>
                        <select name="state" class="form-control">
                            <option value="">Select Category</option>
                            @foreach($states as $state)
                            <option value="{{$state->id}}">{{$state->state}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span style="color: red;"> @error('state') {{$message}} @enderror</span>

                    <div class="form-group">
                        <label>Add District<span style="color: red;">*</span></label>
                        <select name="dist" class="form-control">
                            <option value="">Select Category</option>
                            @foreach($districts as $distcict)
                            <option value="{{$distcict->id}}">{{$distcict->district}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span style="color: red;"> @error('dist') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Add City<span style="color: red;">*</span></label>
                        <select name="city" class="form-control">
                            <option value="">Select Category</option>
                            @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->city}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span style="color: red;"> @error('city') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Location Site<span style="color: red;">*</span></label>
                        <select name="lsite" class="form-control">
                            <option value="">Select Category</option>
                            @foreach($locationsites as $location)
                            <option value="{{$location->id}}">{{$location->location_site}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span style="color: red;"> @error('lsite') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Add Category<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="category" id="category" value="{{$categories->title}}" >
                    </div>
                    <span style="color: red;"> @error('category') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Category Image<span style="color: red;">*</span></label>
                        <input type="file" class="form-control" name="catimg" id="catimg" value="{{asset('image/'.$categories->image)}}">
                        @if(!empty('image/'.$categories->image))
                        <img class="mt-1" src="{{asset('image/'. $categories->image)}} " alt="Activity Image" width="100px" height="70" />
                        @endif
                    </div>
                    <div class="form-group pb-3">
                        <label>Status</label>
                        <select name="status" class="form-control" >
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