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


/* HOMEPAGE ROUTE */

Route::get('/','HomepageController@index');

// toont Auth Routes
Auth::routes();

// toont Show Homepage
Route::get('/home', 'HomeController@index')->name('home');

// toont Show Homepage
Route::get('/homepage', 'HomepageController@index')->name('homepage');



/* LOGOUT ROUTE */

// toont logout
Route::get('logout', 'Auth\LoginController@logout');



/* INSCHRIJVING Route */

// schrijft je voor event in
Route::get('/allevents/{id}/inschrijving','InschrijvingController@Inschrijven');
Route::get('/allevents/{id}/uitschrijven','InschrijvingController@Uitschrijven');



//Route::get('/myeventsentries', 'MyEvetsEntriesController@index')->name('myeventsentries');
Route::get('/contact', 'contactController@index')->name('contact');
Route::get('/myRating', 'MyRatingController@index')->name('myrating');
Route::post('/myRating/addeventreview', 'MyRatingController@addeventrevieuw')->name('eventreview');
Route::get('/myRating/adduserreview/{idUser}/{eventid}', 'MyRatingController@getUserReview')->name('userreview');
Route::post('/myRating/adduserreview', 'MyRatingController@adduserrevieuw');
Route::get('/MyEvents', 'MyEventsController@index')->name('myeventscontroller');

//Route::get('/MyEntries', 'MyEntriesController@index')->name('myentries');
Route::get('/EventDetails', 'EventDetailsController@index')->name('myeventdetails');
Route::get('/MyEvents', 'MyEventsController@index')->name('myeventscontroller');
Route::get('/EventDetails', 'EventDetailsController@index')->name('myeventdetails');
Route::post('/contact','contactController@SenForm');
Route::get('/logout','Auth\LogoutController@logout');
Route::get('/showevent/{id}', 'EventDetailsController@show')->name('showevent');

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
Route::get('myEntries/details/{id}', 'MyEntriesController@details');
Route::get('myentries/delete/{id}', 'MyEntriesController@delete')->name('deleteentries');


/* ALL EVENTS ROUTES */

// all eventen
Route::get('/allevents', 'AllEventsController@index')->name('allevents');

// all events post
Route::post('/allevents', 'AllEventsController@index')->name('allevents');

// all events subscribe
Route::post('/allevents-subscribe', 'AllEventsController@subscribe')->name('allevents-subscribe');

// detail van een event
Route::get('/allevents/{id}', 'AllEventsController@show')->name('event');



/* EDIT PAGE ROUTES */

// Events View Page
Route::get('edit-events', 'AdminController@create');

//  Events Fetch Information
Route::get('edit-events', 'AdminController@index')->name('edit-events');

//  Events Show Information
Route::get('edit-events/{id}', 'AdminController@show');

//  Events Edit Information
Route::get('edit-events/edit/{id}', 'AdminController@edit');

//  Events Update Information
Route::post('edit-events/save/{id?}', 'AdminController@save')->name('edit-events_save');

//  Events Delete Information
Route::get('edit-events/delete/{id}', 'AdminController@delete');



/* EDIT PAGE ROUTES */

// Users create view page
Route::get('manage-users', 'ManageUsersController@create')->name('manage-users');

//  Users Fetch Information
Route::get('manage-users', 'ManageUsersController@index')->name('manage-users');

//  Users Edit Information
Route::get('manage-users/edit/{id}', 'ManageUsersController@edit');

//  Users Update Information
Route::post('manage-users', 'ManageUsersController@update')->name('manage-users');

//  Users Delete Information
Route::get('manage-users/delete/{id}', 'ManageUsersController@delete');

//  Users create Register Information
Route::get('manage-users-create', 'ManageUsersController@regcreate')->name('manage-users-create');

// Users create Register Information Store
Route::post('manage-users-store', 'ManageUsersController@regstore')->name('manage-users-store');



/* Profile Route */

// Profile Create View Information
Route::get('/profile', 'ProfileController@create')->name('profile');

// Profile Update information
Route::post('/profile', 'ProfileController@update')->name('profile');



/* Admin Dashboard Route*/

// admin dashboard create page
Route::get('admin-dashboard', 'AdminDashboardController@create')->name('admin-dashboard');

// admin dashboard index page
Route::get('admin-dashboard', 'AdminDashboardController@index')->name('admin-dashboard');

// admin user page
Route::get('admin-dashboard-user', 'HomeController@check')->name('admin-dashboard-user');

