<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\barang;
use App\detailtransaksi;
use Illuminate\Support\Facades\Session;
use App\Transaksi;



class InvoiceController extends Controller
{

    public function index()
    {
        $product = \App\barang::all();

        return view('kasir.invoice', compact('product'));
    }
    public function cariharga(Request $request)
    {
        //it will get price if its id match with product id
        $p = barang::select('harga')->where('id', $request->id)->first();

        return response()->json($p);
    }

    public function tambahinvoice(Request $request)
    {
        $test = $request->all();
        $kodetransaksi = IdGenerator::generate(['table' => 'transaksi', 'field' => 'kode_transaksi', 'length' => 10, 'prefix' => 'TR-']);
        // $data = $request->all();
        // $barang = barang::all();
        // $keuntungan = $barang->harga_jual - $barang->harga;

        // dd($test);
        $tanggal = time();
        $cobaaa = date("Y-m-d", $tanggal);
        $transaksi = new Transaksi;
        $transaksi->tanggal = $cobaaa;
        $transaksi->kode_transaksi = $kodetransaksi;
        $transaksi->subtotal = $test['totalharga'];
        $transaksi->save();


        if ($test['total'] < $test['totalharga']) {
            return redirect('/invoice')->with('kurangbayar', 'Duit kurang bos');
        } else {
            $transaksi->save();

            if (count($test['product']) > 0) {

                foreach ($test['product'] as $item => $value) {
                    $data2 = [
                        'tanggal' => $cobaaa,
                        'transaksi_id' => $transaksi->id,
                        'barang_id' => $test['product'][$item],
                        'harga_barang' => $test['priceu'][$item],
                        'total_beli' => $test['qtyy'][$item],
                        'subtotal' => $test['hargatotal'][$item],
                        'total_harga' => $test['totalharga'],
                        'bayar' => $test['total'],
                        'kembalian' => $test['kembalian']
                    ];
                    $test1 = detailtransaksi::create($data2);
                }
            }
            $barangmasuk = Transaksi::with('detailtransaksi')->where('id', $data2['transaksi_id'])->first();
            return view('transaksi.transaksi', compact('barangmasuk', 'test1'));
        }



        // if (count($test['product']) > 0) {
        //     foreach ($test['product'] as $item => $value) {
        //         $data2 = [
        //             'tanggal' => $cobaaa,
        //             'transaksi_id' => $transaksi->id,
        //             'barang_id' => $test['product'][$item],
        //             'harga_barang' => $test['priceu'][$item],
        //             'total_beli' => $test['qtyy'][$item],
        //             'subtotal' => $test['hargatotal'][$item],
        //             'total_harga' => $test['totalharga'],
        //             'bayar' => $test['total'],
        //             'kembalian' => $test['kembalian']
        //         ];
        //         $test1 = detailtransaksi::create($data2);
        //     }
        // }

        // $barangmasuk = Transaksi::with('detailtransaksi')->where('id', $data2['transaksi_id'])->first();
        // return redirect('/transaksiview', compact('barangmasuk', 'test1'));
        // $view = view('transaksi.mencoba', compact('barangmasuk', 'test1'))->render();
        // return response()->json(['view' => $view]);

        // $mencoba = $barangmasuk->session()->put('barangmasuk', $barangmasuk);
        // dd($mencoba);
        // return response()->json($request->all());
        // return view('transaksi.transaksi', compact('barangmasuk', 'test1'));
    }

    public function transaksiview($id)
    {

        $barang2 = Transaksi::with('detailtransaksi')->where('id', $id)->first();
        return view('transaksi.mencoba', compact('barang2'));
    }

    public function detail($id)
    {
        $transaksi = Transaksi::with('detailtransaksi')->where('id', $id)->first();

        return view('transaksi.detail', compact('transaksi'));
    }
}
