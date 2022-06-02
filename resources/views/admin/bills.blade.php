@extends('admin.layouts.admin-dash-layout')
@section('title','Dashboard')

@section('content')
<div class="">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Bills</h1>
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
                <h3 class="card-title">Bill </h3>

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
                            <th style="width:10%">
                                Bill id
                            </th>
                            <th style="width: 10%">
                                user id
                            </th>
                            <th>
                                Full name
                            </th>
                            <th>
                                Address
                            </th>
                            <th>
                                phone
                            </th>
                            <th>
                                ordernotes
                            </th>
                            <th style="width:20%;text-align: center;">
                                Action
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <!-- foreach -->
                        @foreach($data as $value)
                        <tr>
                            <td>
                                {{$value->id}}
                            </td>
                            <td>
                                {{$value->user_id}}
                            </td>
                            <td>
                                {{$value->name}}
                            </td>
                            <td>
                                {{$value->address}}
                            </td>
                            <td>
                                {{$value->phone}}
                            </td>
                            <td>
                                {{$value->order_note}}
                            </td>

                            <td style="text-align: center;" class="project-actions">
                                <a class="btn btn-info btn-sm" href="{{url('admin/bills/'.$value->id)}}">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                    Confirm
                                </a>
                                <a class="btn btn-info btn-sm" href="{{url('admin/bills/'.$value->id)}}">
                                    <i class="fa fa-arrow-circle-right"></i>
                                    </i>
                                    Check bill
                                </a>
                                <a class="btn btn-danger btn-sm" href="delete.php?bill_id=">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
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