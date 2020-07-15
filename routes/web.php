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
Route::get('/', function (){
    return view('auth.login');
});

// Event
Route::resource('event','EventController');
Route::resource('yourEvent','YourEventController');

Route::resource('user','UserController');

Route::resource('exploreEvent','ExploreEventController');
Route::resource('Category','CategoryController');
Route::get('/index','CategoryController@index')->name('index');
Route::post('/category/store/','CategoryController@store')->name('category.store');
Route::get('/existCategory','CategoryController@existCategory')->name('category.existCategory');

