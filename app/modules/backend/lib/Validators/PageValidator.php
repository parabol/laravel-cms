<?php namespace App\Modules\Backend\lib\Validators;

use \Validators\Validator;

class PageValidator extends Validator
{
    /**
     * Array of validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];
}
