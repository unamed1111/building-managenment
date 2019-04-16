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

// Route::get('/', function () {
//     return view('layouts.master');
// });

// Route::prefix('admin')->group(function(){
	Route::resource('buildings','BuildingController')->middleware('auth');
	Route::resource('apartments','ApartmentController')->middleware('auth');
	Route::resource('residents','ResidentController')->middleware('auth');
	Route::get('residents-create-account/{id}','ResidentController@createAccount')->name('residents.createAccount')->middleware('auth');
	Route::resource('employees','EmployeeController')->middleware('auth');
	Route::get('employees-create-account/{id}','EmployeeController@createAccount')->name('employees.createAccount')->middleware('auth');
	Route::resource('services','ServiceController')->middleware('auth');
	Route::resource('apartment_owners','ApartmentOwnerController')->middleware('auth');
	Route::resource('devices','DeviceController')->middleware('auth');
	Route::resource('maintenances','MaintenanceController')->middleware('auth');
	Route::resource('reports','ReportController')->middleware('auth');
	Route::post('addServicesToApartment/{id}','ApartmentController@addServices')->name('add_services');
	Route::resource('users', 'UserController')->middleware('auth');
	Route::resource('roles', 'RoleController');
	Route::post('/role/{id}/restore', 'RoleController@restore')->name('role.restore');

	Route::get('/changePassword','HomeController@getChangePassword')->name('getChangePassword')->middleware('auth');
	Route::post('/changePassword','HomeController@postChangePassword')->name('postChangePassword')->middleware('auth');
	Route::post('endMaintenance/{id}','MaintenanceController@endMaintenance')->name('maintenances.endMaintenance');
	Route::post('doneReport/{id}','ReportController@doneReport')->name('report.doneReport');
	Route::post('addEmployeeMaintenance/{id}','MaintenanceController@addEmployees')->name('add_employees');
	Route::get('apartments/{id}/create_cost_service/{month}','ApartmentController@createCostService')->name('create_cost_service');
	Route::get('apartments/{id}/show_cost_service/{month}','ApartmentController@getCostService')->name('show_cost_service');
	Route::get('hoan_tat_thanh_toan/{id}','ApartmentController@hoan_tat_thanh_toan')->name('hoan_tat_thanh_toan');
	Route::get('/', 'HomeController@index')->name('home');
	Route::get('ajaxGetApartment','ApartmentController@ajaxGetApartment');

// });

Auth::routes();

