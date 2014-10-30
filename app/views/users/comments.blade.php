@extends('layouts.base')

@section('body')
  <div class="container container-content">

    <div class="row">
      <div class="col-xs-12">
        <h2>My Comments</h2>
      </div>
    </div>

    <div class="row">

      @foreach ($comments as $comment)

        <div class="col-sm-12 col-md-6 col-lg-4">
          <div class="container-post">
            <div class="row">
              <div class="col-lg-12">
                <a href="/posts/{{ $comment->id }}"><h3>{{ $comment->user->username }}</h3></a>
                <p>on <a href="/discussions/{{ $comment->discussion->id }}">{{ $comment->discussion->title }}</a></p>
                <p>{{ $comment->body }}</p>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12">
                <p id="comment-ranks-{{ $comment->id }}" class="pull-left">

                  @if (Auth::check())
                    @if (is_null($previous_rank = $comment->ranks()->previousRank(Auth::user()->id)->first()))
                      @include('partials.comments.norank')
                    @else

                      @if ($previous_rank->vote == 1)
                        @include('partials.comments.uprank')
                      @else
                        @include('partials.comments.downrank')
                      @endif

                    @endif
                  @else
                    @include('partials.comments.guestrank')
                  @endif

                </p>
              </div>
            </div>
          </div>
        </div>

      @endforeach

  </div>
@stop