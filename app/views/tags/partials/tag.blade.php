<div class="col-xs-12 col-sm-6 col-md-4">
  <a href="/tags/{{ $tag->id }}"><h3>{{ $tag->name }}</h3></a>
  <p class="pull-left">
    {{ $tag_post_count = $tag->posts->count() }}
    @if ($tag_post_count > 1)
      Posts
    @else
      Post
    @endif
  </p>

  <p class="pull-right">
    @if (Auth::check())
      @if (Auth::user()->followedTags->contains($tag->id))
        <span id="follow-tag-{{ $tag->id }}"><a class="btn btn-success btn-sm" href="" ic-src="/tags/{{ $tag->id }}/unfollow" ic-trigger-on="click" ic-target="#follow-tag-{{ $tag->id }}"><i class="fa fa-check"></i>&nbsp;&nbsp;Following</a></span>
      @else
        <span id="follow-tag-{{ $tag->id }}"><a class="btn btn-default btn-sm" href="" ic-src="/tags/{{ $tag->id }}/follow" ic-trigger-on="click" ic-target="#follow-tag-{{ $tag->id }}"><i class="fa fa-binoculars"></i>&nbsp;&nbsp;Follow</a></span>
      @endif
    @endif
  </p>
</div>