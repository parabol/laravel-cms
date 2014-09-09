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
    {{ Form::textarea('content', null, array('id' => 'content','class' => 'form-control')) }}
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
<script src="{{ asset('packages/zofe/rapyd/assets/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
tinymce.init({
    selector: 'textarea#content',
    plugins: [
         'advlist autolink link image lists charmap print preview hr anchor pagebreak',
         'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
         'save table contextmenu directionality emoticons template paste textcolor responsivefilemanager'
    ],
    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | responsivefilemanager | print preview media fullpage | forecolor backcolor emoticons', 
    image_advtab: true,
    external_filemanager_path: '{{ URL::to('/') }}/packages/filemanager/',
    filemanager_title: 'Upload',
});
</script>