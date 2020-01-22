<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;
use DB;

class Login extends Model
{
    protected $table='admin_login';
    protected $timestamp=false;
	
	protected $fillable = [
        'username', 'email', 'password',
    ];
}
