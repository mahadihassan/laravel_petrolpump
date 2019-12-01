<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuelMachine extends Model
{
    public function fuel()
    {
    	return $this->belongsTo('App\Fuel');
    }
}
