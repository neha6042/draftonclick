<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\Facades\DB;
use URL;
use Session;
use Illuminate\Support\Facades\Input;
use App\admin\Login;

class LoginController extends Controller
{
    public function index(){
		return view('login')->with('strTitle', 'Title here');
	}
	
	public function dashboard(){
		return view('dashboard')->with('strTitle', 'Dashboard here');
	}
	
	public function adminLoginCheck(Request $request){
		//print_r($request->all());die;
		$username = trim($request->input('username'));
		$password = trim($request->input('password'));
		$arrLoginDetails = Login::where('email',$username)->where('password',$password)->first();
		//print_r($arrLoginDetails);die;
		if(empty($arrLoginDetails)){
			return view('login')->with(['strError'=>'Invalid Login Details']);
		}else{				
			$request->session()->put('username',$arrLoginDetails['username']);			
			return redirect('/adminDashboard');		
		}
	} 
	
	public function Logout(Request $request)
    {
        $request->session()->flush();
		$request->session()->forget('username');
		return view('login')->with('strSuccess', 'You have been successfully logged out!');
    }
	
	
	
}	