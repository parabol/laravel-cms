<?php
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

use Zofe\Rapyd\Facades\DataSet;
use Zofe\Rapyd\Facades\DataGrid;
use Zofe\Rapyd\Facades\DataForm;
use Zofe\Rapyd\Facades\DataEdit;
use Zofe\Rapyd\Facades\DataFilter;
use Zofe\Rapyd\Facades\Documenter;

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
        $filter->reset('Reset');
        
        $grid = DataGrid::source($this->page);
        
        $grid->add('id','ID', true)->style("width:100px");
        $grid->add('title','Title',true);
        $grid->add('slug','Slug',true);

        $grid->edit('pages/edit', 'Action','modify|delete')->style("width:100px");
        $grid->orderBy('id','desc');
        $grid->paginate(20);
            
        return  View::make('pages.index', compact('filter', 'grid'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $form = DataForm::source($this->page);

        $form->add('title','Title', 'text')->rule('required|min:3');
        $form->add('slug','Slug', 'text')->rule('required|min:3');
        $form->add('content','Content', 'redactor');
        $form->add('keyword','Keyword', 'text');
        $form->add('desc','Description', 'redactor');
        $form->add('keyword','Keyword', 'text');
        $form->add('status','Status','checkbox');
        $form->submit('Save');
        
        if (Request::isMethod('get')){
        	return View::make('pages.form', compact('form'));
        } else {
        	$form->saved(function() use ($form)
	        {        	
	        	$form->message("Saved");
	        });
	        return Redirect::route('pages.index');
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
			return Redirect::route('pages.index');
		}//if
		//EDIT
        $id = Input::get('modify');
		$form = DataForm::source(Page::find($id));

        $form->add('title','Title', 'text')->rule('required|min:3');
        $form->add('slug','Slug', 'text')->rule('required|min:3');
        $form->add('content','Content', 'redactor');
        $form->add('keyword','Keyword', 'text');
        $form->add('desc','Description', 'redactor');
        $form->add('keyword','Keyword', 'text');
        $form->add('status','Status','checkbox');
        $form->submit('Save');

        if (Request::isMethod('get')){
        	return View::make('pages.form', compact('form'));
        } else {
        	$form->saved(function() use ($form)
	        {        	
	        	$form->message("Saved");
	        });
	        return Redirect::route('pages.index');
        }
	}
}
