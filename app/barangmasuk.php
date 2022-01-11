<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barangmasuk extends Model
{
    protected $table = 'barangmasuk';

    protected $fillable = ['id', 'tanggal', 'kode_masuk', 'suplier_id', 'subtotal'];

    public function suplier()
    {
        return $this->belongsTo('App\Suplier');
    }


    public function detailmasuk()
    {
        return $this->hasMany('App\detailmasuk');
    }
}
