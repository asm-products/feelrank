@if (count($comments) > 0)
  @foreach ($comments as $comment_child)

    <div class="media">
      <!--<a class="pull-left" href="#">
        <img style="width: 64px;" class="media-object" src="/img/user.jpg" alt="User" />
      </a>-->
      <div class="media-body">
        <h4 class="media-heading">{{ $comment_child->user->username }}</h4>

        <p id="comm-ranks-{{ $comment_child->id }}" class="pull-right">
          @if (Auth::check())
            @if (is_null($previous_rank = $post->ranks()->previousRank(Auth::user()->id)->first()))
              @include('partials.comments.children.norank')
            @else

              @if ($previous_rank->vote == 1)
                @include('partials.comments.children.uprank')
              @else
                @include('partials.comments.children.downrank')
              @endif

            @endif
          @else
            @include('partials.comments.children.guestrank')
          @endif
        </p>

        {{ $comment_child->body }}

        @if(Auth::check())<br /><a ic-src="/discussions/{{ $comment_child->discussion->id }}/comments/{{ $comment_child->id }}/create" ic-target="#reply-to-{{ $comment_child->id }}" ic-verb="get" ic-trigger-on="click">Reply</a>

        <div id="reply-to-{{ $comment_child->id }}"></div>@endif

        @if (!is_null($comment_replies = $comment_child->children))
          @include('partials.comments.child', ['comments' => $comment_replies])
        @endif
      </div>
    </div>

  @endforeach
@endif