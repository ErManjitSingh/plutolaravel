<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Subcategory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.product', compact('subcategories', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $products = Product::paginate('10');
        $products->each(function ($prod) {
            $prod->description = Str::limit($prod->description, 50); // Limiting description to 100 characters
        });
        return view('admin.productlist', compact('products', 'subcategories', 'categories',));
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
            'tpackage' => 'required',
            'category' => 'required',
            'subcat' => 'required',
            'timg' => 'required',
            'price' => 'required',
            'dprice' => 'required',
            'desc' => 'required',
            'sdesc' => 'required',
            'rating' => 'required',
        ]);
        $product = Product::where('title', $request->tpackage)->first();
        if ($product == null) {
            //    if(isset($request->images)){
            $imageName = time() . '.' . $request->timg->extension();
            $request->timg->move(public_path('image'), $imageName);
            // };
            $product = new Product;
            $product->title = $request->tpackage;
            $product->category_id = $request->category;
            $product->subcategory_id = $request->subcat;
            $product->image = $imageName;
            $product->price = $request->price;
            $product->discount_price = $request->dprice;
            $product->description = $request->desc;
            $product->short_description = $request->sdesc;
            $product->rating = $request->rating;
            $product->title = $request->tpackage;
            $product->slug = Str::slug($request->tpackage);
            $product->status = $request->status;
            $product->save();

            foreach ($request->file('image') as $imagefile) {
                $image = new Image;
                $path = $imagefile->store('/allimages/', ['disks' =>   'my_files']);
                $image->image = $path;
                $image->product_id = $product->id;
                $image->save();
            }

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
    public function galary()
    {
        // $products = Product::all();
        // return view('admin.galarylist', compact('products'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $products, $id)
    {
        $products = Product::findOrfail($id);
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.editproduct', compact('categories', 'subcategories', 'products'));
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
        //     'tpackage' => 'required',
        //     'category' => 'required',
        //     'subcat' => 'required',
        //     'timg' => 'required',
        //     'price' => 'required',
        //     'dprice' => 'required',
        //     'desc' => 'required',
        //     'sdesc' => 'required',
        //     'rating' => 'required'
        // ]);
        $imageName = time() . '.' . $request->timg->extension();
        $request->timg->move(public_path('image'), $imageName);
        $products = Product::find($request->id);
        $products->title = $request->tpackage;
        $products->category_id = $request->category;
        $products->subcategory_id = $request->subcat;
        $products->image = $imageName;
        $products->price = $request->price;
        $products->discount_price = $request->dprice;
        $products->description = $request->desc;
        $products->short_description = $request->sdesc;
        $products->rating = $request->rating;
        $products->slug = Str::slug($request->tpackage);
        $products->save();
        session()->flash('success', ' category Update successfully');
        return redirect()->route('products.create');
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
   
}
