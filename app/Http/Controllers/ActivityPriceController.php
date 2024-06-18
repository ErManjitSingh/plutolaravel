<?php

namespace App\Http\Controllers;

use App\Models\ActivityPrice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\District;
use App\Models\Category;
class ActivityPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $events = ActivityPrice::all();
        return view('admin.activityprice', compact('products', 'events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $events = ActivityPrice::all();
        $activityPrice = ActivityPrice::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pricelist', compact('products', 'activityPrice','events'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'actual_price' => 'required',
            'sale_price' => 'required',
            'discount_price' => 'required',
        ]);
        $activityPrice = new ActivityPrice();
        $activityPrice->product_id = $request->product_id;
        $activityPrice->start_date = $request->start_date;
        $activityPrice->end_date = $request->end_date;
        $activityPrice->actual_price = $request->actual_price;
        $activityPrice->sale_price = $request->sale_price;
        $activityPrice->discount_price = $request->discount_price;
        $activityPrice->save();
        session()->flash('success', 'Price added successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(ActivityPrice $activityPrice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ActivityPrice  $events,$id)
    {
        $events = ActivityPrice::findOrfail($id);
        $categories = Category::all();
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        $products = Product::all();
        $districts = District::all();
        $locationsites = District::all();
        return view('admin.editactivityprice', compact('categories', 'countries', 'states', 'cities', 'districts', 'locationsites', 'events','products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ActivityPrice $activityPrice)
    {
         $activityPrice = ActivityPrice::find($request->id);
         $activityPrice->product_id = $request->product;
         $activityPrice->start_date = $request->start_date;
         $activityPrice->end_date = $request->end_date;
         $activityPrice->actual_price = $request->actual_price;
         $activityPrice->sale_price = $request->sale_price;
         $activityPrice->discount_price = $request->discount_price;
         $activityPrice->save();
        return redirect()->back()->with('success', 'Calendar Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ActivityPrice $activityPrice,$id)
    {
        $activityPrice = ActivityPrice::where('id', $id)->delete();
        return redirect()->route('activity_prices.create');
    }
}
