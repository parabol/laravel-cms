@extends('layouts.scaffold')

@section('main')

<h1>Show Test</h1>

<p>{{ link_to_route('tests.index', 'Return to All tests', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
				<th>Content</th>
				<th>Status</th>
		</tr>
	</thead>

	<tbody>
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
	</tbody>
</table>

@stop
