@extends('frontend.layout.cartTemplate')
@section('body') 
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Shopping Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row ">
			<div class="shopping-cart">
				<div class="shopping-cart-table ">
                    <div class="table-responsive">
                            
                        @if (App\Models\Frontend\Cart::totalItems()> 0)

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class=" item">#Sl</th>
                                        <th class="cart-description item">Image</th>
                                        <th class="cart-product-name item">Product Name</th>
                                        <th class="cart-qty item">Quantity</th>
                                        <th class="cart-sub-total item">Subtotal</th>
                                        <th class="cart-total last-item">Grandtotal</th>
                                        <th class="cart-edit item">Update</th>
                                        <th class="cart-romove item">Remove</th>
                                    </tr>
                                </thead><!-- /thead -->
                                <tfoot>
                                    <tr>
                                        <td colspan="7">
                                            <div class="shopping-cart-btn">
                                                <span class="">
                                                    <a href="{{route('homepage')}}" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
                                                   
                                                </span>
                                            </div><!-- /.shopping-cart-btn -->
                                        </td>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @php
                                        $i=1;
                                        $total_price= 0;
                                    @endphp
                                @foreach ($cartItems as $item)
                                    <tr>
                                        <td>{{ $i++}}</td>
                                        <td class="cart-image">
                                            <a class="entry-thumbnail" href="{{route('product.show', $item->product->slug)}}">
                                                <img src="/Backend/img/product/{{$item->product->image}}" alt="">
                                            </a>
                                        </td>
                                        <td class="cart-product-name-info">
                                            <h4 class='cart-product-description'><a href="{{route('product.show', $item->product->slug)}}">{{$item->product->title}}</a></h4>
                                        </td>
                                       
                                        <td class="cart-product-quantity">
                                            <div class="quant-input">
                                                <form action="{{route('cart.update',$item->id)}}" method="POST">
                                                    @csrf

                                                <input type="number" name="product_quantity" value="{{$item->product_quantity}}">
                                            </div>
                                        </td>
                                        <td class="cart-product-sub-total">
                                            <span class="cart-sub-total-price"> 
                                                @if (!is_null($item->product->offer_price))
                                                    ৳ {{$item->product->offer_price}}
                                                @else 
                                                 ৳ {{$item->product->regular_price}}
                                                @endif
                                             </span>
                                        </td>
                                        <td class="cart-product-grand-total">
                                            <span class="cart-grand-total-price">
                                                @if (!is_null($item->product->offer_price))
                                                ৳ {{$item->product->offer_price * $item->product_quantity}}
                                            @else 
                                             ৳ {{$item->product->regular_price * $item->product_quantity}}
                                            @endif
                                            </span>
                                        </td>
                                        <td class="cart-product-edit">
                                            <input type="submit" value="Update" name="update" class="btn btn-success">
                                        </form>
                                        </td>
                                        <td class="romove-item">
                                            <form action="{{route('cart.destroy',$item->id)}}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger" title="Delete" ><i class="fa fa-times"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                        
                                @endforeach
                                  
                                   
                                </tbody><!-- /tbody -->
                            </table><!-- /table -->
                       
                     </div>
                </div>
               
                
                    <div class="col-md-6 col-sm-12 estimate-ship-tax">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <span class="estimate-title">Discount Code</span>
                                        <p>Enter your coupon code if you have one..</p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control unicase-form-control text-input" placeholder="You Coupon..">
                                            </div>
                                            <div class="clearfix pull-right">
                                                <button type="submit" class="btn-upper btn btn-primary">APPLY COUPON</button>
                                            </div>
                                        </td>
                                    </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div><!-- /.estimate-ship-tax -->
        
                    <div class="col-md-6 col-sm-12 cart-shopping-total">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        {{-- <div class="cart-sub-total">
                                            Subtotal<span class="inner-left-md">$600.00</span>
                                        </div> --}}
                                        <div class="cart-grand-total">
                                            Grand Total<span class="inner-left-md">{{App\Models\Frontend\Cart::totalPrice()}}</span>
                                        </div>
                                    </th>
                                </tr>
                            </thead><!-- /thead -->
                            <tbody>
                                    <tr>
                                        <td>
                                            <div class="cart-checkout-btn pull-right">
                                                <a href="{{route('checkout.page')}}" class="btn btn-primary checkout-btn">PROCCED TO CHECKOUT</a>
                                                <span class="">Checkout with multiples address!</span>
                                            </div>
                                        </td>
                                    </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div><!-- /.cart-shopping-total -->

                        @else
                            <div class="x-page ">
                                <div class="x-text">
                                    <div class="col-md-12 x-text text-center">
                                        <h1 style="color: #0f6cb2;">No Item Added your Cart</h1>
                                        
                                        
                                        <a href="{{route('homepage')}}"><i class="fa fa-home"></i> Go To Homepage</a>
                                    </div>

                                </div>

                            </div>
                        
                      
                            
                        @endif
			
                </div><!-- /.shopping-cart -->
            </div>
        </div> <!-- /.row -->
    </div> <!-- /.row -->


@endsection
		