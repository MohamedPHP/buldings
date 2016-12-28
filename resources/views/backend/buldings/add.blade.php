@extends('backend.layouts.layout')

@section('pagename')
<?php
    $pagename = 'Add-Buldings';
?>
@endsection


@section('styles')

@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Buldings
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Buldings create</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Buldings Create</h3>
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
                        <form method="post" action="{{ route('admin.buldings.store') }}">
                            {{ csrf_field() }}
                            {{--
                                `id`, `name`, `price`, `rooms`, `rent`, `square`,
                                `type`, `small_dis`, `meta`, `langtude`, `latitude`,
                                `larg_dis`, `status`, `user_id`
                            --}}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="rooms">rooms</label>
                                        <input type="number" class="form-control" id="rooms" name="rooms" placeholder="rooms">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="price">price</label>
                                        <input type="number" class="form-control" id="price" name="price" placeholder="price">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="rent">rent</label>
                                        <select class="form-control" id="rent" name="rent">
                                            <option value="0">egar</option>
                                            <option value="1">Tmleek</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="square">square</label>
                                        <input type="text" class="form-control" id="square" name="square" placeholder="square">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="type">type</label>
                                        <select class="form-control" id="type" name="type">
                                            @foreach (bulding_type() as $key => $value)
                                                <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="meta">key words</label>
                                        <input type="text" class="form-control" id="meta" name="meta" placeholder="meta">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="langtude">langtude</label>
                                        <input type="text" class="form-control" id="langtude" name="langtude" placeholder="langtude">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="latitude">latitude</label>
                                        <input type="text" class="form-control" id="latitude" name="latitude" placeholder="latitude">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="status">status</label>
                                        <select class="form-control" id="type" name="type">
                                            @foreach (bulding_status() as $key => $value)
                                                <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="small_dis">small_dis</label>
                                        <textarea class="form-control" id="small_dis" name="small_dis" placeholder="small_dis" maxlength="160"></textarea>
                                        <p class="help-block">Max Length is 160 char</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="small_dis">larg_dis</label>
                                        <textarea class="form-control" id="larg_dis" name="larg_dis" placeholder="larg_dis"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-warning btn-block">Add</button>
                                </div>

                            </div>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section>
    <!-- /.content -->
@endsection


@section('scripts')

@endsection
