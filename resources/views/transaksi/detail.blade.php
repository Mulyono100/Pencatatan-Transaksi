<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Data Tables</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('templete/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('templete/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('templete/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('templete/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('templete/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('templete/dist/css/skins/_all-skins.min.css')}}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <!-- <style>
        table tr {
            font-size: 10px;
        }

        td {
            font-size: 14px;
        }
    </style> -->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('kasir.navbar')
        @include('kasir.sidebar')


        <div class="content-wrapper">
            <!-- Content Header (Page header) -->


            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">

                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="demo">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12">
                                            <div>
                                                <h2 class="text-center">WARUNG SEMBAKO</h2>
                                                <h4 class="text-center">Jln Dago Giri no 58</h4>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-12">
                                            <hr />

                                            <div class="row">
                                                <div class="col-xs-6 col-md-6">
                                                    <address>
                                                        <strong>Order Date:</strong><?php $tanggal = date('d M Y', strtotime($transaksi->tanggal)); ?>
                                                        {{$tanggal}}<br />
                                                        <strong> KODE TRANSAKSI:</strong> {{$transaksi->kode_transaksi}}
                                                        <br>
                                                        <strong>KASIR: </strong>{{Auth()->user()->name}}
                                                    </address>
                                                </div>


                                            </div>
                                        </div>
                                    </div>


                                    <table id="example1" class="table table-bordered table-hover">

                                        <thead>
                                            <tr>
                                                <th>NAMA BARANG</th>
                                                <th>HARGA BARANG</th>
                                                <th>JUMLAH BELI</th>
                                                <th>TOTAL HARGA</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($transaksi->detailtransaksi as $st)
                                            <tr>
                                                <td><span>{{$st->barang->nama}}</span></td>


                                                <?php $coba = number_format($st->harga_barang, 2); ?>
                                                <td><span>Rp. {{$coba}}</span></td>

                                                <td><span>{{$st->total_beli}}</span></td>

                                                <?php $coba1 = number_format($st->total_harga, 2); ?>
                                                <td><span>Rp. {{$coba1}}</span></td>

                                            </tr>
                                            @endforeach

                                            <tr>

                                                <td colspan="3" style="text-align: right;"><strong>Sub Total</strong></td>
                                                <?php $coba2 = number_format($st->total_harga, 2); ?>
                                                <td>Rp. {{$coba2}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="text-align: right;"><strong>Bayar</strong></td>
                                                <?php $coba3 = number_format($st->bayar, 2); ?>
                                                <td>Rp. {{$coba3}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="text-align: right;"><strong>Sub Total</strong></td>
                                                <?php $coba4 = number_format($st->kembalian, 2); ?>
                                                <td>Rp. {{$coba4}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <a href="/dashboardkasir" style="text-align: center;" class="btn btn-primary">DASHBOARD</a>
                            <a href="#" id="basic" style="text-align: center;" class="btn btn-success">PRINT</a>

                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->


                    </div>
                    <!-- /.col -->

                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.18
            </div>
            <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->

        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->
    <script type="text/javascript">
        // add row
    </script>
    <!-- jQuery 3 -->
    <script src="{{asset('templete/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset('templete/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- DataTables -->
    <script src="{{asset('templete/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('templete/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <!-- SlimScroll -->
    <script src="{{asset('templete/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('templete/bower_components/fastclick/lib/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('templete/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('templete/dist/js/demo.js')}}"></script>
    <!-- page script -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{asset('js/print.js')}}"></script>
    <script>
        $("#basic").on("click", function() {

            $(".demo").printThis({});
        });
    </script>
    <script>
        $(function() {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })
        $('#select2').select2()
    </script>
</body>

</html>