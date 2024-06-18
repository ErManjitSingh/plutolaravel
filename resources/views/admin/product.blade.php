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
                <form class="row g-3" action="{{route('product-store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Country<span style="color: red;">*</span></label>
                        <select id="inputState" name="country" class="form-select">
                            <option>Choose...</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->country}}</option>
                            @endforeach
                        </select>
                        <span style="color: red;"> @error('country') {{$message}} @enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">State<span style="color: red;">*</span></label>
                        <select id="inputState" name="state" class="form-select">
                            <option>Choose...</option>
                            @foreach($states as $state)
                            <option value="{{$state->id}}">{{$state->state}}</option>
                            @endforeach
                        </select>
                        <span style="color: red;"> @error('state') {{$message}} @enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">District<span style="color: red;">*</span></label>
                        <select id="inputState" name="dist" class="form-select">
                            <option>Choose...</option>
                            @foreach($districts as $district)
                            <option value="{{$district->id}}">{{$district->district}}</option>
                            @endforeach
                        </select>
                        <span style="color: red;"> @error('dist') {{$message}} @enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">City<span style="color: red;">*</span></label>
                        <select id="inputState" name="city" class="form-select">
                            <option>Choose...</option>
                            @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->city}}</option>
                            @endforeach
                        </select>
                        <span style="color: red;"> @error('city') {{$message}} @enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Location Site<span style="color: red;">*</span></label>
                        <select id="inputState" name="lsite" class="form-select">
                            <option>Choose...</option>
                            @foreach($locationsites as $locationsite)
                            <option value="{{$locationsite->id}}">{{$locationsite->location_site}}</option>
                            @endforeach
                        </select>
                        <span style="color: red;"> @error('lsite') {{$message}} @enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label>Acitivity Category<span style="color: red;">*</span></label>
                        <select name="category" class="form-control">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                        <span style="color: red;"> @error('category') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label>Acitivity Name<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="actitity" id="actitity">
                        <span style="color: red;"> @error('actitity') {{$message}} @enderror</span>
                    </div>

                    <!-- <div class="form-group">
                        <label>Acitivity Price<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="price" id="price">
                    </div>
                    <span style="color: red;"> @error('price') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Acitivity Discount Price<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="dprice" id="dprice">
                    </div>
                    <span style="color: red;"> @error('dprice') {{$message}} @enderror</span> -->
                    <div class="form-group">
                        <label>Activity Image<span style="color: red;">*</span></label>
                        <input type="file" class="form-control" name="actimg" id="actimg">
                    </div>
                    <span style="color: red;"> @error('actimg') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>All Activities Images<span style="color: red;">*</span></label>
                        <input type="file" class="form-control" name="allimage[]" id="allimage" multiple>
                    </div>
                    <span style="color: red;"> @error('allimage') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="desc" id="editor" class="form-control" ></textarea>
                    </div>
                    <span style="color: red;"> @error('desc') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Short Description<span style="color: red;">*</span></label>
                        <textarea type="text" class="form-control" name="sdesc" id="editor1"></textarea>
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



<!-- 
<div class="row">
    <div class="col-md-10 grid-margin stretch-card" style="margin: auto;">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add Activities Category</h5>
                <p class="card-description">
                    @if(session()->has('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
                @if(session()->has('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                </p>
                <form class="row g-3" action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Country<span>*</span></label>
                        <select id="inputState" name="country" class="form-select">
                            <option>Choose...</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->country}}</option>
                            @endforeach
                        </select>
                        <span style="color: red;"> @error('country') {{$message}} @enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">State</label>
                        <select id="inputState" name="state" class="form-select">
                            <option>Choose...</option>
                            @foreach($states as $state)
                            <option value="{{$state->id}}">{{$state->state}}</option>
                            @endforeach
                        </select>
                        <span style="color: red;"> @error('state') {{$message}} @enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">District</label>
                        <select id="inputState" name="dist" class="form-select">
                            <option>Choose...</option>
                            @foreach($districts as $district)
                            <option value="{{$district->id}}">{{$district->district}}</option>
                            @endforeach
                        </select>
                        <span style="color: red;"> @error('dist') {{$message}} @enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">City</label>
                        <select id="inputState" name="city" class="form-select">
                            <option>Choose...</option>
                            @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->city}}</option>
                            @endforeach
                        </select>
                        <span style="color: red;"> @error('city') {{$message}} @enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Location Site</label>
                        <select id="inputState" name="lsite" class="form-select">
                            <option>Choose...</option>
                            @foreach($locationsites as $locationsite)
                            <option value="{{$locationsite->id}}">{{$locationsite->location_site}}</option>
                            @endforeach
                        </select>
                        <span style="color: red;"> @error('lsite') {{$message}} @enderror</span>
                    </div>
                    <div class="col-4">
                        <label for="inputAddress2" class="form-label">Activity Category</label>
                        <input type="text" class="form-control" name="category" id="inputAddress2" placeholder="Enter Category">
                        <span style="color: red;"> @error('category') {{$message}} @enderror</span>
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Image</label>
                        <input type="file" class="form-control" name="catimg" id="inputCity">
                        <span style="color: red;"> @error('catimg') {{$message}} @enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Status</label>
                        <select id="inputState" class="form-select">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" name="save" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div> -->


@endsection