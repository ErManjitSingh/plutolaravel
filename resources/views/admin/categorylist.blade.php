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
            <h5 class="card-title">category List</h5>
            <!-- Default Table -->
            <table class="table">
                @if(count($categories)>0)
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Country</th>
                        <th scope="col">State</th>
                        <th scope="col">District</th>
                        <th scope="col">City</th>
                        <th scope="col">Activity Category</th>
                        <th scope="col">Image</th>
                        <!-- <th scope="col">Status</th> -->
                        <th scope="col">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td> {{$category->id}} </td>
                        <td> {{$category->country}} </td>
                        <td> {{$category->state}} </td>
                        <td> {{$category->district}} </td>
                        <td> {{$category->city}} </td>
                        <td> {{$category->title}}</td>
                        <td> <img src="{{ asset('image/'. $category->image) }}" width="60px" height="40px"> </td>
                        <!-- <td> {{$category->status}} </td> -->
                        <td> <a href="{{route('categories.edit',$category['id'])}}" class="btn btn-outline-secondary btn-icon-text">Edit
                                <i class="typcn typcn-edit  btn-icon-append"></i></a>
                            <a href="{{route('delete-category',$category['id'])}}" onclick="return confirm('Are You Sure Delete Category')"
                                class="btn btn-outline-danger btn-icon-text">Delete
                                <i class="typcn typcn-upload btn-icon-prepend"></i>
                            </a>
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