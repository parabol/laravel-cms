<?php namespace App\Modules\Backend\lib\Services\Pages;

use App\Modules\Backend\lib\Contracts\Repositories\PageRepositoryInterface;
use \Contracts\Notification\DestroyerInterface;
use App\Modules\Backend\Models\Page;
use App\Modules\Backend\lib\Validators\PageValidator;

class PageDestroyer
{

    /**
     * Attempt to destroy the page and
     * notify the $listener of the success or failure.  The
     * $attributes are passed in as a convenience in case they
     * are needed
     * 
     * @param  PageRepositoryInterface $page
     * @param  DestroyerInterface       $listener 
     * @param  mixed                    $identity
     * @param  array                    $attributes
     * @return mixed - returned value from the $listener 
     */
    public function destroy(PageRepositoryInterface $page, DestroyerInterface $listener, $identity, array $attributes = [])
    {
        $instance = $page->find($identity);

        if (Page::destroy($identity)) {

            return $listener->destroySucceeded($instance);

        } else {

            return $listener->destroyFailed($instance);
        }
    }
}
