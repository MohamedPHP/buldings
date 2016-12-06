<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image"><img alt="User Image" class="img-circle" src="{{asset('backend/dist/img/user2-160x160.jpg')}}"></div>
            <div class="pull-left info">
                <p>Alexander Pierce</p><a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div><!-- search form -->
        <form action="#" class="sidebar-form" method="get">
            <div class="input-group">
                <input class="form-control" name="q" placeholder="Search..." type="text"> <span class="input-group-btn"><button class="btn btn-flat" id="search-btn" name="search" type="submit"><span class="input-group-btn"><i class="fa fa-search"></i></span></button></span>
            </div>
        </form><!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{ $pagename == 'home' ? 'active' : '' }} treeview">
                <a href="#"><i class="fa fa-dashboard"></i> <span>Dashboard</span> <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                    <li class="active">
                        <a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a>
                    </li>
                    <li>
                        <a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-th"></i> <span>Widgets</span></a>
            </li>
            <li class="header">LABELS</li>
        </ul>
    </section><!-- /.sidebar -->
</aside><!-- Content Wrapper. Contains page content -->
