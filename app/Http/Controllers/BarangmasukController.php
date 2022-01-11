<?php

namespace App\Http\Controllers;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\barang;
use Illuminate\Http\Request;
use App\barangmasuk;
use App\detailmasuk;
use App\kategoribarang;
use App\Suplier;
use PDF;

class BarangmasukController extends Controller
{
    public function index()
    {
        $barangs = \App\barang::all();
        $suplier = \App\Suplier::all();
        $barangmasuk = \App\barangmasuk::all();
        $coba = $barangmasuk->sortByDesc('tanggal');
        return view('barangmasuk.index', compact('barangmasuk', 'barangs', 'suplier', 'coba'));
    }
    public function cek(Request $request)
    {

        $data = $request->all();
        $kodemasuk = IdGenerator::generate(['table' => 'barangmasuk', 'field' => 'kode_masuk', 'length' => 10, 'prefix' => 'MK-']);
        $tanggal = time();
        $cobaaa = date("Y-m-d", $tanggal);
        $barangmasuk = new barangmasuk;
        $barangmasuk->kode_masuk = $kodemasuk;
        $barangmasuk->tanggal = $cobaaa;
        $barangmasuk->suplier_id = $data['suplier'];
        $barangmasuk->totalbeli = $data['totalQty'];
        $barangmasuk->subtotal = $data['totalharga'];
        $barangmasuk->save();

        if (count($data['product']) > 0) {

            foreach ($data['product'] as $item => $value) {
                $data2 = array(
                    'barangmasuk_id' => $barangmasuk->id,
                    'tanggal' => $cobaaa,
                    'suplier_id' => $data['suplier'],
                    'barang_id' => $data['product'][$item],
                    'harga_barang' => $data['priceu'][$item],
                    'jumlah_beli' => $data['qtyy'][$item],
                    'total_harga' => $data['hargatotal'][$item],
                    'subtotal' => $data['totalharga'],
                    'bayar' => $data['total'],
                    'kembalian' => $data['kembalian']
                );

                // $cobaa = $barangmasuk->id;
                $mencobalagi = $data['product'][$item];
                $hargabarang = $data['priceu'][$item];
                $jumlahbeli = $data['qtyy'][$item];
                $totalharga = $data['hargatotal'][$item];
                $mencoba = $data2;

                $test = detailmasuk::create($data2);
                $barangmasuk = barangmasuk::with('detailmasuk')->where('id', $data2['barangmasuk_id'])->first();
            }
        }

        return view('barang.coba', compact('barangmasuk', 'test', 'data', 'kodemasuk', 'cobaaa', 'mencoba', 'mencobalagi', 'hargabarang',  'jumlahbeli', 'totalharga', 'data2'));
    }


    public function detail($id)
    {
        $barangmasuk = barangmasuk::with('detailmasuk')->where('id', $id)->first();

        return view('barangmasuk.detailmasuk', compact('barangmasuk'));
    }

    public function hapus($id)
    {
        $barang = \App\barangmasuk::find($id);
        $barang->delete();
        return redirect('/barangmasuk')->with('hapus', 'data berhasil dihapus');
    }

    public function edit($id)
    {
        $barang = \App\barangmasuk::find($id);
        return view('barangmasuk.edit', compact('barang'));
    }
    public function update(Request $request, $id)
    {
        $barang = \App\barangmasuk::find($id);
        $barang->update($request->all());
        return redirect('/barangmasuk')->with('update', 'berhasil di update');
    }
    public function tambah()
    {
        $suplier = Suplier::all();
        $barang = barang::all();
        return view('barangmasuk.tambahbarangmasuk', compact('suplier', 'barang'));
    }

    public function cetak()
    {
        return view('barangmasuk.cetakmasuk');
    }
    public function cetakpost(Request $request)
    {
        $this->validate($request, [
            'tgl_awal' => 'required',
            'tgl_ahir' => 'required'
        ], [
            'tgl_awal.required' => 'Tanggal Awal Wajib Di isi',
            'tgl_ahir.required' => 'Tanggal Ahir Wajib Di isi',

        ]);
        $tanggalawal = $request->tgl_awal;
        $tanggalahir = $request->tgl_ahir;
        $coba = date(' d M Y', strtotime($tanggalawal));
        $coba1 = date(' d M Y', strtotime($tanggalahir));
        $barangmasuk = barangmasuk::whereBetween('tanggal', [$tanggalawal, $tanggalahir])->get();
        $detailmasuk = detailmasuk::whereBetween('tanggal', [$tanggalawal, $tanggalahir])->get();

        $cek = $barangmasuk->sortBy('tgl');
        $detail = $detailmasuk->sortBy('tanggal');
        $sum = $detailmasuk->sum('total_harga');
        // dd($barangmasuk);
        //dd($tanggalawal, $tanggalahir);
        // $pdf = PDF::loadview('barangmasuk.cetakbarangmasuk', compact('sum', 'cek', 'detail', 'tanggalawal', 'tanggalahir'));
        // return $pdf->download('Laporan Barang Masuk');

        return view('barangmasuk.cetakbarangmasuk', compact('sum', 'cek', 'detail', 'coba', 'coba1'));
    }

    public function cetakhungkul(Request $request)
    {
        $tanggalawal = $request->tgl_awal;
        $tanggalahir = $request->tgl_ahir;
        $barangmasuk = detailmasuk::whereBetween('tanggal', [$tanggalawal, $tanggalahir])->get();
        $cek = $barangmasuk->sortBy('tanggal');
        $sum = $cek->sum('total_harga');
        // dd($barangmasuk);
        //dd($tanggalawal, $tanggalahir);
        $pdf = PDF::loadview('barangmasuk.cetakbarangmasuk', compact('cek', 'sum'));
        return $pdf->stream();
    }


    public function temukan(Request $request)
    {
        //it will get price if its id match with product id
        $p = barang::select('harga')->where('id', $request->id)->first();

        return response()->json($p);
    }
}
