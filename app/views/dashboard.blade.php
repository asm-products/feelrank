@extends('layouts.base')

@section('body')
  <div class="container container-content">

    <div class="row">
      <div class="col-xs-12">
        <h2 class="pull-left">{{ Auth::user()->username }}'s FeelRank</h2>
      </div>
    </div>

    <br />

    <div class="row">
      <div class="col-xs-12">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#tags-tab" role="tab" data-toggle="tab">Tags</a></li>
          <li role="presentation"><a href="#posts-tab" role="tab" data-toggle="tab">Posts</a></li>
          <li role="presentation"><a href="#discussions-tab" role="tab" data-toggle="tab">Discussions</a></li>
        </ul>

        <br />

        <!-- Tab panes -->
        <div class="tab-content">
            
            <div role="tabpanel" class="tab-pane active" id="tags-tab">
              @if (count($tags) > 0)
                @foreach ($tags as $tag)
                  @include ('tags.partials.tag')
                @endforeach
              @else
                <p>No followed tags!</p>
              @endif
            </div>

            <div role="tabpanel" class="tab-pane" id="posts-tab">
              @if (count($posts) > 0)
                @foreach ($posts as $post)
                  @include ('posts.post')
                @endforeach
              @else
                <p>No followed posts!</p>
              @endif
            </div>

            <div role="tabpanel" class="tab-pane" id="discussions-tab">
              @if (count($discussions) > 0)
                @foreach ($discussions as $discussion)
                  @include ('discussions.partials.discussion')
                @endforeach
              @else
                <p>No followed discussions!</p>
              @endif
            </div>

        </div>

      </div>
    </div>

  </div>
@stop