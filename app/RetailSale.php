<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RetailSale extends Model
{
    public function distributor() {

    	return $this->belongsTo('App\Distributor');
    }

    public function plant() {

    	return $this->belongsTo('App\Plant');
    }
}
