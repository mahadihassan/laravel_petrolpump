<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
   	public function branch()
    {
    	return $this->belongsTo('App\Branch');
    }
}
