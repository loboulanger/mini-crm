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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('signin');
});

Route::get('/dashboard', function () {
  return view('dashboard');
});

Route::get('/firms', 'FirmsController@index');

Route::get('/employees', 'EmployeesController@index');

Route::get('/employees/create', 'EmployeesController@create');
Route::post('/employees', 'EmployeesController@store');

Route::get('/firms/create', 'FirmsController@create');
Route::post('/firms', 'FirmsController@store');
Route::delete('/firms/{id}', 'FirmsController@destroy');
