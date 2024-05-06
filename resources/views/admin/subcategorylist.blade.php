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
            <h5 class="card-title">subcategory List</h5>
            <!-- Default Table -->
            <table class="table">
                @if(count($subcategories)>0)
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Category</th>
                        <th scope="col">Subcategory</th>
                        <th scope="col">Image</th>
                        <!-- <th scope="col">Status</th> -->
                        <th scope="col">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subcategories as $subcat)
                    <tr>
                        <td> {{$subcat->id}} </td>
                        <td> {{$subcat->category->title}} </td>
                        <td> {{$subcat->title}} </td>
                        <td> <img src="{{ asset('image/'. $subcat->image) }}" width="60px" height="40px"> </td>
                        <td> <a href="{{route('subcategories.edit',$subcat['id'])}}" class="btn btn-outline-secondary btn-icon-text">Edit
                                <i class="typcn typcn-edit  btn-icon-append"></i></a>
                            <a href="{{route('deletesubcategory',$subcat['id'])}}" onclick="return confirm('Are You Sure Delete Subcategory')" class="btn btn-outline-danger btn-icon-text">Delete
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