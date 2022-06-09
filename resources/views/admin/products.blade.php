@extends('admin.layouts.admin-dash-layout')
@section('title','Dashboard')

@section('content')

<div class="">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Products</h1>
                    @if (session('status'))
                    <span style="background-color: #ffc107;border-radius: 50px; padding: 3px;">{{session('status')}}</span>
                    @endif
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
                        <li class="breadcrumb-item active">Products</li>
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
                <div class="card-title">
                    <a href="{{url('admin/products/add')}}" type="button" class="btn btn-primary">
                        Add Product
                    </a>
                    ( {{count($data)}} )
                </div>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                ID
                            </th>
                            <th style="width: 10%">
                                Name
                            </th>
                            <th style="width: 10%">
                                Image
                            </th>
                            <th>
                                Price
                            </th>
                            <th>
                                Description
                            </th>
                            <th>
                                Manufacture
                            </th>
                            <th style="width: 8%">
                                Protype
                            </th>
                            <th>
                                Sale
                            </th>
                            <th style="width:20%; text-align: center;">
                                Action
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $value) {
                        ?>
                            <tr>
                                <td>
                                    {{$value->product_id}}
                                </td>
                                <td>
                                    {{$value->product_name}}
                                </td>
                                <td>
                                    <img src="{{asset('img/'.$value->product_image)}}" width="100px" alt="">
                                </td>
                                <td>
                                    {{number_format($value->product_price)}}đ
                                </td>
                                <td class="project_progress">
                                    {{substr($value->product_description,0,104)."..."}}
                                </td>
                                <td class="project-state">
                                    {{$value->manufacture->manu_name}}
                                </td>
                                <td class="">
                                    {{$value->protype->type_name}}
                                </td>
                                <td>
                                    {{$value->product_sale}}%
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="{{url('admin/products/edit/'.$value->product_id)}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <button data-delete="{{url('admin/products/delete-product/'.$value->product_id)}}" id="delete_product" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </button>
                                    <a class="btn btn-info btn-sm" href="{{url('admin/products/comments/'.$value->product_id)}}">
                                        <i class="far fa-comments"></i>
                                        Comments
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>


@endsection