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
            <section class="content-header">
                <h1>
                    Barang

                </h1>
                <ol class="breadcrumb">
                    <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Data tables</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row justify-content-md-center">
                    <div class="col-md-6">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">EDIT BARANG</h3>
                            </div>
                            <!-- /.box-header -->

                            <!-- /.box-body -->
                            <form method="POST" action="/barang/edit/{{$ubah->id}}">
                                {{csrf_field()}}
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Kode Barang </label>
                                        <div class="input-group"><span class="input-group-addon"> <i class="fa fa-folder"></i></span>
                                            <input name="kode" type="text" class="form-control" id="formGroupExampleInput" value="{{$ubah->kode}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Nama Barang</label>
                                        <div class="input-group"> <span class="input-group-addon"> <i class="fa fa-tag"></i></span>

                                            <input name="nama" type="text" class="form-control" id="formGroupExampleInput" value="{{$ubah->nama}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Kategori Barang</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"> <i class="fa fa-reorder"></i></span>
                                            <select class="form-control" name="kategoribarang" id="select2">
                                                <option value="" selected disabled>{{$ubah->kategoribarang->nama}}</option>
                                                @foreach($kategori as $k)
                                                <option value="{{$k->id}}" {{$k->id == $ubah->kategoribarang_id ? 'selected' : ' '}}>{{$k->nama}}</option>
                                                @endforeach




                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Harga</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">Rp</span>
                                            <input name="harga" type="number" class="form-control" id="formGroupExampleInput" value="{{$ubah->harga}}">
                                            <span class="input-group-addon">.00</span>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Satuan</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">Rp</span>
                                            <input name="satuan" type="text" class="form-control" id="formGroupExampleInput" value="{{$ubah->satuan}}">
                                            <span class="input-group-addon">.00</span>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
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
    <script src="{{asset('templete/dist/js/demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- page script -->
    <script>
        $(function() {
            
       
        })
    </script>
</body>

</html>