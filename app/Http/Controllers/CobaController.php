<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\coba;

class CobaController extends Controller
{
    public function index(Request $request)
    {
        $kodemasuk = IdGenerator::generate(['table' => 'coba', 'field' => 'kode_masuk', 'length' => 10, 'prefix' => 'INV-']);
        //output: INV-000001
        $test = $request->id;
        // dd($test);
        \App\coba::create([
            'id' => $request->id,
            'kode_masuk' => $kodemasuk
        ]);

        return redirect('/mecoba');
    }
    public function home()
    {
        return view('test');
    }

    public function disabled()
    {
        return view('disabled');
    }

    public function create(Request $request)
    {
        $mencoba = $request->mencoba;
        $mencoba1 = $request->mencoba1;
        dd($mencoba, $mencoba1);

        return view('');
    }
}
