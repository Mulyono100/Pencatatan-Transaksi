<!-- <p>{{$kodemasuk}}</p>
<p>{{$cobaaa}}</p>
<p>{{$data['suplier']}}</p> -->
<!-- <p>{{$data['totalharga']}}</p> -->

<!-- 
<p>{{$mencoba['barangmasuk_id']}}</p>

<p>{{$mencoba['tanggal']}}</p>

<p>{{$mencoba['suplier_id']}}</p>

<p>{{$mencoba['barang_id']}}</p>

<p>{{$mencoba['harga_barang']}}</p>

<p>{{$mencoba['jumlah_beli']}}</p>

<p>{{$mencoba['total_harga']}}</p>
<p>{{$mencoba['subtotal']}}</p>
<p>{{$mencoba['bayar']}}</p>
<p>{{$mencoba['kembalian']}}</p> -->

<!-- <table border="2">

    @foreach($barangmasuk->detailmasuk as $p)
    <p>{{$p->barang->nama}}</p>
    <p>{{$p->jumlah_beli}}</p>
    <p>{{$p->total_harga}}</p>
    @endforeach
    <tr>
        <th>TANGGAL</th>
        <th>KODE MASUK</th>

        <th>SUPLIER</th>
        <th>NAMA BARANG</th>
        <th>HARGA BARANG</th>
        <th>JUMLAH BELI</th>
        <th>TOTAL HARGA</th>
        <th>SUBTOTAL</th>
        <th>BAYAR</th>
        <th>KEMBALIAN</th>

    </tr>
    @foreach($test as $t)
    <tr>

        <td>{{$test->tanggal}}</td>
        <td>{{$test->barangmasuk->kode_masuk}}</td>
        <td>{{$test->suplier->nama}}</td>
        <td>{{$test->barang->nama}}</td>
        <td>{{$test->harga_barang}}</td>
        <td>{{$test->jumlah_beli}}</td>
        <td>{{$test->total_harga}}</td>
        <td>{{$test->subtotal}}</td>
        <td>{{$test->bayar}}</td>
        <td>{{$test->kembalian}}</td>

    </tr>
    @endforeach
</table> -->




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
        @include('layout.navbar')
        @include('layout.sidebar')


        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    BARANG MASUK
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

                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="demo">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12">
                                            <div>
                                                <h2 class="text-center">{{$test->suplier->nama}}</h2>
                                                <h4 class="text-center"><span>Alamat : {{$test->suplier->alamat}}</span><br><span>Email : {{$barangmasuk->suplier->email}}</span><br><span>{{$barangmasuk->suplier->handphone}}</span> </h4>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-12">
                                            <hr />

                                            <div class="row">
                                                <div class="col-xs-6 col-md-6">
                                                    <address>
                                                        <?php $tanggal1 = date('d M Y', strtotime($test->tanggal)) ?>
                                                        <strong>TANGGAL:</strong>
                                                        {{$tanggal1}}<br />
                                                        <strong> KODE MASUK: </strong>{{$test->barangmasuk->kode_masuk}}
                                                    </address>
                                                </div>
                                                <div class="col-xs-6 col-md-6">
                                                    <address><br>
                                                        <strong>SUPLIER:</strong>
                                                        <!-- {{$barangmasuk->tgl}}<br /><br /> -->
                                                        {{$test->suplier->nama}}
                                                    </address>
                                                </div>


                                            </div>
                                        </div>
                                    </div>


                                    <table class="table table-bordered">

                                        <thead>
                                            <tr>

                                                <th>NAMA BARANG</th>
                                                <th>HARGA BARANG</th>
                                                <th>JUMLAH BELI</th>
                                                <th>TOTAL HARGA</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($barangmasuk->detailmasuk as $p)
                                            <?php $coba = $p->harga_barang; ?>
                                            <?php $coba11 = number_format($coba, 2); ?>
                                            <tr>


                                                <td>{{$p->barang->nama}}</td>


                                                <td>Rp. {{$coba11}}</td>
                                                <td>{{$p->jumlah_beli}}</td>

                                                <?php $total = $p->total_harga; ?>
                                                <?php $total11 = number_format($total, 2); ?>
                                                <td>Rp. {{$total11}}</td>
                                            </tr>
                                            @endforeach

                                            <tr>
                                                <td colspan="3" style="text-align: right;"><strong>Sub Total</strong></td>
                                                <?php $subtotal = $p->subtotal; ?>
                                                <?php $subtotal11 = number_format($subtotal, 2); ?>
                                                <td>Rp. {{$subtotal11}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="text-align: right;"><strong>Bayar</strong></td>
                                                <?php $bayar = $p->bayar; ?>
                                                <?php $bayar11 = number_format($bayar, 2); ?>
                                                <td>Rp. {{$bayar11}} </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="text-align: right;"><strong>Kembalian</strong></td>
                                                <?php $kembalian = $p->kembalian; ?>
                                                <?php $kembalian11 = number_format($kembalian, 2); ?>
                                                <td>Rp. {{$kembalian11}}</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12">
                                            <div class="row">
                                                <div class="col-xs-2 col-md-2"></div>
                                                <div class="col-xs-4 col-md-4"><b> HORMAT KAMI</b><br><br><br>( {{$p->suplier->nama}} )</div>
                                                <div class="col-xs-2 col-md-2"></div>
                                                <div class="col-xs-4 col-md-4"><b> TANDA TERIMA</b><br><br><br>( {{auth()->user()->username}} )</div>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>


                                </div>
                                <a href="/barangmasuk" class="btn btn-primary">Ke Barang Masuk</a>
                                <a href="#" id="basic" class="btn btn-success">Print</a>
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
        $(function() {
            $("#basic").on("click", function() {

                $(".demo").printThis({});
            });
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