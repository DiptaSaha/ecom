<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use File;

use function PHPUnit\Framework\isNull;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('name','asc')->get();
        return view('backend.pages.brand.manage', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'require|max(255)',
        // ],
        // ['name.required' =>'Please Insert The Brand Name',
        // ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->description = $request->description;
        $brand->is_featured = $request->is_featured;
        $brand->status = $request->status;


        if ( $request->image) {
           $image = $request->file('image');
           $img= rand().'_'. $image->getClientOriginalName();
           $location = public_path('Backend/img/brand/'.$img);
           Image::make($image)->save($location);
          
           $brand->image =$img;
        }
        $brand->save();
        return redirect()->route('brand.manage');
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
        $brand = Brand :: find($id);
        if (!is_null($brand)) {
            return view('backend.pages.brand.edit',compact('brand'));
        } else {
            return redirect()->route('brand.manage');
        }
        
        

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
        $brand =Brand::find($id);
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->description = $request->description;
        $brand->is_featured = $request->is_featured;
        $brand->status = $request->status;


        if ( !is_null($request->image)) {

            if (File::exists('Backend/img/brand/'.$brand->image)) {
               File::delete('Backend/img/brand/'.$brand->image);
            }

           $image = $request->file('image');
           $img= rand().'_'. $image->getClientOriginalName();
           $location = public_path('Backend/img/brand/'.$img);
           Image::make($image)->save($location);
          
           $brand->image =$img;
        }
        $brand->save();
        return redirect()->route('brand.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand =Brand::find($id);
       
        if(!is_null($brand))
        {

            if (File::exists('Backend/img/brand/' .$brand->image)) {
                File::delete('Backend/img/brand/' .$brand->image);
             }
             $brand->delete();
             return redirect()->route('brand.manage');
        }
        else {
            return redirect()->route('brand.manage');
        }
    }
}
