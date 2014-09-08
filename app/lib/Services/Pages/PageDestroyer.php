<?php namespace Services\Pages;

use Contracts\Repositories\PageRepositoryInterface;
use Contracts\Notification\DestroyerInterface;
use Validators\PageValidator;

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

        if ($page->delete($instance)) {

            return $listener->destroySucceeded($instance);

        } else {

            return $listener->destroyFailed($instance);
        }
    }
}
