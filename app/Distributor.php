<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    public function igpcfcodes()
    {
    	return $this->hasMany('App\Igpcfcode');
    }
    public function retailsale()
    {
    	return $this->hasMany('App\RetailSale');
    }
}
