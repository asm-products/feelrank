<div class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">

    <div class="navbar-header">
      <a class="navbar-brand" href="/home"><img src="{{ asset('img/feelrank-logo-white.png') }}" alt="FeelRank" /><span class="badge badge-beta">beta</span></a>
    </div>
    
    <button type="button" id="toggle-panel-nav" class="btn btn-default navbar-btn pull-right visible-xs visible-sm hidden-md hidden-lg"><i class="fa fa-bars"></i></button>
    <button type="button" id="toggle-panel-profile" class="btn btn-default navbar-btn pull-left visible-xs visible-sm hidden-md hidden-lg"><i class="fa fa-user"></i></button>

    <ul class="nav navbar-nav navbar-right hidden-xs hidden-sm visible-md visible-lg">
      @if (Auth::user()->hasRole('Owner'))
        <li><a href="/owned">Owned</a></li>
      @endif
      <li><a href="/tags">Tags</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Most <span class="caret"></span></a>

        <ul class="dropdown-menu" role="menu">
          <li><a href="/posts/mostrecent">Recent</a></li>
          <li><a href="/posts/mostrank">Rank</a></li>
          <li><a href="/posts/mostdiscussions">Discussions</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Least <span class="caret"></span></a>

        <ul class="dropdown-menu" role="menu">
          <li><a href="/posts/leastrecent">Recent</a></li>
          <li><a href="/posts/leastrank">Rank</a></li>
          <li><a href="/posts/leastdiscussions">Discussions</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">My <span class="caret"></span></a>

        <ul class="dropdown-menu" role="menu">
          <li><a href="/users/{{ Auth::user()->id }}/posts">Posts</a></li>
          <li><a href="/users/{{ Auth::user()->id }}/discussions">Discussions</a></li>
          <li><a href="/users/{{ Auth::user()->id }}/comments">Comments</a></li>
          <li><a href="/users/{{ Auth::user()->id }}/upranks">Upranks</a></li>
          <li><a href="/users/{{ Auth::user()->id }}/downranks">Downranks</a></li>
        </ul>
      </li>
      <li><a href="/posts/create">Post</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ Auth::user()->username }} <span class="caret"></span></a>

        <ul class="dropdown-menu" role="menu">
          <li><a href="/users/update">Profile</a></li>
          <li><a href="/users/logout">Logout</a></li>
        </ul>
      </li>
    </ul>

  </div>
</div><!--/.navbar-->