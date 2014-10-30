@extends('layouts.base')

@section('body')
	<div class="jumbotron jumbotron-home">
		<img class="center-block logo-home" src="../img/feelrank-logo-trans.png" alt="FeelRank" />
		<p class="lead">Discuss what you love. Diss what you hate.</p>
		<p><a class="btn btn-lg btn-success" href="/users/create" role="button">Let's Get Started</a></p>
		<p class="jumbotron-small">or <a href="users/login">login</a></p>
	</div>

	<div class="container">
		<div class="row marketing">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="row">
					<h3 class="text-center">Here's the jist:</h3>

					<div class="col-md-4">
						<h1 class="text-center h1-icon"><i class="fa fa-laptop"></i></h1>
						<h4>Post a Link</h4>
						<p>Anywhere. Anything! If it's got a url, it's got a new home on FeelRank.</p>
					</div>

					<div class="col-md-4">
						<h1 class="text-center h1-icon"><i class="fa fa-comment-o"></i></h1>
						<h4>Add Your Thoughts</h4>
						<p>Love it? Hate it? Why? FeelRank is a live collection of your thoughts and feelings.</p>
					</div>

					<div class="col-md-4">
						<h1 class="text-center h1-icon"><i class="fa fa-line-chart"></i></h1>
						<h4>Change Your Mind? Change Your Rank.</h4>
						<p>Maybe that thing wasn't so cool after all--change its rank! Discussions and ranks never stop changing.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

@stop