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
Route::get('dashboard/pages', array(
    'as' => 'indexPages',
    'before' => 'basicAuth|hasPermissions:page.index',
    'uses' => 'App\Modules\Backend\Controllers\PagesController@index')
);
Route::get('dashboard/pages/getDatatable', array(
    'as' => 'getPagesDatatable',
    'before' => 'basicAuth|hasPermissions:page.datatable',
    'uses' => 'App\Modules\Backend\Controllers\PagesController@getDatatable')
);
Route::get('dashboard/pages/create', array(
    'as' => 'createPages',
    'before' => 'basicAuth|hasPermissions:page.create',
    'uses' => 'App\Modules\Backend\Controllers\PagesController@create')
);
Route::post('dashboard/pages/create', array(
    'as' => 'createPages',
    'before' => 'basicAuth|hasPermissions:page.create',
    'uses' => 'App\Modules\Backend\Controllers\PagesController@create')
);
Route::get('dashboard/pages/edit', array(
    'as' => 'editPages',
    'before' => 'basicAuth|hasPermissions:page.edit',
    'uses' => 'App\Modules\Backend\Controllers\PagesController@edit')
);
Route::post('dashboard/pages/edit', array(
    'as' => 'editPages',
    'before' => 'basicAuth|hasPermissions:page.edit',
    'uses' => 'App\Modules\Backend\Controllers\PagesController@edit')
);
//Route::get('pages/edit?delete={id}', array('as' => 'delete','uses' => 'PagesController@destroy'));

// Custom 404 page
App::missing(function($exception)
{
    return Response::view('content::404', array(), 404);
});