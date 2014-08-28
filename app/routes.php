<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});
Route::resource('pages', 'PagesController', array('only' => array('index','create')));
Route::post('pages/create', 'PagesController@create');
Route::get('pages/edit', 'PagesController@edit');
Route::post('pages/edit', 'PagesController@edit');
//Route::get('pages/edit?delete={id}', array('as' => 'delete','uses' => 'PagesController@destroy'));