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