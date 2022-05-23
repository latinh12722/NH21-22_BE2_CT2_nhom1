@extends('includes.master')
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="http://127.0.0.1:8000">Home</a></li>
                    <li><a href="http://127.0.0.1:8000/store">All Categories</a></li>
                    <li><a href="#">Accessories</a></li>
                    <li class="active">Headphones ({{count($data)}})</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ASIDE -->
            <div id="aside" class="col-md-3">
                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Categories</h3>
                    <div class="checkbox-filter">
                        @foreach((new \App\Helpers\Helper)->getselectarr_type($data) as $key=>$value)
                        <div class="input-checkbox">
                            <input type="checkbox" id="category-1">
                            <label for="category-1">
                                <span></span>
                                {{(new \App\Helpers\Helper)->gettype_byid($key)->type_Name}}
                                <small>({{$value}})</small>
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Price</h3>
                    <div class="price-filter">
                        <div id="price-slider"></div>
                        <div class="input-number price-min">
                            <input id="price-min" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                        <span>-</span>
                        <div class="input-number price-max">
                            <input id="price-max" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Brand</h3>
                    <div class="checkbox-filter">
                        @foreach((new \App\Helpers\Helper)->getselectarr_manu($data) as $key => $value)
                        <div class="input-checkbox">
                            <input type="checkbox" id="brand-1">
                            <label for="brand-1">
                                <span></span>
                                {{(new \App\Helpers\Helper)->getmanu_byid($key)->manu_Name}}
                                <small>({{$value}})</small>
                            </label>
                        </div>
                        @endforeach

                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Top selling</h3>
                    @foreach((new \App\Helpers\Helper)->getthreetopselling() as $key=>$value)
                    <div class="product-widget">
                        <a href="{{url('/product/'.$value->product_id)}}">
                            <div class="product-img">
                                <img src="{{asset('img/'.$value->product_image)}}" alt="">
                            </div>
                        </a>
                        <div class="product-body">
                            <p class="product-category">{{ $value->manu_product->manu_Name}}</p>
                            <h3 class="product-name"><a href="{{url('/product/'.$value->product_id)}}">{{ $value->product_Name}}</a></h3>
                            <h4 class="product-price">{{number_format($value->product_Price-$value->product_Price*$value->product_sale/100)}}đ
                                <del class="product-old-price">{{number_format($value->product_Price)}}đ</del>
                            </h4>
                        </div>
                    </div>
                    @endforeach

                </div>
                <!-- /aside Widget -->
            </div>
            <!-- /ASIDE -->

            <!-- STORE -->
            <div id="store" class="col-md-9">
                <!-- store top filter -->
                
                <!-- /store top filter -->

                <!-- store products -->
                <div class="row">
                    @foreach($data as $value)
                    <!-- product -->
                    <div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <a href="{{url('product/'.$value->product_id)}}">
                                    <img src="{{asset('img/'.$value->product_image)}}" alt="" width="262px" height="262px">
                                </a>
                                <div class="product-label">

                                    @if($value->product_sale > 0)
                                    <span class="sale">-{{$value->product_sale}}%</span>
                                    @endif
                                    @if ($value->product_feature == 1)
                                    <span class="new">NEW</span>
                                    @endif
                                </div>
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{ $value->manu_product->manu_Name}}</p>
                                <h3 class="product-name" style="height: 40px;"><a href="{{url('product/'.$value->product_id)}}">{{$value->product_Name}}</a></h3>
                                <h4 class="product-price">{{number_format($value->product_Price-$value->product_Price*$value->product_sale/100)}}đ
                                    <del class="product-old-price">{{number_format($value->product_Price)}}đ</del>
                                </h4>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-btns">
                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                </div>
                            </div>
                            <div class="add-to-cart">
                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                            </div>
                        </div>
                    </div>
                    <!-- /product -->
                    <div class="clearfix visible-sm visible-xs"></div>
                    @endforeach
                    <!-- /product -->
                </div>
                <!-- /store products -->

                <!-- store bottom filter -->
                <div class="store-filter clearfix">
                    <span class="store-qty">Showing 20-100 products</span>
                    <ul class="store-pagination">
                        <li class="active">1</li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
                <!-- /store bottom filter -->
            </div>
            <!-- /STORE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

@endsection