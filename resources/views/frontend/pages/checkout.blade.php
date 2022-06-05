@extends('frontend.layout.cartTemplate')
@section('body') 
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row">
			
			<form action="{{route('order.store')}}" class="form-horizontal" method="POST" >
                @csrf
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3>Order list</h3> 
                        </div>
                        <div class="panel-body">
							@php
								$i=1;
							@endphp
							@foreach ($cartItems as $item)
                            <div class="form-group">
								<div class="col-sm-1 col-xs-1">
									{{$i++}}
								</div>
								<div class="col-sm-2 col-xs-2">
                                    <img class="img-responsive" src="/Backend/img/product/{{$item->product->image}}">
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12">{{$item->product->title}}</div>
                                    <div class="col-xs-12"><small>Quantity: <span>{{$item->product_quantity}}</span></small></div>
                                </div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                    <h6>  @if (!is_null($item->product->offer_price))
										৳ {{$item->product->offer_price * $item->product_quantity}}
										@else 
										৳ {{$item->product->regular_price * $item->product_quantity}}
										@endif
									</h6>
									<hr>
                                </div>
                            </div>
							@endforeach
                            <div class="form-group"><hr></div>
                                                 
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="pull-right"> <h5><strong> Grand Total  : ৳ {{App\Models\Frontend\Cart::totalPrice()}}  </strong></h5></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-info">
                        <div class="panel-heading"><h3>Please Select The Payment Method </h3></div>
                             <div class="payment-option">
                       
                                @foreach (App\Models\Backend\Payment::orderBy('priority','asc')->get() as $gateway)
                                <div class="radio">
                                    <label>
                                    <input type="radio" name="optionsRadios" id="{{$gateway->slug}}" value="{{$gateway->id}}" >
                                    {{$gateway->name}}
                                    </label>
                                </div>
                                @if ($gateway->slug == 'bkash')
                                <div class="gateway_option {{$gateway->slug}} hidden">
                                    <h5>Please Send Money To This {{$gateway->number}} And Insert The Transection Number Below</h5>
                                    <div class="form_group">

                                        <input type="text" name="btransaction_id" class="form-control" placeholder="Transaction ID ">
                                    </div>
                                </div>
                                    
                                @elseif($gateway->slug == 'nagad')
                                <div class="gateway_option {{$gateway->slug}} hidden">
                                    <h5>Please Send Money To This {{$gateway->number}} And Insert The Transection Number Below</h5>
                                    <div class="form_group">

                                        <input type="text" name="ntransaction_id" class="form-control" placeholder="Transaction ID ">
                                    </div>
                                </div>

                                @elseif($gateway->slug == 'rocket') 
                                <div class="gateway_option {{$gateway->slug}} hidden">
                                    <h5>Please Send Money To This {{$gateway->number}} And Insert The Transection Number Below</h5>
                                    <div class="form_group">

                                        <input type="text" name="rtransaction_id" class="form-control" placeholder="Transaction ID ">
                                    </div>
                                </div>
                                
                                @else
                                <div class="gateway_option {{$gateway->slug}} hidden">
                                    <h5>Please Proceed The Order, Once you recive the products, you have to pay the amount to the delivery man. </h5>
                                </div>

                                @endif
                                
                                
                                    
                                @endforeach
                                  
                            </div>
                            <!--REVIEW ORDER END-->
                               
                 
                        </div>
                   
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading"><h3>Payments And Shipping Information </h3></div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <h4>Shipping Address</h4>
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <div class="col-md-6 col-xs-12">
                                        <strong>First Name:</strong>
                                        <input type="text" name="first_name" class="form-control" value="" required="required">
                                    </div>
                                
                                    <div class="col-md-6 col-xs-12">
                                        <strong>Last Name:</strong>
                                        <input type="text" name="last_name" class="form-control" value="" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Email:</strong></div>
                                    <div class="col-md-12">
                                        <input type="email" name="email" class="form-control" value="" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Phone:</strong></div>
                                    <div class="col-md-12">
                                        <input type="text" name="phone" class="form-control" value="" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
                                    <div class="col-md-12">
                                        <input type="text" name="zip_code" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Shipping Address:</strong></div>
                                    <div class="col-md-12">
                                        <input type="text" name="shipping_address" class="form-control" value="" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Message: (optional)</strong></div>
                                    <div class="col-md-12">
                                        <textarea type="text" name="message" class="form-control" rows="4" ></textarea>
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <div class="col-md-12"><strong>State:</strong></div>
                                    <div class="col-md-12">
                                        <input type="text" name="state" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>State:</strong></div>
                                    <div class="col-md-12">
                                        <input type="text" name="state" class="form-control" value="">
                                    </div>
                                </div> --}}
                                
                            </div>
                        </div>
                  
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12"> <hr><br>
    
                            <input type="hidden" name="product_finalPrice" value="{{App\Models\Frontend\Cart::totalPrice()}}">
                            <input type="submit" name="order" class="btn btn-primary " value="Place Order">
                        </div>
                    </div>
                </div>
                
                
            </form>
	</div>
</div>



@endsection