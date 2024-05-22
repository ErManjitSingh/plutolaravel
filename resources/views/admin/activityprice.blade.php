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
                <h4 class="card-title">Add Activity Price</h4>
                <p class="card-description">
                    @if(session()->has('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
                @if(session()->has('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                </p>
                <form class="forms-sample" action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Add Activity<span style="color: red;">*</span></label>
                        <select name="category" class="form-control" required>
                            <option value="">Select Activity</option>
                            @foreach($products as $product)
                            <option value="{{$product->id}}">{{$product->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span style="color: red;"> @error('category') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Sater Date<span style="color: red;">*</span></label>
                        <input type="date" class="form-control" name="date" id="date" required>
                    </div>
                    <span style="color: red;"> @error('date') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>End Date<span style="color: red;">*</span></label>
                        <input type="date" class="form-control" name="enddate" id="enddate" required>
                    </div>
                    <span style="color: red;"> @error('enddate') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Actual Price<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="aprice" id="aprice" required>
                    </div>
                    <span style="color: red;"> @error('aprice') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Sale Price<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="sprice" id="sprice" required>
                    </div>
                    <span style="color: red;"> @error('sprice') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Discount<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="discount" id="discount" required>
                    </div>
                    <span style="color: red;"> @error('discount') {{$message}} @enderror</span>
                    <button type="submit" name="save" class="btn btn-primary mr-2">Submit</button>
                    <!-- <button class="btn btn-light">Cancel</button> -->
                </form>
            </div>
        </div>
    </div>
</div>
@endsection