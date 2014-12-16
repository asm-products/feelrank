<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>FeelRank (Beta) - Let The Internet Know How You Feel</title>

    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/jquery.tagsinput.css') }}
    {{ HTML::style('css/font-awesome.min.css') }}
    {{ HTML::style('css/feelrank.css') }}
    {{ HTML::style('css/feelrank-card.css') }}

    <style>
      #loading-icon {
      	display: none;
      	font-size: 64px;
      	text-align: center;
      	color: #ddd;
      }
      
      #loading-icon small {
      	font-size: 36px;
      }
      
      #discussion-title {
      	display: none;
      }
    </style>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-545ba8747c10300f"></script>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-56442823-2', 'auto');
      ga('send', 'pageview');

    </script>
  </head>

  <body>
    <div id="site-wrapper">

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">

        <div class="navbar-header">
          @if (Auth::check())
            <a class="navbar-brand" href="/home">{{ HTML::image('img/feelrank-logo-white.png', 'FeelRank') }}<span class="badge badge-beta">beta</span></a>
          @else
            <a class="navbar-brand" href="/">{{ HTML::image('img/feelrank-logo-white.png', 'FeelRank') }}<span class="badge badge-beta">beta</span></a>
          @endif
        </div>
        
        <button type="button" id="toggle-panel-nav" class="btn btn-default navbar-btn pull-right visible-xs visible-sm hidden-md hidden-lg"><i class="fa fa-bars"></i></button>
        
        @if (Auth::check())

          <button type="button" id="toggle-panel-profile" class="btn btn-default navbar-btn pull-left visible-xs visible-sm hidden-md hidden-lg"><i class="fa fa-user"></i></button>

        @endif

        @if (!Auth::check())

          <a href="/users/login" class="btn btn-default btn-signup navbar-btn pull-right hidden-xs hidden-sm visible-md visible-lg">Login</a>

          <!--<ul class="nav navbar-nav navbar-right hidden-xs hidden-sm visible-md visible-lg">
            <li><a href="/tags/search">Tags</a></li>
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
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="/users/login">Login</a></li>
          </ul>-->

        @else

          <ul class="nav navbar-nav navbar-right hidden-xs hidden-sm visible-md visible-lg">
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
          @if (Auth::check())
            <!--<li><a href="/tags">Tags</a></li>-->
          @else
            <!--<li><a href="/tags/search">Tags</a></li>-->
          @endif
          <!--<li class="dropdown-toggle">
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
          </li>-->
          @if (!Auth::check())
            <li><a href="/users/login">Login</a></li>
            <!--<li><a href="/users/create">Signup</a></li>-->
          @endif

          @if (Auth::check())

            <!--<li class="dropdown-toggle">
              My

              <ul class="dropdown-sidebar">
                <li><a href="/users/{{ Auth::user()->id }}/posts">Posts</a></li>
                <li><a href="/users/{{ Auth::user()->id }}/discussions">Discussions</a></li>
                <li><a href="/users/{{ Auth::user()->id }}/comments">Comments</a></li>
                <li><a href="/users/{{ Auth::user()->id }}/upranks">Upranks</a></li>
                <li><a href="/users/{{ Auth::user()->id }}/downranks">Downranks</a></li>
              </ul>
            </li>-->

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
  
  @include('modals.login')

    {{-- HTML::script('http://code.jquery.com/jquery-1.11.1.min.js') --}}
    {{ HTML::script('js/jquery-1.10.2.min.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/intercooler-0.4.1.min.js') }}
    {{ HTML::script('js/scotchPanels.min.js') }}
    {{ HTML::script('js/fastclick.js') }}

    <script>
      $(function() {
        $('.panel-slide').css('height', $(window).height())
        
        $('.card-back').css('width', $('.card-front').width());

        $(window).resize(function() {
          $('.card-back').css('width', $('.card-front').width());
        });

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

    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-545ba8747c10300f" async="async"></script>

    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-545ba8747c10300f" async="async"></script>

    @yield('more_js')

  </body>
</html>