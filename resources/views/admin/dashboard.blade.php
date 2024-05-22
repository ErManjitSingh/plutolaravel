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
                    <!-- <div class="col-12">
                        <div class="card top-selling overflow-auto">
                            <div class="card-body pb-0">
                                <h5 class="card-title">Recent Activities</h5>

                                <table class="table table-borderless">
                                    <thead>
                                        <th>Activiies Image</th>
                                        <th>Activiies Name</th>
                                        <th> Actual Price</th>
                                        <th> Sale Price</th>
                                    </thead>

                                    <tbody>
                                        @foreach($products as $pro)
                                        <tr>
                                            <td scope="row"><img src="{{ asset('image/'. $pro->image) }}"></td>
                                            <td class="text-primary fw-bold">{{$pro->title}}</td>
                                            <td>{{$pro->price}}</td>
                                            <td>{{$pro->discount_price}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div> -->
                    <!-- End Top Selling -->

                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->

    </section>
</div>




@endsection