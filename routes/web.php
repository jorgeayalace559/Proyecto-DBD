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

/*Route::get('/', function () {
    return view('welcome');
});
*/

//Hay que desplegar un menu en todas. (No sé como) (Aún)

Route::get('/','HomeController@index');
Route::get('/airplanes','AirplaneController@index');  
Route::get('/insurance','InsuranceController@index');
Route::get('/car','CarController@index');
Route::get('/hotel','HotelController@index');
Route::get('/package','PackageController@index');
Route::get('/state','StateController@index');
Route::get('/flight','FlightController@index');
Route::get('/check-in','CheckInController@index');
Route::get('/user','UserController@index');
Route::get('/user-update','UpdateUserController@index');


Route::resource('Airplane','AirplaneController');
Route::post('Airplane','AirplaneController@storeOrUpdate');
Route::resource('Car','CarController');
Route::post('Car','CarController@storeOrUpdate');
Route::resource('CarReservation','CarReservationController');
Route::resource('Citie','CitieController');
Route::post('Citie','CitieController@storeOrUpdate');
Route::resource('Countrie','CountrieController');
Route::post('Countrie','CountrieController@storeOrUpdate'); 
Route::resource('Flight','FlightController');
Route::post('Flight','FlightController@storeOrUpdate');
Route::resource('Hotel','HotelController');
Route::post('Hotel','HotelController@storeOrUpdate');
Route::resource('Insurance','InsuranceController');
Route::post('Insurance','InsuranceController@storeOrUpdate');
Route::resource('InsuranceReservation','InsuranceReservationController');
Route::resource('Luggage','LuggageController');
Route::post('Luggage','LuggageController@storeOrUpdate');
Route::resource('Package','PackageController');
Route::post('Package','PackageController@storeOrUpdate'); // PROBLEMA
Route::resource('PackageReservation','PackageReservationController');
Route::resource('Passenger','PassengerController');
Route::post('Passenger','PassengerController@storeOrUpdate');
Route::resource('Payment','PaymentController');
Route::post('Payment','PaymentController@storeOrUpdate');
Route::resource('PurchaseOrder','PurchaseOrderController');
Route::post('PurchaseOrder','PurchaseOrderController@storeOrUpdate');
Route::resource('Role','RoleController');
Route::resource('Room','RoomController');
Route::post('Room','RoomController@storeOrUpdate');
Route::resource('RoomReservation','RoomReservationController');
Route::resource('Seat','SeatController');
Route::post('Seat','SeatController@storeOrUpdate'); // PROBLEMA
Route::resource('State','StateController');
Route::post('State','StateController@storeOrUpdate'); // NO ACTUALIZA
Route::resource('Ticket','TicketController');
Route::post('Ticket','TicketController@storeOrUpdate');
Route::resource('TicketReservation','TicketReservationController');
Route::resource('User','UserController');
Route::post('User','UserController@storeOrUpdate');  // PROBLEMA

//ANIDADAS
Route::resource('Hotel.Room','HotelRoomController',['except'=>['show']]);
Route::resource('User.PurchaseOrder','UserPurchaseOrderController',['except'=>['show']]);
Route::resource('Ticket.Passenger','TicketPassengerController',['except'=>['show']]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/buscarVuelo','FlightController@buscarVuelo')->name('buscarVuelo');
