{"filter":false,"title":"2015_01_05_012321_create_table_source_user.php","tooltip":"/app/database/migrations/2015_01_05_012321_create_table_source_user.php","undoManager":{"mark":46,"position":46,"stack":[[{"group":"doc","deltas":[{"start":{"row":16,"column":0},"end":{"row":18,"column":0},"action":"remove","lines":["\t\t\t$table->increments('id');","\t\t\t$table->timestamps();",""]},{"start":{"row":16,"column":0},"end":{"row":21,"column":0},"action":"insert","lines":["\t\t\t$table->bigInteger('post_id');","\t\t\t$table->foreign('post_id')->references('id')->on('posts');","\t\t\t$table->integer('user_id')->unsigned();","\t\t\t$table->foreign('user_id')->references('id')->on('users');","\t\t\t$table->timestamps();",""]}]}],[{"group":"doc","deltas":[{"start":{"row":17,"column":23},"end":{"row":17,"column":24},"action":"remove","lines":["t"]}]}],[{"group":"doc","deltas":[{"start":{"row":17,"column":22},"end":{"row":17,"column":23},"action":"remove","lines":["s"]}]}],[{"group":"doc","deltas":[{"start":{"row":17,"column":21},"end":{"row":17,"column":22},"action":"remove","lines":["o"]}]}],[{"group":"doc","deltas":[{"start":{"row":17,"column":20},"end":{"row":17,"column":21},"action":"remove","lines":["p"]}]}],[{"group":"doc","deltas":[{"start":{"row":17,"column":20},"end":{"row":17,"column":21},"action":"insert","lines":["s"]}]}],[{"group":"doc","deltas":[{"start":{"row":17,"column":21},"end":{"row":17,"column":22},"action":"insert","lines":["o"]}]}],[{"group":"doc","deltas":[{"start":{"row":17,"column":22},"end":{"row":17,"column":23},"action":"insert","lines":["u"]}]}],[{"group":"doc","deltas":[{"start":{"row":17,"column":23},"end":{"row":17,"column":24},"action":"insert","lines":["r"]}]}],[{"group":"doc","deltas":[{"start":{"row":17,"column":24},"end":{"row":17,"column":25},"action":"insert","lines":["c"]}]}],[{"group":"doc","deltas":[{"start":{"row":17,"column":25},"end":{"row":17,"column":26},"action":"insert","lines":["e"]}]}],[{"group":"doc","deltas":[{"start":{"row":16,"column":26},"end":{"row":16,"column":27},"action":"remove","lines":["t"]}]}],[{"group":"doc","deltas":[{"start":{"row":16,"column":25},"end":{"row":16,"column":26},"action":"remove","lines":["s"]}]}],[{"group":"doc","deltas":[{"start":{"row":16,"column":24},"end":{"row":16,"column":25},"action":"remove","lines":["o"]}]}],[{"group":"doc","deltas":[{"start":{"row":16,"column":23},"end":{"row":16,"column":24},"action":"remove","lines":["p"]}]}],[{"group":"doc","deltas":[{"start":{"row":16,"column":23},"end":{"row":16,"column":24},"action":"insert","lines":["s"]}]}],[{"group":"doc","deltas":[{"start":{"row":16,"column":24},"end":{"row":16,"column":25},"action":"insert","lines":["o"]}]}],[{"group":"doc","deltas":[{"start":{"row":16,"column":25},"end":{"row":16,"column":26},"action":"insert","lines":["u"]}]}],[{"group":"doc","deltas":[{"start":{"row":16,"column":26},"end":{"row":16,"column":27},"action":"insert","lines":["r"]}]}],[{"group":"doc","deltas":[{"start":{"row":16,"column":27},"end":{"row":16,"column":28},"action":"insert","lines":["c"]}]}],[{"group":"doc","deltas":[{"start":{"row":16,"column":28},"end":{"row":16,"column":29},"action":"insert","lines":["e"]}]}],[{"group":"doc","deltas":[{"start":{"row":17,"column":58},"end":{"row":17,"column":59},"action":"remove","lines":["t"]}]}],[{"group":"doc","deltas":[{"start":{"row":17,"column":57},"end":{"row":17,"column":58},"action":"remove","lines":["s"]}]}],[{"group":"doc","deltas":[{"start":{"row":17,"column":56},"end":{"row":17,"column":57},"action":"remove","lines":["o"]}]}],[{"group":"doc","deltas":[{"start":{"row":17,"column":55},"end":{"row":17,"column":56},"action":"remove","lines":["p"]}]}],[{"group":"doc","deltas":[{"start":{"row":17,"column":55},"end":{"row":17,"column":56},"action":"insert","lines":["s"]}]}],[{"group":"doc","deltas":[{"start":{"row":17,"column":56},"end":{"row":17,"column":57},"action":"insert","lines":["o"]}]}],[{"group":"doc","deltas":[{"start":{"row":17,"column":57},"end":{"row":17,"column":58},"action":"insert","lines":["u"]}]}],[{"group":"doc","deltas":[{"start":{"row":17,"column":58},"end":{"row":17,"column":59},"action":"insert","lines":["r"]}]}],[{"group":"doc","deltas":[{"start":{"row":17,"column":59},"end":{"row":17,"column":60},"action":"insert","lines":["c"]}]}],[{"group":"doc","deltas":[{"start":{"row":17,"column":60},"end":{"row":17,"column":61},"action":"insert","lines":["e"]}]}],[{"group":"doc","deltas":[{"start":{"row":16,"column":14},"end":{"row":16,"column":15},"action":"remove","lines":["I"]}]}],[{"group":"doc","deltas":[{"start":{"row":16,"column":13},"end":{"row":16,"column":14},"action":"remove","lines":["g"]}]}],[{"group":"doc","deltas":[{"start":{"row":16,"column":12},"end":{"row":16,"column":13},"action":"remove","lines":["i"]}]}],[{"group":"doc","deltas":[{"start":{"row":16,"column":11},"end":{"row":16,"column":12},"action":"remove","lines":["b"]}]}],[{"group":"doc","deltas":[{"start":{"row":16,"column":11},"end":{"row":16,"column":12},"action":"insert","lines":["i"]}]}],[{"group":"doc","deltas":[{"start":{"row":16,"column":31},"end":{"row":16,"column":32},"action":"insert","lines":["-"]}]}],[{"group":"doc","deltas":[{"start":{"row":16,"column":32},"end":{"row":16,"column":33},"action":"insert","lines":[">"]}]}],[{"group":"doc","deltas":[{"start":{"row":16,"column":33},"end":{"row":16,"column":34},"action":"insert","lines":["u"]}]}],[{"group":"doc","deltas":[{"start":{"row":16,"column":34},"end":{"row":16,"column":35},"action":"insert","lines":["n"]}]}],[{"group":"doc","deltas":[{"start":{"row":16,"column":35},"end":{"row":16,"column":36},"action":"insert","lines":["s"]}]}],[{"group":"doc","deltas":[{"start":{"row":16,"column":36},"end":{"row":16,"column":37},"action":"insert","lines":["i"]}]}],[{"group":"doc","deltas":[{"start":{"row":16,"column":37},"end":{"row":16,"column":38},"action":"insert","lines":["g"]}]}],[{"group":"doc","deltas":[{"start":{"row":16,"column":38},"end":{"row":16,"column":39},"action":"insert","lines":["n"]}]}],[{"group":"doc","deltas":[{"start":{"row":16,"column":39},"end":{"row":16,"column":40},"action":"insert","lines":["e"]}]}],[{"group":"doc","deltas":[{"start":{"row":16,"column":40},"end":{"row":16,"column":41},"action":"insert","lines":["d"]}]}],[{"group":"doc","deltas":[{"start":{"row":16,"column":41},"end":{"row":16,"column":43},"action":"insert","lines":["()"]}]}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":16,"column":44},"end":{"row":16,"column":44},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":188,"mode":"ace/mode/php"}},"timestamp":1420421062818,"hash":"1720c7d4d8cb1fb7225e7c9bf6e6c8d6c18098f2"}