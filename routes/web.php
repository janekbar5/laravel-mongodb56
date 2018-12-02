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



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/createroles', 'HomeController@createRoles')->name('createroles');
Route::get('/createadmin', 'HomeController@createAdmin')->name('createadmin');

Route::get('/getuserslist',   'UserController@getUsersList')->name('user.list');
Route::get('/edituser?{$id}', 'UserController@editUser')->name('user.edituser');

Route::post('/userstore',   'UserController@store')->name('user.store');

Route::get('edit/{id}','UserController@edit');

Route::resource('books','BookController');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
