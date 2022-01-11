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
            <section class="content-header">
                <h1>
                    Tambah Barang Masuk

                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Tables</a></li>
                    <li class="active">Data tables</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">


                <div class="box">
                    <div class="box-body">
                        <form action="/tambahmasuk" method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr class="item-row">
                                                    <th>Tanggal</th>
                                                    <th>Suplier</th>
                                                    <th>Nama Barang</th>
                                                    <th>Harga</th>
                                                    <th>Jumlah</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <!-- <tr id="hiderow">
                                                <td colspan="4">
                                                    <a id="addRow" href="javascript:;" title="Add a row" class="btn btn-primary">Add a row</a>
                                                </td>
                                            </tr> -->
                                                <!-- Here should be the item row -->

                                                {{csrf_field()}}
                                                <tr class="item-row">

                                                    <td><input type="date" name="tanggal" id="" class="form-control"></td>
                                                    <td>
                                                        <select class="form-control" name="suplier" id="select2" style="width: 100%;">

                                                            <option selected="selected" disabled="true">-Pilih Suplier-</option>
                                                            @foreach($suplier as $b)
                                                            <option value="{{$b->id}}">{{$b->nama}}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="form-control productname" name="product[]" id="select3" style="width: 100%;">

                                                            <option selected="selected" disabled="true">-Pilih Barang-</option>
                                                            @foreach($barang as $b)
                                                            <option value="{{$b->id}}">{{$b->nama}}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td><input class="form-control price" name="priceu[]" type="number"></td>
                                                    <td><input class="form-control qty" name="qtyy[]" type="number"></td>
                                                    <td>
                                                        <input type="text" class="form-control total" name="hargatotal[]">
                                                        <!-- <span class="total" name="totalharga">0.00</span> -->
                                                    </td>
                                                    <td colspan="4">
                                                        <a id="addRow" href="javascript:;" title="Add a row" class="btn btn-primary">Tambah</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-right"><strong>Total Harga</strong></td>
                                                    <td>
                                                        <input type="text" name="totalharga" class="form-control" id="subtotal">
                                                        <!-- <span id="subtotal">0.00</span> -->
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <strong>Total Barang: </strong><span id="totalQty" style="color: red; font-weight: bold">0</span>
                                                        Item
                                                    </td>
                                                    <td></td>
                                                    <td></td>

                                                    <td colspan="2" class="text-right"><strong>Total Bayar</strong></td>
                                                    <td>
                                                        <input class="form-control" name="total" id="discount" value="0" type="text" />
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="2"></td>
                                                    <td class="text-right"><strong>Kembalian</strong></td>
                                                    <td> <input type="number" class="form-control" name="kembalian" id="grandTotal">

                                                        <!-- <span id="grandTotal">0</span> -->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"></td>
                                                    <td colspan="2" style="text-align:right;"><button type="submit" class="form control btn btn-success">Bayar</button></td>

                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
    <!-- select2 -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- <script src="{{asset('js/invoice.js')}}"></script> -->
    <script>
        $(document).ready(function() {
            $(document).on('change', '.productname', function() {
                var prod_id = $(this).val();

                var a = $(this).parent().parent().parent();
                console.log(prod_id);
                var op = "";
                $.ajax({
                    type: 'get',
                    url: '/temukanharga',
                    data: {
                        'id': prod_id
                    },
                    dataType: 'json',
                    success: function(data) {
                        console.log('succes');
                        console.log(data.harga);
                        a.find('.price').val(data.harga);

                    },
                    error: function() {

                    }
                });

            });

            jQuery().invoice({
                addRow: "#addRow",
                delete: ".delete",
                parentClass: ".item-row",

                price: ".price",
                qty: ".qty",
                total: ".total",
                totalQty: "#totalQty",

                subtotal: "#subtotal",
                discount: "#discount",
                shipping: "#shipping",
                grandTotal: "#grandTotal",
            });
        });
    </script>
    <script>
        /**
 * jQuery Invoice Plugin v1.0             
 *	                                           
 * Version 1.0, January - 2016	           
 * Author: Firoz Ahmad Likhon <likh.deshi@gmail.com>               
 * Website: http://github.com/firoz-ahmad-likhon
 *                                            
 * Copyright (c) 2016 Firoz Ahmad         
 * Released under the MIT license
      ___            ___  ___    __    ___      ___  ___________  ___      ___
     /  /           /  / /  /  _/ /   /  /     /  / / _______  / /   \    /  /
    /  /           /  / /  /_ / /    /  /_____/  / / /      / / /     \  /  /
   /  /           /  / /   __|      /   _____   / / /      / / /  / \  \/  /
  /  /_ _ _ _ _  /  / /  /   \ \   /  /     /  / / /______/ / /  /   \    /
 /____________/ /__/ /__/     \_\ /__/     /__/ /__________/ /__/     /__/
 Likhon the hackman, who claims himself as a hacker but really he isn't.
 */

        (function(jQuery) {
            $.opt = {}; // jQuery Object

            jQuery.fn.invoice = function(options) {
                var ops = jQuery.extend({}, jQuery.fn.invoice.defaults, options);
                $.opt = ops;

                var inv = new Invoice();
                inv.init();

                jQuery('body').on('click', function(e) {
                    var cur = e.target.id || e.target.className;

                    if (cur == $.opt.addRow.substring(1))
                        inv.newRow();

                    if (cur == $.opt.delete.substring(1))
                        inv.deleteRow(e.target);

                    inv.init();
                });

                jQuery('body').on('keyup', function(e) {
                    inv.init();
                });

                return this;
            };
        }(jQuery));

        function Invoice() {
            self = this;
        }

        Invoice.prototype = {
            constructor: Invoice,

            init: function() {
                this.calcTotal();
                this.calcTotalQty();
                this.calcSubtotal();
                this.calcGrandTotal();
            },

            /**
             * Calculate total price of an item.
             *
             * @returns {number}
             */
            calcTotal: function() {
                jQuery($.opt.parentClass).each(function(i) {
                    var row = jQuery(this);
                    var total = row.find($.opt.price).val() * row.find($.opt.qty).val();

                    total = self.roundNumber(total, 2);

                    row.find($.opt.total).val(total);
                });

                return 1;
            },

            /***
             * Calculate total quantity of an order.
             *
             * @returns {number}
             */
            calcTotalQty: function() {
                var totalQty = 0;
                jQuery($.opt.qty).each(function(i) {
                    var qty = jQuery(this).val();
                    if (!isNaN(qty)) totalQty += Number(qty);
                });

                totalQty = self.roundNumber(totalQty, 2);

                jQuery($.opt.totalQty).html(totalQty);

                return 1;
            },

            /***
             * Calculate subtotal of an order.
             *
             * @returns {number}
             */
            calcSubtotal: function() {
                var subtotal = 0;
                jQuery($.opt.total).each(function(i) {
                    var total = jQuery(this).val();
                    if (!isNaN(total)) subtotal += Number(total);
                });

                subtotal = self.roundNumber(subtotal, 2);

                jQuery($.opt.subtotal).val(subtotal);

                return 1;
            },

            /**
             * Calculate grand total of an order.
             *
             * @returns {number}
             */
            calcGrandTotal: function() {
                var grandTotal = Number(jQuery($.opt.discount).val()) - Number(jQuery($.opt.subtotal).val());


                grandTotal = self.roundNumber(grandTotal, 2);

                jQuery($.opt.grandTotal).val(grandTotal);

                return 1;
            },

            /**
             * Add a row.
             *
             * @returns {number}
             */
            newRow: function() {
                jQuery(".item-row:last").after('<tr class="item-row"><td colspan="2"></td><td class="item-name"><div class="delete-btn"><select class="productname" name="product[]" id="select2" style="width: 100%;"><option selected="selected">-Pilih Barang-</option>@foreach($barang as $b)<option value="{{$b->id}}">{{$b->nama}}</option>@endforeach</select></div></td><td><input class="form-control price" name="priceu[]"  type="text"> </td><td><input class="form-control qty" name="qtyy[]" placeholder="Jumlah Beli" type="text"></td><td><input type="text" class="form-control total" name="hargatotal[]"><td><a class=' + $.opt.delete.substring(1) + ' href="javascript:;" title="Remove row">Hapus</a></td></td></tr>');

                if (jQuery($.opt.delete).length > 0) {
                    jQuery($.opt.delete).show();
                }

                return 1;
            },

            /**
             * Delete a row.
             *
             * @param elem   current element
             * @returns {number}
             */
            deleteRow: function(elem) {
                jQuery(elem).parents($.opt.parentClass).remove();

                if (jQuery($.opt.delete).length < 2) {
                    jQuery($.opt.delete).hide();
                }

                return 1;
            },

            /**
             * Round a number.
             * Using: http://www.mediacollege.com/internet/javascript/number/round.html
             *
             * @param number
             * @param decimals
             * @returns {*}
             */
            roundNumber: function(number, decimals) {
                var newString; // The new rounded number
                decimals = Number(decimals);

                if (decimals < 1) {
                    newString = (Math.round(number)).toString();
                } else {
                    var numString = number.toString();

                    if (numString.lastIndexOf(".") == -1) { // If there is no decimal point
                        numString += "."; // give it one at the end
                    }

                    var cutoff = numString.lastIndexOf(".") + decimals; // The point at which to truncate the number
                    var d1 = Number(numString.substring(cutoff, cutoff + 1)); // The value of the last decimal place that we'll end up with
                    var d2 = Number(numString.substring(cutoff + 1, cutoff + 2)); // The next decimal, after the last one we want

                    if (d2 >= 5) { // Do we need to round up at all? If not, the string will just be truncated
                        if (d1 == 9 && cutoff > 0) { // If the last digit is 9, find a new cutoff point
                            while (cutoff > 0 && (d1 == 9 || isNaN(d1))) {
                                if (d1 != ".") {
                                    cutoff -= 1;
                                    d1 = Number(numString.substring(cutoff, cutoff + 1));
                                } else {
                                    cutoff -= 1;
                                }
                            }
                        }

                        d1 += 1;
                    }

                    if (d1 == 10) {
                        numString = numString.substring(0, numString.lastIndexOf("."));
                        var roundedNum = Number(numString) + 1;
                        newString = roundedNum.toString() + '.';
                    } else {
                        newString = numString.substring(0, cutoff) + d1.toString();
                    }
                }

                if (newString.lastIndexOf(".") == -1) { // Do this again, to the new string
                    newString += ".";
                }

                var decs = (newString.substring(newString.lastIndexOf(".") + 1)).length;

                for (var i = 0; i < decimals - decs; i++)
                    newString += "0";
                //var newNumber = Number(newString);// make it a number if you like

                return newString; // Output the result to the form field (change for your purposes)
            }
        };

        /**
         *  Publicly accessible defaults.
         */
        jQuery.fn.invoice.defaults = {
            addRow: "#addRow",
            delete: ".delete",
            parentClass: ".item-row",

            price: ".price",
            qty: ".qty",
            total: ".total",
            totalQty: "#totalQty",

            subtotal: "#subtotal",
            discount: "#discount",
            shipping: "#shipping",
            grandTotal: "#grandTotal"
        };
    </script>

</body>

</html>