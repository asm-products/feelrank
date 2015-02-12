<?php namespace FeelRank\Mailers;

class BetaMailer extends Mailer {
	
	public function sendTo(\Beta $user) {
		
		$from = [
			'name' => 'FeelRank',
			'email' => 'hi@feelrank.com'
		];
		$view = 'emails.beta';
		$subject = 'FeelRank Beta';
		
		return $this->send($from, $user, $subject, $view);
		
	}
}