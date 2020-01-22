<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\Facades\DB;
use URL;
use Session;
use App\admin\Bank;
use App\admin\State;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManager;
use Image;

require 'vendor/autoload.php';

class BankController extends Controller
{
	public function __construct(){
		$this->middleware(function ($request, $next){
			if(!Session::has('username')){ return redirect('/adminLogin'); }
			return $next($request);
		});
	}
	
	public static function getBankCount(){
		return Bank::count();
	}
	
	public static function getBranchCount(){
		return DB::table('branches')->count();
	}
	
    public function add(Request $request){
		
		if (!empty($request->all())) {
			if ($request->hasFile('file')) {				
				$file = $request->file('file');
				$filename = $file->getClientOriginalName();
				$fname = explode('.', $filename);
				$dt = strtotime(date('Y-m-d H:i:s'));
				$filename = $fname[0].$dt.'.'.$fname[1];
				$img = Image::make($file);
				$img->resize(null, 1200, function ($constraint) {
					$constraint->aspectRatio();
				})->save(public_path('images/bank/'.$filename));
			  }
			  
			  $arrBankData = array(
								'bank_name' => $request->input('bank_name'),
								'bank_logo' => $filename,
								'created_at' => date('Y-m-d H:i:s'),
								'updated_at' => date('Y-m-d H:i:s'),
								);
			  $res = Bank::insert($arrBankData);		
			  $arrBankDetails = Bank::orderBy('id','desc')->get();
			  return view('manageBanks')->with(['arrBankDetails'=>$arrBankDetails,'strSuccess'=>'Added Successfully!']);
		}		
		return view('addBank')->with('strTitle', 'Title here');
	}
	
	public function manageBanks()
    {		
        $arrBankDetails = Bank::orderBy('id','desc')->get();
		return view('manageBanks')->with(['arrBankDetails'=>$arrBankDetails]);
    }
	
	/*public function deleteBank(Request $request)
    {		
		$delete_record = $request->input('delete_value');
		$strDelete = Bank::where('id',$delete_record)->delete();
		return redirect('/manage_banks');
    }*/
	
	public function editBank(Request $request,$intBankId)
    {		
		$intBankId = base64_decode($intBankId);
		
		$arrBankEditData = DB::table('banks')
			->where('id',$intBankId)
            ->first();
		
		if (!empty($request->all())) {
			
			if ($request->hasFile('file')) {				
				$file = $request->file('file');
				$filename = $file->getClientOriginalName();
				$fname = explode('.', $filename);
				$dt = strtotime(date('Y-m-d H:i:s'));
				$filename = $fname[0].$dt.'.'.$fname[1];
				$img = Image::make($file);
				$img->resize(null, 1200, function ($constraint) {
					$constraint->aspectRatio();
				})->save(public_path('images/bank/'.$filename));
				
				$arrBankEdit = DB::table('banks')
				->where('id',$intBankId)
				->first();
				if(file_exists(public_path('/images/bank/').$arrBankEdit->bank_logo)){ 
					chmod(public_path('/images/bank'), 0777);
					unlink(public_path('/images/bank/').$arrBankEdit->bank_logo);
				}
				
			  }
			  
			$intBankId= $request->input('bankid');  
								
			if(!$request->hasFile('file')){
					$filename = $arrBankEditData->bank_logo;
			}
								
			$arrBankData = array(
								'bank_name' => $request->input('bank_name'),
								'bank_logo' => $filename,
								'updated_at' => date('Y-m-d H:i:s'),
								);

			$strBnk = Bank::where('id',$intBankId)->update($arrBankData);
						
			$arrBankDetails = Bank::orderBy('id','desc')->get();
			return view('manageBanks')->with(['arrBankDetails'=>$arrBankDetails,'strSuccess'=>'Updated Successfully!']);				
		}
		
		return view('editBank')->with(['strPageTitle'=>'Update Bank','arrBankEditData'=>$arrBankEditData]);
		
	}
	
