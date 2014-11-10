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

      @if (count($posts) > 0)
        @foreach ($posts as $post)
          @include ('posts.post')
        @endforeach
      @else
        <div class="col-xs-12">
          <p>No posts found!</p>
        </div>
      @endif

    </div>
  </div>
@stop