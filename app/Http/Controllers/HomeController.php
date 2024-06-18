<?php

namespace App\Http\Controllers;

use App\Models\ActivityPrice;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Collection;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $categories = Category::count();
        // $subcategories = Subcategory::count();
        $events = ActivityPrice::all();
        $products = Product::latest()->take(5)->get();
        $categories = Category::latest()->take(5)->get();
        return view('admin.dashboard', compact('products', 'events','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.calendar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function calendar()
    {
        $events = array();
        $activityPrices = ActivityPrice::all();
        $products = Product::all();
        foreach ($activityPrices as $activityPrice) {
            $events[] = [
                'id' => $activityPrice->id,
                'product' => $activityPrice->product_id,
                'start' => $activityPrice->start_date,
                'end' => $activityPrice->end_date,
                'actual_price' => $activityPrice->actual_price,
                'sale_price' => $activityPrice->sale_price,
                'discount_price' => $activityPrice->discount_price,
            ];
        }
        // return ($events);
        return view('admin.calendar',compact('products'), ['events' => $events]);
    }
}
