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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('airplanes','AirplaneController');
Route::resource('cities','CitieController');
Route::resource('cars','CarController');
Route::resource('countries','CountrieController');
Route::resource('flights','FlightController');
Route::resource('hotels','HotelController');
Route::resource('insurances','InsuranceController');
Route::resource('insurances_reservations','InsuranceReservationController');
Route::resource('luggages','LuggageController');
Route::resource('packages','PackageController');
Route::resource('passengers','PassengerController');
Route::resource('payments','PaymentController');
Route::resource('purchase_orders','PurchaseOrderController');
Route::resource('roles','RoleController');
Route::resource('room_reservations','RoomReservationsController');
Route::resource('seats','SeatController');
Route::resource('states','StateController');
Route::resource('tickets','TicketController');
Route::resource('ticket_reservations','TicketReservationController');
Route::resource('users','UserController');