<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $subcategories = Subcategory::paginate('10');
        return view('admin.subcategory', compact('subcategories', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = Subcategory::all();
        $categories = Category::all();
        return view('admin.subcategorylist',compact('categories','subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'subcat' => 'required',
            'catimg' => 'required',
        ]);
        $subcategory = Subcategory::where('title', $request->subcat)->first();
        if ($subcategory == null) {
            //    if(isset($request->images)){
            $imageName = time() . '.' . $request->catimg->extension();
            $request->catimg->move(public_path('image'), $imageName);
            // };
            $subcategory = new subcategory;
            $subcategory->title = $request->subcat;
            $subcategory->category_id = $request->category;
            $subcategory->image = $imageName;
            $subcategory->status = $request->status;
            $subcategory->slug = Str::slug($request->subcat);
            $subcategory->save();
            session()->flash('success', 'new subcategory added successfully');
            return redirect()->back();
        }
        session()->flash('error', 'subcategory already exist');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategories,$id)
    {
        $subcategories=Subcategory::findOrfail($id);
        $categories=Category::all();
        return view('admin.editsubcategory',compact('categories','subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,)
    {
        $request->validate([
            'category' => 'required',
            'subcat' => 'required'
        ]);
        $imageName = time() . '.' . $request->catimg->extension();
        $request->catimg->move(public_path('image'), $imageName);
        $subcategories = Subcategory::find($request->id);
        $subcategories->category_id = $request->category;
        $subcategories->title = $request->subcat;
        // $subcategories->image = $request->catimg;
        $subcategories->image = $imageName;
        $subcategories->status = $request->status;
        $subcategories->slug = Str::slug($request->subcat);
        $subcategories->save();
        session()->flash('success', ' category Update successfully');
        return redirect()->route('subcategories.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategories,$id)
    {
        $subcategories=Subcategory::where('id',$id)->delete();
        return redirect()->route('subcategories.create');
    }
}
