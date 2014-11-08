<div class="col-xs-12 col-sm-6 col-md-4">
  <a href="/tags/{{ $tag->id }}"><h3>{{ $tag->name }}</h3></a>
  <p>
    {{ $tag_post_count = $tag->posts->count() }}
    @if ($tag_post_count > 1)
      Posts
    @else
      Post
    @endif

    @if (Auth::check())
      @if (Auth::user()->tags->contains($tag->id)) | 
        <span id="save-tag-{{ $tag->id }}"><a href="#" ic-src="/tags/{{ $tag->id }}/remove" ic-trigger-on="click" ic-target="#save-tag-{{ $tag->id }}">Remove</a></span>
      @else
        <span id="save-tag-{{ $tag->id }}"><a href="#" ic-src="/tags/{{ $tag->id }}/save" ic-trigger-on="click" ic-target="#save-tag-{{ $tag->id }}">Save</a></span>
      @endif
    @endif
  </p>
</div>