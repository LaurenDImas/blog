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
Auth::routes();
   
Route::get('/', 'FrontController@index');
Route::get('/details/{id}', 'FrontController@detail')->name('detail');
   

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('articles','ArticleController');
});