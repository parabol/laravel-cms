<?php namespace App\Modules\Backend\Controllers;

use MrJuliuss\Syntara\Controllers\BaseController;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

use Zofe\Rapyd\Facades\DataSet;
use Zofe\Rapyd\Facades\DataGrid;
use Zofe\Rapyd\Facades\DataForm;
use Zofe\Rapyd\Facades\DataEdit;
use Zofe\Rapyd\Facades\DataFilter;
use Zofe\Rapyd\Facades\Documenter;

use Page;

class PagesController extends BaseController {

	/**
	 * Page Repository
	 *
	 * @var Page
	 */
	protected $page;

	public function __construct(Page $page)
	{
		$this->page = $page;
		View::addNamespace('backend', __DIR__.'/../views');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $filter = DataFilter::source($this->page);
        $filter->add('title','Title', 'text');
        $filter->submit('Search');
        
        $grid = DataGrid::source($this->page);
        
        $grid->add('id','ID', true)->style("width:100px");
        $grid->add('name','Name',true);
        $grid->add('slug','Slug',true);

        $grid->edit('pages/edit', 'Action','modify|delete')->style("width:100px");
        $grid->orderBy('id','asc');
        $grid->paginate(20);
            
        $this->layout =  View::make('backend::pages.index', compact('filter', 'grid'));
        $this->layout->title = trans('pages.titles.list');
        $this->layout->breadcrumb = Config::get('breadcrumbs.pages');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $form = DataForm::source($this->page);

        $form->add('name','Name', 'text')->rule('required|min:3');
        $form->add('slug','Slug', 'text')->rule('required|min:3');
        $form->add('content','Content', 'redactor');
        $form->add('title','Title Tag', 'text');
        $form->add('keyword','Meta Keyword', 'text');
        $form->add('desc','Meta Description', 'text');
        $form->add('status','Status','checkbox');
        $form->submit('Save');
        
        if (Request::isMethod('get')){
        	$this->layout = View::make('backend::pages.form', compact('form'));
        	$this->layout->title = trans('pages.titles.new');
        	$this->layout->breadcrumb = Config::get('breadcrumbs.pages');
        } else {
        	$form->saved(function() use ($form)
	        {        	
	        	$form->message("Saved");
	        });
	        return Redirect::route('indexPages');
        }
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @return Response
	 */
	public function edit()
	{
		$id = Input::get('delete');
		//DELETE
		if($id > 0) {
			$this->page->find($id)->delete();
			return Redirect::route('indexPages');
		}//if
		//EDIT
        $id = Input::get('modify');
		$form = DataForm::source(Page::find($id));

        $form->add('name','Name', 'text')->rule('required|min:3');
        $form->add('slug','Slug', 'text')->rule('required|min:3');
        $form->add('content','Content', 'redactor');
        $form->add('title','Title Tag', 'text');
        $form->add('keyword','Meta Keyword', 'text');
        $form->add('desc','Meta Description', 'text');
        $form->add('status','Status','checkbox');
        $form->submit('Save');

        if (Request::isMethod('get')){
        	$this->layout = View::make('backend::pages.form', compact('form'));
        	$this->layout->title = trans('pages.titles.new');
        	$this->layout->breadcrumb = Config::get('breadcrumbs.pages');
        } else {
        	$form->saved(function() use ($form)
	        {        	
	        	$form->message("Saved");
	        });
	        return Redirect::route('indexPages');
        }
	}
}
