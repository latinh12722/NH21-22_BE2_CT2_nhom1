@extends('customer.includes.master')
@section('content')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{asset('img/shop01.png')}}" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Laptop<br>Collection</h3>
                        <a href="/store/type/2" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->
            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img height="240px" src="{{asset('img/product07.png')}}" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Phone<br>Collection</h3>
                        <a href="/store/type/1" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->
            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img height = "240px" src="{{asset('img/product02.png')}}" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Headphone<br>Collection</h3>
                        <a href="/store/type/5" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">New Products</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <ul class="section-tab-nav tab-nav">
                                <li class="active"><a href="/store/">All Protype</a></li>
                                <li><a href="/store/type/2">Laptops</a></li>
                                <li><a href="/store/type/1">Smartphones</a></li>
                                <li><a href="/store/type/5">Headphones</a></li>
                            </ul>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                <!-- product -->
                                @foreach($newproducts as $value)

                                <div class="product">
                                    <div class="product-img">
                                        <a href="{{url('product/'.$value->product_id)}}">
                                            <img height="260px" style="max-width: 280px; margin: 0 auto; padding: 40px;" src="{{asset('img/'.$value -> product_image)}}" alt="">
                                        </a>

                                        <div class=" product-label">
                                            @if($value -> product_sale > 0)
                                            <span class="sale">-{{$value -> product_sale}}%</span>
                                            @endif
                                            @if($value -> product_feature == 1)
                                            <span class="new">NEW</span>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 style="height:50px" class="product-name"><a href="{{url('product/'.$value->product_id)}}">{{$value -> product_name}}</a></h3>
                                        <h4 class="product-price">{{number_format($value->product_price-$value->product_price*$value->product_sale/100)}}đ
                                            <del class="product-old-price">{{number_format($value->product_price)}}đ</del>
                                        </h4>

                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-btns">
                                            <button data-url="{{url('/add-wishlist/'.$value->product_id)}}" id="addwishlist" class="add-to-wishlist"><i class="{{ (new \App\Helpers\Helper)->check_wishlist($value->product_id) }}"></i><span class="tooltipp">add to wishlist</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                            <button data-url="{{ url('/api/product/show') }}" data-product-id="{{$value->product_id}}" id="btnshowmodal" class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                        </div>
                                    </div>
                                    <form action="{{ url('add-to-cart') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $value->product_id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                        </div>
                                    </form>
                                </div>
                                @endforeach
                                <!-- /product -->

                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- HOT DEAL SECTION -->
