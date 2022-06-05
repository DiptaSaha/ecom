@extends('backend.layout.template')


@section('body')

{{-- <div class="sk-cube sk-cube8"></div> --}}
<div class="br-pagetitle">
    <i class="icon ion-gear-b"></i>
    <div>
    <h4>Update Slider</h4>
    <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
</div>

  <div class="br-pagebody">
    <div class="row row-sm">
        <div class="col-sm-12 col-xl-12">
            <div class="card bd-0 shadow-base">
                <div class="d-md-flex justify-content-between pd-25">
                    <div><h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Update Slider Information</h6>
                    </div>
                </div>
               
                <form action="{{route('slider.update',$slider->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-layout form-layout-4">

                        <div class="form-group row">
                          <label  class="col-sm-2 col-form-label">Title:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="title"  value="{{$slider->title}}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label  class="col-sm-2 col-form-label">Sub Title:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="subtitle" value="{{$slider->subtitle}}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label  class="col-sm-2 col-form-label">Button Text:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="button_text" value="{{$slider->button_text}}" >
                          </div>
                        </div>
                        <div class="form-group row">
                          <label  class="col-sm-2 col-form-label">Button Url:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="button_url" value="{{$slider->button_url}}" >
                          </div>
                        </div>
                        <div class="form-group row">
                          <label  class="col-sm-2 col-form-label">Description:</label>
                          <div class="col-sm-10">
                            <textarea rows="4" name="description" class="form-control" placeholder="Enter Your  Slider Descriptions">{{$slider->description}}</textarea>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Image:</label><br>
                          <div class="col-sm-10">
                            @if (!is_null($slider->image))
                            <img src="{{asset('Backend/img/slider')}}/{{$slider->image}}" width="50">  
                            @else
                            <img src="{{asset('Backend/img/img12.jpg')}}" width="50">  
                            @endif
                            <input type="file" class="form-control-file" name="image">
                          </div>
                        </div>
                        <div class="row mg-t-30">
                            <div class="col-sm-2 mg-l-auto">
                                <div class="form-layout-footer">
                                    <input type="submit" class="btn btn-info" value="Update Slider" name="updateSlider">
                                    
                                </div><!-- form-layout-footer -->
                            </div><!-- col-8 -->
                          </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
@endsection