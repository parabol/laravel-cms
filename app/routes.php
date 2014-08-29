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
Route::get('dashboard/pages', array(
    'as' => 'indexPages',
    'before' => 'basicAuth|hasPermissions:page.index',
    'uses' => 'PagesController@index')
);
Route::get('dashboard/pages/create', array(
    'as' => 'createPages',
    'before' => 'basicAuth|hasPermissions:page.create',
    'uses' => 'PagesController@create')
);
Route::post('dashboard/pages/create', array(
    'as' => 'createPages',
    'before' => 'basicAuth|hasPermissions:page.create',
    'uses' => 'PagesController@create')
);
Route::get('dashboard/pages/edit', array(
    'as' => 'editPages',
    'before' => 'basicAuth|hasPermissions:page.edit',
    'uses' => 'PagesController@edit')
);
Route::post('dashboard/pages/edit', array(
    'as' => 'editPages',
    'before' => 'basicAuth|hasPermissions:page.edit',
    'uses' => 'PagesController@edit')
);
//Route::get('pages/edit?delete={id}', array('as' => 'delete','uses' => 'PagesController@destroy'));