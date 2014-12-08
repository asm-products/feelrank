<div id="card-post-{{ $post->id }}" class="flip-container">
  <div class="flipper">

    <div class="panel panel-default card-front">
      <div class="panel-body" style="background: -webkit-gradient(linear, left top, left bottom, color-stop(25%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.85))), url('/img/{{ $post->id }}/thumbnail.png'); background-size: cover; background-position: left top;">
        <h3 class="text-center card-title">{{ $post->title }}</h3>
        <h3 class="text-center card-btn-container">
          <div id="post-ranks-{{ $post->id }}" class="btn-group btn-group-lg btn-group-justified">
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
          </div>
        </h3>
        <a onclick="$('#card-post-{{ $post->id }}').toggleClass('flip')" class="btn btn-default btn-lg card-flip"><i class="fa fa-refresh"></i></a>
      </div>
    </div>

    <div class="panel panel-default card-back">
      <div class="panel-body">
        <a onclick="$('#card-post-{{ $post->id }}').toggleClass('flip')" class="btn btn-default btn-lg card-flip"><i class="fa fa-refresh"></i></a>
        <div class="panel-tags">
          @include ('posts.partials.tags')
        </div>
        <hr style="margin-top: 10px;" />
        <a style="display: block; text-align: center;" href="/posts/{{ $post->id }}">All Tags</a>
        <hr />
          @include ('posts.partials.discussions')
        <a style="display: block; text-align: center;" href="/posts/{{ $post->id }}">All Discussions</a>

        <h3 class="text-center card-btn-container">
          <div class="btn-group btn-group-lg btn-group-justified">
            @if (Auth::check())
              <a class="btn btn-default" href="#" data-toggle="modal" data-target="#modal-add-tags" data-postid="{{ $post->id }}"><i class="fa fa-tag fa-lg"></i></a>
              <a class="btn btn-link">ADD</a>
              <a class="btn btn-default" href="#" data-toggle="modal" data-target="#modal-create-discussion" data-postid="{{ $post->id }}"><i class="fa fa-comments fa-lg"></i></a>
            @else
              <a class="btn btn-default" href="#" data-toggle="modal" data-target="#modal-login" data-postid="{{ $post->id }}"><i class="fa fa-tag fa-lg"></i></a>
              <a class="btn btn-link">ADD</a>
              <a class="btn btn-default" href="#" data-toggle="modal" data-target="#modal-login" data-postid="{{ $post->id }}"><i class="fa fa-comments fa-lg"></i></a>
            @endif
          </div>
        </h3>
      </div>
    </div>

  </div><!--/.flipper-->
</div><!--/.flip-container-->