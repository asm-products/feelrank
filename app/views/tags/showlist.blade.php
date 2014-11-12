@extends('layouts.base')

@section('body')
  <div class="container container-content">

    <div class="row">
      <div class="col-xs-12">
        <h2>
          {{ $qTag->name }}

          <small>
            @if (Auth::check())
              @if (Auth::user()->followedTags->contains($qTag->id))
                <span id="follow-tag-{{ $qTag->id }}"><a class="btn btn-success btn-sm" href="#" ic-src="/tags/{{ $qTag->id }}/unfollow" ic-trigger-on="click" ic-target="#follow-tag-{{ $qTag->id }}"><i class="fa fa-check"></i>&nbsp;&nbsp;Following</a></span>
              @else
                <span id="follow-tag-{{ $qTag->id }}"><a class="btn btn-default btn-sm" href="#" ic-src="/tags/{{ $qTag->id }}/follow" ic-trigger-on="click" ic-target="#follow-tag-{{ $qTag->id }}"><i class="fa fa-binoculars"></i>&nbsp;&nbsp;Follow</a></span>
              @endif
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