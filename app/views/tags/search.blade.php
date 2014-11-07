@extends('layouts.base')

@section('body')
    <div class="container container-content">
      <div class="row">
        <div class="col-md-12">
          <h2>Search Tags</h2><br />

          {{ Form::open(['url' => 'tags/search', 'method' => 'post', 'class' => 'form-inline']) }}
            <div class="form-group">
              {{ Form::label('search', 'Search', ['class' => 'sr-only']) }}
              {{ Form::text('search', '', ['class' => 'form-control', 'placeholder' => 'Tag name...']) }}
            </div>

            {{ Form::submit('Search', ['class' => 'btn btn-default', '']) }}
          {{ Form::close() }}
        </div>
      </div>
    </div>
@stop

@section('more_js')

@stop