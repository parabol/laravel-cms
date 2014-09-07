@extends(Config::get('syntara::views.master'))

@section('content')
<div class="row">
    <div class="col-lg-12">
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
                {{ Datatable::table()->addColumn('#','Name','Action')->setUrl(route('getPagesDatatable'))->render() }}
            </div>
        </div>
    </div>
</div>
<link href="{{ asset('packages/jakubsacha/adminlte/AdminLTE/css/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('packages/jakubsacha/adminlte/AdminLTE/js/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('packages/jakubsacha/adminlte/AdminLTE/js/plugins/datatables/dataTables.bootstrap.js') }}"></script>
@stop
