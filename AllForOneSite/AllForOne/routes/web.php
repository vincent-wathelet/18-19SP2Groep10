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

Route::get('logout', 'Auth\LoginController@logout');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/allevents', 'AllEventsController@index')->name('allevents');
Route::get('/allevents/{id}', 'AllEventsController@show')->name('event');
//Route::get('/myeventsentries', 'MyEvetsEntriesController@index')->name('myeventsentries');
Route::get('/contact', 'contactController@index')->name('contact');
Route::get('/MyEvents', 'MyEventsController@index')->name('myeventscontroller');
//Route::get('/MyEntries', 'MyEntriesController@index')->name('myentries');
Route::get('/EventDetails', 'EventDetailsController@index')->name('myeventdetails');
Route::get('/MyEvents', 'MyEventsController@index')->name('myeventscontroller');
Route::get('/EventDetails', 'EventDetailsController@index')->name('myeventdetails');


Route::get('/myeventsentries', 'EvetsEntriesController@detail')->name('eventsentries');
//Route::get('/myeventsdetail', 'EvetsEntriesController@show')->name('eventsentsdetail');
Route::get('/myevents', 'EvetsEntriesController@index')->name('myevents');
Route::get('myevents/create', 'EvetsEntriesController@create')->name('myevents_create');
Route::post('myevents/save/{id?}', 'EvetsEntriesController@save')->name('myevents_save');
Route::get('myevents/delete/{id}', 'EvetsEntriesController@delete');
Route::get('myevents/edit/{id}', 'EvetsEntriesController@edit');
Route::get('myevents/show/{id}', 'EvetsEntriesController@show');
Route::get('myevents/accept/{id}', 'EvetsEntriesController@accept');
Route::get('/myEntries', 'MyEntriesController@index')->name('myentries');
Route::get('myentries/delete/{id}', 'MyEntriesController@delete')->name('deleteentries');


Route::get('edit-events', 'AdminController@create')->name('edit-events');
Route::get('edit-events', 'AdminController@index')->name('edit-events');
Route::get('edit-events/{id}', 'AdminController@show')->name('edit-events');
Route::get('edit-events/edit/{id}', 'AdminController@edit');
Route::post('edit-events/save/{id?}', 'AdminController@save')->name('edit-events_save');
Route::get('edit-events/delete/{id}', 'AdminController@delete');

Route::get('manage-users', 'manageuserController@create')->name('manage-users');
Route::get('manage-users', 'manageuserController@index')->name('manage-users');
Route::get('manage-users/edit/{id}', 'manageuserController@edit');
Route::post('manage-users', 'manageuserController@update')->name('manage-users');
Route::get('manage-users/delete/{id}', 'manageuserController@delete');

Route::get('/homepage', 'HomepageController@index')->name('homepage');

Route::get('/profile', 'ProfileController@create')->name('profile');
Route::post('/profile', 'ProfileController@update')->name('profile');


Route::get('admin-dashboard', 'admindashboardController@create')->name('admin-dashboard');

Route::get('admin-dashboard-user', 'HomeController@check')->name('admin-dashboard-user');

/* Route::get('admin-homepage', 'AdminController@adminhome')->name('admin-homepage'); */
