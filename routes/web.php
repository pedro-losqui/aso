<?php

use Illuminate\Support\Facades\Route;

Route::get('/',             'Main\DashController@index')->name('home');
Route::get('/employee',     'Main\EmployeeController@index')->name('employee');
Route::get('/company',      'Main\CompanyController@index')->name('company');