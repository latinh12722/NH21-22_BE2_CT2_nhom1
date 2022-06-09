@extends('customer.includes.master')
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
                    <li class="active">Headphones ({{count($products)}})</li>
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
                <form id="locpro" action="{{Request::fullUrl()}}" method="get">
                    <div class="aside">
                        <h3 class="aside-title">Categories</h3>
                        <div class="checkbox-filter">
                            @foreach((new \App\Helpers\Helper)->getselectarr_type($products) as $key=>$value)
                            <div class="input-checkbox">
                                <input {{Request::input('category') == $key ? "checked" : ""}} value="{{$key}}" name="category" type="checkbox" id="category-{{$key}}">
                                <label for="category-{{$key}}">
                                    <span></span>
                                    {{(new \App\Helpers\Helper)->gettype_byid($key)->type_name}}
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
                                <input name="price_min" onchange="price()" id="price-min" type="number">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                            <span>-</span>
                            <div class="input-number price-max">
                                <input name="price_max" onchange="price()" id="price-max" type="number">
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
                            @foreach((new \App\Helpers\Helper)->getselectarr_manu($products) as $key => $value)
                            <div class="input-checkbox">
                                <input {{Request::input('brand') == $key ? "checked" : ""}} value="{{$key}}" name="brand" type="checkbox" id="brand-{{$key}}">
                                <label for="brand-{{$key}}">
                                    <span></span>
                                    {{(new \App\Helpers\Helper)->getmanu_byid($key)->manu_name}}
                                    <small>({{$value}})</small>
                                </label>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- /aside Widget -->
                </form>

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
                            <p class="product-category">{{ $value->manufacture->manu_name}}</p>
                            <h3 class="product-name"><a href="{{url('/product/'.$value->product_id)}}">{{ $value->product_name}}</a></h3>
                            <h4 class="product-price">{{number_format($value->product_price-$value->product_price*$value->product_sale/100)}}đ
                                <del class="product-old-price">{{number_format($value->product_price)}}đ</del>
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
                <div class="store-filter clearfix">
                    <div class="store-sort">
                        <form action="{{request()->fullUrl()}}" id="form_order" method="get">
                            <label>
                                Sort By:
                                <select name="orderby" id="orderby" class="input-select">
                                    <option {{ Request::input("orderby") == "none" ? "selected" : "" }} value="{{request()->fullUrlWithQuery(['orderby' => 'none'])}}">None</option>
                                    <option {{ Request::input("orderby") == "new" ? "selected" : "" }} value="{{request()->fullUrlWithQuery(['orderby' => 'new'])}}">New</option>
                                    <option {{ Request::input("orderby") == "sale" ? "selected" : "" }} value="{{request()->fullUrlWithQuery(['orderby' => 'sale'])}}">Sale</option>
                                    <option {{ Request::input("orderby") == "price_max" ? "selected" : "" }} value="{{request()->fullUrlWithQuery(['orderby' => 'price_max'])}}">Price ascending</option>
                                    <option {{ Request::input("orderby") == "price_min" ? "selected" : "" }} value="{{request()->fullUrlWithQuery(['orderby' => 'price_min'])}}">Price descending</option>
                                </select>
                            </label>
                        </form>
                    </div>
                </div>
                <!-- /store top filter -->

                <!-- store products -->
                <div class="row">
                    @foreach($products as $value)
                    <!-- product -->
                    <div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <a href="{{url('product/'.$value->product_id)}}">
                                    <img height="260px" style="max-width: 280px; margin: 0 auto; padding: 40px;" src="{{asset('img/'.$value->product_image)}}" alt="" width="262px" height="262px">
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
                                <p class="product-category">{{ $value->manufacture->manu_name}}</p>
                                <h3 class="product-name" style="height: 40px;"><a href="{{url('product/'.$value->product_id)}}">{{(new \App\Helpers\Helper)->substring_name($value->product_name)}}</a></h3>
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
                    <ul style="float: right;">
                        {{$products->links()}}
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
<script>
    const order = document.querySelector('#orderby');
    order.addEventListener('change', () => {
        window.location = order.value
    });

    const arr_categories = document.querySelectorAll('input[name=category]');
    const arr_brand = document.querySelectorAll('input[name=brand]');
    arr_categories.forEach(element => {
        element.addEventListener('change', function () {
            document.querySelector('#locpro').submit();
        });
    });
    arr_brand.forEach(element => {
        element.addEventListener('change', function () {
            document.querySelector('#locpro').submit();
        });
    });
    function price() {
        document.querySelector('#locpro').submit();
    }
</script>
@endsection