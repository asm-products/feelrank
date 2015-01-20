<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('home');
});

Route::get('/home', function()
{
	$user = Auth::user();

	$tags = $user->followedTags;

	$posts = $user->followedPosts;

	$discussions = $user->followedDiscussions;

	return View::make('dashboard', compact('tags', 'posts', 'discussions'));
});

// Beta Signup
Route::post('betas/signup', 'UsersController@betaSignup');

// Confide routes
Route::get('users/create', 'UsersController@create');
Route::post('users', 'UsersController@store');
Route::get('users/login', 'UsersController@login');
Route::post('users/login', 'UsersController@doLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', 'UsersController@logout');

// Sites
/*Route::group(['prefix' => 'sites'], function()
{
	Route::get('create', 'SitesController@create');	
	Route::post('create', 'SitesController@store');	
	Route::post('create2', 'SitesController@store2');
	Route::get('list', 'SitesController@show');
});*/

// User edit profile
Route::get('users/update', 'UsersController@update');
Route::post('users/update', 'UsersController@doUpdate');

// Posts
Route::post('posts/fetch', ['uses' => 'PostsController@fetch']);
Route::get('posts/mostrank', ['uses' => 'PostsController@mostRank']);
Route::get('posts/leastrank', ['uses' => 'PostsController@leastRank']);
Route::get('posts/mostdiscussions', ['uses' => 'PostsController@mostDiscussions']);
Route::get('posts/leastdiscussions', ['uses' => 'PostsController@leastDiscussions']);
Route::get('posts/mostrecent', ['uses' => 'PostsController@mostRecent']);
Route::get('posts/leastrecent', ['uses' => 'PostsController@leastRecent']);
Route::get('posts/{id}/follow', ['uses' => 'PostsController@follow']);
Route::get('posts/{id}/unfollow', ['uses' => 'PostsController@unfollow']);

Route::get('users/{id}/posts', ['uses' => 'PostsController@userPosts']);

Route::get('posts/{id}/ranks/up', ['uses' => 'RanksController@uprank_post']);
Route::get('posts/{id}/ranks/down', ['uses' => 'RanksController@downrank_post']);

Route::post('posts/store2', ['uses' => 'PostsController@store2']);

Route::get('posts/{id}/claim', ['uses' => 'PostsController@claim']);

Route::resource('posts', 'PostsController');

// Tags
Route::get('tags/search', ['uses' => 'TagsController@search']);
Route::post('tags/search', ['uses' => 'TagsController@doSearch']);
Route::get('tags/{id}', ['uses' => 'TagsController@taggedPost']);
Route::get('tags/{id}/follow', ['uses' => 'TagsController@follow']);
Route::get('tags/{id}/unfollow', ['uses' => 'TagsController@unfollow']);
Route::get('tags/{id}/get', ['uses' => 'TagsController@getTaggedPosts']);
Route::post('tags/add', ['uses' => 'TagsController@addTags']);
Route::get('tags', ['uses' => 'TagsController@taggedPosts']);

// Post History
Route::get('posts/{id}/history', ['uses' => 'PostsController@get_history']);

// Upranks
Route::get('/{id}/upranks/store', ['uses' => 'UpranksController@store']);
Route::get('users/{id}/upranks', ['uses' => 'UpranksController@userUpranks']);

// Downranks
Route::get('/{id}/downranks/store', ['uses' => 'DownranksController@store']);
Route::get('users/{id}/downranks', ['uses' => 'DownranksController@userDownranks']);

// Discussions
Route::post('discussions/store', ['uses' => 'DiscussionsController@store']);
Route::get('discussions/{id}/ranks/up', ['uses' => 'RanksController@uprank_discussion']);
Route::get('discussions/{id}/ranks/down', ['uses' => 'RanksController@downrank_discussion']);
Route::get('discussions/{id}', ['uses' => 'DiscussionsController@show']);
Route::get('users/{id}/discussions', ['uses' => 'DiscussionsController@userDiscussions']);
Route::get('discussions/{id}/follow', ['uses' => 'DiscussionsController@follow']);
Route::get('discussions/{id}/unfollow', ['uses' => 'DiscussionsController@unfollow']);


// Comments
Route::post('{id}/comments/store', ['uses' => 'CommentsController@store']);
Route::get('comments/{id}/replies', ['uses' => 'CommentsController@show_replies']);
Route::get('users/{id}/comments', ['uses' => 'CommentsController@userComments']);

Route::get('comments/{id}/ranks/up', ['uses' => 'RanksController@uprank_comment']);
Route::get('comments/{id}/ranks/down', ['uses' => 'RanksController@downrank_comment']);

Route::get('discussions/{discussion_id}/comments/{comment_id}/create', ['uses' => 'CommentsController@create_reply']);
Route::post('discussions/{discussion_id}/comments/{comment_id}/store', ['uses' => 'CommentsController@store_reply']);

