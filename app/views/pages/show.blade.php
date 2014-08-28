@extends('layouts.scaffold')

@section('main')

<h1>Show Page</h1>

<p>{{ link_to_route('pages.index', 'Return to All pages', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
				<th>Slug</th>
				<th>Content</th>
				<th>Keyword</th>
				<th>Desc</th>
				<th>Status</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $page->title }}}</td>
					<td>{{{ $page->slug }}}</td>
					<td>{{{ $page->content }}}</td>
					<td>{{{ $page->keyword }}}</td>
					<td>{{{ $page->desc }}}</td>
					<td>{{{ $page->status }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('pages.destroy', $page->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('pages.edit', 'Edit', array($page->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
