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

Route::get('/','HomepageController@index');

Route::get('logout', 'Auth\LoginController@logout');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// toont all eventen
Route::get('/allevents', 'AllEventsController@index')->name('allevents');
// toont all events post
Route::post('/allevents', 'AllEventsController@index')->name('allevents');

Route::post('/allevents-subscribe', 'AllEventsController@subscribe')->name('allevents-subscribe');

/* Route::get('/allevents-subscribedelete', 'AllEventsController@subscribedelete')->name('allevents-subscribedelete');
 */
// toont detail van een event
Route::get('/allevents/{id}', 'AllEventsController@show')->name('event');
// schrijft je voor event in
Route::get('/allevents/{id}/inschrijving','InschrijvingController@Inschrijven');
Route::get('/allevents/{id}/uitschrijven','InschrijvingController@Uitschrijven');
//Route::get('/myeventsentries', 'MyEvetsEntriesController@index')->name('myeventsentries');
Route::get('/contact', 'contactController@index')->name('contact');
Route::get('/MyEvents', 'MyEventsController@index')->name('myeventscontroller');
//Route::get('/MyEntries', 'MyEntriesController@index')->name('myentries');
Route::get('/EventDetails', 'EventDetailsController@index')->name('myeventdetails');
Route::get('/MyEvents', 'MyEventsController@index')->name('myeventscontroller');
Route::get('/EventDetails', 'EventDetailsController@index')->name('myeventdetails');

Route::get('/logout','Auth\LogoutController@logout');
Route::get('/myeventsentries', 'EvetsEntriesController@detail')->name('eventsentries');
//Route::get('/myeventsdetail', 'EvetsEntriesController@show')->name('eventsentsdetail');
Route::get('/myevents', 'EvetsEntriesController@index')->name('myevents');
Route::get('myevents/create', 'EvetsEntriesController@create')->name('myevents_create');
Route::post('myevents/save/{id?}', 'EvetsEntriesController@save')->name('myevents_save');
Route::get('myevents/delete/{id}', 'EvetsEntriesController@delete');
Route::get('myevents/edit/{id}', 'EvetsEntriesController@edit');
Route::get('myevents/show/{id}', 'EvetsEntriesController@show');
Route::get('myevents/accept/{id}', 'EvetsEntriesController@accept');
Route::get('myevents/acceptedUsers/{id}', 'EvetsEntriesController@acceptUsers')->name('acceptUsers');
Route::get('myevents/fault/{id}', 'EvetsEntriesController@fault')->name('fault');
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

Route::get('admin-dashboard-user', 'HomeController@check')->name('admin-dashboard-user');

Route::get('/api/notificationsVue', 'manageuserController@notifications');
Route::get('/api/notifications', 'manageuserController@notificationsBlade')->name('notifications');
/* Route::get('subscribe', 'SubscribeController@subscribe')->name('subscribe'); */
