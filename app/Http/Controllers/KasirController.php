<?php

namespace App\Http\Controllers;

use App\User;


use Illuminate\Http\Request;
use App\Transaksi;

class KasirController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::all();
        $pendapatan = $transaksi->sum('subtotal');
        $jumlahtransaksi = $transaksi->max('id');

        $jumlah = $transaksi->count('id');


        return view('kasir.index', compact('pendapatan', 'jumlahtransaksi', 'jumlah'));
    }

    public function profile($id)
    {
        $profile = User::find($id);
        return view('kasir.profile', compact('profile'));
    }

    public function ubahprofile(Request $request, $id)
    {

        $ubah = User::find($id);
        $ubah->update([
            'name' => $request->nama,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ]);
        return redirect('/dashboardkasir');
    }
}
