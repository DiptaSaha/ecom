@extends('backend.layout.template')

@section('body')
<div class="br-pagetitle">
    <i class="icon ion-gear-b"></i>
    <div>
    <h4>Manage Categories</h4>
    <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
</div>
  <div class="br-pagebody">
    <div class="row row-sm">
        <div class="col-sm-12 col-xl-12">
            <div class="card bd-0 shadow-base">
                <div class="d-md-flex justify-content-between pd-25">
                    <div><h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Manage All Categories</h6>
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
                                <th>Featured</th>
                                <th>Is_Parent</th>
                                <th>Status</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @php
                               $i=1;    
                               @endphp
                                @foreach ($categories as $category)
                                    <tr>
                                        <th scope="row">{{$i++}}</th>
                                        <td>
                                        @if (!is_null($category->image))
                                        <img src="{{asset('Backend/img/category')}}/{{$category->image}}" width="50">  
                                        @else
                                        <img src="{{asset('Backend/img/img12.jpg')}}" width="50">  
                                        @endif</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->slug}}</td>
                                        <td>
                                            @if ($category->featured == 1)
                                            <span class="badge badge-success"> Featured </span>
                                            @else
                                            <span class="badge badge-danger"> Normal </span>
                                            @endif
                                        </td>
                                        <td>
                                        @if ($category->is_parent==0)
                                           <span class="badge badge-success"> Primary Category </span>
                                        @else
                                        <span class="badge badge-warning"> {{$category->parent->name}} </span>
                                        @endif
                                        </td>
                                        <td>
                                        @if ($category->status==1)
                                        <span class="badge badge-success"> Active </span>
                                        @else
                                        <span class="badge badge-danger"> In Active </span>
                                        @endif
                                        </td>
                                        <td>
                                            <div class="action-icons">
                                                <ul>
                                                    <li><a href="{{route('category.edit',$category->id)}}" class="btn btn-outline-success "><i class="fa fa-edit"></i></a></li>
                                                    <li><a href="" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteCategory{{$category->id}}"><i class="fa fa-trash"></i></a></li>
                                                </ul>
                                                <!-- Modal Start -->
                                                <div class="modal fade" id="deleteCategory{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-body tx-center pd-y-20 pd-x-20">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                <i class="icon icon ion-ios-close-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                                                                <h4 class="tx-danger mg-b-20">Do you want to delete the Category?</h4>
                                                                <form action="{{route('category.destroy',$category->id)}}" method="POST">
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

                                    @foreach (App\Models\Backend\Category::orderBy('name','asc')->where('is_parent', $category->id)->get() as $sub_Cat)
                                    <tr>
                                        <th scope="row">{{$i++}}</th>
                                        <td>
                                        @if (!is_null($sub_Cat->image))
                                        <img src="{{asset('Backend/img/category')}}/{{$sub_Cat->image}}" width="50">  
                                        @else
                                        <img src="{{asset('Backend/img/img12.jpg')}}" width="50">  
                                        @endif</td>
                                        <td> - {{$sub_Cat->name}}</td>
                                        <td>{{$sub_Cat->slug}}</td>
                                        {{-- <td>{{$category->description}}</td> --}}
                                       
                                        <td>
                                            @if ($category->featured==1)
                                            <span class="badge badge-success"> Featured </span>
                                            @else
                                            <span class="badge badge-danger"> Normal </span>
                                            @endif
                                            </td>
                                        <td>
                                        @if ($sub_Cat->is_parent==0)
                                           <span class="badge badge-success"> Primary Category </span>
                                        @else
                                        <span class="badge badge-warning"> {{$sub_Cat->parent->name}} </span>
                                        @endif
                                        </td>
                                        <td>
                                        @if ($sub_Cat->status==1)
                                        <span class="badge badge-success"> Active </span>
                                        @else
                                        <span class="badge badge-danger"> In Active </span>
                                        @endif
                                        </td>
                                        <td>
                                            <div class="action-icons">
                                                <ul>
                                                    <li><a href="{{route('category.edit',$sub_Cat->id)}}" class="btn btn-outline-success "><i class="fa fa-edit"></i></a></li>
                                                    <li><a href="" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteCategory{{$sub_Cat->id}}"><i class="fa fa-trash"></i></a></li>
                                                </ul>
                                                <!-- Modal Start -->
                                                <div class="modal fade" id="deleteCategory{{$sub_Cat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-body tx-center pd-y-20 pd-x-20">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                <i class="icon icon ion-ios-close-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                                                                <h4 class="tx-danger mg-b-20">Do you want to delete the Sub-Category?</h4>
                                                                <form action="{{route('category.destroy',$sub_Cat->id)}}" method="POST">
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
                                    @endforeach


                                @endforeach
                            </tbody>
                        </table>
                    </div>    
                </div>
            </div>
        </div>
    </div>

@endsection