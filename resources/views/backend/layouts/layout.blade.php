<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8">
    	<meta content="IE=edge" http-equiv="X-UA-Compatible">
    	<title>AdminLTE 2 | Dashboard</title><!-- Tell the browser to be responsive to screen width -->
    	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"><!-- Bootstrap 3.3.6 -->

        {!! Html::style('backend/bootstrap/css/bootstrap.min.css') !!}
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"><!-- Ionicons -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet"><!-- Theme style -->
        {!! Html::style('backend/dist/css/AdminLTE.min.css') !!}
        {!! Html::style('backend/dist/css/skins/_all-skins.min.css') !!}
        {!! Html::style('backend/plugins/iCheck/flat/blue.css') !!}
        {!! Html::style('backend/plugins/morris/morris.css') !!}
        {!! Html::style('backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css') !!}
        {!! Html::style('backend/plugins/datepicker/datepicker3.css') !!}
        {!! Html::style('backend/plugins/daterangepicker/daterangepicker.css') !!}
        {!! Html::style('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}
        {!! Html::style('backend/plugins/sweetalert.css') !!}

        @yield('pagename')

        @yield('styles')

    	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            @include('backend.includes.header')
            @include('backend.includes.sidebar')

    		<div class="content-wrapper">
                @yield('content')
    		</div><!-- /.content-wrapper -->


            @include('backend.includes.footer')
            @include('backend.includes.sidebarcontrol')
    		<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
    		<div class="control-sidebar-bg"></div>
        </div><!-- ./wrapper -->
        @include('backend.includes.scripts')
        @yield('scripts')
    </body>
</html>
