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

Route::get('users/{id}/posts', ['uses' => 'PostsController@userPosts']);

Route::get('posts/{id}/ranks/up', ['uses' => 'RanksController@uprank_post']);
Route::get('posts/{id}/ranks/down', ['uses' => 'RanksController@downrank_post']);

Route::resource('posts', 'PostsController');

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

// Comments
Route::post('{id}/comments/store', ['uses' => 'CommentsController@store']);
Route::get('comments/{id}/replies', ['uses' => 'CommentsController@show_replies']);
Route::get('users/{id}/comments', ['uses' => 'CommentsController@userComments']);

Route::get('comments/{id}/ranks/up', ['uses' => 'RanksController@uprank_comment']);
Route::get('comments/{id}/ranks/down', ['uses' => 'RanksController@downrank_comment']);

Route::get('discussions/{discussion_id}/comments/{comment_id}/create', ['uses' => 'CommentsController@create_reply']);
Route::post('discussions/{discussion_id}/comments/{comment_id}/store', ['uses' => 'CommentsController@store_reply']);