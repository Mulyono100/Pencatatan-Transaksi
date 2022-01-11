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
    <link rel="stylesheet"
        href="{{asset('templete/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
                    <li><a href="/databarang">Barang</a></li>
                    <li class="active">Data Barang</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">DATA BARANG</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#exampleModal"><i class="fa fa-plus-square"></i>TAMBAH
                                    DATA</button><br><br>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h5>

                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/masuk/create" method="POST">
                                                    {{csrf_field()}}
                                                    <div class="form-group">
                                                        <label for="formGroupExampleInput">Kode Barang </label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"> <i
                                                                    class="fa fa-folder"></i></span>
                                                            <input name="kode" type="text" class="form-control"
                                                                id="formGroupExampleInput" placeholder="Contoh:M001">
                                                        </div>
                                                        @error('kode')
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="formGroupExampleInput">Nama Barang</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"> <i
                                                                    class="fa fa-tag"></i></span>
                                                            <input name="nama" type="text" class="form-control"
                                                                id="formGroupExampleInput" placeholder="Contoh:Nabati">
                                                        </div>
                                                        @error('nama')
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Kategori
                                                            Barang</label><br>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"> <i
                                                                    class="fa fa-reorder"></i></span>
                                                            <select class="form-control select2" name="kategoribarang"
                                                                id="exampleFormControlSelect1">
                                                                <option disabled="true" selected="true">-- Pilih
                                                                    Kategori --</option>
                                                                @foreach($kategori as $k)
                                                                <option value="{{$k->id}}">{{$k->nama}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label for="formGroupExampleInput">Suplier</label>
                                                        <input name="suplier" type="text" class="form-control" id="formGroupExampleInput" placeholder="Contoh:MajuBersama">
                                                    </div> -->

                                                    <div class="form-group">
                                                        <label for="formGroupExampleInput">Harga</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">Rp</span>
                                                            <input name="harga" type="number" class="form-control"
                                                                id="formGroupExampleInput" placeholder="9000">
                                                            <span class="input-group-addon">.00</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="formGroupExampleInput">Satuan</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i
                                                                    class="fa fa-magic"></i></span>
                                                            <input name="satuan" type="text" class="form-control"
                                                                id="formGroupExampleInput" placeholder="Contoh : Kg">
                                                        </div>
                                                        @error('satuan')
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>





                                                    <!-- <div class="form-group">
                                                            <label for="exampleFormControlTextarea1">Total</label>
                                                            <input name="total_harga" type="number" class="form-control" id="formGroupExampleInput" placeholder="90000" maxlength="12">
                                                        </div> -->


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    @if(session('gagal'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">&times;</button>
                                        {{session('gagal')}}
                                    </div>
                                    @endif
                                </div>
                                <div>
                                    @if(session('sukses'))
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">&times;</button>
                                        <h4><i class="icon fa fa-check"></i> Selamat</h4>
                                        {{session('sukses')}}
                                    </div>
                                    @endif
                                </div>
                                <div>
                                    @if(session('hapus'))
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">&times;</button>
                                        <h4><i class="icon fa fa-check"></i> Selamat</h4>
                                        {{session('hapus')}}
                                    </div>
                                    @endif
                                </div>
                                <div class="table-responsive">
                                    <table id="example1" class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>KODE BARANG</th>
                                                <th>NAMA BARANG</th>
                                                <th>KATEGORI BARANG</th>
                                                <th>HARGA</th>

                                                <th>SATUAN</th>
                                                <th>STOCK</th>
                                                <th>AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($barangs as $barang)

                                            <tr>

                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$barang->kode}}</td>
                                                <td>{{$barang->nama}}</td>
                                                <td>{{$barang->Kategoribarang->nama}}</td>
                                                <?php $barangg = $barang->harga; ?>
                                                <?php $barang1 = number_format($barangg, 2); ?>
                                                <td>RP. {{$barang1}}</td>

                                                <td>{{$barang->satuan}}</td>
                                                <td>{{$barang->stock}}</td>
                                                <td>
                                                    <a href="#" class="btn btn-danger btn-sm hapus"
                                                        barang_id="{{$barang->id}}"><i class="fa fa-trash"></i>HAPUS</a>
                                                    <a href="/barang/{{$barang->id}}/edit"
                                                        class="btn btn-warning btn-sm"><i
                                                            class="fa fa-edit"></i>EDIT</a>
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
    <!-- select2 -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(function() {
            
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false,
                'responsive':true,
                "columnDefs": [
		            { responsivePriority: 1, targets: 0 },
		            { responsivePriority: 2, targets: 4 }
		        ]
            })
            $('.select2').select2()
        })
        $('.hapus').click(function(){
                var barang=$(this).attr('barang_id');
                swal({
                    title: "Yakin",
                    text:'Mau menghapus barang ini',
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        window.location="/barang"+"/"+barang+"/hapus";
                    } else {      
                    }
                    });
        });
    </script>
</body>

</html>