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

      .jumbotron-about {
        height: 120px;
        background: url('img/card-background.jpg');
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        color: #ffffff;
        margin-bottom: 0;
        -webkit-box-shadow: inset 0 20px 20px -20px rgba(0,0,0,.4);
        -moz-box-shadow: inset 0 20px 20px -20px rgba(0,0,0,.4);
        box-shadow: inset 0 20px 20px -20px rgba(0,0,0,.4);
      }

      .jumbotron-about .container-fluid img {
        float: left;
        height: 80px;
        margin-top: -30px;
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
      
      .row-detroit {
        background: url('img/detroit-skyline.jpg');
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 400px;
        margin-bottom: 120px;
        margin-top: 0;
        -webkit-box-shadow: inset 0 20px 20px -20px rgba(0,0,0,.4);
        -moz-box-shadow: inset 0 20px 20px -20px rgba(0,0,0,.4);
        box-shadow: inset 0 20px 20px -20px rgba(0,0,0,.4);
      }
      
      .row-detroit .col-xs-12 {
        padding-left: 0;
        padding-right: 0;
      }
      
      .row-detroit h1 {
        background: rgba(250,104,71,.75);
        color: #fff;
        padding: 20px 0;
        width: 100%;
        margin: 0;
        text-align: center;
        letter-spacing: 3px;
        position: relative;
        top: 240px;
        font-weight: bold;
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
        .col-sm-features {
          margin-top: 80px;
        }
        
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

    <div class="jumbotron jumbotron-about text-center">
      <div class="container-fluid">
        <img src="img/feelrank-logo-white.png" alt="FeelRank" />
      </div>
    </div>
    
    <div class="container-fluid">
      <div class="row row-detroit">
        <div class="col-xs-12">
          <h1>PRIDEFULLY MADE IN DETROIT</h1>
        </div>
      </div>
    </div>

    <div class="container">
      <br />
      
      <div class="row">
        <div class="col-sm-5 col-sm-push-7">
          <img class="img-responsive center-block" src="img/connected.jpg" alt="" />
        </div>
        
        <div class="col-sm-1"></div>

        <div class="col-sm-6 col-sm-pull-6">
          <h1 style="margin-top: 0;">Why FeelRank?</h1>
          <p>FeelRank offers a platform for expressing your feelings about any topic that’s got a webpage. Post a link, share your feelings with a simple up or down ranking and tell the world why you feel that way through ever changing discussions. It’s both a fun and informative way to view people’s thoughts on any given topic. Follow the topics, posts and discussions that interest you. Page owners are given access to a post’s ranks over time, so they can see trend data and gain insight into how their favorite subjects, articles, companies—whatever, are perceived by others.</p>
          <br />        
          <h2>Connecting The Web</h2>
          <p>We connect data with emotion: owners with visitors, pages with tags, tags with feelings. This gives the web a better feedback system, makes it more semantic and more easily explorable.</p>
        </div>
      </div>
      
      <br /><br /><br />

      <div class="row well">
        <div class="col-sm-4">
          <img class="img-responsive img-thumbnail center-block" src="img/josh.jpg" alt="" />
        </div>
        
        <div class="col-sm-1"></div>
        
        <div class="col-sm-7">
          <h1>Who's Running This Anyway?</h1>
          <h4>Meet The Founder: Josh Quintal</h4>
          <br /><br />
          <p class="tall-lines">Programming from a young age, Josh started out making basic games and websites with friends in grade school, eventually returning to programming in college driven by entrepreneurial spirit and a desire for self-improvement. "I’m energetic, creative and passionate about how technology can improve our lives." When asked about what makes him uniquely qualified to run a business, Josh remarked "I specialize in making connections where others see none."</p>
        </div>
      </div>
    </div>
    
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