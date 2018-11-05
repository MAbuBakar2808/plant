<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    public function igpcfcodes()
    {
    	return $this->hasMany('App\Igpcfcode');
    }
    public function retailsalecodes()
    {
    	return $this->hasMany('App\RetailSaleCode');
    }
}
