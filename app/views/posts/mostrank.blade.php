@extends('layouts.base')

@section('body')
  <div class="row">
    <div class="col-xs-12">
      <h2>Posts <small>({{ $sort }})</small></h2>
    </div>
  </div>

  <div class="row">
    @foreach ($posts as $post)
      <div class="col-md-4">

        <div class="panel panel-default">
          <div class="panel-body">
            @if ($post['thumbnail'] != null)
              <img class="img-responsive" src="{{ urldecode($post['thumbnail']) }}" alt="{{ $post['title'] }}" />
            @endif
            <h4>{{ $post['title'] }}</h4>
            <p>{{ $post['description'] }}</p>
            <p>Source: {{ $post['source'] }}</p>
          </div>

          <div class="panel-footer">
            <div class="row">
              <div class="col-xs-4">
                <a class="btn btn-success pull-left"><i class="fa fa-arrow-up"></i></a>
              </div>

              <div class="col-xs-4">
                <p id="post-ranks-{{ $post->id }}" class="pull-left">

                  @if (is_null($previous_rank = $post->ranks()->previousRank(Auth::user()->id)->first()))
                    @include('partials.posts.norank')
                  @else

                    @if ($previous_rank->vote == 1)
                      @include('partials.posts.uprank')
                    @else
                      @include('partials.posts.downrank')
                    @endif

                  @endif

                </p>
              </div>

              <div class="col-xs-4">
                <a class="btn btn-danger pull-right"><i class="fa fa-arrow-down"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    @endforeach
  </div>
@stop