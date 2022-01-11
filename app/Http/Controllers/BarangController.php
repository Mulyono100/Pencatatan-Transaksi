<?php

namespace App\Http\Controllers;

use App\barang;
use App\kategoribarang;


use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $kategori = \App\kategoribarang::all();
        $barangs = \App\barang::all();
        return view('barang.index', compact('barangs', 'kategori'));
    }

    public function create(Request $request)
    {

        $this->validate(
            $request,
            [
                'kode' => 'required|min:2|max:10',
                'nama' => 'required|min:2|max:50',

                'harga' => 'required|numeric',
                'satuan' => 'required|min:2|max:10'
            ],
            [
                'kode.min' => 'Minimal 2 huruf',
                'kode.max' => 'Maksimal 10 huruf',
                'kode.required' => 'Kode harus di ini',
                'nama.min' => 'minimal 2 huruf',
                'nama.max' => 'Maksimal 20 huruf',
                'nama.required' => 'Nama Harus Di isi',
                'satuan.min' => 'minimal 2 huruf',
                'satuan.max' => 'Maksimal 20 huruf',
                'satuan.required' => 'Nama harus di isi'

            ]
        );

        if (barang::where('kode', $request->kode)->exists()) {
            return redirect('/databarang')->with('gagal', 'Kode barang sudah ada');
        } else {
            \App\barang::create([
                'kode' => $request->kode,
                'nama' => $request->nama,
                'kategoribarang_id' => $request->kategoribarang,
                'harga' => $request->harga,
                'satuan' => $request->satuan,

            ]);

            return redirect('/databarang')->with('sukses', 'Data berhasil ditambahkan');
        };
    }

    public function hapus($id)
    {
        $hapus = \App\barang::find($id);
        $hapus->delete();
        return redirect('/databarang')->with('hapus', 'Data Berhasil Di hapus');
    }

    public function edit($id)
    {
        $ubah = barang::find($id);
        $kategori = kategoribarang::all();

        return view('barang.ubah', compact('ubah', 'kategori'));
    }
    public function ubah(Request $request, $id)
    {
        // dd($request->all());
        $ubah = barang::find($id);
        $ubah->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'kategoribarang_id' => $request->kategoribarang,
            'harga' => $request->harga,
            'satuan' => $request->satuan
        ]);
        return redirect('/databarang')->with('sukses', 'Berhasil di ubah');
    }

    public function cetakbarang()
    {
        $barang = barang::all();

        return view('barang.cetakbarang', compact('barang'));
    }


    public function login()
    {
        return view('login.login');
    }
}
