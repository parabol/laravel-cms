<?php namespace App\Modules\Backend\Models;

use \Contracts\Instances\InstanceInterface;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Page extends Eloquent implements InstanceInterface
{
    protected $guarded = [];

    public function identity()
    {
        return $this->id;
    }
}
