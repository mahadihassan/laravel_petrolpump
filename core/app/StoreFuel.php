<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreFuel extends Model
{
    public function fuel()
    {
    	return $this->belongsTo('App\Fuel');
    
    }
    public function supplier()
    {
    	return $this->belongsTo('App\Supplier');   
    }
}
