<?php namespace FeelRank\Mailers;

use Mail;

abstract class Mailer {
	
	public function send($from, $user, $subject, $view, $data = []) {
		
		Mail::send($view, $data, function($message) use($from, $user, $subject) {
			
			$message->from($from['email'], $from['name'])
					->to($user->email)
					->subject($subject);
		});
	}
}