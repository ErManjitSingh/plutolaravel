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
            <h5 class="card-title">Batches List</h5>
            <!-- Default Table -->
            <table class="table">
                @if(count($batches)>0)
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Batch</th>
                        <th scope="col">Activity Name</th>
                        <!-- <th scope="col">Number Of Seates</th> -->
                        <th scope="col">Start Batch</th>
                        <th scope="col">End Batch</th>
                        <th scope="col">Actual Price</th>
                        <th scope="col">Sale Price</th>
                        <th scope="col">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($batches as $batch)
                    <tr>
                        <td> {{$batch->id}} </td>
                        <td> {{$batch->batch_name}} </td>
                        <td> {{$batch->product->title}} </td>
                        <!-- <td> {{$batch->batch_quantity}} </td> -->
                        <td> {{$batch->start_date}} </td>
                        <td> {{$batch->end_date}} </td>
                        <td> {{$batch-> actual_price}} </td>
                        <td> {{$batch->sale_price}} </td>
                        <td> <a href="{{route('batches.edit',$batch['id'])}}" class="btn btn-outline-secondary btn-icon-text"> <i class="bi bi-pen"></i></a>
                            <a href="{{route('deletebatch',$batch['id'])}}" onclick="return confirm('Are You Sure Delete Subcategory')" class="btn btn-outline-danger btn-icon-text">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                @else
                <h1>No Found Data</h1>
                @endif
            </table>
            {{$batches->onEachSide(1)->links()}}
            <!-- End Default Table Example -->
        </div>
    </div>
</div>
@endsection