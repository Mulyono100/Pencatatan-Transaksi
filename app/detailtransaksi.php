<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailtransaksi extends Model
{

    protected $fillable = ['id', 'tanggal', 'transaksi_id', 'barang_id', 'harga_barang', 'total_beli', 'total_harga', 'subtotal', 'bayar', 'kembalian'];

    public function transaksi()
    {
        return $this->belongsTo('App\Transaksi');
    }

    public function barang()
    {
        return $this->belongsTo('App\barang');
    }
}
