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

Route::get('/tes', function () {
    return view('tes');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/ceban', function (){
    return view('admin.index');
});
Route::get('/users', function (){
    $users=\Illuminate\Support\Facades\DB::table('users')->orderBy('name')->paginate(10);
    return view('admin.user', compact('users'));
});
Route::get('/mytickets', 'ParticipantController@myTicket');
Route::get('/events', 'EventController@index')->name('events')->middleware('auth');
Route::post('/events', 'OwnerController@addEvent');
Route::post('/events/delete/{id}', 'OwnerController@deleteEvent');
Route::get('/events/buy/{id}', 'ParticipantController@purchase');
Route::post('/events/buy/{id}', 'ParticipantController@purchaseTicket');
Route::get('/owners', 'OwnerController@index')->name('owners')->middleware('auth');
Route::post('/owners/add','OwnerController@beOwner');
Route::post('/owners/delete/{id}', 'OwnerController@deleteOwner');