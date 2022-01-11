<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    protected $table = 'suplier';
    protected $fillable = ['id', 'nama', 'email', 'handphone', 'alamat'];

    public function barangmasuk()
    {
        return $this->hasMany('App\barangmasuk');
    }
    public function transaksi()
    {
        return $this->hasMany('App\Transaksi');
    }
    public function detailmasuk()
    {
        return $this->hasMany('App\detailmasuk');
    }
}
