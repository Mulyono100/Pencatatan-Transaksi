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
    <!-- select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('layout.navbar')
        @include('layout.sidebar')


        <div class="content-wrapper">
            <!-- Content Header (Page header) -->


            <!-- Main content -->
            <section class="content">

                <div class="row">

                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header">

                                <a href="#" id="basic" class="btn btn-success">PRINT</a>

                            </div>
                            <div class="demo">
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <h2 class="text-center">LAPORAN BARANG</h2>
                                    <p style="text-align: center;"><strong></strong></p style="text-align: center;">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>KODE BARANG</th>
                                                <th>NAMA BARANG</th>
                                                <th>KATEGORI BARANG</th>


                                                <th>STOCK</th>
                                                <th>SATUAN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($barang as $b)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$b->kode}}</td>
                                                <td>{{$b->nama}}</td>
                                                <td>{{$b->kategoribarang->nama}}</td>

                                                <td>{{$b->stock}}</td>
                                                <td>{{$b->satuan}}</td>
                                            </tr>
                                            @endforeach





                                    </table>
                                    <br><br><br>
                                    <div class="row">
                                        <div class="col-md-10"></div>
                                        <div class="col-md-1">{{Auth()->user()->name}}</div>
                                    </div><br><br>
                                    <div class="row">
                                        <div class="col-md-10"></div>
                                        <div class="col-md-1">(_______)</div>
                                    </div>

                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->


                        </div>
                        <!-- /.col -->

                    </div>
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
    <!-- select2 -->
    <script>
        $(document).ready(function() {

            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
            $('.select2').select2()
            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })
            //Money Euro

        })
    </script>
    <script src="">
        window.print();
    </script>
</body>

</html>