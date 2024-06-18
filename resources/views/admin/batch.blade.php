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
                <h4 class="card-title">Add New Batch</h4>
                <p class="card-description">
                    @if(session()->has('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
                @if(session()->has('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                </p>
                <form class="forms-sample" action="{{route('batches.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Add Category<span style="color: red;">*</span></label>
                        <select name="product" class="form-control" >
                            <option value="">Select Category</option>
                            @foreach($products as $product)
                            <option value="{{$product->id}}">{{$product->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span style="color: red;"> @error('product') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Batch Name</label>
                        <input type="text" class="form-control" name="batch" id="batch" >
                    </div>
                    <span style="color: red;"> @error('batch') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Start Date<span style="color: red;">*</span></label>
                        <input type="date" class="form-control" name="start" id="start" >
                    </div>
                    <span style="color: red;"> @error('start') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>End Date<span style="color: red;">*</span></label>
                        <input type="date" class="form-control" name="end" id="end" >
                    </div>
                    <span style="color: red;"> @error('end') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Number Of Seates<span style="color: red;">*</span></label>
                        <input type="number" class="form-control" name="seate" id="seate" >
                    </div>
                    <span style="color: red;"> @error('seate') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Actual Price</label>
                        <input type="text" class="form-control" name="actual price" id="actual price" >
                    </div>
                    <span style="color: red;"> @error('actual_price') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Sale Price</label>
                        <input type="text" class="form-control" name="sale_price" id="sale price" >
                    </div>
                    <span style="color: red;"> @error('sale price') {{$message}} @enderror</span>
                    <button type="submit" name="save" class="btn btn-primary mr-2">Submit</button>
                    <!-- <button class="btn btn-light">Cancel</button> -->
                </form>
            </div>
        </div>
    </div>
</div>
@endsection