<div id="hot-deal" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="hot-deal">
                    <ul class="hot-deal-countdown">
                        <li>
                            <div>
                                <h3>02</h3>
                                <span>Days</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>10</h3>
                                <span>Hours</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>34</h3>
                                <span>Mins</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>60</h3>
                                <span>Secs</span>
                            </div>
                        </li>
                    </ul>
                    <h2 class="text-uppercase">hot deal this week</h2>
                    <p>New Collection Up to 50% OFF</p>
                    <a class="primary-btn cta-btn" href="/store/">Shop now</a>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /HOT DEAL SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Top selling</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <li class="active"><a href="/store/">All Protype</a></li>
                            <li><a href="/store/type/2">Laptops</a></li>
                            <li><a href="/store/type/1">Smartphones</a></li>
                            <li><a href="/store/type/5">Headphones</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab2" class="tab-pane fade in active">
                            <div class="products-slick" data-nav="#slick-nav-2">
                                <!-- product -->
                                @foreach($topselling as $key => $value)

                                <div class="product">
                                    <div class="product-img">
                                        <a href="{{url('product/'.$value->product_id)}}">
                                            <img height="260px" style="max-width: 280px; margin: 0 auto; padding: 40px;" src="{{asset('img/'.$value -> product_image)}}" alt="">
                                        </a>
                                        <div class=" product-label">
                                            @if($value -> product_sale > 0)
                                            <span class="sale">-{{$value -> product_sale}}%</span>
                                            @endif
                                            @if($value -> product_feature == 1)
                                            <span class="new">NEW</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">{{ $value->manufacture->manu_name}}</p>
                                        <h3 style="height:80px" class="product-name"><a href="#">{{$value -> product_name}}</a></h3>
                                        <!-- <h4 class="product-price">{{number_format($value -> product_Price)}} ₫ <del class="product-old-price">{{number_format($value -> product_Price * ($value -> product_sale / 100)+$value -> product_Price)}} ₫</del></h4> -->
                                        <h4 class="product-price">{{number_format($value->product_price-$value->product_price*$value->product_sale/100)}}đ
                                            <del class="product-old-price">{{number_format($value->product_price)}}đ</del>
                                        </h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-btns">
                                            <button data-url="{{url('/add-wishlist/'.$value->product_id)}}" id="addwishlist" class="add-to-wishlist"><i class="{{ (new \App\Helpers\Helper)->check_wishlist($value->product_id) }}"></i><span class="tooltipp">add to wishlist</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                            <button data-url="{{ url('/api/product/show') }}" data-product-id="{{$value->product_id}}" id="btnshowmodal" class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <form action="{{ url('add-to-cart') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $value->product_id }}">
                                            <input type="hidden" name="quantity" value="1">
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /product -->
                                @endforeach
                                <!-- /product -->

                                <!-- product -->

                                <!-- /product -->
                            </div>
                            <div id="slick-nav-2" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- /Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-4 col-xs-6">
                <div class="section-title">
                    <h4 class="title">Top selling for Apple</h4>
                    <div class="section-nav">
                        <div id="slick-nav-3" class="products-slick-nav"></div>
                    </div>
                </div>

                <div class="products-widget-slick" data-nav="#slick-nav-3">

                    <div>
                        <!-- product widget -->
                        @foreach((new \App\Helpers\Helper)->gettopsellingforManu(1) as $key => $value)
                        <!-- product widget -->
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="{{asset('img/'.$value -> product_image)}}" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{ $value->manufacture->manu_name}}</p>
                                <h3 class="product-name"><a href="#">{{$value -> product_name}}</a></h3>
                                <h4 class="product-price">{{number_format($value->product_price-$value->product_price*$value->product_sale/100)}}đ
                                    <del class="product-old-price">{{number_format($value->product_price)}}đ</del>
                                </h4>
                            </div>
                        </div>
                        @if($key+1 == 3)
                    </div>
                    <div>
                        @endif

                        <!-- /product widget -->
                        @endforeach
                        <!-- product widget -->
                    </div>

                </div>
            </div>

            <div class="col-md-4 col-xs-6">
                <div class="section-title">
                    <h4 class="title">TOP SELLING FOR SAMSUNG</h4>
                    <div class="section-nav">
                        <div id="slick-nav-4" class="products-slick-nav"></div>
                    </div>
                </div>

                <div class="products-widget-slick" data-nav="#slick-nav-4">
                    <div>
                        <!-- product widget -->
                        @foreach((new \App\Helpers\Helper)->gettopsellingforManu(2) as $key => $value)
                        <!-- product widget -->
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="{{asset('img/'.$value -> product_image)}}" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{ $value->manufacture->manu_name}}</p>

                                <h3 class="product-name"><a href="#">{{$value -> product_name}}</a></h3>
                                <h4 class="product-price">{{number_format($value->product_price-$value->product_price*$value->product_sale/100)}}đ
                                    <del class="product-old-price">{{number_format($value->product_price)}}đ</del>
                                </h4>
                            </div>
                        </div>
                        @if($key+1 == 3)
                    </div>
                    <div>
                        @endif

                        <!-- /product widget -->
                        @endforeach
                        <!-- product widget -->
                    </div>


                </div>
            </div>

            <div class="clearfix visible-sm visible-xs"></div>

            <div class="col-md-4 col-xs-6">
                <div class="section-title">
                    <h4 class="title">TOP SELLING FOR DELL</h4>
                    <div class="section-nav">
                        <div id="slick-nav-5" class="products-slick-nav"></div>
                    </div>
                </div>

                <div class="products-widget-slick" data-nav="#slick-nav-5">
                    <div>
                        <!-- product widget -->
                        @foreach((new \App\Helpers\Helper)->gettopsellingforManu(3) as $key => $value)
                        <!-- product widget -->
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="{{asset('img/'.$value -> product_image)}}" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{ $value->manufacture->manu_name}}</p>
                                <h3 class="product-name"><a href="#">{{$value -> product_name}}</a></h3>
                                <h4 class="product-price">{{number_format($value->product_price-$value->product_price*$value->product_sale/100)}}đ
                                    <del class="product-old-price">{{number_format($value->product_price)}}đ</del>
                                </h4>
                            </div>
                        </div>
                        @if($key+1 == 3)
                    </div>
                    <div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection