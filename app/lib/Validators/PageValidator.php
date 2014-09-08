<?php namespace Validators;

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
