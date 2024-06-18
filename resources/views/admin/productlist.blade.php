@extends('admin.app')
@section('content')
<div class="row">
    <div class="pagetitle col-md-8">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <div class="search-bar col-md-4 mt-2 ">
        <form class="search-form d-flex align-items-center" method="get" action="#">
            <input class="p-1" type="text" name="query" placeholder="Search..." title="Enter search keyword" value="{{$search}}">
            <button class="p-1" type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div>
</div>
<!-- End Search Bar -->
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Activity Category</h5>

                    <!-- Table with stripped rows -->
                    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">

                        <div class="datatable-container">
                            <table class="table datatable datatable-table datatable-table datatable-table datatable-table datatable-table datatable-table">
                                @if(count($products)>0)
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
                                        <td> {{$pro->location_site->location_site}}</td>
                                        <td> {{$pro->title}} </td>
                                        <td> {{$pro->category->title}}</td>
                                        <!-- <td> <img src="{{ asset('image/'. $pro->image) }}" width="60px" height="40px"> </td> -->
                                        <td><a href="{{route('products.edit',$pro['id'])}}" class="btn btn-outline-secondary btn-icon-text"> <i class="bi bi-pen"></i></a>
                                            <a href="{{route('deleteproduct',$pro['id'])}}" onclick="return confirm('Are You Sure Delete Product')" class="btn btn-outline-danger btn-icon-text"><i class="bi bi-trash"></i></a>
                                            <a href="{{route('calendar')}}" class="btn btn-outline-primary btn-icon-text"><i class="bi bi-calendar"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                @else
                                <h1>No Found Data</h1>
                                @endif
                            </table>
                        </div>
                        <div class="datatable-bottom">
                            <div class="datatable-info">Showing 1 to 10 of 100 entries</div>
                            <nav class="datatable-pagination">
                                {{$products->onEachSide(1)->links()}}
                            </nav>
                        </div>
                    </div>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>
@endsection