@extends('backend.layout.template')

@section('body')
<div class="br-pagetitle">
    <i class="icon ion-gear-b"></i>
    <div>
    <h4>Manage Divisions</h4>
    <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
</div>
  <div class="br-pagebody">
    <div class="row row-sm">
        <div class="col-sm-12 col-xl-12">
            <div class="card bd-0 shadow-base">
                <div class="d-md-flex justify-content-between pd-25">
                    <div><h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Manage All Divisions</h6>
                    </div>
                </div>
                <div class="pd-l-25 pd-r-15 pd-b-25">
                    <div class="bd bd-gray-300 rounded table-responsive">
                        <table class="table table-bordered table-striped text-center">
                            <thead class="thead-colored thead-teal">
                                <tr>
                                <th>#SL</th>
                                <th>Name</th>
                                <th>Priority No.</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @php
                               $i=1;    
                               @endphp
                                @foreach ($divisions as $division)
                                    <tr>
                                        <th scope="row">{{$i}}</th>
                                        <td>{{$division->name}}</td>
                                        <td>{{$division->priority}}</td>
                                        <td>
                                        <div class="action-icons">


                                            <ul>
                                                <li><a href="{{route('division.edit',$division->id)}}" class="btn btn-outline-success "><i class="fa fa-edit"></i></a></li>
                                                <li><a href="" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteDivision{{$division->id}}"><i class="fa fa-trash"></i></a></li>
                                            </ul>
                                            <!-- Modal Start -->
                                            <div class="modal fade" id="deleteDivision{{$division->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-body tx-center pd-y-20 pd-x-20">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <i class="icon icon ion-ios-close-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                                                            <h4 class="tx-danger mg-b-20">Do you want to delete the Division?</h4>
                                                            <form action="{{route('division.destroy',$division->id)}}" method="POST">
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