<?php namespace App\Modules\Backend\Controllers;

use MrJuliuss\Syntara\Controllers\BaseController;

class RootController extends BaseController {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		View::share('siteName', 'aaa');
	}

}
