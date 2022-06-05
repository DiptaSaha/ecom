<div class="main-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
          <!-- ============================================================= LOGO ============================================================= -->
          <div class="logo"> <a href="{{route('homepage')}}"> <img src="/Frontend/assets/images/logo.png" alt="logo"> </a> </div>
          <!-- /.logo --> 
          <!-- ============================================================= LOGO : END ============================================================= --> </div>
        <!-- /.logo-holder -->
        
        <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder"> 
         
          <div class="search-area">
            <form>
              <div class="control-group">
                <ul class="categories-filter animate-dropdown">
                  <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu" >
                      <li class="menu-header">Computer</li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Clothing</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Electronics</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Shoes</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Watches</a></li>
                    </ul>
                  </li>
                </ul>
                <input class="search-field" placeholder="Search here..." />
                <a class="search-button" href="#" ></a> </div>
            </form>
          </div>
          <!-- /.search-area --> 
          <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
        <!-- /.top-search-holder -->
        
        <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row"> 
          <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
          
          <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
            <div class="items-cart-inner">
              <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
              <div class="basket-item-count">
                <span class="count">{{App\Models\Frontend\Cart::totalItems()}}</span>
              </div>
              <div class="total-price-basket"> <span class="lbl">cart -</span> <span class="total-price"> <span class="sign">৳ </span><span class="value">{{App\Models\Frontend\Cart::totalPrice()}}</span> </span> </div>
            </div>
            </a>
            <ul class="dropdown-menu">
              <li>
                @foreach (App\Models\Frontend\Cart::totalCarts() as $item)
                <div class="cart-item product-summary">
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="image"> <a href="{{route('cart.items')}}"><img src="/Backend/img/product/{{$item->product->image}}" alt=""></a> </div>
                    </div>
                    <div class="col-xs-7">
                      <h3 class="name"><a href="{{route('product.show', $item->product->slug)}}">{{$item->product->title}}</a></h3>
                      <div class="price">
                        @if (!is_null($item->product->offer_price))
                        ৳ {{$item->product_quantity .' x '. $item->product->offer_price}}
                        @else
                        ৳ {{$item->product_quantity .' x '. $item->product->regular_price}}
                        @endif
                        
                      </div>
                    </div>
                    <div class="col-xs-1 action">
                      <form action="{{route('cart.destroy',$item->id)}}" method="POST">
                      @csrf
                      <button type="submit" ><i class="fa fa-trash"></i>
                      </button>
                      </form>
                       
                    </div>
                  </div>
                </div>
                <div style="padding: 10px 0"></div>
                @endforeach

               

                <!-- /.cart-item -->
                <div class="clearfix"></div>
                <hr>
                <div class="clearfix cart-total">
                  <div class="pull-right"> <span class="text">Total :</span><span class='price'>৳ {{App\Models\Frontend\Cart::totalPrice()}}</span> </div>
                  <div class="clearfix"></div>
                  <a href="{{route('cart.items')}}" class="btn btn-upper btn-primary btn-block m-t-20">Carts</a> </div>
                <!-- /.cart-total--> 
                
              </li>
            </ul>
            <!-- /.dropdown-menu--> 
          </div>
          <!-- /.dropdown-cart --> 
          
          <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
        <!-- /.top-cart-row --> 
      </div>
      <!-- /.row --> 
      
    </div>
    <!-- /.container --> 
    
  </div>
  <!-- /.main-header --> 
  
  <!-- ============================================== NAVBAR ============================================== -->
  <div class="header-nav animate-dropdown">
    <div class="container">
      <div class="yamm navbar navbar-default" role="navigation">
        <div class="navbar-header">
       <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
       <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="nav-bg-class">
          <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
            <div class="nav-outer">
              <ul class="nav navbar-nav">
                <li class="active dropdown yamm-fw"> <a href="{{route('homepage')}}">Home</a> </li>

                <li class="dropdown yamm-fw"> <a href="{{route('allProducts')}}">All Products</a> </li>

                @foreach (App\Models\Backend\Category::orderBy('name','asc')->where('is_parent', 0)->get()  as $parentCategory)
                <li class="dropdown yamm mega-menu"> <a href="#" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">{{$parentCategory->name}}</a>
                  <ul class="dropdown-menu container">
                    <li>
                      <div class="yamm-content ">
                        <div class="row">
                          <div class="col-xs-8 col-sm-6 col-md-4 col-menu">
                            @foreach (App\Models\Backend\Category::orderBy('name','asc')->where('is_parent', $parentCategory->id)->get()  as $childCategory)
                            <ul>
                              <li><a href="{{route('category.show',$childCategory->slug)}}">{{$childCategory->name}}</a></li>
                              
                            </ul>
                          @endforeach
                          </div>    
                          {{-- <div class="dropdown-banner-holder col-xs-12 col-sm-12 col-lg-8"> 
                            <a href="#">
                              <img alt="" src="/Backend/img/category/{{$parentCategory->image}}"  style="max-width: 100%" />
                            </a> 
                          </div> --}}
                          <!-- /.yamm-content --> 
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
                @endforeach
              </ul>
              <!-- /.navbar-nav -->
              <div class="clearfix"></div>
            </div>
            <!-- /.nav-outer --> 
          </div>
          <!-- /.navbar-collapse --> 
          
        </div>
        <!-- /.nav-bg-class --> 
      </div>
      <!-- /.navbar-default --> 
    </div>
    <!-- /.container-class --> 
    
  </div>
  <!-- /.header-nav --> 
  <!-- ============================================== NAVBAR : END ============================================== --> 
  