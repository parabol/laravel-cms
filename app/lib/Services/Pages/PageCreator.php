<?php namespace Services\Pages;

use Contracts\Repositories\PageRepositoryInterface;
use Contracts\Notification\CreatorInterface;
use Validators\PageValidator;

class PageCreator
{

    /**
     * @param PageValidator $validator
     */
    protected $validator;


    /**
     * Inject the validator that will be used for
     * creation
     * 
     * @param PageValidator $validator
     */
    public function __construct(PageValidator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Attempt to create a new page with the given attributes and
     * notify the $listener of the success or failure
     * 
     * @param  PageRepositoryInterface $page     
     * @param  CreatorInterface         $listener  
     * @param  array                    $attributes
     * @return mixed - returned value from the $listener                        
     */
    public function create(PageRepositoryInterface $repository, CreatorInterface $listener, array $attributes = [])
    {
        if ($this->validator->validate($attributes)) {

            if ($instance = $repository->create($attributes)) {
                return $listener->creationSucceeded($instance);
            } else {
                return $listener->creationFailed();
            }

        } else {
            //return $listener->creationFailedValidation($this->validator);
        }
    }
}
