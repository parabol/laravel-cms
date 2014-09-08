<div class="form-group">
    {{ Form::label('name', 'Name:') }}
    {{ Form::text('name', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {{ Form::label('type', 'Type:') }}
    {{ Form::text('type', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {{ Form::label('slug', 'Slug:') }}
    {{ Form::text('slug', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {{ Form::label('content', 'Content:') }}
    {{ Form::textarea('content', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {{ Form::label('title_tag', 'Title Tag:') }}
    {{ Form::text('title_tag', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {{ Form::label('meta_keyword', 'Meta Keyword:') }}
    {{ Form::text('meta_keyword', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {{ Form::label('meta_desc', 'Meta Desc:') }}
    {{ Form::text('meta_desc', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {{ Form::label('status', 'Status:') }}
    {{ Form::text('status', null, array('class' => 'form-control')) }}
</div>