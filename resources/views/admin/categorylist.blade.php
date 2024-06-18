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
                    <h5 class="card-title">Activity Category</h5>

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
                            <table class="table datatable datatable-table datatable-table datatable-table datatable-table datatable-table datatable-table">
                                @if(count($categories)>0)
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">State</th>
                                        <th scope="col">District</th>
                                        <th scope="col">City</th>
                                        <th scope="col">Location_Site</th>
                                        <th scope="col">Activity_Category</th>
                                        <th scope="col">Image</th>
                                        <!-- <th scope="col">created At</th>
                        <th scope="col">Updated At</th> -->
                                        <th scope="col">Operations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td> {{$category->id}} </td>
                                        <td> {{$category->country->country}} </td>
                                        <td> {{$category->state->state}} </td>
                                        <td> {{$category->district->district}} </td>
                                        <td> {{$category->city->city}} </td>
                                        <td> {{$category->location_site->location_site}}</td>
                                        <td> {{$category->title}} </td>
                                        <td> <img src="{{ asset('image/'. $category->image) }}" width="60px" height="40px"> </td>
                                        <!-- <td> {{$category->	created_at}} </td>
                        <td> {{$category->updated_at}} </td> -->
                                        <!-- <td> {{$category->status}} </td> -->
                                        <td><a href="{{route('categories.edit',$category['id'])}}" class="btn btn-outline-primary btn-icon-text">
                                        <i class="bi bi-pen"></i></a>
                                            <a href="{{route('delete-category',$category['id'])}}" onclick="return confirm('Are You Sure Delete Category')" class="btn btn-outline-danger btn-icon-text">
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

                        </div>
                        <div class="datatable-bottom">
                            <div class="datatable-info">Showing 1 to 10 of 100 entries</div>
                            <nav class="datatable-pagination">
                                {{$categories->onEachSide(1)->links()}}
                            </nav>
                        </div>
                    </div>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>

@endsection