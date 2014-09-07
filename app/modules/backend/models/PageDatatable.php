<?php
use Imade\Datatable\DatatableModel;

class PageDatatable extends DatatableModel {

	public $columns = array(
        'id' => '#',
        'name' => 'Name'
    );

	public function data()
    {
        $query = Page::select(array_keys($this->columns));

        return Datatable::query($query)
            ->showColumns(array_keys($this->columns))
            ->make();
    }

    public function table()
    {
        return Datatable::table()
            ->addColumn(array_values($this->columns));
    }
}
