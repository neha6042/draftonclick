<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*********************************Admin Routes Start*************************************/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/adminLogin', 'frontend\LoginController@index');
Route::post('/adminLogin', 'frontend\LoginController@index');

Route::get('/adminDashboard', 'frontend\LoginController@dashboard');
Route::post('/adminDashboard', 'frontend\LoginController@dashboard');

Route::get('/admin_login_check', 'frontend\LoginController@adminLoginCheck');
Route::post('/admin_login_check', 'frontend\LoginController@adminLoginCheck');

Route::get('/logout', 'frontend\LoginController@Logout');
Route::post('/logout', 'frontend\LoginController@Logout');

/*Bank Routes*/
Route::get('/addBank', 'frontend\BankController@add');
Route::post('/addBank', 'frontend\BankController@add');
Route::get('/manage_banks', 'frontend\BankController@manageBanks');
//Route::get('/delete_bank', 'frontend\BankController@deleteBank');
//Route::post('/delete_bank', 'frontend\BankController@deleteBank');
Route::get('/edit_bank/{intBankId}', 'frontend\BankController@editBank');
Route::post('/edit_bank/{intBankId}', 'frontend\BankController@editBank');

/*Category Routes*/
Route::get('/addCategory', 'frontend\BankController@addCategory');
Route::post('/addCategory', 'frontend\BankController@addCategory');
Route::get('/manage_categories', 'frontend\BankController@manageCatgories');
Route::get('/delete_category', 'frontend\BankController@deleteCategory');
Route::post('/delete_category', 'frontend\BankController@deleteCategory');
Route::get('/edit_category/{intCatId}', 'frontend\BankController@editCategory');
Route::post('/edit_category/{intCatId}', 'frontend\BankController@editCategory');

/*Branch Routes*/
Route::get('/addBranch', 'frontend\BankController@addBranch');
Route::post('/addBranch', 'frontend\BankController@addBranch');
Route::get('/manage_branches', 'frontend\BankController@manageBranches');
Route::get('/delete_branch', 'frontend\BankController@deleteBranch');
Route::post('/delete_branch', 'frontend\BankController@deleteBranch');
Route::get('/edit_branch/{intBranchId}', 'frontend\BankController@editBranch');
Route::post('/edit_branch/{intBranchId}', 'frontend\BankController@editBranch');

/*Department Routes*/
Route::get('/addDepartment', 'frontend\BankController@addDepartment');
Route::post('/addDepartment', 'frontend\BankController@addDepartment');
Route::get('/manage_departments', 'frontend\BankController@manageDepartments');
Route::get('/delete_department', 'frontend\BankController@deleteDepartment');
Route::post('/delete_department', 'frontend\BankController@deleteDepartment');
Route::get('/edit_department/{intDeptId}', 'frontend\BankController@editDepartment');
Route::post('/edit_department/{intDeptId}', 'frontend\BankController@editDepartment');


Route::get('/checkBankName', 'frontend\BankController@checkBankName');
Route::post('/checkBankName', 'frontend\BankController@checkBankName');
Route::get('/get-cities', 'frontend\BankController@fetchCities');
Route::post('/get-cities', 'frontend\BankController@fetchCities');

/*********************************Admin Routes End*************************************/

Route::get('/login', 'frontend\FrontendController@index');
Route::post('/login', 'frontend\FrontendController@index');

Route::get('/Dashboard', 'frontend\FrontendController@dashboard');
Route::post('/Dashboard', 'frontend\FrontendController@dashboard');

Route::get('/loginCheck', 'frontend\FrontendController@loginCheck');
Route::post('/loginCheck', 'frontend\FrontendController@loginCheck');

Route::get('/log_out', 'frontend\FrontendController@Logout');
Route::post('/log_out', 'frontend\FrontendController@Logout');
