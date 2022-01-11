<?php

namespace App\Http\Controllers;

use App\Transaksi;

use App\barang;
use App\detailmasuk;
use App\detailtransaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::all();
        $betul = $transaksi->sortByDesc('tanggal');
        return view('kasir.transaksi', compact('transaksi', 'betul'));
    }
    public function tambah()
    {
        $product = \App\barang::all();
        return view('kasir.tambah', compact('product'));
    }
    public function findPrice(Request $request)
    {
        //it will get price if its id match with product id
        $p = barang::select('harga')->where('id', $request->id)->first();

        return response()->json($p);
    }

    public function laporan()
    {
        return view('kasir.laporantransaksi');
    }

    public function laporantanggal(Request $request)
    {

        $this->validate($request, [
            'tgl_awal' => 'required',
            'tgl_ahir' => 'required'
        ], [
            'tgl_awal.required' => 'Tanggal Awal Wajib di isi',
            'tgl_ahir.required' => 'Tanggal Ahir Wajib di isi'

        ]);
        $tanggalawal = $request->tgl_awal;
        $tanggalahir = $request->tgl_ahir;
        $tawal = date('d M Y', strtotime($tanggalawal));
        $tahir = date('d M Y', strtotime($tanggalahir));
        $barangmasuk = detailtransaksi::whereBetween('tanggal', [$tanggalawal, $tanggalahir])->get();
        $cek = $barangmasuk->sortBy('tanggal');
        $sum = $cek->sum('subtotal');
        // dd($barangmasuk);
        //dd($tanggalawal, $tanggalahir);
        // $pdf = PDF::loadview('barangmasuk.cetakbarangmasuk', compact('cek', 'sum'));
        // return $pdf->stream();
        return view('kasir.cetaklaporan', compact('cek', 'sum', 'tawal', 'tahir'));
    }
    public function dashboard()
    {
        $transkasi = Transaksi::all();
        $transaksii = $transkasi->sum('kode_transaksi');
        return view('kasir.index', compact('transaksi'));
    }
}