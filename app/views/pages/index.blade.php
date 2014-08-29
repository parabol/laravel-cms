@extends(Config::get('syntara::views.master'))

@section('content')
<div class="row">
    <div class="col-lg-2">
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">{{ trans('syntara::all.search') }}</h3>
            </div>
            <div class="box-body">
                {{ $filter }}
            </div>
        </div>
    </div>
    <div class="col-lg-10">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{ trans('pages.all') }}</h3>
                <div class="box-tools">
                    <p class="pull-right">
                        @if($currentUser->hasAccess('delete-user'))
                        <a id="delete-item" class="btn btn-danger btn-sm">{{ trans('syntara::all.delete') }}</a>
                        @endif

                        @if($currentUser->hasAccess('create-user'))
                        <a class="btn btn-info btn-new btn-sm" href="{{ URL::route('createPages') }}">{{ trans('pages.titles.new') }}</a>
                        @endif
                    </p>
                </div>
            </div>
            <div class="box-body  ajax-content no-padding">
                {{ $grid }}
            </div>
        </div>
    </div>
</div>


@stop
