<?php namespace Providers;

use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Modules\Backend\lib\Contracts\Repositories\PageRepositoryInterface',
            'App\Modules\Backend\lib\Repositories\DbPageRepository'
        );
    }
}
