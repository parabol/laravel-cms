<?php namespace App\Modules\Backend\Controllers;

use MrJuliuss\Syntara\Controllers\BaseController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;

class RootController extends BaseController {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		$this->layout = View::make(Config::get('syntara::views.master'));
        $this->layout->title = 'VietSol CMS';
        $this->layout->breadcrumb = array();
        View::share('siteName', 'VietSol CMS');
	}

}
