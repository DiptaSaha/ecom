@extends('backend.layout.template')

@section('body')
<div class="br-pagetitle">
    <i class="icon ion-gear-b"></i>
    <div>
    <h4>Manage Brands</h4>
    <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
</div>
  <div class="br-pagebody">
    <div class="row row-sm">
        <div class="col-sm-12 col-xl-12">
            <div class="card bd-0 shadow-base">
                <div class="d-md-flex justify-content-between pd-25">
                    <div><h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Manage All Brands</h6>
                    </div>
                </div>
                <div class="pd-l-25 pd-r-15 pd-b-25">
                    <div class="bd bd-gray-300 rounded table-responsive">
                        <table class="table table-bordered table-striped text-center">
                            <thead class="thead-colored thead-teal">
                                <tr>
                                <th>#SL</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Is_Featured</th>
                                <th>Status</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @php
                               $i=1;    
                               @endphp
                                @foreach ($brands as $brand)
                                    <tr>
                                        <th scope="row">{{$i}}</th>
                                        <td>
                                        @if (!is_null($brand->image))
                                        {{-- <img src="{{asset('Backend/img/brand')}}/{{$brand->image}}" width="50">   --}}
                                        <img src="/Backend/img/brand/{{$brand->image}}" width="50">  
                                        @else
                                        <img src="/Backend/img/img12.jpg" width="50">  
                                        {{-- <img src="{{asset('Backend/img/img12.jpg')}}" width="50">   --}}
                                        @endif</td>
                                        <td>{{$brand->name}}</td>
                                        <td>{{$brand->slug}}</td>
                                        <td>{{$brand->description}}</td>
                                        <td>
                                        @if ($brand->is_featured==1)
                                           <span class="badge badge-success"> Yes </span>
                                        @else
                                        <span class="badge badge-danger"> No </span>
                                        @endif
                                        </td>
                                        <td>
                                        @if ($brand->status==1)
                                        <span class="badge badge-success"> Active </span>
                                        @else
                                        <span class="badge badge-danger"> In Active </span>
                                        @endif
                                        </td>
                                        <td>
                                        <div class="action-icons">


                                            <ul>
                                                <li><a href="{{route('brand.edit',$brand->id)}}" class="btn btn-outline-success "><i class="fa fa-edit"></i></a></li>
                                                <li><a href="" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteBrand{{$brand->id}}"><i class="fa fa-trash"></i></a></li>
                                            </ul>
                                            <!-- Modal Start -->
                                            <div class="modal fade" id="deleteBrand{{$brand->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-body tx-center pd-y-20 pd-x-20">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <i class="icon icon ion-ios-close-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                                                            <h4 class="tx-danger mg-b-20">Do you want to delete the Brand?</h4>
                                                            <form action="{{route('brand.destroy',$brand->id)}}" method="POST">
                                                                @csrf
                                                                <div class="action-icons">
                                                                    <input type="submit" name="delete" class="btn btn-danger tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" value="YES">
                                                                    <input type="button" name="close" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" value="NO" data-dismiss="modal">
                                                                </div>
                                                            </form>
                                                        </div><!-- modal-body -->
                                                    </div><!-- modal-content -->
                                                </div><!-- modal-dialog -->
                                            </div>
                                            <!-- Modal End -->
                                        </div>
                                    </td>
                                  
                                   
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                
                </div>
            </div>
        </div>
    </div>

@endsection