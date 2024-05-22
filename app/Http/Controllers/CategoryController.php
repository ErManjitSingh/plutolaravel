<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\District;
use App\Models\Locationsite;
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
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        $districts = District::all();
        $locationsites = Locationsite::all();
        return view('admin.category', compact('countries', 'states', 'cities', 'districts', 'locationsites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        $Districts = District::all();
        $locationsites = Locationsite::all();
        $categories = Category::Paginate();
        return view('admin.categorylist', compact('categories', 'countries', 'states', 'cities', 'Districts', 'locationsites'));
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
            // 'country' => 'required',
            // 'state' => 'required',
            // 'dist' => 'required',
            // 'city' => 'required',
            // 'catimg' => 'required',
        ]);

        $category = Category::where('title', $request->category)->first();
        if ($category == Null) {
            // $imageName = time() . '.' . $request->catimg->extension();
            // $request->catimg->move(public_path('image'), $imageName);
            $category = new Category;
            $category->title = $request->category;
            $category->country_id = $request->country;
            $category->state_id = $request->state;
            $category->district_id = $request->dist;
            $category->city_id = $request->city;
            $category->location_site_id= $request->lsite;
            // $category->image = $imageName;
            $category->status = $request->status;
            $category->slug = Str::slug($request->category);
            if (!empty($request->file('catimg'))) {
                $file = $request->file('catimg');
                $rendomStr = Str::random(30);
                $filemame = $rendomStr . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('image'), $filemame);
                $category->image = $filemame;
            }
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
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        $districts = District::all();
        $locationsites = Locationsite::all();
        $categories = Category::findOrfail($id);
        return view('admin.editcategory', compact('categories', 'countries', 'states', 'cities', 'districts', 'locationsites'));
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
        // dd($request->all());
        // $imageName = time() . '.' . $request->catimg->extension();
        // $request->catimg->move(public_path('image'), $imageName);
        $categories = Category::find($request->id);
        $categories->country_id = $request->country;
        $categories->state_id = $request->state;
        $categories->district_id = $request->dist;
        $categories->city_id = $request->city;
        $categories->location_site_id = $request->lsite;
        $categories->title = $request->category;
        // $categories->image = $imageName;
        // $categories->image = $request->catimg;
        $categories->status = $request->status;
        $categories->slug = Str::slug($request->category);

        if (!empty($request->file('catimg'))) {

            if (!empty($categories->image) && file_exists(public_path('image/' . $categories->image))) {
                unlink(public_path('image/' . $categories->image));
            }

            $file = $request->file('catimg');
            $randomStr = Str::random(30);
            $filename = $randomStr . '.' . $request->file('catimg')->getClientOriginalExtension();
            $file->move(public_path('image'), $filename);
            $categories->image = $filename;
        }
        $categories->save();
        return redirect()->back()->with('success', 'Category updated successfully');
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
        return redirect()->route('categories.create');
    }
}
