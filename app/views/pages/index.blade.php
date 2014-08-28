@extends('layouts.scaffold')

@section('main')

<h1>All Pages</h1>

<p>{{ link_to_route('pages.create', 'Add New Page', null, array('class' => 'btn btn-lg btn-success')) }}</p>

{{ $filter }}
{{ $grid }}

@stop