// Owner Dashboard
Route::get('owned', function() {
	$source = Auth::user()->ownedSources->first();
	$posts = $source->posts;
	
	return View::make('ownership.dashboard', compact('source', 'posts'));
});

// UTILITY

Route::get('utils/transformtags', function() {
	$tags = Tag::all();
	
    $symbols = ["+",",",".","'","\"","&","!","?",":",";","#","~","=","/","$","£","^","(",")","_","<",">","*","@","%","[","]","{","}","|","-"];
	
	foreach ($tags as $tag)
	{
		$tag_name = $tag->name;
		
		$tag->name = str_replace($symbols, '', str_replace(' ', '', strtolower($tag_name)));
		
		$tag->save();
	}
	
	return 'Success!';
});

/*Route::get('utils/getthumbnails', function() {
	$posts = Post::all();
	
	$corrector = new FeelRank\Connectors\UrlboxConnector;
	
	foreach ($posts as $post)
	{
		$dirname = dirname('img/' . $post->id . '/thumbnail.png');
			
		if (!is_dir($dirname))
		{
		    mkdir($dirname, 0755, true);
		}
		
		$ch = curl_init($corrector->getImg($post->url));
		$fp = fopen('img/' . $post->id . '/thumbnail.png', 'wb');
		curl_setopt($ch, CURLOPT_FILE, $fp);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_exec($ch);
		curl_close($ch);
		fclose($fp);
	}
	
	return "Success!";
});

Route::get('utils/createowner', function() {
	$owner = new Role;
	$owner->name = 'Owner';
	$owner->save();
	
	if (Role::where('name', '=', 'Owner')->first())
	{
		return "Success!";
	}
	
	return "Failure...";
});

Route::get('utils/updatesources', function() {
	//$posts = ['http://stackoverflow.com/questions/3211411/how-can-i-get-the-base-domain-name-from-a-url-using-php-eg-google-com-from-ima', 'https://www.evernote.com/Home.action?__fp=suwWrJjEFtA3yWPvuidLz-TPR6I9Jhx8&username=joshquin%40gmail.com&login=true&_sourcePage=c4xb_dd2IGziMUD9T65RG_YvRLZ-1eYO3fqfqRu0fynRL_1nukNa4gH1t86pc1SP#b=945008e5-4166-4dba-a6fb-50eb4a88f1db&st=p&n=75d7a1af-a62c-44f1-94a5-970ff196420b', 'http://www.cnn.com/', 'http://wine.woot.com/plus/senders-wines?ref=cnt_wp_1', 'https://ide.c9.io/viciousambitious/feelrank'];
	
	$posts = Post::all();
	
	foreach ($posts as $post)
	{
		$urlMap = array('com', 'co.uk', 'co', 'io', 'org', 'net', 'gov', 'edu');

		$host = "";
		$url = urldecode($post->url);
		
		$urlData = parse_url($url);
		$hostData = explode('.', $urlData['host']);
		$hostData = array_reverse($hostData);
		
		if(array_search($hostData[1] . '.' . $hostData[0], $urlMap) !== FALSE) {
		  $host = $hostData[2] . '.' . $hostData[1] . '.' . $hostData[0];
		} elseif(array_search($hostData[0], $urlMap) !== FALSE) {
		  $host = $hostData[1] . '.' . $hostData[0];
		}
		
		$post->source = $host;
		$post->save();
	}
	
	return 'Successfully updated sources!';
});

Route::get('utils/convertsources', function() {
	$posts = Post::all();
	
	foreach ($posts as $post)
	{
		$post_source = $post->source;
		
		$source = Source::where('name', '=', $post_source)->first();
		
		if ($source == null)
		{
			$source = new Source();
			
			$source->name = $post_source;
			
			$source->save();
			
			$post->source_id = $source->id;
			
			$post->save();
		}
		else
		{
			$post->source_id = $source->id;
			
			$post->save();
		}
	}
	
	return "Success!";
});

Route::get('utils/singlesource', function() {

	$url = 'http://en.wikipedia.org/wiki/Thomas_Jefferson';
	
	$urlMap = array('com', 'co.uk', 'co', 'io', 'org', 'net', 'gov', 'edu');

	$host = "";

	$urlData = parse_url($url);
	$hostData = explode('.', $urlData['host']);
	$hostData = array_reverse($hostData);
	
	if(array_search($hostData[1] . '.' . $hostData[0], $urlMap) !== FALSE) {
	  $host = $hostData[2] . '.' . $hostData[1] . '.' . $hostData[0];
	} elseif(array_search($hostData[0], $urlMap) !== FALSE) {
	  $host = $hostData[1] . '.' . $hostData[0];
	}
		
	return $host;
});*/