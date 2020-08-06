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

Route::get('/groupby','EventController@groupBy');
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function (){
    return view('auth.login');
});

// Event

Route::resource('manage/event','EventController');
Route::get('yourEvent','EventController@yourEvent')->name('yourEvent');
Route::get('delete/{id}','EventController@delete')->name('delete');
Route::delete('deleteEvent/{id}','EventController@deleteEvent')->name('deleteEvent');

Route::resource('user','UserController');
Route::put('changePassword','UserController@changePassword')->name('changePassword');
Route::post('join/{id}','ExploreEventController@join')->name('join');
Route::delete('quit/{id}','ExploreEventController@quit')->name('quit');
Route::put('updatepic/{id}','UserController@updateProfilePic')->name('updatepic');

// explore Event 
Route::resource('exploreEvent','ExploreEventController');

Route::resource('/manage/Category','CategoryController');
Route::get('/index','CategoryController@index')->name('index');
// route to add category
Route::post('/category/store/','CategoryController@store')->name('category.store');
// route to access to function exist category
Route::get('/category','CategoryController@existCategory')->name('category.exist');

Route::get('/search','CategoryController@search');
Route::put('updateProfilePicEvent/{id}','EventController@updateProfilePicEvent')->name('updateProfilePicEvent');


Route::resource('/exploreEvents', 'ExploreEventController');
Route::get('/carlendar', 'ExploreEventController@viewByCarlendar')->name('viewByCarlendar');
Route::post('/join/{id}', 'ExploreEventController@join')->name("join");
Route::delete('/quit/{id}', 'ExploreEventController@quit')->name("quit");
Route::get('/eventJoinOnly', 'ExploreEventController@eventJoinOnly')->name("eventJoinOnly");
Route::put('/userCheck/{data}', 'ExploreEventController@userCheck')->name("userCheck");
Route::put('/userNotCheck/{data}', 'ExploreEventController@userNotCheck')->name("userNotCheck");
Route::get('viewcalendar','eventController@calendarView')->name('calendarview');








