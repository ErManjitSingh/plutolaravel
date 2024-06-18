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
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Activity Prices</h5>

                    <!-- Table with stripped rows -->
                    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                        <div class="datatable-top">
                            <div class="datatable-dropdown">
                                <label>
                                    <select class="datatable-selector" name="per-page">
                                        <option value="5">5</option>
                                        <option value="10" selected="">10</option>
                                        <option value="15">15</option>
                                        <option value="-1">All</option>
                                    </select> entries per page
                                </label>
                            </div>
                            <div class="datatable-search">
                                <input class="datatable-input" placeholder="Search..." type="search" name="search" title="Search within table">
                            </div>
                        </div>
                        <div class="datatable-container">
                            <table class="table">
                                @if(count($activityPrice)>0)
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Activity</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col">Actual Price</th>
                                        <th scope="col">Sale Price</th>
                                        <th scope="col">Discount Price</th>
                                        <th scope="col">Operations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($activityPrice as $actprice)
                                    <tr>
                                        <td> {{$actprice->id}} </td>
                                        <td> {{$actprice->product->title}} </td>
                                        <td> {{$actprice->start_date}} </td>
                                        <td> {{$actprice->end_date}} </td>
                                        <td> {{$actprice->actual_price}} </td>
                                        <td> {{$actprice->sale_price}}</td>
                                        <td> {{$actprice->discount_price}}</td>
                                        <td> <a href="{{route('activity_prices.edit',$actprice['id'])}}" class="btn btn-outline-secondary btn-icon-text"> <i class="bi bi-pen"></i></a>
                                            <a href="{{route('delete-price',$actprice['id'])}}" onclick="return confirm('Are You Sure Delete Category')" class="btn btn-outline-danger btn-icon-text">
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
                            {{$activityPrice->onEachSide(1)->links()}}
                            <!-- End Default Table Example -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection