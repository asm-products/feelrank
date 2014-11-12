@extends('layouts.base')

@section('body')
  <div class="container container-content">

    <div class="row">
      <div class="col-xs-12">
        <h2>My Downranks</h2>
      </div>
    </div>

    <div class="row">

      @foreach ($downranks as $downrank)

        @if ($downrank->rankable_type === 'Post')

          @include ('posts.post', ['post' => $downrank->rankable])

        @elseif ($downrank->rankable_type === 'Discussion')

          <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="container-post">
              <div class="row">
                <div class="col-lg-12">
                  <a href="/discussions/{{ $downrank->rankable->id }}"><h3>{{ $downrank->rankable->title }}</h3></a>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                  <p class="pull-right">
                    <a href="#">{{ $downrank->rankable->comments->count() }} Comments</a>
                  </p>

                  <p id="discussion-ranks-{{ $downrank->rankable->id }}" class="pull-left">

                    @include('partials.discussions.downrank', ['discussion' => $downrank->rankable->load('ranks')])

                  </p>
                </div>
              </div>
            </div>
          </div>

        @else {{-- if not a post or discussion, it's a comment --}}

          <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="container-post">
              <div class="row">
                <div class="col-lg-12">
                  <a href="/posts/{{ $downrank->rankable->id }}"><h3>{{ $downrank->rankable->user->username }}</h3></a>
                  <p>on <a href="/discussions/{{ $downrank->rankable->discussion->id }}">{{ $downrank->rankable->discussion->title }}</a></p>
                  <p>{{ $downrank->rankable->body }}</p>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                  <p id="comment-ranks-{{ $downrank->rankable->id }}" class="pull-left">

                    @include('partials.comments.downrank', ['comment' => $downrank->rankable->load('ranks')])

                  </p>
                </div>
              </div>
            </div>
          </div>

        @endif
      @endforeach

  </div>
@stop