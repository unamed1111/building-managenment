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

Route::resource('buildings','BuildingController');
Route::resource('apartments','ApartmentController');
Route::resource('residents','ResidentController');
Route::resource('employees','EmployeeController');
Route::resource('services','ServiceController');
Route::resource('apartment_owners','ApartmentOwnerController');
Route::resource('devices','DeviceController');
Route::resource('maintenances','MaintenanceController');
Route::resource('reports','ReportController');
Route::post('addServicesToApartment/{id}','ApartmentController@addServices')->name('add_services');
Route::post('endMaintenance/{id}','MaintenanceController@endMaintenance')->name('maintenances.endMaintenance');
Route::post('addEmployeeMaintenance/{id}','MaintenanceController@addEmployees')->name('add_employees');
