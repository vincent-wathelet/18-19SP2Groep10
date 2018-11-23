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
Route::get('/allevents', 'AllEventsController@index')->name('allevents');
Route::get('/allevents/{id}', 'AllEventsController@show')->name('event');
Route::get('/myeventsentries', 'MyEvetsEntriesController@index')->name('myeventsentries');
Route::get('/contact', 'contactController@index')->name('contact');
Route::get('/MyEvents', 'MyEventsController@index')->name('myevents');
Route::get('/MyEntries', 'MyEntriesController@index')->name('myentries');
Route::get('/EventDetails', 'EventDetailsController@index')->name('myeventdetails');
Route::post('/posts', 'PostsController@store');
