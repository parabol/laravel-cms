@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Edit Page</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::model($page, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('pages.update', $page->id))) }}

        <div class="form-group">
            {{ Form::label('title', 'Title:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('title', Input::old('title'), array('class'=>'form-control', 'placeholder'=>'Title')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('slug', 'Slug:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('slug', Input::old('slug'), array('class'=>'form-control', 'placeholder'=>'Slug')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('content', 'Content:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('content', Input::old('content'), array('class'=>'form-control', 'placeholder'=>'Content')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('keyword', 'Keyword:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('keyword', Input::old('keyword'), array('class'=>'form-control', 'placeholder'=>'Keyword')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('desc', 'Desc:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('desc', Input::old('desc'), array('class'=>'form-control', 'placeholder'=>'Desc')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('status', 'Status:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('status', Input::old('status'), array('class'=>'form-control', 'placeholder'=>'Status')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('pages.show', 'Cancel', $page->id, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop