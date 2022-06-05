@extends('backend.layout.template')


@section('body')

{{-- <div class="sk-cube sk-cube8"></div> --}}
<div class="br-pagetitle">
    <i class="icon ion-gear-b"></i>
    <div>
    <h4>Add New Brand</h4>
    <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
</div>

  <div class="br-pagebody">
    <div class="row row-sm">
        <div class="col-sm-12 col-xl-12">
            <div class="card bd-0 shadow-base">
                <div class="d-md-flex justify-content-between pd-25">
                    <div><h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Create New Brand</h6>
                    </div>
                </div>
               
                <form action="{{route('brand.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-layout form-layout-4">

                        <div class="form-group row">
                          <label  class="col-sm-2 col-form-label">Name:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" >
                          </div>
                        </div>
                        <div class="form-group row">
                          <label  class="col-sm-2 col-form-label">Featured:</label>
                          <div class="col-sm-10">
                            <select name="is_featured" class="form-control" >
                              <option value="0">Please Select The Below Item</option>
                              <option value="0">Normal</option>
                              <option value="1">Featured</option>
                          </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label  class="col-sm-2 col-form-label">Status:</label>
                          <div class="col-sm-10">
                            <select name="status" class="form-control">
                              <option value="0">Please Select The Below Item</option>
                              <option value="0">In Active</option>
                              <option value="1">Active</option>
                          </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label  class="col-sm-2 col-form-label">Description:</label>
                          <div class="col-sm-10">
                            <textarea rows="4" name="description" class="form-control" placeholder="Enter Your  Brand Descriptions"></textarea>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Image:</label>
                          <div class="col-sm-10">
                            <input type="file" class="form-control-file" name="image">
                          </div>
                        </div>
                        <div class="row mg-t-30">
                            <div class="col-sm-2 mg-l-auto">
                                <div class="form-layout-footer">
                                    <input type="submit" class="btn btn-info" value="Submit Brand" name="addBrand">
                                    
                                </div><!-- form-layout-footer -->
                            </div><!-- col-8 -->
                          </div>
                    </div>
                </form>
            </div>
        </div>
        </div>

    
@endsection