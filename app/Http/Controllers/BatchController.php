<?php

namespace App\Http\Controllers;

use App\Models\batch;
use App\Models\product;
use App\Http\Controllers\Controller;
use App\Models\ActivityPrice;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = ActivityPrice::all();
        $products = Product::all();
        return view('admin.batch', compact('products', 'events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $events = ActivityPrice::all();
        $products = Product::all();
        $batches = Batch::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.batchlist', compact('products', 'events', 'batches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'batch' => 'required',
            'product' => 'required',
            'seate' => 'required',
            'start' => 'required',
            'end' => 'required',
            // 'actual_price' => 'required',
            // 'sale_price' => 'required',
        ]);
        $batch = new batch;
        $batch->product_id = $request->product;
        $batch->batch_name = $request->batch;
        $batch->start_date = $request->start;
        $batch->end_date = $request->end;
        $batch->batch_quantity = $request->seate;
        $batch->actual_price = $request->actual_price;
        $batch->sale_price = $request->sale_price;
        $batch->save();
        return redirect()->back()->with('success', 'Batch Added Successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(batch $batch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(batch $batches,$id)
    {
        $events = ActivityPrice::all();
        $batches=batch::findOrfail($id);
        $products=product::all();
        return view('admin.editbatch',compact('products','batches','events'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, batch $batch)
    {
        $batch = batch::find($request->id);
        $batch->product_id = $request->product;
        $batch->batch_name = $request->batch;
        $batch->start_date = $request->start;
        $batch->end_date = $request->end;
        $batch->batch_quantity = $request->seate;
        $batch->actual_price = $request->actual_price;
        $batch->sale_price = $request->sale_price;
        $batch->save();
        return redirect()->back()->with('success', 'Batch Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(batch $batch,$id)
    {
        $batch = batch::where('id', $id)->delete();
        return redirect()->route('batches.create');
    }
}
