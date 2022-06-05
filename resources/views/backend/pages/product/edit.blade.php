@extends('backend.layout.template')


@section('body')

{{-- <div class="sk-cube sk-cube8"></div> --}}
<div class="br-pagetitle">
    <i class="icon ion-gear-b"></i>
    <div>
    <h4>Update Product</h4>
    <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
</div>

  <div class="br-pagebody">
    <div class="row row-sm">
        <div class="col-sm-12 col-xl-12">
            <div class="card bd-0 shadow-base">
                <div class="d-md-flex justify-content-between pd-25">
                    <div><h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Update Product Information</h6>
                    </div>
                </div>
               
                <form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-layout form-layout-4">

                      <div class="container-flude">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label  class="col-sm-3 col-form-label">Title:</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" name="title" value="{{$product->title}}">
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label  class="col-sm-3 col-form-label">Tags:</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" name="tags" value="{{$product->tags}}" >
                              </div>
                            </div>
                            <div class="form-group row">
                              <label  class="col-sm-3 col-form-label">Quantity:</label>
                              <div class="col-sm-9">
                                <input type="number" class="form-control" name="quantity" value="{{$product->quantity}}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label  class="col-sm-3 col-form-label">Regular Price:</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" name="regular_price" value="{{$product->regular_price}}" >
                              </div>
                            </div>
                            <div class="form-group row">
                              <label  class="col-sm-3 col-form-label">Offer Price:</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" name="offer_price" value="{{$product->offer_price}}" >
                              </div>
                            </div>
                            <div class="form-group row">
                              <label  class="col-sm-3 col-form-label">Sku Code:</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" name="sku_code" value="{{$product->sku_code}}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Image:</label>
                              <div class="col-sm-9">
                                @if (!is_null($product->image))
                                <img src="{{asset('Backend/img/product')}}/{{$product->image}}" width="50">  
                                @else
                                <img src="{{asset('Backend/img/img12.jpg')}}" width="50">  
                                @endif
                                <input type="file" class="form-control-file" name="image">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label  class="col-sm-3 col-form-label">Brand:</label>
                              <div class="col-sm-9">
                                <select name="brand_id" class="form-control" >
                                  <option value="0">Please Select The Below Item</option>
                                  @foreach ($brands as $brand)
                                      <option value="{{$brand->id}}" @if ($brand->id != 0) selected @endif>{{$brand->name}}</option>
                                  @endforeach
                                 
                              </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label  class="col-sm-3 col-form-label">Category:</label>
                              <div class="col-sm-9">
                                <select name="category_id" class="form-control" >
                                  <option value="0">Please Select The Below Item</option>
                                  @foreach (App\Models\Backend\Category::orderBy('name','asc')->where('is_parent', 0)->get() as $parentCat)
                                  <option value="{{$parentCat->id}}" @if ($parentCat->id == 0) selected @endif >{{$parentCat->name}}</option>
                                  @foreach (App\Models\Backend\Category::orderBy('name','asc')->where('is_parent', $parentCat->id)->get() as $childCat)
                                  <option value="{{$childCat->id}}" @if ($childCat->id != 0) selected @endif >--{{$childCat->name}}</option>
                                  @endforeach
                                  @endforeach
                              </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label  class="col-sm-3 col-form-label">Product Type:</label>
                              <div class="col-sm-9">
                                <select name="product_type" class="form-control" >
                                  <option value="0">Please Select The Below Item</option>
                                  <option value="0" @if ($product->product_type == 0) selected @endif >NEW</option>
                                  <option value="1" @if ($product->product_type == 1) selected @endif >Pre_Owend</option>
                              </select>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label  class="col-sm-3 col-form-label">Featured:</label>
                              <div class="col-sm-9">
                                <select name="featured_item" class="form-control" >
                                  <option value="0">Please Select The Below Item</option>
                                  <option value="0" @if ($product->featured_item == 0) selected @endif >Normal</option>
                                  <option value="1" @if ($product->featured_item == 1) selected @endif >Featured</option>
                              </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label  class="col-sm-3 col-form-label">Status:</label>
                              <div class="col-sm-9">
                                <select name="status" class="form-control">
                                  <option value="0">Please Select The Below Item</option>
                                  <option value="0"@if ($product->status == 0) selected @endif>In Active</option>
                                  <option value="1" @if ($product->status == 1) selected @endif>Active</option>
                              </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label  class="col-sm-3 col-form-label">Descriptions:</label>
                              <div class="col-sm-9">
                                <textarea rows="4" name="description" class="form-control" placeholder="Enter Your Product Descriptions">{{$product->description}}</textarea>
                              </div>
                            </div>
                          </div>
                           
                        </div>
                      </div>
                        <div class="row mg-t-30">
                            <div class="col-sm-2 mg-l-auto">
                                <div class="form-layout-footer">
                                    <input type="submit" class="btn btn-info" value="Update Product" name="updateProduct">
                                    
                                </div><!-- form-layout-footer -->
                            </div><!-- col-8 -->
                          </div>
                    </div>
                </form>
            </div>
        </div>
      </div>

    
@endsection