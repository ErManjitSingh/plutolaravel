<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Country;
use App\Models\State;
use App\Models\District;
use App\Models\City;
use App\Models\Locationsite;
use App\Models\ActivityPrice;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('test');
        $events = ActivityPrice::all();
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        $districts = District::all();
        $locationsites = Locationsite::all();
        $categories = Category::all();
        return view('admin.product', compact('countries', 'states', 'cities', 'districts', 'locationsites', 'categories', 'events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $products = Product::where('title', 'LIKE', "%$search")->get();
        } else {
            $products = Product::all();
            $categories = Category::all();
        }
        $events = ActivityPrice::all();
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        $districts = District::all();
        $locationsites = Locationsite::all();
        $categories = Category::all();
        $categories = Category::all();
        // $products = Product::latest()->paginate(10);
        $products = Product::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.productlist', compact('products', 'categories', 'countries', 'states', 'cities', 'districts', 'locationsites', 'events', 'search'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'country' => 'required',
            'state' => 'required',
            'dist' => 'required',
            'city' => 'required',
            'lsite' => 'required',
            'actitity' => 'required',
            'category' => 'required',
            // 'price' => 'required',
            // 'dprice' => 'required',
            'actimg' => 'required',
            'allimage' => 'required',
            'desc' => 'required',
            'sdesc' => 'required',
        ]);
        $product = Product::where('title', $request->actitity)->first();
        if ($product == null) {
            $product = new Product;
            $product->country_id = $request->country;
            $product->state_id = $request->state;
            $product->district_id = $request->dist;
            $product->city_id = $request->city;
            $product->location_site_id = $request->lsite;
            $product->title = $request->actitity;
            $product->category_id = $request->category;
            $product->description = $request->desc;
            // $product->price = $request->price;
            // $product->discount_price = $request->dprice;
            $product->short_description = $request->sdesc;
            $product->slug = Str::slug($request->actitity);
            $product->status = $request->status;

            if (!empty($request->file('actimg'))) {
                $file = $request->file('actimg');
                $rendomStr = Str::random(30);
                $filemame = $rendomStr . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('image'), $filemame);
                $product->image = $filemame;
            }
            $product->save();

            foreach ($request->file('allimage') as $imagefile) {
                $image = new Image();
                $path = $imagefile->store('/products/', ['disk' =>   'my_files']);
                $image->image = $path;
                $image->product_id = $product->id;
                $image->save();
            }
            // dd($product);
            session()->flash('success', 'new product added successfully');
            return redirect()->back();
        }
        session()->flash('error', 'product already exist');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $products, $id)
    {
        $events = ActivityPrice::all();
        $products = Product::findOrfail($id);
        $images = Image::all();
        $categories = Category::all();
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        $districts = District::all();
        $locationsites = Locationsite::all();
        return view('admin.editproduct', compact('products', 'categories', 'countries', 'states', 'cities', 'images', 'districts', 'locationsites', 'events'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $products)
    {
        // $request->validate([
        //     'actitity' => 'required',
        //     'category' => 'required',
        //     'subcat' => 'required',
        //     'timg' => 'required',
        //     'price' => 'required',
        //     'dprice' => 'required',
        //     'desc' => 'required',
        //     'sdesc' => 'required',
        //     'rating' => 'required'
        // ]);
        $products = Product::find($request->id);
        $products->country_id = $request->country;
        $products->state_id = $request->state;
        $products->district_id = $request->dist;
        $products->city_id = $request->city;
        $products->location_site_id = $request->lsite;
        $products->title = $request->actitity;
        $products->category_id = $request->category;
        // $products->price = $request->price;
        // $products->discount_price = $request->dprice;
        $products->description = $request->desc;
        $products->short_description = $request->sdesc;
        $products->slug = Str::slug($request->actitity);
        if (!empty($request->file('actimg'))) {

            if (!empty($products->image) && file_exists(public_path('image/' .
                $products->image))) {
                unlink(public_path('image/' . $products->image));
            }
            $file = $request->file('actimg');
            $randomStr = Str::random(30);
            $filename = $randomStr . '.' . $request->file('actimg')->getClientOriginalExtension();
            $file->move(public_path('image'), $filename);
            $products->image = $filename;
        }
        $products->save();
        $image = Image::find($request->id);
        if (!empty($request->file('allimage'))) {
            if (
                !empty($image->image) && file_exists('/products/', ['disk' =>   'my_files']) .
                $image->image
            ) {
                unlink('/products/', ['disk' =>   'my_files']) . $image->image;
            }
            foreach ($request->file('allimage') as $imagefile) {
                $path = $imagefile->store('/products/', ['disk' =>   'my_files']);
                $image->image = $path;
                $image->product_id = $products->id;
                $image->save();
            }
        }
        return redirect()->back()->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $products, $id)
    {
        $products = Product::where('id', $id)->delete();
        return redirect()->route('products.create');
    }
    public function images()
    {
        $images = Image::all();
        $events = ActivityPrice::all();
        return view('admin.imageslist', compact('images', 'events'));
    }
}
