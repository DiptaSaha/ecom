<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use App\Models\Backend\Brand;
use App\Models\Backend\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use File;
use phpDocumentor\Reflection\Location;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products =Product::orderBy('title','asc')->get();
        return view ('backend.pages.product.manage', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands =Brand::orderBy('name','asc')->get();
       return view('backend.pages.product.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product= new Product();
        $product->title = $request->title;
        $product->slug = Str::slug( $request->title);
        $product->tags = $request->tags;
        $product->quantity = $request->quantity;
        $product->regular_price = $request->regular_price;
        $product->offer_price = $request->offer_price;
        $product->sku_code = $request->sku_code;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->product_type = $request->product_type;
        $product->featured_item = $request->featured_item;
        $product->status = $request->status;
        $product->description = $request->description;
        
        if ($request->image) {
            $image= $request->file('image');
            $img =rand().'_'.$image->getClientOriginalName();
            $location=public_path('Backend/img/product/'.$img);
            Image::make($image)->save($location);

            $product->image = $img;

        }
        $product->save();
        return redirect()->route('product.manage');
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
        $brands =Brand::orderBy('name','asc')->get();
       $product= Product::find($id);
       return view('backend.pages.product.edit', compact('product','brands'));

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
        $product =Product::find($id);
        $product->title = $request->title;
        $product->slug = Str::slug( $request->title);
        $product->tags = $request->tags;
        $product->quantity = $request->quantity;
        $product->regular_price = $request->regular_price;
        $product->offer_price = $request->offer_price;
        $product->sku_code = $request->sku_code;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->product_type = $request->product_type;
        $product->featured_item = $request->featured_item;
        $product->status = $request->status;
        $product->description = $request->description;


        if ( !is_null($request->image)) {

            if (File::exists('Backend/img/product/'.$product->image)) {
               File::delete('Backend/img/product/'.$product->image);
            }

           $image = $request->file('image');
           $img= rand().'_'. $image->getClientOriginalName();
           $location = public_path('Backend/img/product/'.$img);
           Image::make($image)->save($location);
          
           $product->image =$img;
        }
        $product->save();
        return redirect()->route('product.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product =Product::find($id);
       
        if(!is_null($product))
        {

            if (File::exists('Backend/img/brand/' .$product->image)) {
                File::delete('Backend/img/brand/' .$product->image);
             }
             $product->delete();
             return redirect()->route('product.manage');
        }
        else {
            return redirect()->route('product.manage');
        }
    }
}
