@extends('backend.layouts.layout')

@section('pagename')
<?php
    $pagename = 'Add-Users';
?>
@endsection


@section('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables/dataTables.bootstrap.css')}}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Users Tables
            <small>advanced tables</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Users create</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Users Create</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="{{ route('admin.users.store') }}">
                            {{ csrf_field() }}
                            <div class="form-group col-md-6">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>password</label>
                                <input type="password" name="password" class="form-control" placeholder="password" value="{{ old('password') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>password_confrimation</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="password_confrimation" value="{{ old('password_confrimation') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-primary">Add User</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection


@section('scripts')
    @if (Session::has('message'))
        <script type="text/javascript">
        swal({
            title: "Success!",
            text: "{{ Session::get('message') }}",
            timer: 2000,
            showConfirmButton: false
        });
        </script>
    @endif
@endsection
