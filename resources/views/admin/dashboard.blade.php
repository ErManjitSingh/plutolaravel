@extends('admin.app')

@section('content')
<div class="container-fluid">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Top Selling -->
                    <div class="col-5">
                        <div class="card top-selling overflow-auto">
                            <div class="card-body pb-0">
                                <h5 class="card-title">Recent Activities</h5>

                                <table class="table table-borderless">
                                    <thead>
                                        <th>Activiies Image</th>
                                        <th>Activiies Name</th>
                                        <th>Activiies Category</th>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $pro)
                                        <tr>
                                            <td scope="row"><img src="{{ asset('image/'. $pro->image) }}" width="150" height="50"></td>
                                            <td class="text-primary fw-bold">{{$pro->title}}</td>
                                            <td> {{$pro->category->title}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>
                    <!-- End Top Selling -->
                    <div class="col-6">
                        <div class="card top-selling overflow-auto">
                            <div class="card-body pb-0">
                                <h5 class="card-title">Recent Category Activities</h5>
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <!-- <th scope="col">Id</th>
                                            <th scope="col">Country</th>
                                            <th scope="col">State</th>
                                            <th scope="col">District</th>
                                            <th scope="col">City</th>
                                            <th scope="col">Location_Site</th> -->
                                            <th scope="col">Activity_Category</th>
                                            <th scope="col">Image</th>
                                            <!-- <th scope="col">Operations</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $category)
                                        <tr>
                                            <!-- <td> {{$category->id}} </td>
                                            <td> {{$category->country->country}} </td>
                                            <td> {{$category->state->state}} </td>
                                            <td> {{$category->district->district}} </td>
                                            <td> {{$category->city->city}} </td>
                                            <td> {{$category->location_site_id}}</td> -->
                                            <td> {{$category->title}} </td>
                                            <td> <img src="{{ asset('image/'. $category->image) }}"  width="150" height="50"> </td>
                                            <!-- <td> {{$category->status}} </td> -->
                                            <!-- <td> <a href="{{route('categories.edit',$category['id'])}}" class="btn btn-outline-secondary btn-icon-text">Edit
                                <i class="typcn typcn-edit  btn-icon-append"></i></a>
                            <a href="{{route('delete-category',$category['id'])}}" onclick="return confirm('Are You Sure Delete Category')"
                                class="btn btn-outline-danger btn-icon-text">Delete
                                <i class="typcn typcn-upload btn-icon-prepend"></i>
                            </a> -->
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>

                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->

    </section>
</div>




@endsection