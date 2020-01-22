<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;
use DB;

class Bank extends Model
{
    protected $table='banks';
    protected $timestamp=false;
	
	protected $fillable = [
        'id', 'bank_name', 'bank_logo','created_at','updated_at'
    ];
}
