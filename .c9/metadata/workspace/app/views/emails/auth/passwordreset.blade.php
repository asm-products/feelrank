{"filter":false,"title":"passwordreset.blade.php","tooltip":"/app/views/emails/auth/passwordreset.blade.php","undoManager":{"mark":22,"position":22,"stack":[[{"group":"doc","deltas":[{"start":{"row":10,"column":0},"end":{"row":11,"column":0},"action":"insert","lines":["",""]}]}],[{"group":"doc","deltas":[{"start":{"row":11,"column":0},"end":{"row":12,"column":0},"action":"insert","lines":["",""]}]}],[{"group":"doc","deltas":[{"start":{"row":12,"column":0},"end":{"row":13,"column":0},"action":"insert","lines":["",""]}]}],[{"group":"doc","deltas":[{"start":{"row":13,"column":0},"end":{"row":14,"column":0},"action":"insert","lines":["",""]}]}],[{"group":"doc","deltas":[{"start":{"row":14,"column":0},"end":{"row":15,"column":0},"action":"insert","lines":["",""]}]}],[{"group":"doc","deltas":[{"start":{"row":15,"column":0},"end":{"row":16,"column":0},"action":"insert","lines":["",""]}]}],[{"group":"doc","deltas":[{"start":{"row":16,"column":0},"end":{"row":28,"column":26},"action":"insert","lines":["<p style=\"text-align: center;\">{{ HTML::image('img/feelrank-logo-orange.png', 'FeelRank') }}</p>","","<h1>{{ Lang::get('confide::confide.email.account_confirmation.subject') }}</h1>","","<p>{{ Lang::get('confide::confide.email.account_confirmation.greetings', array('name' => $user['username'])) }},</p>","","<p>{{ Lang::get('confide::confide.email.account_confirmation.body') }}</p>","<a href='{{{ URL::to(\"users/confirm/{$user['confirmation_code']}\") }}}'>","    {{{ URL::to(\"users/confirm/{$user['confirmation_code']}\") }}}","</a>","","<p>{{ Lang::get('confide::confide.email.account_confirmation.farewell') }}</p>","<p>- The FeelRank Team</p>"]}]}],[{"group":"doc","deltas":[{"start":{"row":0,"column":0},"end":{"row":1,"column":0},"action":"insert","lines":["",""]}]}],[{"group":"doc","deltas":[{"start":{"row":1,"column":0},"end":{"row":2,"column":0},"action":"insert","lines":["",""]}]}],[{"group":"doc","deltas":[{"start":{"row":0,"column":0},"end":{"row":1,"column":0},"action":"insert","lines":["<p style=\"text-align: center;\">{{ HTML::image('img/feelrank-logo-orange.png', 'FeelRank') }}</p>",""]}]}],[{"group":"doc","deltas":[{"start":{"row":0,"column":96},"end":{"row":1,"column":0},"action":"remove","lines":["",""]}]}],[{"group":"doc","deltas":[{"start":{"row":12,"column":0},"end":{"row":13,"column":0},"action":"remove","lines":["",""]},{"start":{"row":12,"column":0},"end":{"row":12,"column":26},"action":"insert","lines":["<p>- The FeelRank Team</p>"]}]}],[{"group":"doc","deltas":[{"start":{"row":17,"column":0},"end":{"row":29,"column":26},"action":"remove","lines":["<p style=\"text-align: center;\">{{ HTML::image('img/feelrank-logo-orange.png', 'FeelRank') }}</p>","","<h1>{{ Lang::get('confide::confide.email.account_confirmation.subject') }}</h1>","","<p>{{ Lang::get('confide::confide.email.account_confirmation.greetings', array('name' => $user['username'])) }},</p>","","<p>{{ Lang::get('confide::confide.email.account_confirmation.body') }}</p>","<a href='{{{ URL::to(\"users/confirm/{$user['confirmation_code']}\") }}}'>","    {{{ URL::to(\"users/confirm/{$user['confirmation_code']}\") }}}","</a>","","<p>{{ Lang::get('confide::confide.email.account_confirmation.farewell') }}</p>","<p>- The FeelRank Team</p>"]}]}],[{"group":"doc","deltas":[{"start":{"row":16,"column":0},"end":{"row":17,"column":0},"action":"remove","lines":["",""]}]}],[{"group":"doc","deltas":[{"start":{"row":15,"column":0},"end":{"row":16,"column":0},"action":"remove","lines":["",""]}]}],[{"group":"doc","deltas":[{"start":{"row":14,"column":0},"end":{"row":15,"column":0},"action":"remove","lines":["",""]}]}],[{"group":"doc","deltas":[{"start":{"row":13,"column":0},"end":{"row":14,"column":0},"action":"remove","lines":["",""]}]}],[{"group":"doc","deltas":[{"start":{"row":12,"column":26},"end":{"row":13,"column":0},"action":"remove","lines":["",""]}]}],[{"group":"doc","deltas":[{"start":{"row":12,"column":4},"end":{"row":12,"column":5},"action":"remove","lines":[" "]}]}],[{"group":"doc","deltas":[{"start":{"row":12,"column":3},"end":{"row":12,"column":4},"action":"remove","lines":["-"]}]}],[{"group":"doc","deltas":[{"start":{"row":11,"column":72},"end":{"row":11,"column":73},"action":"insert","lines":[","]}]}],[{"group":"doc","deltas":[{"start":{"row":11,"column":72},"end":{"row":11,"column":73},"action":"remove","lines":[","]}]}],[{"group":"doc","deltas":[{"start":{"row":11,"column":68},"end":{"row":11,"column":69},"action":"insert","lines":[","]}]}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":11,"column":69},"end":{"row":11,"column":69},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1420657402456,"hash":"60397901fa9b75ee2105dbf7e4d2411cda558ad6"}