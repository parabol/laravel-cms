<?php namespace Repositories;

use Contracts\Repositories\PageRepositoryInterface;
use App\Modules\Backend\Models\Page;

class DbPageRepository extends DbRepository implements PageRepositoryInterface
{
    /** @var Page */
    protected $model;

    public function __construct(Page $model)
    {
        $this->model = $model;
    }

}
