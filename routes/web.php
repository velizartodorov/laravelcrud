<?php

Auth::routes();

Route::get('/', 'EmployeeController@readEmployee');
Route::put('/employee/{employee_id?}', 'EmployeeController@updateEmployee');
Route::post('/employee', 'EmployeeController@createEmployee');
Route::get('/employee/{employee_id?}', 'EmployeeController@getEmployeeToEdit');
Route::delete('/employee/{employee_id?}', 'EmployeeController@deleteEmployee');