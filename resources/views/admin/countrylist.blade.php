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
                @if(count($countries)>0)
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Country</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($countries as $country)
                    <tr>
                        <td> {{$country->id}} </td>
                        <td> {{$country->country}} </td>                        
                    </tr>
                    @endforeach
                </tbody>
                @else
                <h1>No Found Data</h1>
                @endif
            </table>
            {{$countries->onEachSide(1)->links()}}
            <!-- End Default Table Example -->
        </div>
    </div>
</div>

@endsection