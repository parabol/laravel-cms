<?php namespace App\Modules\Frontend\Controllers;

use App\Controllers\BaseController;
use Illuminate\Support\Facades\View;

class PagesController extends \BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function __construct()
	{
		View::addNamespace('frontend', __DIR__.'/../views');
	}

	public function getPage($page)
	{
		return View::make('frontend::page', array('page' => $page));
		/*$request = Request::create('pages@showPage', 'GET', array('pages' => $page));
		Controller::callAction('App\Modules\Frontend\Controllers\PagesController@showPage', array(null));
		return Route::dispatch($request)->getContent();
		\App::make('App\Modules\Frontend\Controllers\PagesController')->showPage($page);*/
	}

	public function getPageType($type, $slug)
	{
		return View::make('frontend::page', array('page' => $type.$slug));
	}

}
