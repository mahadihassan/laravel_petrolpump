<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoadFuel extends Model
{
    public function fuel()
    {
    	return $this->belongsTo('App\Fuel');
    }

    public function machine()
    {
    	return $this->belongsTo(FuelMachine::class,'machine_id');
    }
   

   
}
