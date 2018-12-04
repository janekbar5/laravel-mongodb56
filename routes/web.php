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
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/createroles', 'HomeController@createRoles')->name('createroles');
Route::get('/createadmin', 'HomeController@createAdmin')->name('createadmin');
Route::get('/createeditor', 'HomeController@createEditor')->name('createeditor');



Route::get('/getuserslist',   'UserController@getUsersList')->name('user.list');
Route::get('/edituser?{$id}', 'UserController@editUser')->name('user.edituser');
Route::post('/userstore',   'UserController@store')->name('user.store');
Route::get('edit/{id}','UserController@edit')->name('user.edit');
//Route::resource('books','BookController');



Auth::routes();




////////////////////////

Route::get('books/index', 'BooksController@index')->name('books.index');
Route::get('books/create', 'BooksController@create')->name('books.create');
Route::post('books/store', 'BooksController@store')->name('books.store');
Route::get('books/index', 'BooksController@index')->name('books.index');
Route::get('books/show/{id}', 'BooksController@show')->name('books.show');
Route::get('books/edit/{id}', 'BooksController@edit')->name('books.edit');
Route::post('books/edit/{id}', 'BooksController@update')->name('books.update');
Route::post('books/delete/{id}', 'BooksController@destroy')->name('books.destroy');
Route::delete('books/delete/{id}', 'BooksController@destroy')->name('books.destroy');
/////////////////////////////////
Route::get('categories/index', 'CategoriesController@index')->name('categories.index');
Route::get('categories/create', 'CategoriesController@create')->name('categories.create');
Route::post('categories/store', 'CategoriesController@store')->name('categories.store');
Route::get('categories/index', 'CategoriesController@index')->name('categories.index');
Route::get('categories/edit/{id}', 'CategoriesController@edit')->name('categories.edit');
Route::post('categories/edit/{id}', 'CategoriesController@update')->name('categories.update');
Route::get('categories/show/{id}', 'CategoriesController@show')->name('categories.show');
Route::delete('categories/delete/{id}', 'CategoriesController@destroy')->name('categories.destroy');
//////////////////////////////////
//Route::post('images/deleteimg', 'ImagesController@getImageDelete2')->name('images.store');	
Route::post('images/changeImageOrder', 'ImagesController@changeImageOrder')->name('images.store');	
Route::get('images/deleteimgwithvehicle/{id}', 'ImagesController@deleteImageswithVehicle')->name('images.store');
Route::get('images/deleteimg/{id}', 'ImagesController@getImageDelete')->name('images.delete');
//Route::post('images/deleteimg/{id}', 'ImagesController@getImageDelete')->name('images.delete');	
Route::post('/books/do-upload', 'ImagesController@postImageUpload')->name('images.upload');



