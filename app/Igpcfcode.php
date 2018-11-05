<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Igpcfcode extends Model
{
    public function igpcfdetail(){

    	return $this->hasMany('App\Igpcfdetail');
    }

    public function distributor(){

    	return $this->belongsTo('App\Distributor');
    }

    public function plant(){

    	return $this->belongsTo('App\Plant');
    }
}
