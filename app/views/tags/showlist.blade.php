@extends('layouts.base')

@section('body')
  <div class="container container-content">

    <div class="row">
      <div class="col-xs-12">
        <h2>
          {{ $qTag->name }}

          <small>
            @if (Auth::check())
              (
              @if (Auth::user()->tags->contains($qTag->id))
                <span id="save-tag-{{ $qTag->id }}"><a href="#" ic-src="/tags/{{ $qTag->id }}/remove" ic-trigger-on="click" ic-target="#save-tag-{{ $qTag->id }}">Remove</a></span>
              @else
                <span id="save-tag-{{ $qTag->id }}"><a href="#" ic-src="/tags/{{ $qTag->id }}/save" ic-trigger-on="click" ic-target="#save-tag-{{ $qTag->id }}">Save</a></span>
              @endif
              )
            @endif
          </small>
        </h2>
      </div>
    </div>

    <br />

    <div class="row">

      @foreach ($posts as $post)

        <div class="col-sm-12 col-md-6 col-lg-4">
          <div class="container-post">
            <div class="row">
              <div class="col-lg-12">
                @if ($post->thumbnail != null)
                  <img class="pull-left thumbnail-post" src="{{ urldecode($post->thumbnail) }}" alt="{{ $post->title }}" />
                @endif
                <a href="{{ urldecode($post->url) }}" target="_blank"><h3>{{ $post->title }}</h3></a>
                <p>{{ $post->description }}</p>
                <p>
                  Tags:

                  @if($post->tags->count() > 0)
                    @foreach ($post->tags as $tag)
                      <a href="/tags/{{ $tag->id }}">{{ $tag->name }}</a>&nbsp;
                    @endforeach
                  @else
                    No tags!
                  @endif
                </p>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12">
                <p class="pull-right">
                  <a href="/posts/{{ $post->id }}">{{ $post->discussions->count() }} Discussions</a>
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

      @endforeach

  </div>
@stop