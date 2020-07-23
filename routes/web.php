<?php

use App\Http\Controllers\UserController;
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
Route::resource('yourEvent','EventController');

Route::resource('user','UserController');
Route::resource('exploreEvent','ExploreEventController');
Route::put('updatePic/{id}','UserController@updateProfilePic')->name('updatepic');
Route::resource('Category','CategoryController');
Route::get('/index','CategoryController@index')->name('index');
// route to add category
Route::post('/category/store/','CategoryController@store')->name('category.store');
// route to access to function exist category
Route::get('/category','CategoryController@existCategory')->name('category.exist');

Route::get('/search','CategoryController@search');

