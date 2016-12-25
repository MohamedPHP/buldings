@extends('backend.layouts.layout')

@section('pagename')
<?php
    $pagename = 'Settings';
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
            SiteSetting
            <small>SiteSetting</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">SiteSetting</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">SiteSetting</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ url('admin/SiteSetting') }}" method="post">
                            {{ csrf_field() }}
                            @foreach ($siteSetting as $s)
                                    <div class="col-md-3">
                                        {{ $s->slug }}
                                    </div>
                                    <div class="col-md-9">
                                            <fieldset class="form-group">
                                                @if ($s->type == 0)
                                                    <input type="text" class="form-control" name="{{ $s->namesetting }}" value="{{ $s->value }}" placeholder="setting name">
                                                @else
                                                    <textarea name="{{ $s->namesetting }}" rows="8" cols="80">{{ $s->value }}</textarea>
                                                @endif
                                                @if ($errors->has($s->namesetting))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first($s->namesetting) }}</strong>
                                                    </span>
                                                @endif
                                            </fieldset>
                                    </div>
                            @endforeach
                            <button type="submit" class="btn btn-primary">Update Settings</button>
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

@endsection
