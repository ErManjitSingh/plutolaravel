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
            <h5 class="card-title">Countries List</h5>
            <!-- Default Table -->
            <table class="table">
                @if(count($images)>0)
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">image</th>
                        <th scope="col">product_id</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($images as $image)
                    <tr>
                        <td> {{$image->id}} </td>
                        <td> <img src="{{asset('/'. $image->image)}}" width="50px" height="30px"></td>                        
                        <td> {{$image->product_id}}</td>                        
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