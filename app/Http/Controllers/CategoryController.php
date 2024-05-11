<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate('10');
        return view('admin.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categorylist', compact('categories'));
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
            'country' => 'required',
            'state' => 'required',
            'dist' => 'required',
            'city' => 'required',
            'catimg' => 'required',
        ]);

        $category = Category::where('title', $request->category)->first();
        if ($category == Null) {
            $imageName = time() . '.' . $request->catimg->extension();
            $request->catimg->move(public_path('image'), $imageName);
            $category = new Category();
            $category->title = $request->category;
            $category->country = $request->country;
            $category->state = $request->state;
            $category->	district = $request->dist;
            $category->	city = $request->city;
            $category->image = $imageName;
            $category->status = $request->status;
            $category->slug = Str::slug($request->category);
            $category->save();
            session()->flash('success', 'new Category added successfully');
            return redirect()->back();
        }
        session()->flash('error', 'Category already exist');
        return redirect()->back()->with('success', 'Product updated successfully');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $categories, $id)
    {
        $categories = Category::findOrfail($id);
        return view('admin.editcategory', compact("categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category' => 'required',
        ]);
        $imageName = time() . '.' . $request->catimg->extension();
        $request->catimg->move(public_path('image'), $imageName);
        $categories = Category::find($request->id);
        $category->country = $request->country;
        $category->state = $request->state;
        $category->	district = $request->dist;
        $category->	city = $request->city;
        $categories->title = $request->category;
        // $categories->image = $request->catimg;
        $categories->image = $imageName;
        $categories->status = $request->status;
        $categories->slug = Str::slug($request->category);
        $categories->save();
        session()->flash('success', ' category Update successfully');
        return redirect()->route('categories.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $categories, $id)
    {
        $categories = Category::where('id', $id)->delete();
        return redirect()->route('categories.index');
    }
}
