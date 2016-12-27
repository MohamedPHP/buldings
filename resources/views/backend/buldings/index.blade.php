@extends('backend.layouts.layout')

@section('pagename')
<?php
    $pagename = 'Buldings';
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
                            <thead style="background-color: #444">
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

                            </tbody>
                        </table>

                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->

@endsection


@section('scripts')
    <!-- DataTables -->
    <script src="{{asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

    <script type="text/javascript">


    var lastIdx = null;

    $('#data thead th').each( function () {
        if($(this).index()  < 13 ){
            var classname = $(this).index() == 6  ?  'date' : 'dateslash';
            var title = $(this).html();
            $(this).html( '<input type="text" class="' + classname + ' form-control" data-value="'+ $(this).index() +'" placeholder=" search. '+title+'" />' + '<hr />' + title );
        }

    });

    var table = $('#data').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('admin.buldings.data') }}',
        columns: [
            {data: 'id',        name: 'id'},
            {data: 'name',      name: 'name'},
            {data: 'price',     name: 'price'},
            {data: 'type',      name: 'type'},
            {data: 'created_at',name: 'created_at'},
            {data: 'status',    name: 'status'},
            {data: 'Actions',   name: ''},
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
