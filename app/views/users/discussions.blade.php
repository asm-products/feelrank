@extends('layouts.base')

@section('body')

  <div class="container container-content">

    <div class="row">
      <div class="col-xs-12">
        <h2>My Discussions <small>(Most Recent)</small></h2>
      </div>
    </div>

    <div class="row">
      @foreach ($discussions as $discussion)
        <div class="col-xs-12 col-sm-6 col-md-4">
          <h4>{{ $discussion->title }}</h4>
          <p>
            <a href="/discussions/{{ $discussion->id }}">
              {{ $comment_count = $discussion->comments()->count() }}
              @if ($comment_count > 1 || $comment_count == 0)
                Comments
              @else
                Comment
              @endif
            </a>
          </p>
        </div>
      @endforeach
    </div>

  </div>

@stop