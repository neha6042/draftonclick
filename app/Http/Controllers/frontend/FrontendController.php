<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\Facades\DB;
use URL;
use Session;
use Illuminate\Support\Facades\Input;
use App\frontend\FrontendLogin;

class FrontendController extends Controller
{
    public function index(){
		return view('frontend.frontendLogin')->with('strTitle', 'Login');
	}
	
	public function dashboard(){
		echo 'dashboard';
		//return view('frontendDashboard')->with('strTitle', 'Dashboard here');
	}
	
	public function loginCheck(Request $request){
		//print_r($request->all());die;
		$username = trim($request->input('username'));
		$password = trim($request->input('password'));
		$arrLoginDetails = FrontendLogin::where('email',$username)->where('password',$password)->first();
		//print_r($arrLoginDetails);die;
		if(empty($arrLoginDetails)){
			return view('frontend.frontendLogin')->with(['strError'=>'Invalid Login Details']);
		}else{				
			$request->session()->put('username',$arrLoginDetails['username']);			
			return redirect('/Dashboard');		
		}
	} 
	
	public function Logout(Request $request)
    {
        $request->session()->flush();
		$request->session()->forget('username');
		return view('frontend.frontendLogin')->with('strSuccess', 'You have been successfully logged out!');
    }
	
	
	
}	