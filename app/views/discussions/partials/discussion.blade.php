<div class="col-xs-12 col-sm-6 col-md-4">
  <h4>{{ $discussion->title }}</h4>
  <p class="pull-left">
    <a href="/discussions/{{ $discussion->id }}">
      {{ $comment_count = $discussion->comments()->count() }}
      @if ($comment_count > 1 || $comment_count == 0)
        Comments
      @else
        Comment
      @endif
    </a>
  </p>
  <p class="pull-right">
    @if (Auth::check())
      @if (Auth::user()->followedDiscussions->contains($discussion->id))
        <span id="follow-discussion-{{ $discussion->id }}"><a class="btn btn-success btn-xs" href="" ic-src="/discussions/{{ $discussion->id }}/unfollow" ic-trigger-on="click" ic-target="#follow-discussion-{{ $discussion->id }}"><i class="fa fa-check"></i>&nbsp;&nbsp;Following</a></span>
      @else
        <span id="follow-discussion-{{ $discussion->id }}"><a class="btn btn-default btn-xs" href="" ic-src="/discussions/{{ $discussion->id }}/follow" ic-trigger-on="click" ic-target="#follow-discussion-{{ $discussion->id }}"><i class="fa fa-binoculars"></i>&nbsp;&nbsp;Follow</a></span>
      @endif
    @endif
  </p>
</div>