<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <!-- <div class="user-panel"> -->

        <!-- <img src="{{asset('loginn/logo/kenala.png')}}"> -->


        <!-- </div> -->
        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Dashboard</li>
            <li class="">
                <a href="/dashboard">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">

                    </span>
                </a>

            </li>


            <li class="header">Data Barang</li>
            <li class="treeview">

                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Master</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/databarang"><i class="fa fa-circle-o"></i> Data Barang</a></li>
                    <li><a href="/kategoribarang"><i class="fa fa-circle-o"></i> Kategori Barang</a></li>
                    <li class="">
                        <a href="/suplier">
                            <i class="fa fa-circle-o"></i>
                            <span>Suplier</span>
                            <span class="pull-right-container">

                            </span>
                        </a>

                    </li>
                </ul>
            </li>



            <li class="">
                <a href="/barangmasuk">
                    <i class="fa fa-edit"></i> <span>Barang Masuk</span>
                    <span class="pull-right-container">

                    </span>
                </a>

            </li>
            <li class="treeview">

                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Laporan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/cetakmasuk"><i class="fa fa-circle-o"></i> Laporan Barang Masuk</a></li>
                    <li><a href="/cetakbarang"><i class="fa fa-circle-o"></i> Laporan Data Barang</a></li>

                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>