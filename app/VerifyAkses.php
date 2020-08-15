<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifyAkses extends Model
{
    protected $guarded = [];
 
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
