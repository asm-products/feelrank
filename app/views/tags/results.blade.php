@extends('layouts.base')

@section('body')
    <div class="container container-content">
      <div class="row">
        <div class="col-xs-12">
          <h2 class="pull-left">Tags</h2>

          {{ Form::open(['url' => 'tags/search', 'method' => 'post', 'class' => 'form-inline pull-right form-float']) }}
            <div class="form-group">
              {{ Form::label('search', 'Search', ['class' => 'sr-only']) }}
              {{ Form::text('search', $query, ['class' => 'form-control', 'placeholder' => 'Search Tags']) }}
            </div>

            {{ Form::submit('Search', ['class' => 'btn btn-default']) }}
          {{ Form::close() }}
        </div>
      </div>

      <br />

      <div class="row">
        <ul>
          @if (count($tags) > 0)

            @foreach ($tags as $tag)
              @include ('tags.partials.tag')
            @endforeach

          @elseif (count($tags) === 1)

            @include ('tags.partials.tag', ['tag' => $tags])

          @else

            <div class="col-xs-12">
              <p>No tags found!</p>
            </div>

          @endif
        </ul>
      </div>

    </div>
@stop