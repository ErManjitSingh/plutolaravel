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
                <h4 class="card-title">Add State</h4>
                <p class="card-description">
                    @if(session()->has('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
                @if(session()->has('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                </p>
                <form class="forms-sample" action="{{route('states.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Add Country<span style="color: red;">*</span></label>
                        <select name="country" class="form-control" required>
                            <option>Select Country</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->country}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Add State<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="state" id="state">
                    </div>
                    <span style="color: red;"> @error('state') {{$message}} @enderror</span>
                    <button type="submit" name="save" class="btn btn-primary mr-2">Submit</button>
                    <!-- <button class="btn btn-light">Cancel</button> -->
                </form>
            </div>
        </div>
    </div>
</div>
@endsection