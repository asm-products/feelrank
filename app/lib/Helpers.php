<?php

//use FeelRank\Connectors\UrlboxConnector;

class Helpers {
	
	public static function showChildren( $comments )
	{
		if( count( $comments ) > 0 ) :
			foreach( $comments as $comment ) :
				return View::make('partials.comments.child', ['comments' => $comment]);
			endforeach;
		endif;
	}
}