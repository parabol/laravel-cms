<?php namespace App\Modules\Backend;

class BackendServiceProvider extends \Illuminate\Support\ServiceProvider {

	public function register()
	{
		\Log::debug("BackendServiceProvider registered");

		// Register facades
		$this->app->booting(function()
		{
			$loader = \Illuminate\Foundation\AliasLoader::getInstance();
			$loader->alias('Page', 'App\Modules\Backend\Facades\PageFacade');
		});
	}

}
