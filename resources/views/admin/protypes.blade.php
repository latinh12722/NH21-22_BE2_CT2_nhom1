@extends('admin.layouts.admin-dash-layout')
@section('title','Dashboard')

@section('content')

<div class="">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Protypes</h1>
                    @if (session('status'))
                    <span style="background-color: #ffc107;border-radius: 50px; padding: 3px;">{{session('status')}}</span>
                    @endif
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
                        <li class="breadcrumb-item active">Protypes</li>
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
                    <a href="{{url('admin/protypes/add')}}" type="button" class="btn btn-primary">
                        Add Protype
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
                            <th style="width: 20%">
                                ID
                            </th>
                            <th style="width: 50%">
                                Name
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $value) {
                        ?>
                            <tr>
                                <td>
                                    {{$value->type_id}}
                                </td>
                                <td>
                                    {{$value->type_name}}
                                </td>

                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="{{url('admin/protypes/edit/'.$value->type_id)}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <button data-delete="{{url('admin/protypes/delete-protype/'.$value->type_id)}}" id="delete_product" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </button>
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