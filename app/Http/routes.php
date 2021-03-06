<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//
Route::get('pia', 'StudentController@index');
Route::get('pia/module', 'StudentController@module');
Route::get('/', 'StudentController@index');
Route::post('/pia/savehint', 'DataController@savehint');
Route::post('/pia/savereact', "DataController@savereaction");
Route::post('/pia/finished', 'DataController@updateStatus');
Route::post('/pia/abandoned', 'DataController@updateStatusAbandon');
Route::post('/pia/register', 'StudentController@store');
Route::post('pia/saveEquation', 'DataController@savegiven');
Route::get('/analyze/{id}/given/{given}/method/{method}', 'DataController@analyze');
Route::get('/analyze/user/{id}', 'DataController@analyzeUserInput');
Route::get('pia/test', 'StudentController@test');
Route::post('pia/logs', 'DataController@savelogs');
Route::post('pia/login', 'StudentController@login');
Route::get('pia/logout', 'StudentController@logout');
Route::get('pia/method/{method}', 'StudentController@method');
// Route::get('pia/{id}', 'StudentController@action');
Route::post('pia/savelogs', 'DataController@savelog');
Route::post('pia/data/seed', 'DataController@seed');
Route::get('pia/user/logs', 'StudentController@logs');
Route::get('pia/seedstudents', 'DataController@seed_students');
Route::get('pia/user/profile', 'StudentController@profile');
Route::get('pia/method/manual/user', 'StudentController@userInput');
Route::get('/test', function(){
  return view('test')->with('user',null);
});
