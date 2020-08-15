<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    protected $fillable =['name'];

    public function mobil()
    {
    	return $this->hasOne(Mobil::class);
    }
}
