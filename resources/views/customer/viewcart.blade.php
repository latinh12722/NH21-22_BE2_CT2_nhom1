@extends('customer.includes.master')
@section('content')


<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row tb" style="font-size: 18px;font-weight:bold;padding: 10px 0px;">
            <div class="col-md-2 col-xs-6">
                Ảnh Sản phẩm
            </div>
            <div class="col-md-3 col-xs-6">
                Tên Sản Phẩm
            </div>
            <div class="col-md-2 col-xs-6">
                Giá
            </div>
            <div class="col-md-2 col-xs-6">
                Số lượng
            </div>
            <div class="col-md-2 col-xs-6">
                Thao tác
            </div>
        </div>
        @foreach(\Gloudemans\Shoppingcart\Facades\Cart::getContent() as $key => $cart)
        @php $product = (new \App\Helpers\Helper)->getproductbyid($cart->id) @endphp

        <div class="row tb" style="padding-top: 7px;">
            <div class="col-md-2 col-xs-6 ">
                <img src="{{asset('img/'.$product->product_image)}}" width="100px" height="100px">
            </div>
            <div class="col-md-3 col-xs-6 ">
                {{$product->product_name}}
            </div>
            <div class="col-md-2 col-xs-6 ">
                {{number_format($product->product_price-$product->product_price*$product->product_sale/100)}}đ
            </div>
            <div class="col-md-2 col-xs-6">
                <form id="addcart" action="{{ url('add-to-cart') }}" method="post">
                    @csrf
                    <div style="width: 100px;">
                        <input type="hidden" name="product_id" value="{{$product->product_id}}">
                        <input id="quantity_add" type="hidden" name="quantity" value="1">
                        <input name="soluong" data-urlremove="{{url('remove-cart/'.$product->product_id)}}" data-quantityold="{{$cart->quantity}}" value="{{$cart->quantity}}" type="number" style="width: 100%;" placeholder="number" id="input_quantity" />
                    </div>
                </form>
            </div>
            <div style="margin-left: -10px;" class="col-md-2 col-xs-6 cart-btns1">
                <a href="{{$product->product_id}}">Delete</a>
            </div>
        </div>
        <!-- /row -->
        @endforeach
        <div class="row tb tt">
            <div class="col-md-5 col-xs-6"></div>
            <h4 class="col-md-2 col-xs-6" style="vertical-align: text-bottom;">Tổng Tiền:</h4>
            <div class="col-md-2 col-xs-6" style="font-size: 18px;font-weight:bold">{{number_format((new \App\Helpers\Helper)->total_arraycard())}} đ</div>
            <div class="col-md-2 col-xs-6 cart-btns1" style="margin-left: -10px;"> <a href="{{url('bill/')}}">Checkout <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
<script>
    const input_quantity = document.querySelector('#input_quantity');
    input_quantity.addEventListener('change', function() {
        if (input_quantity.value == 0) {
            window.location = input_quantity.dataset.urlremove;
            console.log(input_quantity.dataset.urlremove);
        }
        if (input_quantity.dataset.quantityold > input_quantity.value) {
            document.querySelector('#quantity_add').value = -1;
            document.querySelector('#addcart').submit();
        }
        if (input_quantity.dataset.quantityold < input_quantity.value) {
            document.querySelector('#quantity_add').value = 1;
            document.querySelector('#addcart').submit();
        }

    });
</script>
@endsection