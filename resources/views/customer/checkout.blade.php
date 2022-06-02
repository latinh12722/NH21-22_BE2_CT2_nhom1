@extends('customer.includes.master')
@section('content')

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">Checkout</h3>
				<ul class="breadcrumb-tree">
					<li><a href="index.php">Home</a></li>
					<li class="active">Checkout</li>
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
	<form action="{{url('bill/add')}}" id="form" method="post">
		@csrf
		<div class="container">
			<!-- row -->
			<div class="row">

				<div class="col-md-7">
					<!-- Billing Details -->
					<div class="billing-details">
						<div class="section-title">
							<h3 class="title">order Information</h3>
						</div>
						<div class="form-group">
							<input class="input" type="text" name="first-name" placeholder="First Name" required>
						</div>
						<div class="form-group">
							<input class="input" type="text" name="last-name" placeholder="Last Name" required>
						</div>
						<div class="form-group">
							<input class="input" type="email" name="email" placeholder="Email" required>
						</div>
						<div class="form-group">
							<input class="input" type="text" name="address" placeholder="Address" required>
						</div>
						<div class="form-group">
							<input class="input" type="text" name="city" placeholder="City" required>
						</div>
						<div class="form-group">
							<input class="input" type="text" name="country" placeholder="Country" required>
						</div>
						<div class="form-group">
							<input class="input" type="tel" name="tel" placeholder="Telephone" required>
						</div>

					</div>
					<!-- /Billing Details -->

					<!-- Order notes -->
					<div class="order-notes">
						<textarea name="ordernotes" class="input" placeholder="Order Notes"></textarea>
					</div>
					<!-- /Order notes -->
				</div>

				<!-- Order Details -->
				<div class="col-md-5 order-details">
					<div class="section-title text-center">
						<h3 class="title">Your Order</h3>
					</div>
					<div class="order-summary">
						<div class="order-col">
							<div><strong>PRODUCT</strong></div>
							<div><strong>TOTAL</strong></div>
						</div>
						<div class="order-products">
							@foreach(\Gloudemans\Shoppingcart\Facades\Cart::getContent() as $card)
							@php $product = (new \App\Helpers\Helper)->getproductbyid($card->id) @endphp


							<div class="order-col">
								<div>{{$card->quantity}}x{{$product->product_name}}</div>
								<div>{{number_format($product->product_price-$product->product_price*$product->product_sale/100)}}đ</div>
							</div>

							@endforeach

						</div>
						<div class="order-col">
							<div>Shiping</div>
							<div><strong>FREE</strong></div>
						</div>
						<div class="order-col">
							<div><strong>TOTAL</strong></div>
							<div><strong class="order-total">{{number_format((new \App\Helpers\Helper)->total_arraycard())}} đ</strong></div>
						</div>
					</div>
					<div class="payment-method">
						<div class="input-radio">
							<input type="radio" name="payment" id="payment-1" checked>
							<label for="payment-1">
								<span></span>
								Thanh toán khi nhận hàng
							</label>
							<div class="caption">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							</div>
						</div>
					</div>
					<div class="input-checkbox">
						<input type="checkbox" id="terms" required>
						<label for="terms">
							<span></span>
							I've read and accept the <a href="#">terms & conditions</a>
						</label>
					</div>
					<div class="order-submit" style="width: 100%;">
						<input class="primary-btn" style="width: 100%;" name="Place_order" type="submit" value="Place order">
					</div>

				</div>
				<!-- /Order Details -->
			</div>
			<!-- /row -->
		</div>
	</form>

	<!-- /container -->
</div>
<!-- /SECTION -->

@endsection