<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'welcomeController@index');
Route::get('/newUser', 'welcomeController@newUser');
Route::get('/login', 'mainController@login');
Route::get('/createUser', 'mainController@createUser');
Route::get('/newMessage', 'mainController@newMessage');
Route::get('/updateMessage', 'mainController@updateMessage');
Route::get('/deleteMessage', 'mainController@deleteMessage');
