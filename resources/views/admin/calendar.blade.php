@extends('admin.app')
@section('content')
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="price" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="pri" aria-describedby="emailHelp" placeholder="Enter price">
            <label for="price">Currency</label>
            <input type="text" class="form-control" id="currency" aria-describedby="emailHelp" placeholder="Enter currency">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
            <!-- <li class="breadcrumb-item active">fgsd</li>
            <li class="breadcrumb-item active">fgsd</li> -->
        </ol>
    </nav>
</div>
<div class="container-flude">
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h2 class="text-center">Calendar</h2>
                <div class="text-right mr-3 mb-3"><a href="{{route('activity_prices.index')}}" id="price" class="btn btn-primary">
                        Acitivity price
                    </a></div>
                <div class="col-md-11 offset-1 ">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection