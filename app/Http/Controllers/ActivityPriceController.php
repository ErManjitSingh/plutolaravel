<?php

namespace App\Http\Controllers;

use App\Models\ActivityPrice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

use function Ramsey\Uuid\v1;

class ActivityPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = array();
        $activityPrices = ActivityPrice::all();
        // return $activityPrices;
        foreach ($activityPrices as $activityPrice) {
            $events[] = [
                'id' => $activityPrice->id,
                'product' => $activityPrice->product_id,
                'statr' => $activityPrice->statr_date,
                'end' => $activityPrice->end_date,
                'actual_price' => $activityPrice->actual_price,
                'sale_price' => $activityPrice->sale_price,
                'discount_price' => $activityPrice->discount_price,
            ];
        }
        // return ($events);
        return view('admin.calendar', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $products = Product::all(); 
       $events = ActivityPrice::all();
       return view('admin.activityprice', compact('products','activityPrice'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(ActivityPrice $activityPrice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ActivityPrice $activityPrice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ActivityPrice $activityPrice)
    {
        //
    }
}
