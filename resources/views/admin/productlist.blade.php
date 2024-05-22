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
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Activity List</h5>
            <!-- Default Table -->
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Country</th>
                        <th>State</th>
                        <th>District</th>
                        <th>City</th>
                        <th>Location_Site</th>
                        <th>Activities</th>
                        <th>Activity_Category</th>
                        <!-- <th>Subcategory</th> -->
                        <!-- <th>Tour_Image</th> -->
                        <!-- <th>Price</th>
                        <th>Discount_price</th>
                        <th>Description</th>
                        <th>Short_Description</th>
                        <th>rating</th>
                        <th>Status</th> -->
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $pro)
                    <tr>
                        <td> {{$pro->id}} </td>
                        <td> {{$pro->country->country}} </td>
                        <td> {{$pro->state->state}} </td>
                        <td> {{$pro->district->district}} </td>
                        <td> {{$pro->city->city}} </td>
                        <td> {{$pro->location_site}}</td>
                        <td> {{$pro->title}} </td>
                        <td> {{$pro->category->title}}</td>
                        <!-- <td> <img src="{{ asset('image/'. $pro->image) }}" width="60px" height="40px"> </td> -->
                        <td><a href="{{route('products.edit',$pro['id'])}}" class="btn btn-outline-secondary btn-icon-text">Edit<i class="typcn typcn-edit  btn-icon-append"></i></a>
                            <a href="{{route('deleteproduct',$pro['id'])}}" onclick="return confirm('Are You Sure Delete Product')" class="btn btn-outline-danger btn-icon-text">Delete<i class="typcn typcn-upload btn-icon-prepend"></i></a>
                            <a href="{{route('calendar')}}" class="btn btn-outline-secondary btn-icon-text"><i class="bi bi-calendar"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              
            </table>
            <!-- End Default Table Example -->
        </div>
    </div>
</div>

@endsection