<?php

namespace App\frontend;

use Illuminate\Database\Eloquent\Model;
use DB;

class FrontendLogin extends Model
{
    protected $table='frontend_login';
    protected $timestamp=false;
	
	protected $fillable = [
        'username', 'email', 'password',
    ];
}
