<?php

use Illuminate\Support\Facades\Route;

Route::get('/',                 'Main\DashController@index')->name('home');
Route::get('/employee',         'Main\EmployeeController@index')->name('employee');
Route::get('/company',          'Main\CompanyController@index')->name('company');
Route::get('/people',           'Main\PeopleController@index')->name('people');
Route::get('/medic',            'Main\MedicController@index')->name('medic');
Route::get('/exam',             'Main\ExamController@index')->name('exam');
Route::get('/conclusion',       'Main\ConclusionController@index')->name('conclusion');
Route::get('/user',             'Main\UserController@index')->name('user');
Route::get('/asoj',             'Main\AsoJController@index')->name('asoj');
Route::get('/asojcreate',       'Main\AsoJController@create')->name('asojcreate');
Route::get('/asojedit',         'Main\AsoJController@create')->name('asojedit');
Route::get('/asojshow/{id}',    'Main\AsoJController@show')->name('asojshow');
Route::get('/asof',             'Main\AsoFController@index')->name('asof');
Route::get('/asofcreate',       'Main\AsoFController@create')->name('asofcreate');
Route::get('/asofedit',         'Main\AsoFController@create')->name('asofedit');
Route::get('/asofshow/{id}',    'Main\AsoFController@show')->name('asofshow');
Route::get('/asoarchive',       'Main\AsoArchiveController@index')->name('asoarchive');
Route::get('/input',            'Main\InputController@index')->name('input');
Route::get('/output',           'Main\OutputController@index')->name('output');
Route::get('/examarchive',      'Main\ArchiveController@index')->name('examarchive');