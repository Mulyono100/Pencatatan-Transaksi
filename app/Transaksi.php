<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = ['id', 'keuntungan', 'tanggal', 'kode_transaksi', 'barang_id', 'subtotal', 'harga_barang', 'jumlah_beli', 'total_harga', 'jumlah_bayar', 'kembalian'];

    public function barang()
    {
        return $this->belongsTo('App\barang');
    }
    public function suplier()
    {
        return $this->belongsTo('App\Suplier');
    }


    public function detailtransaksi()
    {
        return $this->hasMany('App\detailtransaksi', 'transaksi_id');
    }
}