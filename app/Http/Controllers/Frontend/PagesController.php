<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Slider;
use App\Models\Backend\Category;
use App\Models\Backend\Brand;
use App\Models\Backend\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use File;
class PagesController extends Controller
{
    /**
     * Display a Home Page of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('title','asc')->get();
        $newArrivals = Product::orderBy('id','desc')->get();
        $featureds = Product::orderBy('id','desc')->where('featured_item',1)->get();
       return view('frontend.pages.home',compact('sliders','newArrivals','featureds'));
    }
    /**
     * Display a All Products Page of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function products()
    {
       $products= Product::orderBy('id','desc')->paginate(15);
       return view('frontend.pages.products.products', compact('products'));
    }
    /**
     * Display a All Products Page of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productshow($slug)
    {
       $value= Product::where('slug',$slug)->first();
       if (!is_null($value)) {
         return view('frontend.pages.products.details',compact('value'));

       }
       else{
          return back();
       }
    }

    public function productCategory()
    {
       return view('frontend.pages.products.products');
    }
   

    public function categoryShow($slug)
    {
       $category =Category::where('slug',$slug)->first();
       if (!is_null($category)) {
         return view('frontend.pages.products.category',compact('category'));
       }
       else {
          return redirect()->route("homepage");
       }
    
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
}