	public function addCategory(Request $request){	
		$arrAllBanks = Bank::select('id','bank_name')->orderBy('id')->get();
		$arrAllStates = State::select('state')->distinct()->get();
		
		if (!empty($request->all())) {
			//print_r($request->all());die;
			$data = array(
							'bank_id' => $request->input('bank_name'),
							'office_type' => $request->input('office_type'),
							'state' => $request->input('office_state'),
							'city' => $request->input('office_city'),
							'manager_name' => $request->input('zonal_manager_name'),
							'manager_email' => $request->input('zonal_manager_email'),
							'manager_alternate_email' => $request->input('zonal_manager_alt_email'),
							'manager_mobile_no' => $request->input('zonal_manager_mobile_no'),
							'manager_contact_no' => $request->input('zonal_manager_contact_no'),
							'office_address' => $request->input('zonal_office_address'),
							'created_at' => date('Y-m-d H:i:s'),
							'updated_at' => date('Y-m-d H:i:s'),
						);
			$arrRes = DB::table('categories')->insert($data);
			return redirect('/manage_categories')->with('success', 'Added Successfully!');   

		}
		return view('addCategory')->with(['strTitle', 'Title here','arrAllBanks'=>$arrAllBanks,'arrAllStates'=>$arrAllStates]);
	}
	
	public function deleteCategory(Request $request)
    {		
		$delete_record = $request->input('delete_value');
		$strDelete = DB::table('categories')->where('id',$delete_record)->delete();
		return redirect('/manage_categories');
    }
	
	public function manageCatgories()
    {		
		//$arrCategoryDetails = DB::select('b.bank_name','')->table('categories')->orderBy('id','desc')->get();
		
		$arrCategoryDetails = DB::table('categories')
            ->join('banks', 'banks.id', '=', 'categories.bank_id')
            ->select('categories.*', 'banks.bank_name')
            ->get();
		
		return view('manageCategories')->with(['arrCategoryDetails'=>$arrCategoryDetails]);
    }

	public function editCategory(Request $request,$intCatId)
    {		
		$intCatId = base64_decode($intCatId);
		$arrAllBanks = Bank::select('id','bank_name')->orderBy('id')->get();
		$arrAllStates = State::select('state')->distinct()->get();
		$arrCatEditData = DB::table('categories')
            ->join('banks', 'banks.id', '=', 'categories.bank_id')
            ->select('categories.*', 'banks.bank_name')
            ->where('categories.id', $intCatId)
            ->first();
		
		if (!empty($request->all())) {
			
			$catId = $request->input('catId');
					$data = array(
							'bank_id' => $request->input('bank_name'),
							'office_type' => $request->input('office_type'),
							'state' => $request->input('office_state'),
							'city' => $request->input('office_city'),
							'manager_name' => $request->input('zonal_manager_name'),
							'manager_email' => $request->input('zonal_manager_email'),
							'manager_alternate_email' => $request->input('zonal_manager_alt_email'),
							'manager_mobile_no' => $request->input('zonal_manager_mobile_no'),
							'manager_contact_no' => $request->input('zonal_manager_contact_no'),
							'office_address' => $request->input('zonal_office_address'),
							'updated_at' => date('Y-m-d H:i:s'),
						);
			$res = DB::table('categories')
				   ->where('id',$catId)
				   ->update($data);
			return redirect('/manage_categories')->with('success', 'Updated Successfully!');   
		}
		//print_r($arrCatEditData);die;
		return view('editCategory')->with(['strPageTitle'=>'Update Category','arrCatEditData'=>$arrCatEditData,'arrAllBanks'=>$arrAllBanks,'arrAllStates'=>$arrAllStates]);
		
	}
	
	public function checkBankName(Request $request)
    {
        $bankName = trim($request->input('bankName'));
		$isExsits = Bank::where('bank_name',$bankName)->first();
		
		echo count($isExsits);
    }	
	
