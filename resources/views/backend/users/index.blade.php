@extends('backend.layouts.layout')

@section('pagename')
<?php
    $pagename = 'users';
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
            <li class="active">Users</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Users Table</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="data" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">id</th>
                                    <th class="text-center">name</th>
                                    <th class="text-center">email</th>
                                    <th class="text-center">admin</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->admin == 1 ? 'Admin' : 'Visitor' }}</td>
                                        <td>
                                            <form method="post" action="{{ route('admin.users.destroy', ['id' => $user->id]) }}" style="display: inline-block">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                            <a href="{{ route('admin.users.edit', ['users' => $user->id]) }}" class="btn btn-success">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
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
    <!-- DataTables -->
    <script src="{{asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

    <script type="text/javascript">


    var lastIdx = null;

    $('#data thead th').each( function () {
        if($(this).index()  < 3 ){
            var classname = $(this).index() == 6  ?  'date' : 'dateslash';
            var title = $(this).html();
            $(this).html( '<input type="text" class="' + classname + ' form-control" data-value="'+ $(this).index() +'" placeholder=" search. '+title+'" />' + '<hr />' + title );
        }else if($(this).index() == 3){
            var title = $(this).html();
            $(this).html( '<select class="form-control"><option value="0"> User </option><option value="1">  Admin <option></select>' + '<hr />' + title );
        }

    });

    var table = $('#data').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('UsersData') }}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'admin', name: 'admin'},
            {data: 'Actions', name: ''},
        ],
        "stateSave": false,
        "responsive": true,
        "order": [[0, 'desc']],
        "pagingType": "full_numbers",
        aLengthMenu: [
            [5 ,25, 50],
            [5 ,25, 50],
        ],
        iDisplayLength: 5,
        fixedHeader: true,

        "oTableTools": {
            "aButtons": [
                {
                    "sExtends": "csv",
                    "sButtonText": "Excle File",
                    "sCharSet": "utf16le"
                },
                {
                    "sExtends": "copy",
                    "sButtonText": "Copy Data",
                },
                {
                    "sExtends": "print",
                    "sButtonText": "Print",
                    "mColumns": "visible",


                }
                ],

                "sSwfPath": "{{ Request::root()  }}/backend/cus/copy_csv_xls_pdf.swf"
            },

            "dom": '<"pull-left text-left" T><"pullright" i><"clearfix"><"pull-right text-right col-lg-6" f > <"pull-left text-left" l><"clearfix">rt<"pull-right text-right col-lg-6" pi > <"pull-left text-left" l><"clearfix"> '
            ,initComplete: function ()
            {
                var r = $('#data tfoot tr');
                r.find('th').each(function(){
                    $(this).css('padding', 8);
                });
                $('#data thead').append(r);
                $('#search_0').css('text-align', 'center');
            }

        });

        table.columns().eq(0).each(function(colIdx) {
            $('input', table.column(colIdx).header()).on('keyup change', function() {
                table
                .column(colIdx)
                .search(this.value)
                .draw();
            });




        });



        table.columns().eq(0).each(function(colIdx) {
            $('select', table.column(colIdx).header()).on('change', function() {
                table
                .column(colIdx)
                .search(this.value)
                .draw();
            });

            $('select', table.column(colIdx).header()).on('click', function(e) {
                e.stopPropagation();
            });
        });


        $('#data tbody')
        .on( 'mouseover', 'td', function () {
            var colIdx = table.cell(this).index().column;

            if ( colIdx !== lastIdx ) {
                $( table.cells().nodes() ).removeClass( 'highlight' );
                $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
            }
        } )
        .on( 'mouseleave', function () {
            $( table.cells().nodes() ).removeClass( 'highlight' );
        } );




    </script>


@endsection
