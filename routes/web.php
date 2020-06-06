<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'WelcomeController@index');
Route::get('/test', 'WelcomeController@test')->name('test');
Route::post('/test', 'WelcomeController@checktest')->name('checktest');


Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/hospitals', 'HospitalController@index')->name('hospitals');
Route::get('/addhospital', 'HospitalController@create')->name('addhospital');
Route::post('/addhospital', 'HospitalController@store')->name('createhospitals');


// Route::get('/updatehospital', 'HospitalController@update')->name('updatehospitals');
Route::get('/patients', 'PatientController@index')->name('patients');
Route::get('/addpatient', 'PatientController@create')->name('addpatient');
Route::post('/addpatient', 'PatientController@store')->name('createpatient');
Route::get('/exitpatient', 'PatientController@exit')->name('exitpatient');
Route::post('/exitpatient', 'PatientController@update')->name('updatepatient');
