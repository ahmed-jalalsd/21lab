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
Route::group(['prefix' => '/Admin'], function() {
  Route::get('/' , 'AdminController@index')->name('dashboard');
  Route::resource('categories', 'CategoriesController');
  Route::resource('contents', 'ContentsController');
  Route::resource('posts', 'PostsController');
});

Route::get('/',function()
   {
     return View('welcome');
   });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
