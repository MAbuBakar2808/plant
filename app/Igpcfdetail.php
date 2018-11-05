<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Igpcfdetail extends Model
{
    public function igpcfcode(){

    	return $this->belongsTo('App\Igpcfcode');
    }
}
