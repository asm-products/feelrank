@extends('layouts.base')

@section('body')
  <div class="container container-content">

    <div class="row">
      <div class="col-xs-12">
        <h2>My Upranks</h2>
      </div>
    </div>

    <div class="row">

      @foreach ($upranks as $uprank)

        @if ($uprank->rankable_type === 'Post')

          <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="container-post">
              <div class="row">
                <div class="col-lg-12">
                  @if ($uprank->rankable->thumbnail != null)
                    <img class="pull-left thumbnail-post" src="{{ urldecode($uprank->rankable->thumbnail) }}" alt="{{ $uprank->rankable->title }}" />
                  @endif
                  <a href="/posts/{{ $uprank->rankable->id }}"><h3>{{ $uprank->rankable->title }}</h3></a>
                  <p>{{ $uprank->rankable->description }}</p>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                  <p class="pull-right">
                    <a href="#">{{ $uprank->rankable->discussions->count() }} Discussions</a>
                  </p>

                  <p id="post-ranks-{{ $uprank->rankable->id }}" class="pull-left">

                    @include('partials.posts.uprank', ['post' => $uprank->rankable->load('ranks')])

                  </p>
                </div>
              </div>
            </div>
          </div>

        @elseif ($uprank->rankable_type === 'Discussion')

          <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="container-post">
              <div class="row">
                <div class="col-lg-12">
                  <a href="/discussions/{{ $uprank->rankable->id }}"><h3>{{ $uprank->rankable->title }}</h3></a>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                  <p class="pull-right">
                    <a href="#">{{ $uprank->rankable->comments->count() }} Comments</a>
                  </p>

                  <p id="discussion-ranks-{{ $uprank->rankable->id }}" class="pull-left">

                    @include('partials.discussions.uprank', ['discussion' => $uprank->rankable->load('ranks')])

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
                  <a href="/posts/{{ $uprank->rankable->id }}"><h3>{{ $uprank->rankable->user->username }}</h3></a>
                  <p>on <a href="/discussions/{{ $uprank->rankable->discussion->id }}">{{ $uprank->rankable->discussion->title }}</a></p>
                  <p>{{ $uprank->rankable->body }}</p>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                  <p id="comment-ranks-{{ $uprank->rankable->id }}" class="pull-left">

                    @include('partials.comments.uprank', ['comment' => $uprank->rankable->load('ranks')])

                  </p>
                </div>
              </div>
            </div>
          </div>

        @endif
      @endforeach

  </div>
@stop