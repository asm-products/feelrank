<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>feelrank - Let The Internet Know How You Feel</title>

    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/font-awesome.min.css') }}
    {{ HTML::style('css/feelrank.css') }}

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div id="site-wrapper">

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">

        <div class="navbar-header">
          <a class="navbar-brand" href="/"><img src="/img/feelrank-logo.png" alt="FeelRank" /></a>
        </div>
        
        <button type="button" id="toggle-panel-nav" class="btn btn-default navbar-btn pull-right visible-xs visible-sm hidden-md hidden-lg"><i class="fa fa-bars"></i></button>
        
        @if (Auth::check())

          <button type="button" id="toggle-panel-profile" class="btn btn-default navbar-btn pull-left visible-xs visible-sm hidden-md hidden-lg"><i class="fa fa-user"></i></button>

        @endif

        @if (!Auth::check())

          <a href="/users/create" class="btn btn-default btn-signup navbar-btn pull-right hidden-xs hidden-sm visible-md visible-lg">Sign Up</a>

          <ul class="nav navbar-nav navbar-right hidden-xs hidden-sm visible-md visible-lg">
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
            <!--<li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>-->
            <li><a href="/users/login">Login</a></li>
          </ul>

        @else

          <ul class="nav navbar-nav navbar-right hidden-xs hidden-sm visible-md visible-lg">
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

        @endif

      </div>
    </div><!--/.navbar-->

    @if ($messages = Session::get('messages'))
      @for ($i = 0; $i < count($messages); $i++)
        <div class="alert alert-success">{{ $messages[$i] }}</div>
      @endfor
    @endif

    @if ($notice = Session::get('notice'))
      <div class="alert alert-success">{{ $notice }}</div>
    @endif

    @if (count($errors))
      <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    @if (Session::get('error'))
        <div class="alert alert-danger">
            @if (is_array(Session::get('error')))
                {{ head(Session::get('error')) }}
            @else
              {{ Session::get('error') }}
            @endif
        </div>
    @endif

    @yield('body')

      <div id="panel-nav">
      </div>

      <div id="panel-nav-content" class="panel-slide panel-nav">
        <ul>
          <li class="dropdown-toggle">
            Most

            <ul class="dropdown-sidebar">
              <li><a href="/posts/mostrecent">Recent</a></li>
              <li><a href="/posts/mostrank">Rank</a></li>
              <li><a href="/posts/mostdiscussions">Discussions</a></li>
            </ul>
          </li>
          <li class="dropdown-toggle">
            Least

            <ul class="dropdown-sidebar">
              <li><a href="/posts/leastrecent">Recent</a></li>
              <li><a href="/posts/leastrank">Rank</a></li>
              <li><a href="/posts/leastdiscussions">Discussions</a></li>
            </ul>
          </li>
          <li><a href="/users/login">Login</a></li>
          <li><a href="/users/create">Signup</a></li>

          @if (Auth::check())

            <li class="dropdown-toggle">
              My

              <ul class="dropdown-sidebar">
                <li><a href="/users/{{ Auth::user()->id }}/posts">Posts</a></li>
                <li><a href="/users/{{ Auth::user()->id }}/discussions">Discussions</a></li>
                <li><a href="/users/{{ Auth::user()->id }}/comments">Comments</a></li>
                <li><a href="/users/{{ Auth::user()->id }}/upranks">Upranks</a></li>
                <li><a href="/users/{{ Auth::user()->id }}/downranks">Downranks</a></li>
              </ul>
            </li>

          @endif
        </ul>
      </div>

    @if (Auth::check())

      <div id="panel-profile">
      </div>

      <div id="panel-profile-content" class="panel-slide panel-profile">
        <h1 class="text-center">{{ Auth::user()->username }}</h1>
        <ul>
          <li><a href="/users/update">Profile</a></li>
          <li><a href="/users/logout">Logout</a></li>
        </ul>
      </div>

    @endif

  </div><!--end wrapper-->

    {{ HTML::script('http://code.jquery.com/jquery-1.11.1.min.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/intercooler-0.4.1.min.js') }}
    {{ HTML::script('js/scotchPanels.min.js') }}
    {{ HTML::script('js/fastclick.js') }}

    <script>
      $(function() {
        $('.panel-slide').css('height', $(window).height())
      });
    </script>

    <script>
      $(function() {
        FastClick.attach(document.body);
      });
    </script>

    <script>
      $('#panel-nav').scotchPanel({
        containerSelector: 'body',
        direction: 'right',
        duration: 300,
        transition: 'ease',
        clickSelector: '#toggle-panel-nav',
        distanceX: '300px',
        enableEscapeKey: true
      });
      
      $('#panel-profile').scotchPanel({
        containerSelector: 'body',
        direction: 'left',
        duration: 300,
        transition: 'ease',
        clickSelector: '#toggle-panel-profile',
        distanceX: '300px',
        enableEscapeKey: true
      });
    </script>

    <script>
      $(function() {
        $('.dropdown-toggle').click(function() {
          $(this).children('ul.dropdown-sidebar').slideToggle();
        });

        setTimeout(function() {
          $('.alert').fadeOut(300);
        }, 1500);
      });
    </script>

    @yield('more_js')

  </body>
</html>