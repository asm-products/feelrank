<!--Replaces content in create.blade.php-->

<div class="row">
  <div class="col-xs-12 col-sm-8">
    <h2>Add a Site</h2><br />

    {{ Form::open(['url' => '/posts/store2', 'method' => 'post']) }}
        <div class="form-group">
          {{ Form::label('tags', 'Tags (Separate with Commas)') }}
          {{ Form::text('tags', '', ['class' => 'form-control', 'id' => 'tags']) }}
        </div>
        <div class="checkbox">
          <label>
            {{ Form::checkbox('create_discussion', 'yes', '', ['id' => 'create-discussion']) }}
            Start a Discussion Too?
          </label>
        </div>
        <div id="discussion-title" class="form-group">
          {{ Form::label('title', 'Discussion Title') }}
          {{ Form::text('title', '', ['class' => 'form-control']) }}
        </div>

        {{ Form::hidden('post_id', $post->id) }}

      {{ Form::submit('Finish', ['class' => 'btn btn-default']) }}
    {{ Form::close() }}
  </div>

  <div id="site-preview" class="col-xs-12 col-sm-4">
    @include('posts.partials.previewcard')
  </div>
</div>

{{ HTML::script('js/jquery.tagsinput.min.js') }}

<script>
  $('#tags').tagsInput();
  
  $(document).ready(function() {
    $('#create-discussion').click(function() {
      if($('#create-discussion').is(':checked'))
      {
        $('#discussion-title').show();
      }
      else
      {
        $('#discussion-title').hide();
      }
    });
  });
</script>