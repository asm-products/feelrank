<div id="card-post-{{ $post->id }}" class="flip-container">
  <div class="flipper">

    <div class="panel panel-default card-front">
      <div class="panel-body" style="background: -webkit-gradient(linear, left top, left bottom, color-stop(25%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.85))), url('/img/{{ $post->id }}/thumbnail.png'); background-size: cover; background-position: left top;">
        <h3 class="text-center card-title">{{ $post->title }}</h3>
        <h3 class="text-center card-btn-container">
          <div class="btn-group btn-group-lg btn-group-justified">
            <a class="btn btn-success" style="text-shadow: none;" href="#"><i class="fa fa-thumbs-o-up fa-lg"></i></a>
            <a class="btn btn-link" href="#">{{ $post->ranks()->sum('vote') }}</a>
            <a class="btn btn-danger" style="text-shadow: none;" href="#"><i class="fa fa-thumbs-o-down fa-lg"></i></a>
          </div>
        </h3>
        <a onclick="$('#card-post-{{ $post->id }}').toggleClass('flip')" class="btn btn-default btn-lg card-flip"><i class="fa fa-refresh"></i></a>
      </div>
    </div>

    <div class="panel panel-default card-back">
      <div class="panel-body">
        <a onclick="$('#card-post-{{ $post->id }}').toggleClass('flip')" class="btn btn-default btn-lg card-flip"><i class="fa fa-refresh"></i></a>
        <div class="panel-tags">
          <a style="margin-bottom: 15px;" class="btn btn-primary btn-sm">incubator</a>
          <a style="margin-bottom: 15px;" class="btn btn-primary btn-sm">funding</a>
          <a style="margin-bottom: 15px;" class="btn btn-primary btn-sm">grand rapids</a>
          <a style="margin-bottom: 15px;" class="btn btn-primary btn-sm">startups</a>
          <a style="margin-bottom: 15px;" class="btn btn-primary btn-sm">coffee</a>
        </div>
        <hr style="border-color: #eee; margin-top: 10px;" />
        <a style="display: block; text-align: center;" href="#">All Tags</a>
        <hr style="border-color: #eee;" />
        <p>Who's applied before?</p>
        <a href="#">20 Comments</a>
        <hr style="border-color: #eee;" />
        <p>Start Garden screwed me over...</p>
        <a href="#">48 Comments</a>
        <hr style="border-color: #eee;" />
        <a style="display: block; text-align: center;" href="/posts/{{ $post->id }}">All Discussions</a>

        <h3 class="text-center card-btn-container">
          <div class="btn-group btn-group-lg btn-group-justified">
            <a class="btn btn-primary" style="text-shadow: none;" href="#"><i class="fa fa-tag fa-lg"></i></a>
            <a class="btn btn-link" href="#">ADD</a>
            <a class="btn btn-primary" style="text-shadow: none;" href="#"><i class="fa fa-comments fa-lg"></i></a>
          </div>
        </h3>
      </div>
    </div>

  </div><!--/.flipper-->
</div><!--/.flip-container-->
