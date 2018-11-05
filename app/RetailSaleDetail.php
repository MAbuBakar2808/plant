<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RetailSaleDetail extends Model
{
    public function retailsalecode(){

    	return $this->belongsTo('App\RetailSaleCode');
    }
}
