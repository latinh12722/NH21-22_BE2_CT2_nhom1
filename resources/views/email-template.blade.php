<div class="row">
    @foreach((new \App\Helpers\Helper)->getthreetopselling() as $value)
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
            </div>
            
        </div>
    </div>
    <!-- /product -->
    <div class="clearfix visible-sm visible-xs"></div>
    @endforeach
    <!-- /product -->
</div>