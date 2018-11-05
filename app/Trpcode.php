<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trpcode extends Model
{
    public function trpdetail(){

    	return $this->hasMany('App\Trpdetail');
    }
}
