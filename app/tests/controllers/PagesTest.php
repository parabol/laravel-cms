<?php

use Mockery as m;

class PagesTest extends TestCase
{

    /** @var array */
    protected $attributes;

    /** @var \Mockery\MockInterface|\Yay_MockObject  */
    protected $instance;

    /** @var \Mockery\MockInterface|\Yay_MockObject  */
    protected $entity;

    /** @var \Mockery\MockInterface|\Yay_MockObject  */
    protected $controller;

    /** @var \Mockery\MockInterface|\Yay_MockObject  */
    protected $validator;

    /** @var \Mockery\MockInterface|\Yay_MockObject  */
    protected $repository;

    /** @var \Mockery\Mock */
    protected $collection;

    public function __construct()
    {
        parent::__constuct();

        $this->entity = m::mock('Page');

        $this->repository = m::mock(
            'Contracts\Repositories\PageRepositoryInterface',
            [$this->entity]
        );

        $this->collection = m::mock('Illuminate\Database\Eloquent\Collection')
            ->shouldDeferMissing();

        $this->controller = m::mock(
            'PagesController[destroySucceeded,destroyFailed,updateSucceeded,updateFailed,creationSucceeded,creationFailed]',
            [$this->repository]
        );

        $this->validator = m::mock(
            'Validators\PageValidator[validate]'
        );
    }



    public function setUp()
    {
        parent::setUp();

        $this->attributes = [
            'name' => 'Tonx art party PBR&B, Blue Bottle sriracha Bushwick iPhone wolf kale chips Godard typewriter selfies shabby chic church-key 3 wolf moon',
            'type' => 'Tonx art party PBR&B, Blue Bottle sriracha Bushwick iPhone wolf kale chips Godard typewriter selfies shabby chic church-key 3 wolf moon',
            'slug' => 'Tonx art party PBR&B, Blue Bottle sriracha Bushwick iPhone wolf kale chips Godard typewriter selfies shabby chic church-key 3 wolf moon',
            'content' => 'Tonx art party PBR&B, Blue Bottle sriracha Bushwick iPhone wolf kale chips Godard typewriter selfies shabby chic church-key 3 wolf moon',
            'title_tag' => 'Tonx art party PBR&B, Blue Bottle sriracha Bushwick iPhone wolf kale chips Godard typewriter selfies shabby chic church-key 3 wolf moon',
            'meta_keyword' => 'Tonx art party PBR&B, Blue Bottle sriracha Bushwick iPhone wolf kale chips Godard typewriter selfies shabby chic church-key 3 wolf moon',
            'meta_desc' => 'Tonx art party PBR&B, Blue Bottle sriracha Bushwick iPhone wolf kale chips Godard typewriter selfies shabby chic church-key 3 wolf moon',
            'status' => 'text',
            'id' => 1,
            'created_at' => '2014-09-08 08:00:00',
            'updated_at' => '2014-09-08 08:00:00',
        ];

        $this->app->instance(
            'Page',
            $this->entity
        );

        $this->app->instance(
            'Contracts\Repositories\PageRepositoryInterface',
            $this->repository
        );

        $this->app->instance('PagesController', $this->controller);

        $this->app->instance('Validators\PageValidator', $this->validator);
    }



    public function tearDown()
    {
        m::close();
    }



    public function testIndex()
    {
        $this->repository
            ->shouldReceive('all')
            ->once()
            ->andReturn($this->collection);

        $this->call('GET', 'pages');

        $this->assertViewHas('pages');
    }



    public function testCreate()
    {
        $this->call('GET', 'pages/create');

        $this->assertResponseOk();
    }



    public function testStore()
    {
        $this->validator
            ->shouldReceive('validate')
            ->once()
            ->with($this->attributes)
            ->andReturn(true);

        $this->repository
            ->shouldReceive('create')
            ->once()
            ->with($this->attributes)
            ->andReturn($this->entity);

        $this->controller
            ->shouldReceive('creationSucceeded')
            ->once()
            ->with($this->entity)
            ->andReturn("OK");

        $this->call('POST', 'pages', $this->attributes);
    }



    public function testStoreFails()
    {
        $this->validator
            ->shouldReceive('validate')
            ->once()
            ->with($this->attributes)
            ->andReturn(false);

        $this->controller
            ->shouldReceive('creationFailed')
            ->once()
            ->with($this->validator)
            ->andReturn("OK");

        $this->call('POST', 'pages', $this->attributes);
    }



    public function testShow()
    {
        $this->repository->shouldReceive('find')
                   ->with(1)
                   ->once()
                   ->andReturn((object) $this->attributes);

        $this->call('GET', 'pages/1');

        $this->assertViewHas('page');
    }



    public function testEdit()
    {
        $this->collection->id = 1;

        $this->repository->shouldReceive('find')
                   ->with(1)
                   ->once()
                   ->andReturn($this->collection);

        $this->call('GET', 'pages/1/edit');

        $this->assertViewHas('page');
    }



    public function testUpdate()
    {
        $this->repository
            ->shouldReceive('find')
            ->once()
            ->with(1)
            ->andReturn($this->entity);

        $this->validator
            ->shouldReceive('validate')
            ->once()
            ->with($this->attributes)
            ->andReturn(true);

        $this->entity
            ->shouldReceive('update')
            ->once()
            ->with($this->attributes);

        $this->controller
            ->shouldReceive('updateSucceeded')
            ->once()
            ->with($this->entity)
            ->andReturn("OK");

        $this->call('PATCH', 'pages/1', $this->attributes);
    }



    public function testUpdateFails()
    {
        $this->repository
            ->shouldReceive('find')
            ->once()
            ->with(1)
            ->andReturn($this->entity);

        $this->validator
            ->shouldReceive('validate')
            ->once()
            ->with($this->attributes)
            ->andReturn(false);

        $this->controller
            ->shouldReceive('updateFailed')
            ->once()
            ->with($this->entity, $this->validator)
            ->andReturn("OK");

        $this->call('PATCH', 'pages/1', $this->attributes);
    }



    public function testDestroy()
    {
        $this->repository
            ->shouldReceive('find')
            ->once()
            ->with(1)
            ->andReturn($this->entity);

        $this->entity
            ->shouldReceive('delete')
            ->once()
            ->andReturn(true);

        $this->controller
            ->shouldReceive('destroySucceeded')
            ->once()
            ->with($this->entity)
            ->andReturn("OK");

        $this->call('DELETE', 'pages/1');
    }



    public function testDestroyFails()
    {
        $this->repository
            ->shouldReceive('find')
            ->once()
            ->with(1)
            ->andReturn($this->entity);

        $this->entity
            ->shouldReceive('delete')
            ->once()
            ->andReturn(false);

        $this->controller
            ->shouldReceive('destroyFailed')
            ->once()
            ->with($this->entity)
            ->andReturn("OK");

        $this->call('DELETE', 'pages/1');
    }
}
