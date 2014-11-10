@extends('layouts.base')

@section('body')
  <div class="container container-content">

    <div class="row">
      <div class="col-xs-12">
        <h2>Posts <small>({{ $sort }})</small></h2>
      </div>
    </div>

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