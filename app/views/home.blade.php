<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FeelRank - How the World Feels About Everything</title>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/feelrank-card.css" rel="stylesheet">
    <style>
      a {
        color: #fa6847;
      }

      a:hover {
        color: #ed6242;
      }

      .nav-floating {
        padding: 40px;
        position: absolute;
        top: 0;
        width: 100%;
        z-index: 900;
        background: transparent;
      }

      .nav-floating .btn {
        margin-left: 15px;
      }

      .nav-floating a {
        color: #ffffff;
      }

      .nav-floating li a:hover {
        color: #eeeeee;
        background: transparent;
      }

      .nav-floating li a:focus {
        background: transparent;
      }

      .jumbotron-home {
        height: 600px;
        background: url('img/card-background.jpg');
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        color: #ffffff;
        margin-bottom: 60px;
        -webkit-box-shadow: inset 0 20px 20px -20px rgba(0,0,0,.4);
        -moz-box-shadow: inset 0 20px 20px -20px rgba(0,0,0,.4);
        box-shadow: inset 0 20px 20px -20px rgba(0,0,0,.4);
      }

      .jumbotron-home .container {
        position: relative;
        top: 50%;
        transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        -webkit-transform: translateY(-50%);
      }

      .row-orange {
        background: url('img/card-background.jpg');
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        color: #ffffff;
        padding: 60px 0;
        margin-top: 120px;
        margin-bottom: 120px;
        -webkit-box-shadow: inset 0 20px 20px -20px rgba(0,0,0,.4);
        -moz-box-shadow: inset 0 20px 20px -20px rgba(0,0,0,.4);
        box-shadow: inset 0 20px 20px -20px rgba(0,0,0,.4);
      }

      .row-bottom {
        margin-bottom: 0;
      }
      
      .row-features {
      	margin-top: 80px;
      }

      .btn-outline-white {
        border-color: #fff;
        background: transparent;
        color: #fff;
      }

      .btn-outline-white:hover {
        border-color: #eee;
        background: transparent;
        color: #eee;
      }

      .btn-orange {
        border-color: #fa6847;
        background: #fa6847;
        color: #fff;
      }

      .btn-orange:hover {
        border-color: #ed6242;
        background: #ed6242;
        color: #fff;
      }

      .row-bottom a {
        color: #fff;
        text-decoration: underline;
      }

      .row-bottom a:hover {
        color: #eee;
      }

      .container-contact {
        background: #fa6847;
        padding: 20px;
        margin: 20px auto;
        max-width: 50%;
      }

      .row-bottom .form-control:focus {
        border-color: #ed6242;
        box-shadow: 0 1px 1px #fa6847 inset, 0 0 8px #fa6847;
      }
      
      .flipper .btn-success i, .flipper .btn-danger i {
      	font-size: 100px;
      	position: absolute;
      	left: 10px;
      	top: -17px;
      	opacity: .75;
      }
      
      .flipper .btn-success, .flipper .btn-danger {
      	overflow: hidden;
      }
      
      .tall-lines {
        line-height: 2em;
      }
      
      @media screen and (max-width: 1023px) {
        .container-contact {
          max-width: 80%;
        }
      }
      
      @media screen and (max-width: 767px) {
        .container-contact {
          max-width: 100%;
        }
      }
    </style>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="nav-floating">
      <ul class="nav nav-pills pull-right">
        <li><a href="/">Product</a></li>
        <li><a href="/about">Company</a></li>
        <li><a class="btn btn-outline-white" href="/users/login">Login</a></li>
      </ul>
    </nav>

    <div class="jumbotron jumbotron-home text-center">
      <div class="container">
        <img src="img/feelrank-logo-white.png" alt="FeelRank" />
        <h4>Share your feelings about anything with a link.</h4>
        <br />
        <a id="learn-more" href="#" class="btn btn-outline-white">Learn More</a>
      </div>
    </div>

    <div class="container">
      <br /><br />

      <div class="row">
        <div class="col-xs-12 text-center">
          <h1>This Card</h1>
          <h4>is your ticket to a whole world of discovery and discussion.</h4>
        </div>
      </div>

      <br /><br /><br /><br />

      <div class="row">
        <div class="col-md-4">
          <div id="myCard2" class="flip-container">
            <div class="flipper">

              <div class="panel panel-default card-front">
                <div class="panel-body" style="background: -webkit-gradient(linear, left top, left bottom, color-stop(25%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.85))), url('img/example.jpg'); background-size: cover; background-position: left top;">
                  <h3 class="text-center card-title">IMDb - Movies, TV and Celebrities - IMDb</h3>
                  <h3 class="text-center card-btn-container">
                    <div class="btn-group btn-group-lg btn-group-justified">
                      <a class="btn btn-success" style="text-shadow: none;" href="#"><i class="fa fa-smile-o fa-lg"></i></a>
                      <a class="btn btn-link">7014</a>
                      <a class="btn btn-danger" style="text-shadow: none;" href="#"><i class="fa fa-frown-o fa-lg"></i></a>
                    </div>
                  </h3>
                  <a onclick="$('#myCard2').toggleClass('flip')" class="btn btn-default btn-lg card-flip"><i class="fa fa-refresh"></i></a>
                </div>
              </div>

              <div class="panel panel-default card-back">
                <div class="panel-body">
                  <a onclick="$('#myCard2').toggleClass('flip')" class="btn btn-default btn-lg card-flip"><i class="fa fa-refresh"></i></a>
                  <div class="panel-tags">
                    <a class="btn btn-orange btn-sm">movies</a>
                    <a class="btn btn-orange btn-sm">television</a>
                    <a class="btn btn-orange btn-sm">celebrities</a>
                    <a class="btn btn-orange btn-sm">imdb</a>
                    <a class="btn btn-orange btn-sm">lists</a>
                  </div>
                  <hr style="margin-top: 10px;" />
                  <a style="display: block; text-align: center;" href="#">All Tags</a>
                  <hr />
                  <p>Who loves the new search function?</p>
                  <a href="#">20 Comments</a>
                  <hr />
                  <p>Not a big fan of the redesign...</p>
                  <a href="#">48 Comments</a>
                  <hr />
                  <a style="display: block; text-align: center;" href="#">All Discussions</a>

                  <h3 class="text-center card-btn-container">
                    <div class="btn-group btn-group-lg btn-group-justified">
                      <a class="btn btn-orange" href="#"><i class="fa fa-tag fa-lg"></i></a>
                      <a class="btn btn-link">ADD</a>
                      <a class="btn btn-orange" href="#"><i class="fa fa-comments fa-lg"></i></a>
                    </div>
                  </h3>
                </div>
              </div>

            </div><!--/.flipper-->
          </div><!--/.flip-container-->
        </div>

        <div class="col-md-1"></div>

        <div class="col-md-7">
          <br />

          <h4><i class="fa fa-smile-o"></i> Rank</h4>
          <p>Tell the world how you feel! Links that have the most positive or negative rankings are the most visible.</p>

          <br /><br />

          <div onmouseenter="$('#myCard2').toggleClass('flip')" onmouseleave="$('#myCard2').toggleClass('flip')">
            <h4><i class="fa fa-refresh"></i> Flip</h4>
            <p>Click the flip button for more information and to engage with this link.</p>

            <br /><br />

            <h4><i class="fa fa-tags"></i> Tag</h4>
            <p>When posting a link, you’ll get tag recommendations based on its content, but you can add your own any time!</p>

            <br /><br />

            <h4><i class="fa fa-comments"></i> Discuss</h4>
            <p>Why did you rank this? Brand rub you the wrong way? Disagree with the article? Deepen your knowledge and connection with disucssions.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row row-orange">
        <div class="col-xs-12 text-center">
          <h1>Make It Yours</h1>
          <h4>Follow your interests; keep tabs on tags, posts and discussions.</h4>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <img class="img-responsive center-block" src="img/saves.png" alt="" />
        </div>
      </div>
        
      <div class="row row-features">
      	<div class="col-xs-12">
      		<h4><i class="fa fa-users"></i> Follow Me!</h4>
      		<p class='tall-lines'>Follow things as broad as tags and as specific as discussions. You'll be kept up to date on everything you follow, ensuring you've always got fresh content to peruse. Recommendations for what else to follow help expand your universe of discussion. Who knows, maybe you'll pick up a new interest on the way!</p>
      	</div>
      </div>
    </div>

    <div class="container-fliud">
      <div class="row row-orange">
        <div class="col-xs-12 text-center">
          <h1>Site Owners</h1>
          <h4>If you own a site posted to FeelRank, claim it and get tons of useful data.</h4>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <img class="img-responsive center-block" src="img/metrics.png" alt="" />
        </div>
      </div>
      
      <div class="row row-features">
      	<div class="col-sm-6">
      		<h4><i class="fa fa-line-chart"></i> Notice Trends</h4>
      		<p class="tall-lines">See your site's rank over time, overlayed with the most engaging discussions (shown above). See what's working and what's not. This single graph is already a wealth of information on someting usually very nebulous--public opinion about your site.</p>
      	</div>
      	
      	<br class="visible-xs" />
      	
      	<div class="col-sm-6">
      		<h4><i class="fa fa-puzzle-piece"></i> Form Relationships</h4>
      		<p class="tall-lines">Get involved in site discussions. You'll be marked as the owner so users know you're listening. The biggest advocates and detractors to your discussions give you targets for reaching out, coupons, anything!</p>
      	</div>
      </div>
    </div><!--/.container-->

    <div class="container-fluid">
      <div class="row row-orange row-bottom">
        <div class="col-xs-12 text-center">
          <div class="container-contact">
            <h1>Let's Discuss and Discover</h1>
            <h4>
              Request an invite to know the second we're ready or contact us at <a href="mailto:hi@feelrank.com">hi@feelrank.com</a>.
            </h4>
            <br />
            <form style="max-width: 50%; margin: 0 auto;">
              <div class="form-group">
                <label for="email" class="sr-only">Email</label>
                <input class="form-control" type="email" name="email" placeholder="Email" />
              </div>
              <button class="btn btn-outline-white" type="submit">Request an Invite</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
  		$('#learn-more').click(function(){
  		    $('html, body').animate({
  		        scrollTop: 600
  		    }, 500);
  		    return false;
  		});
    </script>
  </body>
</html>