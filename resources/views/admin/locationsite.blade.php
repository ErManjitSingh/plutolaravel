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
                <h4 class="card-title">Add Location Site</h4>
                <p class="card-description">
                    @if(session()->has('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
                @if(session()->has('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                </p>
                <form class="forms-sample" action="{{route('locationsites.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Add Country<span style="color: red;">*</span></label>
                        <select name="country" class="form-control" required>
                            <option value="">Select Country</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->country}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span style="color: red;"> @error('country') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Add State<span style="color: red;">*</span></label>
                        <select name="state" class="form-control" required>
                            <option value="">Select State</option>
                            @foreach($states as $state)
                            <option value="{{$state->id}}">{{$state->state}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span style="color: red;"> @error('state') {{$message}} @enderror</span>

                    <div class="form-group">
                        <label>Add District<span style="color: red;">*</span></label>
                        <select name="dist" class="form-control" required>
                            <option value="">Select District</option>
                            @foreach($districts as $district)
                            <option value="{{$district->id}}">{{$district->district}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span style="color: red;"> @error('dist') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Add City<span style="color: red;">*</span></label>
                        <select name="city" class="form-control" required>
                            <option value="">Select District</option>
                            @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->city}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span style="color: red;"> @error('city') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Add Location Site<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="lsite" id="lsite">
                    </div>
                    <span style="color: red;"> @error('lsite') {{$message}} @enderror</span>
                    <button type="submit" name="save" class="btn btn-primary mr-2">Submit</button>
                    <!-- <button class="btn btn-light">Cancel</button> -->
                </form>
            </div>
        </div>
    </div>
</div>
@endsection