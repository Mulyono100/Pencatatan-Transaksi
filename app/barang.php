<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $fillable = ['id', 'kode', 'nama', 'kategoribarang_id', 'satuan', 'harga_jual', 'stock', 'harga', 'harga_jual', 'keuntungan'];

    public function kategoribarang()
    {
        return $this->belongsTo('App\kategoribarang');
    }
    public function barangmasuk()
    {
        return $this->hasMany('App\barangmasuk');
    }
    public function transaksi()
    {
        return $this->hasMany('App\Transaksi');
    }

    public function detailtransaksi()
    {
        return $this->hasMany('App\detailtransaksi');
    }
}
