<?php namespace App\Modules\Frontend\Controllers;

use App\Controllers\BaseController;
use Illuminate\Support\Facades\View;

class HomeController extends \BaseController {

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

	public function showWelcome()
	{
		return View::make('frontend::hello');
	}

}
