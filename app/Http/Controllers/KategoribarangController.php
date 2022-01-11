<?php

namespace App\Http\Controllers;

use App\kategoribarang;
use Illuminate\Http\Request;

class KategoribarangController extends Controller
{
    public function index()
    {
        $kategoribarang = \App\kategoribarang::all();



        return view('kategoribarang.index', compact('kategoribarang'));
    }

    public function delete($id)
    {
        $kategoribarang = \App\kategoribarang::find($id);
        $kategoribarang->delete();
        return redirect('/kategoribarang')->with('hapus', 'Berhasil dihapus');
    }

    public function create(Request $request)

    {
        $this->validate(
            $request,
            [

                'nama' => 'required|min:3|max:25'

            ],
            [

                'nama.required' => 'nama wajib di isi',
                'nama.min' => 'Minimal 3 Huruf',
                'nama.max' => 'Minimal 25 huruf',

            ]
        );
        if (kategoribarang::where('kategori', $request->kategori)->exists()) {
            return redirect('/kategoribarang')->with('gagal', 'Kategori Sudah Ada');
        } else {
            \App\kategoribarang::create($request->all());
            return redirect('/kategoribarang')->with('tambah', 'Berhsail Ditanbahkan');
        };
    }

    public function ubah(Request $request, $id)
    {
        $kategoribarang = \App\kategoribarang::find($id);
        return view('kategoribarang.edit', compact('kategoribarang'));
    }
    public function update(Request $request, $id)
    {
        $kategoribarang = \App\kategoribarang::find($id);
        $kategoribarang->update($request->all());
        return redirect('/kategoribarang')->with('update', 'data berhasil diubah');
    }
}
