<?php namespace Providers;

use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'Contracts\Repositories\PageRepositoryInterface',
            'Repositories\DbPageRepository'
        );
    }
}
