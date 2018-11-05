<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RetailSaleCode extends Model
{
    public function retailsaledetail(){

    	return $this->hasMany('App\RetailSaleDetail');
    }

    public function plant(){

    	return $this->belongsTo('App\Plant');
    }
    public function distributor(){

    	return $this->belongsTo('App\Distributor');
    }
}
