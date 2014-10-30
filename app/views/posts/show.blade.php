@extends('layouts.base')

@section('body')

  <div class="container container-content">

      <div class="row row-post">
        @if ($post->ranks()->count() > 1)
        <div class="col-xs-12 col-sm-8">
        @else
        <div class="col-xs-12">
        @endif

          <div class="container-post">
            <div class="row">
              <div class="col-lg-12">
                @if ($post->thumbnail != null)
                  <img class="pull-left thumbnail-post" src="{{ urldecode($post->thumbnail) }}" alt="Samsung Gear 2 Smartwatch - Silver/Black" />
                @endif
                <a href="/posts/{{ $post->id }}"><h3>{{ $post->title }}</h3></a>
                <p>{{ $post->description }}</p>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12">
                <p class="pull-right">
                  {{ $discussion_count = $post->discussions->count() }} @if ($discussion_count == 1) Discussion @else Discussions @endif
                </p>

                <p id="post-ranks-{{ $post->id }}" class="pull-left">

                  @if (Auth::check())
                    @if (is_null($previous_rank = $post->ranks()->previousRank(Auth::user()->id)->first()))
                      @include('partials.posts.norank')
                    @else

                      @if ($previous_rank->vote == 1)
                        @include('partials.posts.uprank')
                      @else
                        @include('partials.posts.downrank')
                      @endif

                    @endif
                  @else
                    @include('partials.posts.guestrank')
                  @endif

                </p>

              </div>
            </div>
          </div>

        </div>

        @if ($post->ranks()->count() > 1)
          @include('partials.posts.history', ['rankCurrent' => $post->ranks()->sum('vote')])
        @endif
      </div>

      <div class="row">
        @if (Auth::check())
          <div class="col-xs-12 col-sm-6 col-md-4">
            <h4>Start a New Discussion</h4>
            {{ Form::open(['url' => '/discussions/store', 'method' => 'post']) }}
              <div class="form-group">
                {{ Form::label('title', 'Title') }}
                {{ Form::text('title', '', ['class' => 'form-control']) }}
              </div>

              {{ Form::hidden('post_id', $post->first()->id) }}

              {{ Form::submit('Discuss', ['class' => 'btn btn-default']) }}
            {{ Form::close() }}
          </div>
        @endif

        @foreach ($post->discussions as $discussion)
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