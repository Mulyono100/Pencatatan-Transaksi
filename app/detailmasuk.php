<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class detailmasuk extends Model
{
    protected $table = 'detailmasuk';

    protected $fillable = ['id', 'tanggal', 'barangmasuk_id', 'suplier_id', 'barang_id', 'harga_barang', 'jumlah_beli', 'total_harga', 'subtotal', 'bayar', 'kembalian'];


    public function barangmasuk()
    {
        return $this->belongsTo('App\barangmasuk');
    }

    public function suplier()
    {
        return $this->belongsTo('App\Suplier');
    }

    public function barang()
    {
        return $this->belongsTo('App\barang');
    }
}
