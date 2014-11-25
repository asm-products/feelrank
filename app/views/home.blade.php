@extends('layouts.base')

@section('body')
	<div class="jumbotron jumbotron-home">
		{{ HTML::image('img/feelrank-logo-trans.png', 'FeelRank', ['class' => 'center-block logo-home']) }}
		<p class="lead">How do people feel about ________?</p>
		<p><a id="learn-more" class="btn btn-lg btn-success" href="/users/create" role="button">Learn More</a></p>
	</div>

	<div class="container">
		<div class="row marketing">
			<div class="col-sm-10 col-sm-offset-1">

				<div class="row">
					<div class="col-xs-12">
						<h1 id="intro-text" class="text-center">Rank. Discuss. Discover.</h1>

						<br />

						<p>FeelRank offers a platform for sharing your feelings about any topic that's got a webpage. Post a link, rank it up if you like it and down if you don't, then tell the world why you feel that way through ever changing discussions. Follow the topics, posts and discussions that interest you. It's a fun and informative way to view people's thoughts on just about anything.</p>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12">
						<br />

						<h3 class="text-center">Here's the jist:</h3>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12 text-center">
						<br />
						<h1 class="h1-icon"><i class="fa fa-laptop"></i></h1>
						<h4>Post a Link</h4>
						<p>Anywhere. Anything! If it's got a url, it's got a new home on FeelRank.</p>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12 text-center">
						<br />
						<h1 class="h1-icon"><i class="fa fa-comment-o"></i></h1>
						<h4>Rank and Discuss It</h4>
						<p>Love it? Rank it up. Hate it? Rank it down. Then share why. FeelRank is a live collection of thoughts and feelings.</p>
						<p>Maybe that thing wasn't so cool after all--change its rank! Discussions and ranks never stop changing.</p>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12 text-center">
						<br />
						<h1 class="h1-icon"><i class="fa fa-line-chart"></i></h1>
						<h4>Gain Insight</h4>
						<p>See a post's rank over time, so you can see how feelings have changed.</p>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12 text-center">
						<br />
						<h1 class="h1-icon"><i class="fa fa-binoculars"></i></h1>
						<h4>Discover More</h4>
						<p>Follow posts, discussions and topics to keep track of them. Make FeelRank your own!</p>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12 text-center">
						<br /><br />

						<h3>The Internet's ready to sit down and talk about it, are you?</h3>

						<br />

						<a class="btn btn-lg btn-default" href="/users/create">Give It a Try!</a>
					</div>
				</div>

			</div>
		</div>
	</div>

@stop

@section('more_js')
	<script>
		$('#learn-more').click(function(){
		    $('html, body').animate({
		        scrollTop: $('#intro-text').offset().top - 100
		    }, 500);
		    return false;
		});
	</script>
@stop