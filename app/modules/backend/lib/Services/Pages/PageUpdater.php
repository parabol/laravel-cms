<?php namespace App\Modules\Backend\lib\Services\Pages;

use App\Modules\Backend\lib\Contracts\Repositories\PageRepositoryInterface;
use \Contracts\Notification\UpdaterInterface;
use App\Modules\Backend\lib\Validators\PageValidator;

class PageUpdater
{

    /**
     * @param PageValidator $validator
     */
    protected $validator;

    /**
     * Inject the validator used for updating
     * 
     * @param PageValidator $validator
     */
    public function __construct(PageValidator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Attempt to update the page with the given attributes and
     * notify the $listener of the success or failure
     * 
     * @param  PageRepositoryInterface $page
     * @param  UpdaterInterface         $listener 
     * @param  mixed                    $identity
     * @param  array                    $attributes
     * @return mixed - returned value from the $listener 
     */
    public function update(PageRepositoryInterface $page, UpdaterInterface $listener, $identity, array $attributes = [])
    {
        $instance = $page->find($identity);

        if ($this->validator->validate($attributes)) {

            $instance->update($attributes);

            return $listener->updateSucceeded($instance);

        } else {

            return $listener->updateFailed($instance, $this->validator);
        }
    }
}
