@extends('layouts.base')

@section('body')
    <div class="container container-content">
      <div class="row">
        <div class="col-md-12">
          <h2>Search Tags</h2><br />

          {{ Form::open(['url' => 'tags/search', 'method' => 'post', 'class' => 'form-inline']) }}
            <div class="form-group">
              {{ Form::label('search', 'Search', ['class' => 'sr-only']) }}
              {{ Form::text('search', '', ['class' => 'form-control', 'placeholder' => 'Tag name...']) }}
            </div>

            {{ Form::submit('Search', ['class' => 'btn btn-default', '']) }}
          {{ Form::close() }}
        </div>
      </div>

      <br />

      <div class="row">
        <ul>
          @if (count($tags) > 0)
            @foreach ($tags as $tag)
              <li>
                <a href="/tags/{{ $tag->id }}">{{ $tag->name }}</a>
                @if (Auth::check()) | 
                  @if (Auth::user()->tags->contains($tag->id))
                    <span id="save-tag-{{ $tag->id }}"><a href="#" ic-src="/tags/{{ $tag->id }}/remove" ic-trigger-on="click" ic-target="#save-tag-{{ $tag->id }}">Remove</a></span>
                  @else
                    <span id="save-tag-{{ $tag->id }}"><a href="#" ic-src="/tags/{{ $tag->id }}/save" ic-trigger-on="click" ic-target="#save-tag-{{ $tag->id }}">Save</a></span>
                  @endif
                @endif
              </li>
            @endforeach
          @elseif (count($tags) === 1)
            <li>
              <a href="/tags/{{ $tags->id }}">{{ $tags->name }}</a>
              @if (Auth::check()) | 
                @if (Auth::user()->tags->contains($tags->id))
                  <span id="save-tag-{{ $tag->id }}"><a href="#" ic-src="/tags/{{ $tag->id }}/remove" ic-trigger-on="click" ic-target="#save-tag-{{ $tag->id }}">Remove</a></span>
                @else
                  <span id="save-tag-{{ $tag->id }}"><a href="#" ic-src="/tags/{{ $tag->id }}/save" ic-trigger-on="click" ic-target="#save-tag-{{ $tag->id }}">Save</a></span>
                @endif
              @endif
            </li>
          @else
            <p>No tags found!</p>
          @endif
        </ul>
      </div>

    </div>
@stop