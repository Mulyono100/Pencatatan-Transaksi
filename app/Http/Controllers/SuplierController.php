<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suplier;

class SuplierController extends Controller
{
    public function index()
    {
        $supliers = \App\Suplier::all();
        return view('suplier.index', compact('supliers'));
    }
    public function create(Request $request)
    {

        $this->validate(
            $request,
            [
                'nama' => 'required|min:3|max:50',
                'email' => 'required',
                'handphone' => 'required|numeric',
                'alamat' => 'required'

            ],
            [
                'nama.required' => 'Nama wajib di isi',
                'nama.min' => 'Minimal 3 huruf',
                'nama.max' => 'Maksimal 50 huruf',
                'email.required' => 'Email wajib di isi',
                'handphone.required' => 'Hanphone wajib di isi',
                'alamat.required' => 'alamat wajib di isi',
            ]
        );

        if (Suplier::where('nama', $request->nama)->exists()) {
            return redirect('/suplier')->with('gagal', 'Nama Kategori Sudah ADA Silahkan tambah kembali');
        } else {
            \App\Suplier::create($request->all());
            return redirect('/suplier')->with('berhasil', 'Data Berhasil Ditambahkan');
        };
    }
    public function delete($id)
    {
        $suplier = \App\Suplier::find($id);
        $suplier->delete();
        return redirect('/suplier')->with('hapus', 'Berhail dihapus');
    }
    public function update($id)
    {
        $suplier = \App\Suplier::find($id);
        return view('suplier.edit', compact('suplier'));
    }
    public function edit(Request $request, $id)
    {
        $suplier = \App\Suplier::find($id);
        $suplier->update($request->all());
        return redirect('/suplier')->with('update', 'Berhasil Diubah');
    }
}
