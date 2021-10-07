<?php

use Illuminate\Support\Facades\Route;

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

Route::get('admin/home','HomeController@adminHome')->name('admin.home')->middleware('is_admin');

Route::get('/mail','MailController@home');
Route::post('/mail','MailController@sendemail');

Route::get('/Form','ConferenceController@createForm');
Route::post('/Form','ConferenceController@PostcreateForm');


Route::get('/Contact','ConferenceController@createContact');
Route::post('/Contact', 'ConferenceController@PostcreateContact');

Route::post('/Form', 'ConferenceController@store');

Route::post('/Contact', 'ConferenceController@save');

Route::get('/adminhome','ConferenceController@index')->name('admin.home')->middleware('is_admin');

Route::get('/admincontact','ConferenceController@main');

Route::get('edit/{id}','ConferenceController@edit');

Route::post('/update/{id}','ConferenceController@update');

Route::get('/delete/{id}','ConferenceController@destroy');

Route::get('/deleteContact/{email}','ConferenceController@deleteContact');

Route::get('/search','ConferenceController@search');

Route::get('view/{id}','ConferenceController@show');