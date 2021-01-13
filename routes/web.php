<?php

use Illuminate\Support\Facades\Route;

Route::get('/',                     'Main\DashController@index')->name('home');
Route::get('/employee',             'Main\EmployeeController@index')->name('employee');
Route::get('/company',              'Main\CompanyController@index')->name('company');
Route::get('/people',               'Main\PeopleController@index')->name('people');
Route::get('/medic',                'Main\MedicController@index')->name('medic');
Route::get('/exam',                 'Main\ExamController@index')->name('exam');
Route::get('/conclusion',           'Main\ConclusionController@index')->name('conclusion');
Route::get('/user',                 'Main\UserController@index')->name('user');
Route::get('/asoj',                 'Main\AsoJController@index')->name('asoj');
Route::get('/asojcreate',           'Main\AsoJController@create')->name('asojcreate');
Route::get('/asojedit',             'Main\AsoJController@create')->name('asojedit');
Route::get('/asojshow/{id}',        'Main\AsoJController@show')->name('asojshow');