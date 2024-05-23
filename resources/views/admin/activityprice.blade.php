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
                        <select name="product_id" class="form-control" required>
                            <option value="">Select Activity</option>
                            @foreach($products as $product)
                            <option value="{{$product->id}}">{{$product->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span style="color: red;"> @error('category') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Sater Date<span style="color: red;">*</span></label>
                        <input type="date" class="form-control" name="statr_date" id="statr_date" required>
                    </div>
                    <span style="color: red;"> @error('statr_date') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>End Date<span style="color: red;">*</span></label>
                        <input type="date" class="form-control" name="end_date" id="end_date" required>
                    </div>
                    <span style="color: red;"> @error('end_date') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Actual Price<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="actual_price" id="actual_price" required>
                    </div>
                    <span style="color: red;"> @error('actual_price') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Sale Price<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="sale_price" id="sale_price" required>
                    </div>
                    <span style="color: red;"> @error('sale_price') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Discount<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="discount_price" id="discount_price" required>
                    </div>
                    <span style="color: red;"> @error('discount_price') {{$message}} @enderror</span>
                    <button type="submit" name="save" class="btn btn-primary mr-2">Submit</button>
                    <!-- <button class="btn btn-light">Cancel</button> -->
                </form>
            </div>
        </div>
    </div>
</div>
@endsection