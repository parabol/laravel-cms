<?php namespace App\Modules\Frontend;

class FrontendServiceProvider extends \Illuminate\Support\ServiceProvider {

	public function register()
	{
		\Log::debug("FrontendServiceProvider registered");

		// Register facades
		$this->app->booting(function()
		{
		});
	}

}
