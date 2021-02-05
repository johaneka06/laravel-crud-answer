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


//All function in this route will be moved using controller file.
Route::get('/', 'PagesController@index');

Route::get('/home', 'PagesController@index');

Route::group(['middleware' => 'guest'], function() {

    Route::get('/login', 'PagesController@login')->name('login');

    Route::post('/auth', 'AuthController@login');
    
    Route::get('/register', 'PagesController@register');
    
    Route::post('/register', 'AuthController@register');

});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/logout', 'AuthController@logout');

    Route::post('/insert', 'ItemController@insert');
    
    Route::get('/item/{id}', 'ItemController@view');
    
    Route::post('/item/{id}/update', 'ItemController@edit');
    
    Route::get('/item/{id}/delete', 'ItemController@delete');
});

