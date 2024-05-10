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
            <h5 class="card-title">Pacakges List</h5>
            <!-- Default Table -->
            <table class="table">
                @if(count($subcategories)>0)
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Activities</th>
                        <th scope="col">Category</th>
                        <!-- <th scope="col">Subcategory</th> -->
                        <th scope="col">Tour_Image</th>
                        <!-- <th scope="col">Price</th>
                        <th scope="col">Discount_price</th>
                        <th scope="col">Description</th>
                        <th scope="col">Short_Description</th>
                        <th scope="col">rating</th>
                        <th scope="col">Status</th> -->
                        <th scope="col">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $pro)
                    <tr>
                        <td> {{$pro->id}} </td>
                        <td> {{$pro->title}} </td>
                        <td> {{$pro->category->title}} </td>
                        <!-- <td> {{$pro->subcategory->title}} </td>     -->
                        <td> <img src="{{ asset('image/'. $pro->image) }}" width="60px" height="40px"> </td>
                        <td><a href="{{route('products.edit',$pro['id'])}}" class="btn btn-outline-secondary btn-icon-text">Edit<i class="typcn typcn-edit  btn-icon-append"></i></a>
                            <a href="{{route('deleteproduct',$pro['id'])}}" onclick="return confirm('Are You Sure Delete Product')" class="btn btn-outline-danger btn-icon-text">Delete<i class="typcn typcn-upload btn-icon-prepend"></i></a>
                            <a href="{{route('calendar')}}" class="btn btn-outline-secondary btn-icon-text"><i class="bi bi-calendar"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                @else
                <h1>No Found Data</h1>
                @endif
            </table>
            <!-- End Default Table Example -->
        </div>
    </div>
</div>

@endsection