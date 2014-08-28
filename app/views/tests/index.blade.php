@extends('layouts.scaffold')

@section('main')

<h1>All Tests</h1>

<p>{{ link_to_route('tests.create', 'Add New Test', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($tests->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Title</th>
				<th>Content</th>
				<th>Status</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($tests as $test)
				<tr>
					<td>{{{ $test->title }}}</td>
					<td>{{{ $test->content }}}</td>
					<td>{{{ $test->status }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('tests.destroy', $test->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('tests.edit', 'Edit', array($test->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no tests
@endif

@stop
