<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make(Config::get('syntara::views.master'));
	        $this->layout->title = 'CMS - Dashboard';
	        $this->layout->breadcrumb = array();
		}
	}

}
