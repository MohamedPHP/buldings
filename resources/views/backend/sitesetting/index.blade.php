@extends('backend.layouts.layout')

@section('pagename')
<?php
    $pagename = 'Settings';
?>
@endsection


@section('styles')

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
                        <form action="{{ url('admin/SiteSetting') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @foreach ($siteSetting as $s)
                                    <div class="col-md-3">
                                        {{ $s->slug }}
                                    </div>
                                    <div class="col-md-9">
                                            <fieldset class="form-group">
                                                @if ($s->type == 0)
                                                    <input type="text" class="form-control" name="{{ $s->namesetting }}" value="{{ $s->value }}" placeholder="setting name">
                                                @elseif ($s->type == 1)
                                                    <textarea name="{{ $s->namesetting }}" class="form-control" rows="8" cols="80">{{ $s->value }}</textarea>
                                                @elseif ($s->type == 2)
                                                    @if (empty($s->value))
                                                        <h4>There Is No Image Yet</h4>
                                                    @else
                                                        <div style="width:150px;height150px;">
                                                            <img src="{{ asset($s->value) }}" class="img-responsive img-thumbnail" alt="Image">
                                                        </div>
                                                    @endif
                                                    <input type="file" class="form-control" name="{{ $s->namesetting }}">
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
    @if (Session::has('message'))
        <script type="text/javascript">
        swal({
            title: "Success!",
            text: "{{ Session::get('message') }}",
            timer: 3000,
            showConfirmButton: true
        });
        </script>
    @endif
@endsection
