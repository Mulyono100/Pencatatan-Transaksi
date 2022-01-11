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
                    Barang Masuk
                    <small>advanced tables</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Tables</a></li>
                    <li class="active">Data tables</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Barang Masuk</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">

                                <a href="/tambahbarangmasuk" class="btn btn-primary btn-sm"><i class="fa fa-plus-square">TAMBAH DATA</i></a>
                                <br><br>
                                <div>
                                    @if(session('berhasil'))
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h4><i class="icon fa fa-check"></i> Alert!</h4>
                                        {{session('berhasil')}}
                                    </div>
                                    @endif
                                </div>
                                <div>
                                    @if(session('hapus'))
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h4><i class="icon fa fa-check"></i> Alert!</h4>
                                        {{session('hapus')}}
                                    </div>
                                    @endif
                                </div>
                                <div class="table-responsive">
                                    <table id="example1" class="table table-responsive">
                                        <?php $i = 1; ?>
                                        <thead>
                                            <tr>
                                                <th>NO</th>

                                                <th>TANGGAL</th>
                                                <th>KODE MASUK</th>
                                                <th>SUPLIER</th>
                                                <th>TOTAL BELI</th>
                                                <th>TOTAL HARGA</th>

                                                <th>AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($coba as $masuk)


                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <?php $tanggal1 = date('d M Y', strtotime($masuk->tanggal)) ?>
                                                <td>{{$tanggal1}}</td>
                                                <td>{{$masuk->kode_masuk}}</td>
                                                <td>{{$masuk->Suplier->nama}}</td>

                                                <td>{{$masuk->totalbeli}}</td>
                                                <?php $total = $masuk->subtotal; ?>
                                                <?php $total1 = number_format($total, 2); ?>
                                                <td>Rp. {{$total1}}</td>


                                                <td>
                                                    <a href="/barangmasuk/detail/{{$masuk->id}}" class="btn btn-success btn-xs">DETAIL</a>


                                                </td>
                                            </tr>

                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
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
    <script src="{{asset('templete/dist/js/demo.js"></script>
    <!-- page script -->
     <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
        $("#addRow").click(function() {
            var html = '';
            html += '<br>'
            html += '<div id="inputFormRow">';
            // html += '<div class="input-group mb-3">';
            html += ' <select class="form-control" name="kode[]" id="exampleFormControlSelect1"><?php foreach ($barangs as $s) : ?><option value="<?php echo $s->id ?>"><?php echo $s->nama; ?></option><?php endforeach;   ?></select>';
            html += '<div class=" input-group-append">';
            html +='<br>'
            html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
            html += '</div>';
            html += '</div>';

        $('#newRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeRow', function() {
            $(this).closest('#inputFormRow').remove();
        });
    </script>
</body>

</html>