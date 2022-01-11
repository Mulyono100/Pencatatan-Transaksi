<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategoribarang extends Model
{
    protected $fillable = ['id', 'nama'];
    public function barang()
    {
        return $this->hasMany('App\barang');
    }
    public function barangmasuks()
    {
        return $this->hasMany('App\barangmasuks');
    }
}
