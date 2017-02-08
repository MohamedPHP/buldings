@extends('backend.layouts.layout')

@section('pagename')
<?php
    $pagename = 'Buldings';
?>
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Buldings
            <small>Buldings Index Page</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Buldings</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header"><h3 class="box-title">Buldings</h3></div><!-- /.box-header -->
                    <div class="box-body">
                        {{--
                             'id', 'name', 'price', 'rent', 'square', 'type',
                             'small_dis', 'meta', 'langtude', 'latitude', 'larg_dis',
                             'status', 'user_id', 'created_at', 'updated_at'
                        --}}

                        <table id="data" class="table table-bordered table-responsive table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">id</th>
                                    <th class="text-center">name</th>
                                    <th class="text-center">price</th>
                                    <th class="text-center">type</th>
                                    <th class="text-center">created_at</th>
                                    <th class="text-center">status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bus as $bu)
                                    <tr>
                                        <td class="text-center">{{ $bu->id }}</td>
                                        <td class="text-center">{{ $bu->name }}</td>
                                        <td class="text-center">{{ $bu->price }} LE</td>
                                        <td class="text-center">
                                            @if ($bu->type == 0)
                                                <span class="badge">Villa</span>
                                            @elseif ($bu->type == 1)
                                                <span class="badge">apartment</span>
                                            @else
                                                <span class="badge">beatchHome</span>
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $bu->created_at->format('Y-M-D') }}</td>
                                        <td class="text-center">
                                            @if ($bu->status == 1)
                                                <span class="btn btn-success btn-sm">Activated</span>
                                            @else
                                                <span class="btn btn-warning-outline btn-sm" style="box-shadow: 0px 0px 6px 0px #ccc;">Deactivated</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-success" href="{{route('admin.buldings.edit', ['id' => $bu->id])}}">Edit</a>
                                            <a class="btn btn-danger" href="{{ route('admin.buldings.delete', ['id' => $bu->id]) }}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            {{ $bus->links() }}
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->

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
