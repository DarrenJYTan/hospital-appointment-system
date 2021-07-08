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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Show Login Page
Route::get('/login/doctor', 'App\Http\Controllers\Auth\LoginController@doctorLoginForm');
Route::get('/login/nurse', 'App\Http\Controllers\Auth\LoginController@nurseLoginForm');
Route::get('/login/patient', 'App\Http\Controllers\Auth\LoginController@patientLoginForm');

//Show Register Page
Route::get('/register/doctor', 'App\Http\Controllers\Auth\RegisterController@doctorRegisterForm');
Route::get('/register/nurse', 'App\Http\Controllers\Auth\RegisterController@nurseRegisterForm');
Route::get('/register/patient', 'App\Http\Controllers\Auth\RegisterController@patientRegisterForm');

//Login Authentication
Route::post('/login/doctor', 'App\Http\Controllers\Auth\LoginController@doctorAuthentication');
Route::post('/login/nurse', 'App\Http\Controllers\Auth\LoginController@nurseAuthentication');
Route::post('/login/patient', 'App\Http\Controllers\Auth\LoginController@patientAuthentication');

//Register User
Route::post('/register/doctor', 'App\Http\Controllers\Auth\RegisterController@doctorCreate');
Route::post('/register/nurse', 'App\Http\Controllers\Auth\RegisterController@nurseCreate');
Route::post('/register/patient', 'App\Http\Controllers\Auth\RegisterController@patientCreate');

Route::view('/home', 'home')->middleware('auth');
Route::view('/doctor', 'doctor/home');
Route::view('/nurse', 'nurse/home');
Route::view('/patient', 'patient/home');
