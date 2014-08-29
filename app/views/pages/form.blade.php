@extends(Config::get('syntara::views.master'))

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header">
                <h1 class="box-title">{{ trans('pages.new') }}</h1>
            </div>
            <div class="box-body">
                {{ $form }}
            </div>
        </div>
    </div>
</div>
@stop