	public function addBranch(Request $request){	
		$arrAllBanks = Bank::select('id','bank_name')->orderBy('id')->get();
		$arrAllStates = State::select('state')->distinct()->get();
		
		if (!empty($request->all())) {
			//print_r($request->all());die;
			$data = array(
							'bank_id' => $request->input('bank_name'),
							'office_type' => $request->input('office_type'),
							'state' => $request->input('office_state'),
							'city' => $request->input('office_city'),
							'branch_name' => $request->input('branch_name'),
							'branch_code' => $request->input('branch_code'),
							'branch_manager_name' => $request->input('branch_manager_name'),
							'scale_of_branch_manager' => $request->input('scale_of_branch_manager'),
							'branch_email' => $request->input('branch_email'),
							'branch_alt_email' => $request->input('branch_alt_email'),
							'branch_manager_mobile_no' => $request->input('branch_manager_mobile_no'),
							'branch_manager_contact_no' => $request->input('branch_manager_contact_no'),
							'branch_office_address' => $request->input('branch_office_address'),
							'created_at' => date('Y-m-d H:i:s'),
							'updated_at' => date('Y-m-d H:i:s'),
						);
			$arrRes = DB::table('branches')->insert($data);
			return redirect('/manage_branches')->with('success', 'Added Successfully!');   
		}
		return view('addBranch')->with(['strTitle'=>'Add Branch','arrAllBanks'=>$arrAllBanks,'arrAllStates'=>$arrAllStates]);
	}
	public function manageBranches()
    {		
		$arrBranchDetails = DB::table('branches')
            ->join('banks', 'banks.id', '=', 'branches.bank_id')
            ->select('branches.*', 'banks.bank_name')
            ->get();
		
		return view('manageBranches')->with(['arrBranchDetails'=>$arrBranchDetails]);
    }
	
	public function deleteBranch(Request $request)
    {		
		$delete_record = $request->input('delete_value');
		$strDelete = DB::table('branches')->where('id',$delete_record)->delete();
		return redirect('/manage_branches');
    }
	
	public function editBranch(Request $request,$intBranchId)
    {		
		$intBranchId = base64_decode($intBranchId);
		$arrAllBanks = Bank::select('id','bank_name')->orderBy('id')->get();
		$arrAllStates = State::select('state')->distinct()->get();
		$arrBranchEditData = DB::table('branches')
            ->join('banks', 'banks.id', '=', 'branches.bank_id')
            ->select('branches.*', 'banks.bank_name')
            ->where('branches.id', $intBranchId)
            ->first();
		
		if (!empty($request->all())) {
			
			$branchId = $request->input('branchId');
					$data = array(
							'bank_id' => $request->input('bank_name'),
							'office_type' => $request->input('office_type'),
							'state' => $request->input('office_state'),
							'city' => $request->input('office_city'),
							'branch_name' => $request->input('branch_name'),
							'branch_code' => $request->input('branch_code'),
							'branch_manager_name' => $request->input('branch_manager_name'),
							'scale_of_branch_manager' => $request->input('scale_of_branch_manager'),
							'branch_email' => $request->input('branch_email'),
							'branch_alt_email' => $request->input('branch_alt_email'),
							'branch_manager_mobile_no' => $request->input('branch_manager_mobile_no'),
							'branch_manager_contact_no' => $request->input('branch_manager_contact_no'),
							'branch_office_address' => $request->input('branch_office_address'),
							'updated_at' => date('Y-m-d H:i:s'),
						);
			$res = DB::table('branches')
				   ->where('id',$branchId)
				   ->update($data);
			return redirect('/manage_branches')->with('success', 'Updated Successfully!');   
		}
		//print_r($arrCatEditData);die;
		return view('editBranch')->with(['strPageTitle'=>'Update Branch','arrBranchEditData'=>$arrBranchEditData,'arrAllBanks'=>$arrAllBanks,'arrAllStates'=>$arrAllStates]);
		
	}
	
	public function deleteDepartment(Request $request)
    {		
		$delete_record = $request->input('delete_value');
		$strDelete = DB::table('departments')->where('id',$delete_record)->delete();
		return redirect('/manage_departments');
    }
	
