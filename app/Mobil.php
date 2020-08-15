<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $fillable = ['name', 'merk_id', 'warna', 'plat', 'filename'];

     public function merk()
    {
    	return $this->belongsTo(Merk::class);
    }
}
