<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username Wajib di isi',
            'password.required' => 'Password wajib di isi'
        ]);
        if (Auth::attempt($request->only('username', 'password'))) {

            if ($request->User()->role == "admin") {
                return redirect('/dashboard');
            } elseif ($request->User()->role == "kasir") {
                return redirect('/dashboardkasir');
            }
        }
        return redirect('/login')->with('gagal', 'username/password salah');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
