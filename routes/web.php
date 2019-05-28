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

Route::prefix('admin')->group(function(){
	Route::resource('buildings','BuildingController')->middleware(['auth', 'roleAmin']);
	Route::resource('apartments','ApartmentController')->middleware(['auth', 'roleAmin']);
	Route::resource('residents','ResidentController')->middleware(['auth', 'roleAmin']);
	Route::get('residents-create-account/{id}','ResidentController@createAccount')->name('residents.createAccount')->middleware(['auth', 'roleAmin']);
	Route::resource('employees','EmployeeController')->middleware(['auth', 'roleAmin']);
	Route::get('employees-create-account/{id}','EmployeeController@createAccount')->name('employees.createAccount')->middleware(['auth', 'roleAmin']);
	Route::resource('services','ServiceController')->middleware(['auth', 'roleAmin']);
	Route::resource('apartment_owners','ApartmentOwnerController')->middleware(['auth', 'roleAmin']);
	Route::resource('devices','DeviceController')->middleware(['auth', 'roleAmin']);
	Route::resource('maintenances','MaintenanceController')->middleware(['auth', 'roleAmin']);
	Route::resource('reports','ReportController')->middleware(['auth', 'roleAmin']);
	Route::post('addServicesToApartment/{id}','ApartmentController@addServices')->name('add_services');
	Route::resource('users', 'UserController')->middleware(['auth', 'roleAmin']);
	Route::resource('roles', 'RoleController');
	Route::post('/role/{id}/restore', 'RoleController@restore')->name('role.restore');

	Route::get('/changePassword','HomeController@getChangePassword')->name('getChangePassword')->middleware('auth');
	Route::post('/changePassword','HomeController@postChangePassword')->name('postChangePassword')->middleware('auth');
	Route::post('endMaintenance/{id}','MaintenanceController@endMaintenance')->name('maintenances.endMaintenance');
	Route::post('doneReport/{id}','ReportController@doneReport')->name('report.doneReport');
	Route::post('addEmployeeMaintenance/{id}','MaintenanceController@addEmployees')->name('add_employees');
	Route::get('apartments/{id}/create_cost_service/{month}','ApartmentController@createCostService')->name('create_cost_service');
	Route::get('createAllCostService/{month}','ApartmentController@createAllCostService')->name('createAllCostService');
	Route::get('apartments/{id}/show_cost_service/{month}','ApartmentController@getCostService')->name('show_cost_service');
	Route::get('hoan_tat_thanh_toan/{id}','ApartmentController@hoan_tat_thanh_toan')->name('hoan_tat_thanh_toan')->middleware(['auth', 'roleAmin']);
	Route::get('/', 'HomeController@index')->name('home')->middleware(['auth', 'roleAmin']);
	Route::get('ajaxGetApartment','ApartmentController@ajaxGetApartment');
	Route::post('getCostMonth/{id}','ApartmentController@getCostMonth')->name('getCostMonth');
	Route::get('data-statistics','DataStatisticController@index')->name('data-statistics.index');
	Route::get('data-statistics/details','DataStatisticController@details')->name('data-statistics.details');
	Route::get('/getInformation','EmployeeController@getInformation')->name('employee.infomation')->middleware(['auth', 'roleAmin']);

});

Route::prefix('/')->group(function(){
	Route::get('/','ResidentController@getInformation')->name('residents.infomation')->middleware('auth');
	Route::get('report','ReportController@reportIndex')->name('residents.report-index')->middleware('auth');
	Route::post('report','ReportController@reportStore')->name('residents.report-store')->middleware('auth');
	Route::get('service','ServiceController@serviceIndex')->name('residents.service-index')->middleware('auth');
	Route::post('service','ServiceController@serviceStore')->name('residents.service-store')->middleware('auth');
	Route::post('delete-service/{id}','ServiceController@serviceDelete')->name('residents.service-delete')->middleware('auth');
	Route::get('cost-service','ApartmentController@costServiceIndex')->name('residents.cost-service-index')->middleware('auth');
	Route::get('cost-service/{month}','ApartmentController@costServiceShow')->name('residents.cost-service-show')->middleware('auth');
	Route::post('getCostMonthResident','ApartmentController@getCostMonthResident')->name('getCostMonthResident');

	    
    Route::get('/execute-payment', 'PaymentController@execute');
    Route::post('/create-payment', 'PaymentController@create')->name('create-payment');

    Route::get('/vnpay', function(){
    	return view('vnpay');
    })->name('vnpay');

    Route::post('create-vnpay', 'VnpayController@create')->name('create-vnpay');
    Route::get('excute-vnpay', 'VnpayController@excute')->name('excute-vnpay');
    Route::get('return-vnpay', 'VnpayController@return')->name('return-vnpay');

    Route::get('readnoti/{id}', 'NotificationController@readNoti')->name('readNoti');
    Route::get('markAllNoti', 'NotificationController@markAllNoti')->name('markAllNoti');
});	

Auth::routes();

