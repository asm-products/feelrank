@extends('layouts.base')

@section('body')

  <div class="container container-content">

      <div class="row row-post">
        @if ($post->ranks()->count() > 1)
        <div class="col-xs-12 col-sm-8">
        @else
        <div class="col-xs-12">
        @endif

          <div class="container-post">
            <div class="row">
              <div class="col-lg-12">
                @if ($post->thumbnail != null)
                  <img class="pull-left thumbnail-post" src="{{ urldecode($post->thumbnail) }}" alt="Samsung Gear 2 Smartwatch - Silver/Black" />
                @endif
                <a href="{{ urldecode($post->url) }}" target="_blank"><h3>{{ $post->title }}</h3></a>
                <p>{{ $post->description }}</p>
                <p>
                  Tags:

                  @if($post->tags->count() > 0)
                    @foreach ($post->tags as $tag)
                      <a href="/tags/{{ $tag->id }}">{{ $tag->name }}</a>&nbsp;
                    @endforeach
                  @else
                    No tags!
                  @endif
                </p>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12">
                <p class="pull-right">
                  @if (Auth::check())
                    @if (Auth::user()->followedPosts->contains($post->id))
                      <span id="follow-post-{{ $post->id }}"><a class="btn btn-success btn-xs" href="#" ic-src="/posts/{{ $post->id }}/unfollow" ic-trigger-on="click" ic-target="#follow-post-{{ $post->id }}"><i class="fa fa-check"></i>&nbsp;&nbsp;Following</a></span>
                    @else
                      <span id="follow-post-{{ $post->id }}"><a class="btn btn-default btn-xs" href="#" ic-src="/posts/{{ $post->id }}/follow" ic-trigger-on="click" ic-target="#follow-post-{{ $post->id }}"><i class="fa fa-binoculars"></i>&nbsp;&nbsp;Follow</a></span>
                    @endif
                  @endif
                  
                  @if ($owned)
                    <span id="own-post-{{ $post->id }}"><a class="btn btn-success btn-xs"><i class="fa fa-check"></i>&nbsp;&nbsp;Owned</a></span>
                  @else
                    <span id="own-post-{{ $post->id }}"><a class="btn btn-default btn-xs" href="#" data-toggle="modal" data-target="#modal-claim-ownership"><i class="fa fa-line-chart"></i>&nbsp;&nbsp;Claim</a></span>
                  @endif

                  @if (Auth::check())
                    <a class="btn btn-default btn-xs" href="#" data-toggle="modal" data-target="#modal-add-tags" data-postid="{{ $post->id }}"><i class="fa fa-tag"></i>&nbsp;&nbsp;Add</a>
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

        @if ($post->ranks()->count() > 1)
          @include('partials.posts.history')
        @endif
      </div>

      <br />

      <div class="row">
        @if (Auth::check())
          <div class="col-xs-12 col-sm-6 col-md-4">
            <h4>Start a New Discussion</h4>
            {{ Form::open(['url' => '/discussions/store', 'method' => 'post']) }}
              <div class="form-group">
                {{ Form::label('title', 'Title') }}
                {{ Form::text('title', '', ['class' => 'form-control']) }}
              </div>

              {{ Form::hidden('post_id', $post->id) }}

              {{ Form::submit('Discuss', ['class' => 'btn btn-default']) }}
            {{ Form::close() }}
          </div>
        @endif

        @if (count($post->discussions) > 0)
          @foreach ($post->discussions as $discussion)
            @include ('discussions.partials.discussion')
          @endforeach
        @endif
      </div>

  </div>
@stop

@section('more_modals')
  @include('modals.claim-ownership')
  @include('modals.add-tags')
@stop

@section('more_js')
  {{ HTML::script('js/bootstrap-tagsinput.min.js') }}
  
  <script>
    $('#tags').tagsinput({
      confirmKeys: [13, 32]
    });
  </script>
  
  <script>
    $(function() {
      $('#modal-add-tags').on('show.bs.modal', function(e) {
        var button = $(e.relatedTarget);
        var recipient = button.data('postid');
        
        var modal = $(this);
        modal.find('input[name="post_id"]').val(recipient);
      });
      
      $('#modal-create-discussion').on('show.bs.modal', function(e) {
        var button = $(e.relatedTarget);
        var recipient = button.data('postid');
        
        var modal = $(this);
        modal.find('input[name="post_id"]').val(recipient);
      });
    });
  </script>
@stop