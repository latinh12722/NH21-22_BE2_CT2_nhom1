@extends('admin.layouts.admin-dash-layout')
@section('title','Dashboard')

@section('content')
<div class="">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Bill Detail</h1>
                    @if (session('status'))
                    <span style="background-color: #ffc107;border-radius: 50px; padding: 3px;">{{session('status')}}</span>
                    @endif
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
                        <li class="breadcrumb-item active">Add Protypes</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <h6 class="col-md-1" style="display: inline-block;">Bill: {{$bill->id}} </h6>
                    <h6 class="col-md-1" style="display: inline-block;">User_id: {{$bill->user_id}} </h6>
                    <h6 class="col-md-2" style="display: inline-block;">Name: {{$bill->name}} </h6>
                    <h6 class="col-md-2" style="display: inline-block;">Phone: {{$bill->phone}} </h6>
                    <h6 class="col-md-3" style="display: inline-block;">Address: {{$bill->address}} </h6>
                    <h6 class="col-md-1" style="display: inline-block;">{{$bill->created_at}} </h6>
                    <div class="col-md-2">
                        @if($bill->confirm == 0)
                        <a class="btn btn-info btn-sm" href="{{url('admin/bills/confirm/'.$bill->id)}}">
                            <i class="fa fa-check" aria-hidden="true"></i>
                            Confirm
                        </a>
                        @else
                        <a class="btn btn-danger btn-sm" href="{{url('admin/bills/unconfirm/'.$bill->id)}}">
                            <i class="fa fa-check" aria-hidden="false"></i>
                            unconfirmed
                        </a>
                        @endif
                        <button data-delete="{{url('admin/bills/remove/'.$bill->id)}}" id="delete_product" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th>
                                Image
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Quantity
                            </th>
                            <th>
                                Price
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <!-- foreach -->
                        @php $tong = 0; @endphp
                        @foreach($bill->bill_products as $value)
                        <tr>
                            <td>
                                <img src="{{asset('img/'.$value->product->product_image)}}" width="100px" height="100px">
                            </td>
                            <td>
                                {{$value->product->product_name}}
                            </td>
                            <td>
                                {{$value->quantity}}
                            </td>
                            <td>
                                {{number_format($value->product->product_price-$value->product->product_price*$value->product->product_sale/100)}}đ
                            </td>
                        </tr>
                        @php $tong += ($value->product->product_price-$value->product->product_price*$value->product->product_sale/100)*$value->quantity ; @endphp
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>Total: </td>
                            <td>{{number_format($tong)."đ"}}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@endsection