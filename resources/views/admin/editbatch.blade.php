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
                <h4 class="card-title">Edit Subcategory</h4>
                <p class="card-description">
                    @if(session()->has('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
                @if(session()->has('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                </p>
                <form class="forms-sample" action="{{route('batches.update',[$batches->id])}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PATCH">
                    @csrf
                    <input type="hidden" name="id" value="{{$batches->id}}" />
                    <div class="form-group">
                        <label>Add Category<span style="color: red;">*</span></label>
                        <select name="product" class="form-control" >
                            <option value="">Select Category</option>
                            @foreach($products as $product)
                            <option value="{{$product->id}}" {{($product->id==$batches->product_id) ? 'selected' : ''}}>{{$product->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span style="color: red;"> @error('product') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Batch Name</label>
                        <input type="text" class="form-control" name="batch" id="batch" value="{{$batches->batch_name}}" >
                    </div>
                    <span style="color: red;"> @error('batch') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Start Date<span style="color: red;">*</span></label>
                        <input type="date" class="form-control" name="start" id="start"value="{{$batches->start_date}}">
                    </div>
                    <span style="color: red;"> @error('start') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>End Date<span style="color: red;">*</span></label>
                        <input type="date" class="form-control" name="end" id="end" value="{{$batches->end_date}}" >
                    </div>
                    <span style="color: red;"> @error('end') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Number Of Seates<span style="color: red;">*</span></label>
                        <input type="number" class="form-control" name="seate" id="seate" value="{{$batches->batch_quantity}}" >
                    </div>
                    <span style="color: red;"> @error('seate') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Actual Price</label>
                        <input type="text" class="form-control" name="actual price" id="actual price" value="{{$batches->actual_price}}"  >
                    </div>
                    <span style="color: red;"> @error('actual_price') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label>Sale Price</label>
                        <input type="text" class="form-control" name="sale_price" id="sale price"  value="{{$batches->sale_price}}"  >
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