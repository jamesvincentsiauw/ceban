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
Route::get('/', 'HomeController@index')->name('home');
Route::get('/search', 'HomeController@viewSearch');

Route::get('/profile', 'UserController@profile')->middleware('auth');
Route::post('/profile', 'UserController@editProfile')->middleware('auth');

Route::get('/events', 'EventController@index');
Route::get('/event/add', 'EventController@addForm')->middleware('auth');
Route::post('/event/add', 'EventController@addEvent')->middleware('auth');
Route::post('/event/edit/{id}', 'EventController@editEvent')->middleware('auth');
Route::post('/event/delete/{id}', 'EventController@deleteEvent')->middleware('auth');

Route::get('/events/buy/{id}', 'ParticipantController@purchase')->middleware('auth');
Route::post('/events/buy/{id}', 'ParticipantController@purchaseTicket')->middleware('auth');
Route::get('/mytickets', 'ParticipantController@myTickets')->middleware('auth');
Route::get('/download/{id}','ParticipantController@generateTicket')->middleware('auth');

Route::get('/owner/register', 'OwnerController@register')->middleware('auth');
Route::post('/owner/register','OwnerController@beOwner')->middleware('auth');
Route::post('/owner/delete/{id}', 'OwnerController@deleteOwner')->middleware('auth');
Route::get('/myevents', 'OwnerController@myEvents')->name('events')->middleware('auth');

Route::get('/tes', function (){
    return view('tiket');
});