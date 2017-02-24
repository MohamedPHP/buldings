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
                        <form method="post" action="{{ route('admin.buldings.store') }}" enctype="multipart/form-data">
                            {{--
                                `id`, `name`, `price`, `rooms`, `rent`, `square`,
                                `type`, `small_dis`, `meta`, `langtude`, `latitude`,
                                `larg_dis`, `status`, `user_id`
                            --}}
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{ old('name') }}">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="rooms">rooms</label>
                                        <input type="number" class="form-control" id="rooms" name="rooms" placeholder="rooms" value="{{ old('rooms') }}">
                                        @if ($errors->has('rooms'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('rooms') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="price">price</label>
                                        <input type="number" class="form-control" id="price" name="price" placeholder="price" value="{{ old('price') }}">
                                        @if ($errors->has('price'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('price') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="rent">rent</label>
                                        <select class="form-control" id="rent" name="rent">
                                            <option value="0" {{ old('rent') == 0 ? 'selected' : '' }}>egar</option>
                                            <option value="1" {{ old('rent') == 1 ? 'selected' : '' }}>Tmleek</option>
                                        </select>
                                        @if ($errors->has('rent'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('rent') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="square">square</label>
                                        <input type="text" class="form-control" id="square" name="square" placeholder="square" value="{{ old('square') }}">
                                        @if ($errors->has('square'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('square') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="type">type</label>
                                        <select class="form-control"  name="type">
                                            @foreach (bulding_type() as $key => $value)
                                                <option value="{{$key}}" {{ old('type') == $key ? 'selected' : '' }}>{{$value}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('type'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('type') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="meta">key words</label>
                                        <input type="text" class="form-control" id="meta" name="meta" placeholder="meta" value="{{ old('meta') }}">
                                        @if ($errors->has('meta'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('meta') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="langtude">langtude</label>
                                        <input type="text" class="form-control" id="langtude" name="langtude" placeholder="langtude" value="{{ old('langtude') }}">
                                        @if ($errors->has('langtude'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('langtude') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="latitude">latitude</label>
                                        <input type="text" class="form-control" id="latitude" name="latitude" placeholder="latitude" value="{{ old('latitude') }}">
                                        @if ($errors->has('latitude'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('latitude') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="status">status</label>
                                        <select class="form-control" name="status">
                                            @foreach (bulding_status() as $key => $value)
                                                <option value="{{$key}}" {{ old('status') == $key ? 'selected' : '' }}>{{$value}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('status'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('status') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="place_id">places</label>
                                        <select class="form-control"  name="place_id">
                                            @foreach (places() as $key => $value)
                                                <option value="{{$key}}" {{ old('place_id') == $key ? 'selected' : '' }}>{{$value}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('place_id'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('place_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="small_dis">small_dis</label>
                                        <textarea class="form-control" id="small_dis" name="small_dis" placeholder="small_dis" maxlength="160">{{ old('small_dis') }}</textarea>
                                        <p class="help-block"><span class="text-danger">Max Length is 160 char</span></p>
                                        @if ($errors->has('small_dis'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('small_dis') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="small_dis">larg_dis</label>
                                        <textarea class="form-control" id="larg_dis" name="larg_dis" placeholder="larg_dis">{{ old('larg_dis') }}</textarea>
                                        @if ($errors->has('larg_dis'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('larg_dis') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="image">image</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                        @if ($errors->has('image'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('image') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block">Add</button>
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
