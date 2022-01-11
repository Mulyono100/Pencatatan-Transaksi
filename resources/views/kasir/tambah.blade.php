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
        @include('kasir.navbar')
        @include('kasir.sidebar')


        <div class="content-wrapper">


            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-md-12">

                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">TRANSAKSI</h3>
                            </div>

                            <div class="box-body">

                                <form action="" method="POST">
                                    {{csrf_field()}}
                                    <!-- <div class="col-md-3">
                                        <div class="form-group">
                                            <label>NAMA BARANG</label>
                                            <select class="productname" name="product" id="select2" style="width: 100%;">

                                                <option selected="selected" disabled="true">-Pilih Barang-</option>
                                                @foreach($product as $barang)
                                                <option value="{{$barang->id}}">{{$barang->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>HARGA</label><br>
                                            <input type="text" class="prod_price" name="harga" autocomplete="off" disabled="true">
                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>JUMLAH BELI</label>
                                            <input type="text" class="" id="jumlah_beli" name="jumlah" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>TOTAL HARGA</label>
                                            <input type="text" class="" id="total_harga" name="total" autocomplete="off" disabled="disable">
                                        </div>
                                    </div> -->

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>KODE TRANSAKSI</label><br>
                                                    <input type="text" class="form-control" name="harga" autocomplete="off" disabled="true" value="TR001">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>NAMA BARANG</label>
                                                    <select class="productname" name="product" id="select2" style="width: 100%;">

                                                        <option selected="selected" disabled="true">-Pilih Barang-</option>
                                                        @foreach($product as $barang)
                                                        <option value="{{$barang->id}}">{{$barang->nama}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>HARGA</label><br>
                                                    <input type="text" class="form-control prod_price" id="" name="harga" autocomplete="off" disabled="true">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>JUMLAH BELI</label>
                                                    <input type="text" class="form-control jumlah_beli" id="" name="jumlah" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>TOTAL HARGA</label>
                                                    <input type="text" class="form-control" id="total_harga" name="total" autocomplete="off" disabled="disable">
                                                </div>
                                            </div>
                                            <div class="col-md-2"><br>
                                                <button id="addRow" type="button" class="btn btn-info">TAMBAH</button>
                                            </div>
                                        </div>
                                        <div id="newRow">


                                        </div>
                                        <hr>
                                        <div class="row">

                                            <div class="col-md-8" style="text-align: right;"><b>TOTAL TAGIHAN</b></div>
                                            <div class="col-md-4">

                                                <input type="number" class="form-control" disabled="true" name="" id="tagihan">
                                            </div>

                                        </div><br>
                                        <div class="row">

                                            <div class="col-md-8" style="text-align: right;"><b>BAYAR</b></div>
                                            <div class="col-md-4">

                                                <input type="number" class="form-control" name="" id="bayar">
                                            </div>

                                        </div><br>
                                        <div class="row">

                                            <div class="col-md-8" style="text-align: right;"><b>KEMBALIAN</b></div>
                                            <div class="col-md-4">

                                                <input type="number" class="form-control" disabled="true" name="" id="kembalian">
                                            </div>

                                        </div><br>
                                        <div class="row">

                                            <div class="col-md-8" style="text-align: right;"></div>
                                            <div class="col-md-4">

                                                <a href="" class="form-control btn btn-primary"><b>SIMPAN TRANSAKSI</b></a>
                                            </div>

                                        </div>
                                    </div>

                            </div>

                            </form>





                        </div>

                    </div>

                </div>



        </div>


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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
    <!-- ChartJS -->

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{asset('templete/bowe_componnents/chart.js/Chart.js')}}"></script>

    <script src="{{asset('js/invoice.js')}}"></script>


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
            $('#select2').select2()
            $("#addRow").click(function() {
                var coba = '<div class="row"><div id="inputFormRow"><div class="col-md-2"></div><div class="col-md-2"><div class="form-group"><label>NAMA BARANG</label><select class="productname" name="product" id="select2" style="width: 100%;"><option selected="selected" disabled="true">-Pilih Barang-</option>@foreach($product as $barang)<option value="{{$barang->id}}">{{$barang->nama}}</option>@endforeach</select></div></div><div class="col-md-2"><div class="form-group"><label>HARGA</label><br><input type="number" class="form-control prod_price2" id="" name="harga" autocomplete="off" disabled="true"></div></div><div class="col-md-2"><div class="form-group"><label>JUMLAH BELI</label><input type="number" class="form-control" id="jumlah_beli2" name="jumlah" autocomplete="off"></div></div><div class="col-md-2"><div class="form-group"><label>TOTAL HARGA</label><input type="number" class="form-control" id="total_harga2" name="total" autocomplete="off" disabled="disable"></div></div><div class="col-md-2"><br><button id="removeRow" type="button" class="btn btn-danger">HAPUS</button> </div></div> ';

                $('#newRow').append(coba);
            });
            // remove row
            $(document).on('click', '#removeRow', function() {
                $(this).closest('#inputFormRow').remove();
            });

            $(document).on('change', '.productname', function() {
                var prod_id = $(this).val();

                var a = $(this).parent().parent().parent();
                console.log(prod_id);
                var op = "";

                $.ajax({
                    type: 'get',
                    url: '/findPrice',
                    data: {
                        'id': prod_id
                    },
                    dataType: 'json',
                    success: function(data) {
                        console.log('succes');
                        console.log(data.harga);
                        a.find('.prod_price').val(data.harga);
                        a.find('.prod_price2').val(data.harga);
                    },
                    error: function() {

                    }
                });
                $(".jumlah_beli, #harga,#bayar,#jumlah_beli2,#harga2,#total2,#tagihan").keyup(function() {
                    var harga = $(".prod_price").val();
                    var jumlah_beli = $(".jumlah_beli").val();



                    var harga2 = $(".prod_price2").val();
                    console.log(jumlah_beli);
                    var total_harga = parseInt(harga) * parseInt(jumlah_beli);
                    $("#total_harga").val(total_harga);
                    console.log(total_harga);



                    var jumlah_beli2 = $("#jumlah_beli2").val();
                    var total_harga2 = parseInt(harga2) * parseInt(jumlah_beli2);
                    $("#total_harga2").val(total_harga2);

                    // console.log(jumlah_beli2);
                    var total_tagihan = parseInt(total_harga) + parseInt(total_harga2);
                    $('#tagihan').val(total_tagihan);




                    var bayar = $("#bayar").val();

                    var kembalian = parseInt(bayar) - parseInt(total_tagihan);
                    $("#kembalian").val(kembalian);
                });
            });
        });
    </script>

</body>

</html>