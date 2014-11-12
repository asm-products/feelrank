<div class="col-sm-12 col-md-6 col-lg-4">
  <div class="container-post">
    <div class="row">
      <div class="col-lg-12">
        @if ($post->thumbnail != null)
          <img class="pull-left thumbnail-post" src="{{ urldecode($post->thumbnail) }}" alt="{{ $post->title }}" />
        @endif
        <a href="/posts/{{ $post->id }}"><h3>{{ $post->title }}</h3></a>
        <p>{{ $post->description }}</p>
        <p>
          Tags:

          @if($post->tags->count() > 0)
            @foreach ($post->tags as $tag)
              <a href="/tags/{{ $tag->id }}">{{ $tag->name }}</a>&nbsp;
            @endforeach
          @else
            Untagged
          @endif
        </p>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <p class="pull-right">
          @if (Auth::check())
            @if (Auth::user()->followedPosts->contains($post->id))
              <span id="follow-post-{{ $post->id }}"><a class="btn btn-success btn-xs" href="" ic-src="/posts/{{ $post->id }}/unfollow" ic-trigger-on="click" ic-target="#follow-post-{{ $post->id }}"><i class="fa fa-check"></i>&nbsp;&nbsp;Following</a></span>
            @else
              <span id="follow-post-{{ $post->id }}"><a class="btn btn-default btn-xs" href="" ic-src="/posts/{{ $post->id }}/follow" ic-trigger-on="click" ic-target="#follow-post-{{ $post->id }}"><i class="fa fa-binoculars"></i>&nbsp;&nbsp;Follow</a></span>
            @endif
          @endif
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
