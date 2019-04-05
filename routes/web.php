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

Route::get('/', function () {
    return view('layouts.master');
});

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
Route::resource('accounts', 'AccountController')->middleware('auth');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/changePassword','HomeController@getChangePassword')->name('getChangePassword')->middleware('auth');
Route::post('/changePassword','HomeController@postChangePassword')->name('postChangePassword')->middleware('auth');
Route::post('endMaintenance/{id}','MaintenanceController@endMaintenance')->name('maintenances.endMaintenance');
Route::post('doneReport/{id}','ReportController@doneReport')->name('report.doneReport');
Route::post('addEmployeeMaintenance/{id}','MaintenanceController@addEmployees')->name('add_employees');
