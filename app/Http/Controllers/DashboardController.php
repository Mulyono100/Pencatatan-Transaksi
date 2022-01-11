<?php

namespace App\Http\Controllers;

use App\barang;
use App\barangmasuk;
use App\cobas;
use App\detailmasuk;
use App\Suplier;
use App\User;




use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $barang = barang::all();
        $stock = $barang->sum('stock');
        $barangmasuk = barangmasuk::all();
        // $stockmasuk = $barangmasuk->sum('stock');
        $modal = $barangmasuk->sum('subtotal');
        $detail = detailmasuk::all();
        $user = User::all();

        $detail1 = $detail->sum('jumlah_beli');
        $suplier = Suplier::all();
        $jumlah_suplier = $suplier->count('id');
        return view('dashboard.index ', compact('modal', 'jumlah_suplier', 'detail1', 'stock', 'user'));
    }
    public function coba()
    {
        $coba = \App\cobas::all();
        return view('coba', compact('coba'));
    }

    public function create(Request $request)
    {
        $gabungan = implode(",", $request->title);

        \App\cobas::create([
            'title' => $gabungan
        ]);
        return redirect('/coba');
    }

    public function profil($id)
    {
        $profil = User::find($id);
        return view('dashboard.admin', compact('profil'));
    }

    public function update(Request $request, $id)
    {

        $profil = User::find($id);

        $profil->update([
            'name' => $request->nama,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ]);
        // return view('dashboard.admin');
        return redirect('/dashboard')->with('update', 'data berhasil di ubah');
    }
}
