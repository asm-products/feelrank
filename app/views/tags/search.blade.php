@extends('layouts.base')

@section('body')
    <div class="container container-content">
      <div class="row">
        <div class="col-xs-12">
          <h2 class="pull-left">Tags <small>(Recent)</small></h2>

          {{ Form::open(['url' => 'tags/search', 'method' => 'post', 'class' => 'form-inline pull-right form-float']) }}
            <div class="form-group">
              {{ Form::label('search', 'Search', ['class' => 'sr-only']) }}
              {{ Form::text('search', '', ['class' => 'form-control', 'placeholder' => 'Search Tags']) }}
            </div>

            {{ Form::submit('Search', ['class' => 'btn btn-default']) }}
          {{ Form::close() }}
        </div>
      </div>

      <div class="row">
        @if (count($tags) > 1)
          @foreach ($tags as $tag)
            @include ('tags.partials.tag')
          @endforeach
        @endif
      </div>
    </div>
@stop

@section('more_js')

@stop