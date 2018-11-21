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

Route::get('/homepage', 'HomepageController@index  ')->name('home');
Route::get('/allevents', 'AllEventsController@index  ')->name('allevents');
Route::get('/myeventsentries', 'MyEvetsEntriesController@index  ')->name('myeventsentries');
Route::get('/contact', 'contactController@index')->name('contact');
Route::get('/MyEventsController', 'MyEventsController@index')->name('myeventscontroller');
Route::get('/MyEntriesController', 'MyEntriesController@index')->name('myentries');
Route::get('/EventDetailsController', 'EventDetailsController@index')->name('myeventdetails');
Route::get('/MyEventsController', 'MyEventsController@index')->name('myeventscontroller');
Route::get('/MyEntriesController', 'MyEntriesController@index')->name('myentries');
Route::get('/EventDetailsController', 'EventDetailsController@index')->name('myeventdetails');
