@extends('backend.layout.template')


@section('body')

{{-- <div class="sk-cube sk-cube8"></div> --}}
<div class="br-pagetitle">
    <i class="icon ion-gear-b"></i>
    <div>
    <h4>Add New Division</h4>
    <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
</div>

  <div class="br-pagebody">
    <div class="row row-sm">
        <div class="col-sm-12 col-xl-12">
            <div class="card bd-0 shadow-base">
                <div class="d-md-flex justify-content-between pd-25">
                    <div><h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Create New Division</h6>
                    </div>
                </div>
               
                <form action="{{route('district.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-layout form-layout-4">

                        <div class="form-group row">
                          <label  class="col-sm-2 col-form-label">Name:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" required="required" autocomplete="off">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label  class="col-sm-2 col-form-label">Division</label>
                          <div class="col-sm-10">
                            {{-- <input type="number" class="form-control" name="priority" > --}}
                            <select name="division_id" class="form-control" required="required" >
                              <option value="0">Please Select The Division Name</option>
                              @foreach ($divisions as $division)
                              <option value="{{$division->id}}">{{$division->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="row mg-t-30">
                            <div class="col-sm-2 mg-l-auto">
                                <div class="form-layout-footer">
                                    <input type="submit" class="btn btn-info" value="Submit District" name="addDistrict">
                                </div><!-- form-layout-footer -->
                            </div><!-- col-8 -->
                          </div>
                    </div>
                </form>
            </div>
        </div>
      </div>

    
@endsection