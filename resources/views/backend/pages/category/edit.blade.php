@extends('backend.layout.template')


@section('body')

{{-- <div class="sk-cube sk-cube8"></div> --}}
<div class="br-pagetitle">
    <i class="icon ion-gear-b"></i>
    <div>
    <h4>Update Category</h4>
    <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
</div>

  <div class="br-pagebody">
    <div class="row row-sm">
     <div class="col-sm-12 col-xl-12">
        <div class="card bd-0 shadow-base">
            <div class="d-md-flex justify-content-between pd-25">
                <div><h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Update Category Information</h6>
                </div>
            </div>
            
                <form action="{{route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-layout form-layout-4">

                        <div class="form-group row">
                          <label  class="col-sm-2 col-form-label">Name:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="{{$category->name}}">
                          </div>
                        </div>
                       
                        <div class="form-group row">
                          <label  class="col-sm-2 col-form-label">Is_Parent:</label>
                          <div class="col-sm-10">
                            <select name="is_parent" class="form-control" >
                              <option value="0">Please Select The Below Item</option>

                              @foreach (App\Models\Backend\Category::orderBy('name','asc')->where('is_parent',0)->get()  as $parentCat)
                              <option value="{{$parentCat->id}}" @if ($parentCat->id == $category->id) @if ($parentCat->is_parent == 0 )  selected @endif  @endif>{{$parentCat->name}} (Primary Category) </option>
                              @foreach (App\Models\Backend\Category::orderBy('name','asc')->where('is_parent',$parentCat->id)->get()  as $childCat)
                              <option value="{{$childCat->id}}" @if ($childCat->id == $category->id) @if($childCat->is_parent != 0) selected @endif @endif > -{{ $childCat->name}}</option>

                              @endforeach
                              @endforeach
                          </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label  class="col-sm-2 col-form-label">Status:</label>
                          <div class="col-sm-10">
                            <select name="status" class="form-control">
                              <option value="0">Please Select The Below Item</option>
                              <option value="0"@if($category->status == 0) selected @endif>In Active</option>
                              <option value="1" @if($category->status == 1) selected @endif>Active</option>
                          </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label  class="col-sm-2 col-form-label">Featured:</label>
                          <div class="col-sm-10">
                            <select name="featured" class="form-control">
                              <option value="0">Please Select The Below Item</option>
                              <option value="0"@if($category->featured == 0) selected @endif>Normal</option>
                              <option value="1" @if($category->featured == 1) selected @endif>Featured</option>
                          </select>
                          </div>
                        </div>
                        {{-- <div class="form-group row">
                          <label  class="col-sm-2 col-form-label">Icon Class Name:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="icon_class" value="{{$category->icon_class}}">
                          </div>
                        </div> --}}
                        <div class="form-group row">
                          <label  class="col-sm-2 col-form-label">Description:</label>
                          <div class="col-sm-10">
                            <textarea rows="4" name="description" class="form-control" placeholder="Enter Your  Brand Descriptions">{{$category->description}}</textarea>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Image:</label><br>
                          <div class="col-sm-10">
                            @if (!is_null($category->image))
                            <img src="{{asset('Backend/img/category')}}/{{$category->image}}" width="50">  
                            @else
                            <img src="{{asset('Backend/img/img12.jpg')}}" width="50">  
                            @endif
                            <input type="file" class="form-control-file" name="image">
                          </div>
                        </div>
                        <div class="row mg-t-30">
                            <div class="col-sm-2 mg-l-auto">
                                <div class="form-layout-footer">
                                    <input type="submit" class="btn btn-info" value="Update Category" name="updateCategory">
                                    
                                </div><!-- form-layout-footer -->
                            </div><!-- col-8 -->
                          </div>
                    </div>
                </form>
          </div>
      </div>
  </div>

    
@endsection