	public function fetchCities(Request $request){	
		$state = $request->input('state');
		$arrAllCities = State::select('city')->where('state',$state)->distinct()->get();
		$values = '';
		foreach ($arrAllCities as $city) {
			$values .= '<option value="'.$city["city"].'">'.$city["city"].'</option>';
		}
		
		echo $values;
	}
	
	public function editDepartment(Request $request,$intDepId)
    {		
		$intDepId = base64_decode($intDepId);
		$arrAllBanks = Bank::select('id','bank_name')->orderBy('id')->get();
		$arrAllStates = State::select('state')->distinct()->get();
		$arrDeptEditData = DB::table('departments')
            ->join('banks', 'banks.id', '=', 'departments.bank_id')
            ->select('departments.*', 'banks.bank_name')
            ->where('departments.id', $intDepId)
            ->first();
		
		if (!empty($request->all())) {
			//print_r($request->all());die;
			$intDepId = $request->input('deptId');
					$data = array(
							'bank_id' => $request->input('bank_name'),
							'office_type' => $request->input('office_type'),
							'state' => $request->input('office_state'),
							'city' => $request->input('office_city'),
							'dept_name' => $request->input('dept_name'),
							'dept_manager_name' => $request->input('dept_manager_name'),
							'scale_of_dept_manager' => $request->input('scale_of_dept_manager'),
							'dept_email' => $request->input('dept_email'),
							'dept_alt_email' => $request->input('dept_alt_email'),
							'dept_manager_mobile_no' => $request->input('dept_manager_mobile_no'),
							'dept_manager_contact_no' => $request->input('dept_manager_contact_no'),
							'dept_office_address' => $request->input('dept_office_address'),
							'updated_at' => date('Y-m-d H:i:s'),
						);
			$res = DB::table('departments')
				   ->where('id',$intDepId)
				   ->update($data);
			return redirect('/manage_departments')->with('success', 'Updated Successfully!');   
		}
		//print_r($arrDeptEditData);die;
		return view('editDepartment')->with(['strPageTitle'=>'Update Department','arrDeptEditData'=>$arrDeptEditData,'arrAllBanks'=>$arrAllBanks,'arrAllStates'=>$arrAllStates]);
		
	}
	
	public function addDepartment(Request $request){	
		$arrAllBanks = Bank::select('id','bank_name')->orderBy('id')->get();
		$arrAllStates = State::select('state')->distinct()->get();
		
		if (!empty($request->all())) {
			//print_r($request->all());die;
			$data = array(
							'bank_id' => $request->input('bank_name'),
							'office_type' => $request->input('office_type'),
							'state' => $request->input('office_state'),
							'city' => $request->input('office_city'),
							'dept_name' => $request->input('dept_name'),
							'dept_manager_name' => $request->input('dept_manager_name'),
							'scale_of_dept_manager' => $request->input('scale_of_dept_manager'),
							'dept_email' => $request->input('dept_email'),
							'dept_alt_email' => $request->input('dept_alt_email'),
							'dept_manager_mobile_no' => $request->input('dept_manager_mobile_no'),
							'dept_manager_contact_no' => $request->input('dept_manager_contact_no'),
							'dept_office_address' => $request->input('dept_office_address'),
							'created_at' => date('Y-m-d H:i:s'),
							'updated_at' => date('Y-m-d H:i:s'),
						);
			$arrRes = DB::table('departments')->insert($data);
			return redirect('/manage_departments')->with('success', 'Added Successfully!');   
		}
		return view('addDepartment')->with(['strTitle'=>'Add Department','arrAllBanks'=>$arrAllBanks,'arrAllStates'=>$arrAllStates]);
	}
	public function manageDepartments()
    {		
		$arrDepartmentDetails = DB::table('departments')
            ->join('banks', 'banks.id', '=', 'departments.bank_id')
            ->select('departments.*', 'banks.bank_name')
            ->get();
		
		return view('manageDepartments')->with(['arrDepartmentDetails'=>$arrDepartmentDetails]);
    }
	
}	