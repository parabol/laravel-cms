<?php namespace App\Modules\Backend\Controllers;

use MrJuliuss\Syntara\Controllers\BaseController;

use \Services\PageCreator;
use App\Modules\Backend\lib\Contracts\Repositories\PageRepositoryInterface;
use \Contracts\Instances\InstanceInterface;
use \Contracts\Notification\CreatorInterface;
use \Contracts\Notification\UpdaterInterface;
use \Contracts\Notification\DestroyerInterface;
use \Validators\Validator as Validator;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Modules\Backend\Models\Page;

class PagesController extends BaseController implements CreatorInterface, UpdaterInterface, DestroyerInterface
{

    /**
     * Page Repository
     *
     * @var PageRepositoryInterface
     */
    protected $page;

    public function __construct(PageRepositoryInterface $page)
    {
        $this->page = $page;
        View::addNamespace('backend', __DIR__.'/../views');
    }

    /**
     * Display a listing of the pages.
     *
     * @return Response
     */
    public function index()
    {
        $pages = $this->page->all();

        $this->layout = View::make('backend::pages.index', compact('pages'));
        $this->layout->title = trans('pages.titles.list');
        $this->layout->breadcrumb = Config::get('breadcrumbs.pages');
    }

    /**
     * Show the form for creating a new page.
     *
     * @return Response
     */
    public function create()
    {
        $this->layout = View::make('backend::pages.create');
        $this->layout->title = trans('pages.titles.list');
        $this->layout->breadcrumb = Config::get('breadcrumbs.pages');
    }

    /**
     * Store a newly created page in storage.
     *
     * @return Response
     */
    public function store()
    {
        $page_creator = \App::make('Services\Pages\PageCreator');

        return $page_creator->create($this->page, $this, Input::except('_token'));
    }

    /**
     * Handle successful page creation
     *
     * @param  InstanceInterface $instance
     * @return Redirect::route
     */
    public function creationSucceeded(InstanceInterface $instance)
    {
        return Redirect::route('pages.index')->with('message', 'Page was successfully created');
    }

    /**
     * Handle an error with page creation
     *
     * @param  Validator      $validator
     * @return Redirect::route
     */
    public function creationFailed(Validator $validator)
    {
        return Redirect::route('pages.create')
            ->withInput()
            ->withErrors($validator->errors())
            ->with('message', 'Oops, there was an error');
    }

    /**
     * Display the specified page.
     *
     * @param  int      $id
     * @return Response
     */
    public function show($id)
    {
        $page = $this->page->find($id);

        $this->layout = View::make('backend::pages.show', compact('page'));
        $this->layout->title = trans('pages.titles.list');
        $this->layout->breadcrumb = Config::get('breadcrumbs.pages');
    }

    /**
     * Show the form for editing the specified page.
     *
     * @param  int      $id
     * @return Response
     */
    public function edit($id)
    {
        $page = $this->page->find($id);

        $this->layout = View::make('backend::pages.edit', compact('page'));
        $this->layout->title = trans('pages.titles.list');
        $this->layout->breadcrumb = Config::get('breadcrumbs.pages');
    }

    /**
     * Update the specified page in storage.
     *
     * @param  int      $id
     * @return Response
     */
    public function update($id)
    {
        $page_updater = \App::make('Services\Pages\PageUpdater');

        return $page_updater->update($this->page, $this, $id, Input::except('_method'));
    }

    /**
     * Handle successful page update
     *
     * @param  InstanceInterface $instance
     * @return Redirect::route
     */
    public function updateSucceeded(InstanceInterface $instance)
    {
        return Redirect::route('pages.index', $instance->identity());
    }

    /**
     * Handle an error with page update
     *
     * @param  InstanceInterface $instance
     * @param  Validator      $validator
     * @return Redirect::route
     */
    public function updateFailed(InstanceInterface $instance, Validator $validator)
    {
        return Redirect::route('pages.edit', $instance->identity())
            ->withInput()
            ->withErrors($validator->errors())
            ->with('message', 'Oops, there was an error');
    }

    /**
     * Remove the specified page from storage.
     *
     * @param  int      $id
     * @return Response
     */
    public function destroy($id)
    {
        $page_destroyer = \App::make('Services\Pages\PageDestroyer');

        return $page_destroyer->destroy($this->page, $this, $id, Input::except('_method'));
    }

    /**
     * Handle successful page destroy
     *
     * @param  InstanceInterface $instance
     * @return Redirect::route
     */
    public function destroySucceeded(InstanceInterface $instance)
    {
        return Redirect::route('pages.index')->with('message', 'Page was successfully deleted');
    }

    /**
     * Handle an error with page destroy
     *
     * @param  InstanceInterface $instance
     * @return Redirect::route
     */
    public function destroyFailed(InstanceInterface $instance)
    {
        return Redirect::route('pages.index')->with('message', 'Oops, couldn\'t delete that page');
    }
}
