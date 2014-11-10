@extends('layouts.base')

@section('body')
  <div class="container container-content">

    <div class="row">
      <div class="col-xs-12">
        <h2 class="pull-left">Tags</h2>

        {{ Form::open(['url' => 'tags/search', 'method' => 'post', 'class' => 'form-inline pull-right form-float']) }}
          <div class="form-group">
            {{ Form::label('search', 'Search', ['class' => 'sr-only']) }}
            {{ Form::text('search', '', ['class' => 'form-control', 'placeholder' => 'Search Tags']) }}
          </div>

          {{ Form::submit('Search', ['class' => 'btn btn-default']) }}
        {{ Form::close() }}
      </div>
    </div>

    <br />

    <div class="row">
      <div class="col-xs-12">

        @if (count($tags) > 0)
          <?php $i = 0; ?>

          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
              @foreach ($tags as $tag)
                <li role="presentation"<?php if ($i === 0): ?> class="active"<?php endif; ?> ic-src="tags/{{ $tag->id }}/get" ic-target="#tab-pane" ic-trigger-on="click"><a href="#{{ $tag->id }}" role="tab" data-toggle="tab">{{ $tag->name }}</a></li>

                <?php $i++; ?>  
              @endforeach
          </ul>

          <br />

          <!-- Tab panes -->
          <div class="tab-content">

            @for ($c = 0; $c < $tags->count(); $c++)
              
              <div role="tabpanel" class="tab-pane<?php if ($c === 0): ?> active<?php endif; ?>" id="tab-pane">
                @if ($c === 0) {{-- If first tag, loop out posts. --}}

                  @if (count($posts) > 0)
                    @foreach ($posts as $post)
                      @include ('posts.post')
                    @endforeach
                  @else
                    <div class="col-xs-12">
                      <p>No posts found!</p>
                    </div>
                  @endif

                @endif
              </div>

            @endfor

          </div>
        @endif
      </div>
    </div>

  </div>
@stop