<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Manager extends Model
{
   	public function branch()
    {
    	return $this->belongsTo('App\Branch');
    }
    use SoftDeletes;
    protected $table='managers';
    protected $guard=[''];
}
