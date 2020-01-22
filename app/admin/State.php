<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;
use DB;

class State extends Model
{
    protected $table='state_city';
    protected $timestamp=false;
	
	protected $fillable = [
        'id', 'city', 'state'
    ];
}
