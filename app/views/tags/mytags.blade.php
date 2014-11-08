@extends('layouts.base')

@section('body')
  <div class="container container-content">

    <div class="row">
      <div class="col-xs-12">
        <h2 class="pull-left">Tags</h2>

        {{ Form::open(['url' => 'tags/search', 'method' => 'post', 'class' => 'form-inline pull-right', 'style' => 'margin-top: 20px;']) }}
          <div class="form-group">
            {{ Form::label('search', 'Search') }}
            {{ Form::text('search', '', ['class' => 'form-control', 'placeholder' => 'Tag name...']) }}
          </div>

          {{ Form::submit('Search', ['class' => 'btn btn-default']) }}
        {{ Form::close() }}
      </div>
    </div>

    <br />

    <div class="row">
      <div class="col-xs-12">

        @if (isset($tags))
          <?php $i = 0; ?>

          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
              @foreach ($tags as $tag)
                <li role="presentation"<?php if ($i === 0): ?> class="active"<?php endif; ?> ic-src="tags/{{ $tag->id }}/get" ic-target="#tab-pane" ic-trigger-on="click"><a href="#{{ $tag->id }}" role="tab" data-toggle="tab">{{ $tag->name }}</a></li>

                <?php $i++; ?>  
              @endforeach
          </ul>

          <br />

          @if($posts !== '')
          <!-- Tab panes -->
          <div class="tab-content">

            @for ($c = 0; $c < $tags->count(); $c++)
              
              <div role="tabpanel" class="tab-pane<?php if ($c === 0): ?> active<?php endif; ?>" id="tab-pane">
                @if ($c === 0)
                  @if (count($posts) > 1)
                    @foreach ($posts as $post)

                      <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="container-post">
                          <div class="row">
                            <div class="col-lg-12">
                              @if ($post->thumbnail != null)
                                <img class="pull-left thumbnail-post" src="{{ urldecode($post->thumbnail) }}" alt="{{ $post->title }}" />
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
                                <a href="/posts/{{ $post->id }}">{{ $post->discussions->count() }} Discussions</a>
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

                    @endforeach
                  @else
                    <?php $post = $posts->first(); ?>

                    <div class="col-sm-12 col-md-6 col-lg-4">
                      <div class="container-post">
                        <div class="row">
                          <div class="col-lg-12">
                            @if ($post->thumbnail != null)
                              <img class="pull-left thumbnail-post" src="{{ urldecode($post->thumbnail) }}" alt="{{ $post->title }}" />
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
                              <a href="/post/{{ $post->id }}">{{ $post->discussions->count() }} Discussions</a>
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

                  @endif
                @endif
              </div>

            @endfor

          </div>
          @endif
        @endif
      </div>
    </div>

  </div>
@stop