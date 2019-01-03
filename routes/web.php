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
    return view('welcome');
});

//ESTO SE DEBE HACER POR CADA UNO DE LOS CONTROLADORES
//FALTA HACER LAS DISTINTAS VALIDACIONES EN EL CASO DE QUE SE USE STORE

//Airplanes
Route::get('/Airplane/all', 'AirplaneController@index');
Route::get('/Airplane/show/{id}', 'AirplaneController@show');
Route::post('/Airplane/destroy/{id}', 'AirplaneController@destroy');
Route::post('/Airplane/store', 'AirplaneController@store');