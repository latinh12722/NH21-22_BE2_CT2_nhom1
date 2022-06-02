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
                    <h6 class="col-md-2" style="display: inline-block;">Name: {{$bill->name}} </h6>
                    <h6 class="col-md-2" style="display: inline-block;">Phone: {{$bill->phone}} </h6>
                    <h6 class="col-md-3" style="display: inline-block;">Address: {{$bill->address}} </h6>
                    <h6 class="col-md-2" style="display: inline-block;">{{$bill->created_at}} </h6>
                    <div class="col-md-2">
                        <a class="btn btn-info btn-sm" href="">
                            <i class="fa fa-check" aria-hidden="true"></i>
                            Confirm
                        </a>
                        <a class="btn btn-danger btn-sm" href="delete.php?bill_id=">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>
                    </div>
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

                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@endsection