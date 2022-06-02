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

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<form action="" method="post">
			<!-- row -->
			<div class="row tb" style="font-size: 18px;font-weight:bold;padding: 10px 0px;">
				<div class="col-md-1 col-xs-6">
					Bill ID
				</div>
				<div class="col-md-2 col-xs-6">
					Full Name
				</div>
				<div class="col-md-2 col-xs-6">
					Address
				</div>
				<div class="col-md-2 col-xs-6">
					Phone
				</div>
				<div style="text-align: center;" class="col-md-5 col-xs-6">
					Operation
				</div>
			</div>
			@foreach($bills as $value)
			<div class="row tb" style="padding-top: 7px;">
				<div class="col-md-1 col-xs-6 ">
					{{$value->id}}
				</div>
				<div class="col-md-2 col-xs-6 ">
					{{$value->name}}
				</div>
				<div class="col-md-2 col-xs-6 ">
					{{$value->address}}
				</div>
				<div class="col-md-2 col-xs-6">
					{{$value->phone}}
				</div>
				<div style="text-align: center;" class="col-md-5 col-xs-6 tt cart-btns1">
					<a style="width: 150px;" href="{{url('bill/bought/'.$value->id)}}">Checkbill <i class="fa fa-arrow-circle-right"></i></a>
				</div>

				<!-- /row -->
			</div>
			@endforeach
		</form>
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
@endsection