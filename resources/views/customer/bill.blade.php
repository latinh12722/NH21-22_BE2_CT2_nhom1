@extends('customer.includes.master')
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">Regular Page</h3>
                <ul class="breadcrumb-tree">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Bill</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row" style="margin-bottom: 30px;font-size: 18px;font-weight:bold;padding: 10px 0px;">
            <div class="col-md-1 col-xs-6">
                Bill: {{$bill->id}}
            </div>
            <div class="col-md-3 col-xs-6">
                Full Name: {{$bill->name}}
            </div>
            <div class="col-md-3 col-xs-6">
                Address: {{$bill->address}}
            </div>
            <div class="col-md-3 col-xs-6">
                Phone: {{$bill->phone}}
            </div>
            <div class="col-md-2 col-xs-6">
                Time: {{$bill->created_at}}
            </div>
        </div>
        <div class="row tb" style="font-size: 18px;font-weight:bold;padding: 10px 0px;">
            <div class="col-md-2 col-xs-6">
                Ảnh đại diện
            </div>
            <div class="col-md-3 col-xs-6">
                Sản Phẩm
            </div>
            <div class="col-md-2 col-xs-6">
                Giá
            </div>
            <div class="col-md-2 col-xs-6">
                Số lượng
            </div>
        </div>
        <!-- foreach -->
        @foreach($bill->bill_products as $value)
        <div class="row tb" style="padding-top: 7px;">
            <div class="col-md-2 col-xs-6 ">
                <img src="{{asset('img/'.$value->product->product_image)}}" width="100px" height="100px">
            </div>
            <div class="col-md-3 col-xs-6 ">
                {{$value->product->product_name}}
            </div>
            <div class="col-md-2 col-xs-6 ">
            {{number_format($value->product->product_price-$value->product->product_price*$value->product->product_sale/100)}}đ
            </div>
            <div class="col-md-2 col-xs-6">
                <div style="width: 100px;">
                    <input disabled value="{{$value->quantity}}" type="number" style="width: 100%;" placeholder="number" id="numPeople" />
                </div>
            </div>
        </div>
        <!-- /row -->
        @endforeach
    </div>
    <!-- /container -->
</div>
@endsection