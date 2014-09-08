@extends(Config::get('syntara::views.master'))

@section('content')

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header">
                <h1 class="box-title">Edit Page</h1>
            </div>
            <div class="box-body">
                {{ Form::model($page, array('method' => 'PATCH', 'route' => array('pages.update', $page->id))) }}
                    @include('backend::pages._form')

                    <div class="form-group">
                        {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
                        {{ link_to_route('pages.index', 'Cancel', $page->id, array('class' => 'btn')) }}
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

@stop
