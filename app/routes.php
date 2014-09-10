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

Route::get('/', array(
    'as' => 'home',
    'uses' => 'App\Modules\Frontend\Controllers\HomeController@showWelcome')
);

Route::group(array('before' => 'basicAuth', 'prefix' => Config::get('syntara::config.uri')), function()
{
    Route::resource('pages','App\Modules\Backend\Controllers\PagesController');
    Route::get('pages', array(
        'as' => 'pages.index',
        'uses' => 'App\Modules\Backend\Controllers\PagesController@index')
    );
    Route::get('pages/create', array(
        'as' => 'pages.create',
        'uses' => 'App\Modules\Backend\Controllers\PagesController@create')
    );
    Route::post('pages/store', array(
        'as' => 'pages.store',
        'uses' => 'App\Modules\Backend\Controllers\PagesController@store')
    );
    Route::get('pages/{id}/show', array(
        'as' => 'pages.show',
        'uses' => 'App\Modules\Backend\Controllers\PagesController@show')
    );
    Route::get('pages/{id}/edit', array(
        'as' => 'pages.edit',
        'uses' => 'App\Modules\Backend\Controllers\PagesController@edit')
    );
    Route::patch('pages/{id}/update', array(
        'as' => 'pages.update',
        'uses' => 'App\Modules\Backend\Controllers\PagesController@update')
    );
    Route::delete('pages/{id}/destroy', array(
        'as' => 'pages.destroy',
        'uses' => 'App\Modules\Backend\Controllers\PagesController@destroy')
    );
});

Route::get('{page}', array('as' => 'getPage', 'uses' => 'App\Modules\Frontend\Controllers\PagesController@getPage'));
Route::get('{type}/{slug}', array('as' => 'getPageType', 'uses' => 'App\Modules\Frontend\Controllers\PagesController@getPageType'));

// Custom 404 page
App::missing(function($exception)
{
    return Response::view('content::404', array(), 404);
});