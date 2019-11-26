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

/*Route::get('patients', 'API\GluconnectUserController@getAllPatients');

Route::get('loginpage', function()
{
    return view('login');
});

Route::post('login', 'API\GluconnectUserController@login');*/



