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
//Route::get('/Airplane/all', 'AirplaneController@index');
//Route::get('/Airplane/show/{id}', 'AirplaneController@show');
//Route::get('/Airplane/destroy/{id}', 'AirplaneController@destroy');
//Route::post('/Airplane/store', 'AirplaneController@store');

//flights
Route::resource('Airplane','AirplaneController');
Route::resource('Car','CarController');
Route::resource('CarReservation','CarReservationController');
Route::resource('Citie','CitieController');
Route::resource('Countrie','CountrieController');
Route::resource('Flight','FlightController');
Route::resource('Hotel','HotelController');
Route::resource('Insurance','InsuranceController');
Route::resource('InsuranceReservation','InsuranceReservationController');
Route::resource('Luggage','LuggageController');
Route::resource('Package','PackageController');
Route::resource('PackageReservation','PackageReservationController');
Route::resource('Passenger','PassengerController');
Route::resource('Payment','PaymentController');
Route::resource('PurchaseOrder','PurchaseOrderController');
Route::resource('Role','RoleController');
Route::resource('Room','RoomController');
Route::resource('RoomReservation','RoomReservationController');
Route::resource('Seat','SeatController');
Route::resource('State','StateController');
Route::resource('Ticket','TicketController');
Route::resource('TicketReservation','TicketReservationController');
Route::resource('User','UserController');
//Route::get('/Flight/all', 'FlightController@index');
//Route::get('/Flight/show/{id}', 'FlightController@show');
//Route::delete('/Flight/destroy/{id}', 'FlightController@destroy');
//Route::post('/Flight/store', 'FlightController@store');