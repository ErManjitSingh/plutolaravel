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
                <form class="forms-sample" action="{{route('activity_prices.update',[$events->id])}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PATCH">
                    @csrf
                    <input type="hidden" name="id" value="{{$events->id}}" />
                    <div class="form-group">
                        <label>Add Category<span style="color: red;">*</span></label>
                        <select name="product" class="form-control">
                            <option value="">Select Category</option>
                            @foreach($products as $product)
                            <option value="{{$product->id}}" {{($product->id==$events->product_id) ? 'selected' : ''}}>{{$product->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span style="color: red;"> @error('product') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Sater Date<span style="color: red;">*</span></label>
                        <input type="date" class="form-control" name="start_date" id="start" value="{{$events->start_date}}">
                    </div>
                    <span style="color: red;"> @error('start_date') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>End Date<span style="color: red;">*</span></label>
                        <input type="date" class="form-control" name="end_date" id="end" value="{{$events->end_date}}">
                    </div>
                    <span style="color: red;"> @error('end_date') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Actual Price<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="actual_price" id="price" value="{{$events->actual_price}}">
                    </div>
                    <span style="color: red;"> @error('actual_price') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Sale Price<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="sale_price" id="saleprice" value="{{$events->sale_price}}">
                    </div>
                    <span style="color: red;"> @error('sale_price') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Discount<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="discount_price" id="discount" value="{{$events->discount_price}}">
                    </div>
                    <span style="color: red;"> @error('discount_price') {{$message}} @enderror</span>
                    <button type="submit" name="save" id="savebtn" class="btn btn-primary mr-2">Submit</button>
                    <!-- <button class="btn btn-light">Cancel</button> -->
                </form>
            </div>
        </div>
    </div>
</div>
@endsection