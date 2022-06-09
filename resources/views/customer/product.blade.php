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
                    <li><a href="#">Home</a></li>
                    <li><a href="{{url('store')}}">All Categories</a></li>
                    <li><a href="{{url('store/manu/'.$product->manu_id)}}">{{ $product->manufacture->manu_name}}</a></li>
                    <li><a href="{{url('store/type/'.$product->type_id)}}">{{$product->protype->type_name}}</a></li>
                    <li class="active">{{$product->product_name}}</li>
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
            <!-- Product main img -->
            <div class="col-md-5 col-md-push-2">
                <div id="product-main-img">
                    <div class="product-preview">
                        <img src="{{asset('img/'.$product->product_image)}}">
                    </div>

                    <!-- <div class="product-preview">
                        <img src="./img/product03.png" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="./img/product06.png" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="./img/product08.png" alt="">
                    </div> -->
                </div>
            </div>
            <!-- /Product main img -->

            <!-- Product thumb imgs -->
            <div class="col-md-2  col-md-pull-5">
                <div id="product-imgs">
                    <div class="product-preview">
                        <img src="{{asset('img/'.$product->product_image)}}">
                    </div>
                    <!-- 
                    <div class="product-preview">
                        <img src="./img/product03.png" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="./img/product06.png" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="./img/product08.png" alt="">
                    </div> -->
                </div>
            </div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <div class="col-md-5">
                <div class="product-details">


                    <h2 class="product-name"> {{$product->product_name}}</h2>
                    <div>
                        <div class="product-rating">
                            @for($i=1;$i<=5;$i++) @if($i<=(new \App\Helpers\Helper)->rating_percentage($product->product_id))
                                <i class="fa fa-star"></i>
                                @else
                                <i class="fa fa-star-o"></i>
                                @endif
                                @endfor
                        </div>

                    </div>
                    <div>
                        <h3 class="product-price">{{number_format($product->product_price-$product->product_price*$product->product_sale/100)}}đ
                            <del class="product-old-price">{{number_format($product->product_price)}}đ</del>
                        </h3>
                        <span class="product-available">In Stock</span>
                    </div>
                    <p>{{substr($product->product_description,0,100)."..."}}</p>

                    <form action="{{ url('add-to-cart') }}" method="POST">
                        @csrf
                        <div class="add-to-cart">
                            <div class="qty-label">
                                Qty
                                <div class="input-number">
                                    <input type="number" value="1" name="quantity">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                            </div>
                            <input type="hidden" name="product_id" value="{{$product->product_id}}">
                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        </div>
                    </form>

                    <ul class="product-btns">
                        <li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
                        <li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
                    </ul>

                    <ul class="product-links">
                        <li>Category:</li>
                        <li><a href="{{url('store/manu/'.$product->manu_id)}}">{{ $product->manufacture->manu_name}}</a></li>
                    </ul>

                    <ul class="product-links">
                        <li>Share:</li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul>

                </div>
            </div>
            <!-- /Product details -->

            <!-- Product tab -->
            <div class="col-md-12">
                <div id="product-tab">
                    <!-- product tab nav -->
                    <ul class="tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                        <li><a data-toggle="tab" href="#tab2">Details</a></li>
                        <li><a data-toggle="tab" href="#tab3">Reviews ({{(new \App\Helpers\Helper)->getTotalStar($product->product_id)}})</a></li>
                    </ul>
                    <!-- /product tab nav -->

                    <!-- product tab content -->
                    <div class="tab-content">
                        <!-- tab1  -->
                        <div id="tab1" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>{{$product->product_description}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab1  -->

                        <!-- tab2  -->
                        <div id="tab2" class="tab-pane fade in">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>{{$product->product_description}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab2  -->

                        <!-- tab3  -->
                        <div id="tab3" class="tab-pane fade in">
                            <div class="row">
                                <!-- Rating -->
                                <div class="col-md-3">
                                    <div id="rating">
                                        <div class="rating-avg">
                                            <span>{{(new \App\Helpers\Helper)->rating_percentage($product->product_id)}}</span>
                                            <div class="rating-stars">
                                                @for($i=1;$i<=5;$i++) @if($i<=(new \App\Helpers\Helper)->rating_percentage($product->product_id))
                                                    <i class="fa fa-star"></i>
                                                    @else
                                                    <i class="fa fa-star-o"></i>
                                                    @endif
                                                    @endfor
                                            </div>
                                        </div>
                                        <ul class="rating">
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: {{(new \App\Helpers\Helper)->getRatingStar(5,$product -> product_id)}}%;"></div>
                                                </div>
                                                <span class="sum">{{(new \App\Helpers\Helper)->getCountCommentByProductId(5,$product -> product_id)}}</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: {{(new \App\Helpers\Helper)->getRatingStar(4,$product -> product_id)}}%;"></div>
                                                </div>
                                                <span class="sum">{{(new \App\Helpers\Helper)->getCountCommentByProductId(4,$product -> product_id)}}</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: {{(new \App\Helpers\Helper)->getRatingStar(3,$product -> product_id)}}%;"></div>
                                                </div>
                                                <span class="sum">{{(new \App\Helpers\Helper)->getCountCommentByProductId(3,$product -> product_id)}}</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: {{(new \App\Helpers\Helper)->getRatingStar(2,$product -> product_id)}}%;"></div>
                                                </div>
                                                <span class="sum">{{(new \App\Helpers\Helper)->getCountCommentByProductId(2,$product -> product_id)}}</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: {{(new \App\Helpers\Helper)->getRatingStar(1,$product -> product_id)}}"></div>
                                                </div>
                                                <span class="sum">{{(new \App\Helpers\Helper)->getCountCommentByProductId(1,$product -> product_id)}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Rating -->

                                <!-- Reviews -->
                                <div class="col-md-6">
                                    <div id="reviews">
                                        <ul class="reviews">
                                            @foreach ($product->comments as $comment)

                                            <li>
                                                <div class="review-heading">
                                                    <h5 class="name">{{$comment -> name}}</h5>
                                                    <p class="date">{{$comment -> created_at}}</p>
                                                    <div class="review-rating">
                                                        @for($i = 1; $i <= 5; $i++) @if($i <=$comment -> rating )
                                                            <i class="fa fa-star"></i>
                                                            @else
                                                            <i class="fa fa-star-o empty"></i>
                                                            @endif
                                                            @endfor
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>{{$comment -> comment_content}}</p>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>

                                    </div>
                                </div>
                                <!-- /Reviews -->

                                <!-- Review Form -->
                                <div class="col-md-3">
                                    <div id="review-form">
                                        <form class="review-form">
                                            <input id="comment_name" class="input" type="text" placeholder="Your Name">
                                            <input id="comment_phone" class="input" type="email" placeholder="Your Phone">
                                            <textarea id="comment_content" class="input" placeholder="Your Review"></textarea>
                                            <div class="input-rating">
                                                <span>Your Rating: </span>
                                                <div class="stars">
                                                    <input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
                                                    <input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
                                                    <input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
                                                    <input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
                                                    <input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                                                </div>
                                            </div>
                                            <button data-url="{{ route('comments.store') }}" data-product-id="{{$product->product_id}}" id="btncomment" type="button" class="primary-btn">Submit</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- /Review Form -->
                            </div>
                        </div>
                        <!-- /tab3  -->
                    </div>
                    <!-- /product tab content  -->
                </div>
            </div>
            <!-- /product tab -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- Section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3 class="title">Related Products</h3>
                </div>
            </div>
            @foreach((new \App\Helpers\Helper)->getRelatedProducts($product->product_id) as $value)
            <!-- product -->
            <div class="col-md-3 col-xs-6">
                <div class="product">
                    <div class="product-img">
                        <a href="http://127.0.0.1:8000/product/{{$value->product_id}}">
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
                        <p class="product-category">Category</p>
                        <h3 class="product-name" style="margin: auto 0 ;width: auto; height: 40px;">
                            <a href="http://127.0.0.1:8000/product/{{$value->product_id}}">{{$value->product_name}}</a>
                        </h3>
                        <h4 class="product-price">{{number_format($value->product_price-$value->product_price*$value->product_sale/100)}}đ
                            <del class="product-old-price">{{number_format($value->product_price)}}đ</del>
                        </h4>
                        <div class="product-rating">
                        </div>
                        <div class="product-btns">
                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
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
            </div>
            <!-- /product -->
            <div class="clearfix visible-sm visible-xs"></div>
            @endforeach

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /Section -->

@endsection