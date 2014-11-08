@extends('layouts.base')

@section('body')
<div class="container container-content">
  <div class="row row-post">
    <div class="col-xs-12">

      <div class="container-post">
        <div class="row">
          <div class="col-lg-12">
            @if ($discussion->post->thumbnail != null)
              <img class="pull-left thumbnail-post" src="{{ urldecode($discussion->post->thumbnail) }}" alt="Samsung Gear 2 Smartwatch - Silver/Black" />
            @endif
            <a href="/posts/{{ $discussion->post->id }}"><h3>{{ $discussion->post->title }}</h3></a>
            <p>{{ $discussion->post->description }}</p>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <p class="pull-right">
              <a href="#">{{ $discussion_count = $post->discussions->count() }} @if ($discussion_count == 1) Discussion @else Discussions @endif</a>
            </p>

            <p id="post-ranks-{{ $discussion->post->id }}" class="pull-left">

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
  </div>

  <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <h2 class="text-right">{{ $discussion->title }}</h2>

      <p id="diss-ranks-{{ $discussion->id }}" class="pull-left" style="margin-top: -40px;">

        @if (Auth::check())
          @if (is_null($previous_rank = $discussion->ranks()->previousRank(Auth::user()->id)->first()))
            @include('partials.discussions.norank')
          @else

            @if ($previous_rank->vote == 1)
              @include('partials.discussions.uprank')
            @else
              @include('partials.discussions.downrank')
            @endif

          @endif
        @else
          @include('partials.discussions.guestrank')
        @endif

      </p>

      <br />
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

      {{ Form::open(['url' => $discussion->id . '/comments/store', 'method' => 'POST']) }}
        <div class="form-group">
          {{ Form::label('comment', 'Comment') }}
          {{ Form::textarea('comment', '', ['class' => 'form-control', 'rows' => '3']) }}
        </div>

        {{ Form::submit('Comment', ['class' => 'btn btn-default']) }}
      {{ Form::close() }}

      <br /><br />

    </div>
  </div>

  <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      
        @foreach ($discussion->comments as $comment)
          @if (is_null($comment->parent))
          
          <div class="media">
            <!--<a class="pull-left" href="#">
              <img style="width: 64px;" class="media-object" src="/img/user.jpg" alt="User" />
            </a>-->
            <div class="media-body">
              <h4 class="media-heading">{{ $comment->user->username }}</h4>

              <p id="comm-ranks-{{ $comment->id }}" class="pull-right">
                @if (Auth::check())
                  @if (is_null($previous_rank = $comment->ranks()->previousRank(Auth::user()->id)->first()))
                    @include('partials.comments.norank')
                  @else

                    @if ($previous_rank->vote == 1)
                      @include('partials.comments.uprank')
                    @else
                      @include('partials.comments.downrank')
                    @endif

                  @endif
                @else
                  @include('partials.comments.guestrank')
                @endif
              </p>

              {{ $comment->body }}
              @if(Auth::check())<br /><a ic-src="/discussions/{{ $discussion->id }}/comments/{{ $comment->id }}/create" ic-target="#reply-to-{{ $comment->id }}" ic-verb="get" ic-trigger-on="click">Reply</a>

              <div id="reply-to-{{ $comment->id }}"></div>@endif

              @if ($comment_children = $comment->children)              
                  @foreach ($comment_children as $comment_child)
                    <div class="media">
                      <!--<a class="pull-left" href="#">
                        <img style="width: 64px;" class="media-object" src="/img/user.jpg" alt="User" />
                      </a>-->
                      <div class="media-body">
                        <h4 class="media-heading">{{ $comment_child->user->username }}</h4>

                        <p id="comm-ranks-{{ $comment->id }}" class="pull-right">
                          @if (Auth::check())
                            @if (is_null($previous_rank = $comment_child->ranks()->previousRank(Auth::user()->id)->first()))
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
                        @if(Auth::check())<br /><a ic-src="/discussions/{{ $discussion->id }}/comments/{{ $comment_child->id }}/create" ic-target="#reply-to-{{ $comment_child->id }}" ic-verb="get" ic-trigger-on="click">Reply</a>

                        <div id="reply-to-{{ $comment_child->id }}"></div>@endif

                        @if ($comment_child->children->count() > 0)
                          <div class="media" ic-verb="get" ic-src="/comments/{{ $comment_child->id }}/replies" ic-trigger-on="click"><a>...More Replies</a></div>
                        @endif
                      </div>
                    </div>
                  @endforeach
              @endif

            </div>
          </div>
        
          @endif
        @endforeach
    
    </div>
  </div>
</div>
@stop