<?php namespace App\Modules\Backend\lib\Repositories;

use App\Modules\Backend\lib\Contracts\Repositories\PageRepositoryInterface;
use App\Modules\Backend\Models\Page;
use \Repositories\DbRepository;

class DbPageRepository extends DbRepository implements PageRepositoryInterface
{
    /** @var Page */
    protected $model;

    public function __construct(Page $model)
    {
        $this->model = $model;
    }

}
