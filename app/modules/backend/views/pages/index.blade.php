@extends(Config::get('syntara::views.master'))

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{ trans('pages.all') }}</h3>
                <div class="box-tools">
                    <p class="pull-right">
                        <a class="btn btn-info btn-new btn-sm" href="{{ URL::route('pages.create') }}">{{ trans('pages.titles.new') }}</a>
                    </p>
                </div>
            </div>
            <div class="box-body  ajax-content no-padding" style="margin:10px">
            @if ($pages->count())
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Slug</th>
                            <th>Title tag</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pages as $page)
                            <tr>
                                <td>{{ $page->name }}</td>
                                <td>{{ $page->type }}</td>
                                <td>{{ $page->slug }}</td>
                                <td>{{ $page->title_tag }}</td>
                                <td>{{ $page->status }}</td>

                                <td>
                                {{ link_to_route('pages.edit', 'Edit', array($page->id), array('class' => 'btn btn-info')) }}
                                </td>
                                <td>
                                {{ Form::open(array('method' => 'DELETE', 'route' => array('pages.destroy', $page->id))) }}
                                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                                {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                There are no pages
            @endif
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.css">
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $('#datatable').dataTable();
</script>
@stop
