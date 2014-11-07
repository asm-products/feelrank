@extends('layouts.base')

@section('body')
  <div class="container container-content">
    <div class="row">
      <div class="col-xs-12">
        <h2>Create a Post <small>(2)</small></h2><br />

        {{ Form::open(['url' => 'posts', 'method' => 'post']) }}
          {{ Form::hidden('url', $url_info['url'], []) }}
          <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', $url_info['title'], ['class' => 'form-control']) }}
          </div>
          <div class="form-group">
            {{ Form::label('description', 'Description') }}
            {{ Form::textarea('description', $url_info['description'], ['class' => 'form-control']) }}
          </div>
          <div class="form-group">
            {{ Form::label('tags', 'Tags (Separate with Commas)') }}
            {{ Form::text('tags', '', ['class' => 'form-control', 'id' => 'tags']) }}
          </div>

          @if (isset($url_info['thumbnail_url']))
            {{ Form::hidden('thumbnail', $url_info['thumbnail_url']) }}
          @endif
          

          {{ Form::hidden('source', $url_info['provider_name']) }}

          {{ Form::submit('Post', ['class' => 'btn btn-default']) }}
        {{ Form::close() }}

        <br/><br/>
      </div>
    </div>
  </div>
@stop

@section('more_js')
  {{ HTML::script('js/jquery.tagsinput.min.js') }}

  <script>
    $('#tags').tagsInput();
  </script>
@stop