@extends('layouts.base')

@section('body')
  <div class="container container-content">

    <div class="row">
      <div class="col-xs-12">
        <h2>Posts <small>(No Particular Order)</small></h2>
      </div>
    </div>

    <div class="row">

      @if (count($posts) > 0)
        @foreach ($posts as $post)
          <div class="col-sm-12 col-md-6 col-lg-4">
            @include ('sites.partials.sitecard')
          </div>
        @endforeach
      @else
        <div class="col-xs-12">
          <p>No posts found!</p>
        </div>
      @endif

    </div>
  </div>
@stop