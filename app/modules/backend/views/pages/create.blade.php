@extends(Config::get('syntara::views.master'))

@section('content')

@if ($errors->any())
<div class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
</div>
@endif
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header">
                <h1 class="box-title">{{ trans('pages.new') }}</h1>
            </div>
            <div class="box-body">
                {{ Form::open(array('route' => 'pages.store')) }}
			        @include('backend::pages._form')

			        <div class="form-group">
			            {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
			        </div>
				{{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@stop
