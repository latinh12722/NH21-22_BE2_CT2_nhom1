@extends('admin.layouts.admin-dash-layout')
@section('title','Dashboard')

@section('content')

<div class="">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Protypes Edit</h1>
                    @if (session('status'))
                    <span style="background-color: #ffc107;border-radius: 50px; padding: 3px;">{{session('status')}}</span>
                    @endif
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Protypes</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{url('admin/protypes/edit-protype')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">General</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Protypes ID</label>
                                <input value="{{$protype->type_id}}" disabled type="text" id="inputName" class="form-control">
                                <input type="hidden" name="type_id" value="{{$protype->type_id}}">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Protypes Name</label>
                                <input name="type_name" type="text" value="{{$protype->type_name}}" id="inputName" class="form-control">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div>

            <div class="row">
                <div class="col-12">
                    <a href="protypes.php" class="btn btn-secondary">Cancel</a>
                    <input type="submit" name="submit_prodtypes" value="Update" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
</div>

@endsection