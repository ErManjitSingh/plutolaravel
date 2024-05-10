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
<div class="container-flude">
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h2 class="text-center">Calendar</h2>
                <div class="text-right mr-3"><a href="#">
                        <h4> Acitivity price</h4>
                    </a></div>
                <div class="col-md-11 offset-1 ">
                    <div id='calendar'>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection