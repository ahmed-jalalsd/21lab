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



/*The route for the gallery that generate images to the home page slider*/
Route::group(['prefix' => '/admin'], function() {
  Route::get('/' , 'AdminController@index')->name('dashboard');
  Route::resource('categories', 'CategoriesController', ['except'=>['create']]);
  Route::resource('contents', 'ContentsController');
  Route::resource('posts', 'PostsController');
  Route::resource('downloads', 'DownloadsController');
  Route::resource('images', 'ImagesController');
  Route::resource('navigations', 'NavigationsController');
  Route::resource('leftfooter', 'LeftFootersController');
  Route::resource('rightfooter', 'RightFootersController');
  
  Route::middleware('role:superadministrator')->group(function(){
  	Route::resource('manage', 'ManagesController');
	});
});

Route::resource('/', 'PagesController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/{id}', 'HomeController@show')->name('download');

