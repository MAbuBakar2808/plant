<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trpdetail extends Model
{
    public function trpcode(){

    	return $this->belongsTo('App\Trpcode');
    }
}
