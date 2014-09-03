<?php namespace App\Modules\Backend\Facades;

use Illuminate\Support\Facades\Facade;

class PageFacade extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return new \App\Modules\Backend\Models\Page; }

}
