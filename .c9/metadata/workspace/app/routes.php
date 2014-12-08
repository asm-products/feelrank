{"filter":false,"title":"routes.php","tooltip":"/app/routes.php","undoManager":{"mark":100,"position":100,"stack":[[{"group":"doc","deltas":[{"start":{"row":72,"column":40},"end":{"row":72,"column":41},"action":"insert","lines":["t"]}]}],[{"group":"doc","deltas":[{"start":{"row":72,"column":41},"end":{"row":72,"column":42},"action":"insert","lines":["e"]}]}],[{"group":"doc","deltas":[{"start":{"row":72,"column":42},"end":{"row":72,"column":43},"action":"insert","lines":["s"]}]}],[{"group":"doc","deltas":[{"start":{"row":72,"column":42},"end":{"row":72,"column":43},"action":"remove","lines":["s"]}]}],[{"group":"doc","deltas":[{"start":{"row":72,"column":41},"end":{"row":72,"column":42},"action":"remove","lines":["e"]}]}],[{"group":"doc","deltas":[{"start":{"row":72,"column":40},"end":{"row":72,"column":41},"action":"remove","lines":["t"]}]}],[{"group":"doc","deltas":[{"start":{"row":72,"column":39},"end":{"row":72,"column":40},"action":"remove","lines":["i"]}]}],[{"group":"doc","deltas":[{"start":{"row":72,"column":39},"end":{"row":72,"column":40},"action":"insert","lines":["S"]}]}],[{"group":"doc","deltas":[{"start":{"row":72,"column":40},"end":{"row":72,"column":41},"action":"insert","lines":["I"]}]}],[{"group":"doc","deltas":[{"start":{"row":72,"column":41},"end":{"row":72,"column":42},"action":"insert","lines":["t"]}]}],[{"group":"doc","deltas":[{"start":{"row":72,"column":42},"end":{"row":72,"column":43},"action":"insert","lines":["e"]}]}],[{"group":"doc","deltas":[{"start":{"row":72,"column":43},"end":{"row":72,"column":44},"action":"insert","lines":["s"]}]}],[{"group":"doc","deltas":[{"start":{"row":72,"column":43},"end":{"row":72,"column":44},"action":"remove","lines":["s"]}]}],[{"group":"doc","deltas":[{"start":{"row":72,"column":42},"end":{"row":72,"column":43},"action":"remove","lines":["e"]}]}],[{"group":"doc","deltas":[{"start":{"row":72,"column":41},"end":{"row":72,"column":42},"action":"remove","lines":["t"]}]}],[{"group":"doc","deltas":[{"start":{"row":72,"column":40},"end":{"row":72,"column":41},"action":"remove","lines":["I"]}]}],[{"group":"doc","deltas":[{"start":{"row":72,"column":40},"end":{"row":72,"column":41},"action":"insert","lines":["i"]}]}],[{"group":"doc","deltas":[{"start":{"row":72,"column":41},"end":{"row":72,"column":42},"action":"insert","lines":["t"]}]}],[{"group":"doc","deltas":[{"start":{"row":72,"column":42},"end":{"row":72,"column":43},"action":"insert","lines":["e"]}]}],[{"group":"doc","deltas":[{"start":{"row":72,"column":43},"end":{"row":72,"column":44},"action":"insert","lines":["s"]}]}],[{"group":"doc","deltas":[{"start":{"row":72,"column":44},"end":{"row":72,"column":45},"action":"insert","lines":["C"]}]}],[{"group":"doc","deltas":[{"start":{"row":72,"column":39},"end":{"row":72,"column":45},"action":"remove","lines":["SitesC"]},{"start":{"row":72,"column":39},"end":{"row":72,"column":54},"action":"insert","lines":["SitesController"]}]}],[{"group":"doc","deltas":[{"start":{"row":72,"column":54},"end":{"row":72,"column":55},"action":"insert","lines":["@"]}]}],[{"group":"doc","deltas":[{"start":{"row":72,"column":55},"end":{"row":72,"column":56},"action":"insert","lines":["c"]}]}],[{"group":"doc","deltas":[{"start":{"row":72,"column":56},"end":{"row":72,"column":57},"action":"insert","lines":["r"]}]}],[{"group":"doc","deltas":[{"start":{"row":72,"column":57},"end":{"row":72,"column":58},"action":"insert","lines":["e"]}]}],[{"group":"doc","deltas":[{"start":{"row":72,"column":58},"end":{"row":72,"column":59},"action":"insert","lines":["a"]}]}],[{"group":"doc","deltas":[{"start":{"row":72,"column":59},"end":{"row":72,"column":60},"action":"insert","lines":["t"]}]}],[{"group":"doc","deltas":[{"start":{"row":72,"column":60},"end":{"row":72,"column":61},"action":"insert","lines":["e"]}]}],[{"group":"doc","deltas":[{"start":{"row":72,"column":64},"end":{"row":72,"column":65},"action":"insert","lines":[";"]}]}],[{"group":"doc","deltas":[{"start":{"row":72,"column":0},"end":{"row":73,"column":0},"action":"remove","lines":["Route::get('posts/create', ['uses' => 'SitesController@create']);",""]}]}],[{"group":"doc","deltas":[{"start":{"row":71,"column":0},"end":{"row":72,"column":0},"action":"remove","lines":["",""]}]}],[{"group":"doc","deltas":[{"start":{"row":125,"column":33},"end":{"row":126,"column":0},"action":"insert","lines":["",""]},{"start":{"row":126,"column":0},"end":{"row":126,"column":2},"action":"insert","lines":["\t\t"]}]}],[{"group":"doc","deltas":[{"start":{"row":126,"column":2},"end":{"row":127,"column":0},"action":"insert","lines":["",""]},{"start":{"row":127,"column":0},"end":{"row":127,"column":2},"action":"insert","lines":["\t\t"]}]}],[{"group":"doc","deltas":[{"start":{"row":127,"column":2},"end":{"row":141,"column":0},"action":"insert","lines":["\t\t$dirname = dirname('img/' . $site->id . '/thumbnail.png');","\t\t\t","\t\tif (!is_dir($dirname))","\t\t{","\t\t    mkdir($dirname, 0755, true);","\t\t}","\t\t","\t\t$ch = curl_init($this->UrlboxConnector->getImg($input['url']));","\t\t$fp = fopen('img/' . $site->id . '/thumbnail.png', 'wb');","\t\tcurl_setopt($ch, CURLOPT_FILE, $fp);","\t\tcurl_setopt($ch, CURLOPT_HEADER, 0);","\t\tcurl_exec($ch);","\t\tcurl_close($ch);","\t\tfclose($fp);",""]}]}],[{"group":"doc","deltas":[{"start":{"row":127,"column":3},"end":{"row":127,"column":4},"action":"remove","lines":["\t"]}]}],[{"group":"doc","deltas":[{"start":{"row":127,"column":2},"end":{"row":127,"column":3},"action":"remove","lines":["\t"]}]}],[{"group":"doc","deltas":[{"start":{"row":127,"column":30},"end":{"row":127,"column":35},"action":"remove","lines":["$site"]},{"start":{"row":127,"column":30},"end":{"row":127,"column":31},"action":"insert","lines":["$"]}]}],[{"group":"doc","deltas":[{"start":{"row":127,"column":31},"end":{"row":127,"column":32},"action":"insert","lines":["p"]}]}],[{"group":"doc","deltas":[{"start":{"row":127,"column":32},"end":{"row":127,"column":33},"action":"insert","lines":["o"]}]}],[{"group":"doc","deltas":[{"start":{"row":127,"column":33},"end":{"row":127,"column":34},"action":"insert","lines":["s"]}]}],[{"group":"doc","deltas":[{"start":{"row":127,"column":34},"end":{"row":127,"column":35},"action":"insert","lines":["t"]}]}],[{"group":"doc","deltas":[{"start":{"row":135,"column":23},"end":{"row":135,"column":28},"action":"remove","lines":["$site"]},{"start":{"row":135,"column":23},"end":{"row":135,"column":24},"action":"insert","lines":["$"]}]}],[{"group":"doc","deltas":[{"start":{"row":135,"column":24},"end":{"row":135,"column":25},"action":"insert","lines":["p"]}]}],[{"group":"doc","deltas":[{"start":{"row":135,"column":25},"end":{"row":135,"column":26},"action":"insert","lines":["o"]}]}],[{"group":"doc","deltas":[{"start":{"row":135,"column":26},"end":{"row":135,"column":27},"action":"insert","lines":["s"]}]}],[{"group":"doc","deltas":[{"start":{"row":135,"column":27},"end":{"row":135,"column":28},"action":"insert","lines":["t"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":19},"end":{"row":134,"column":40},"action":"remove","lines":["this->UrlboxConnector"]},{"start":{"row":134,"column":19},"end":{"row":134,"column":20},"action":"insert","lines":["c"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":20},"end":{"row":134,"column":21},"action":"insert","lines":["o"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":21},"end":{"row":134,"column":22},"action":"insert","lines":["r"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":22},"end":{"row":134,"column":23},"action":"insert","lines":["r"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":23},"end":{"row":134,"column":24},"action":"insert","lines":["e"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":18},"end":{"row":134,"column":24},"action":"remove","lines":["$corre"]},{"start":{"row":134,"column":18},"end":{"row":134,"column":28},"action":"insert","lines":["$corrector"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":50},"end":{"row":134,"column":51},"action":"remove","lines":[")"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":49},"end":{"row":134,"column":50},"action":"remove","lines":["]"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":48},"end":{"row":134,"column":49},"action":"remove","lines":["'"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":47},"end":{"row":134,"column":48},"action":"remove","lines":["l"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":46},"end":{"row":134,"column":47},"action":"remove","lines":["r"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":45},"end":{"row":134,"column":46},"action":"remove","lines":["u"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":44},"end":{"row":134,"column":45},"action":"remove","lines":["'"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":43},"end":{"row":134,"column":44},"action":"remove","lines":["["]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":42},"end":{"row":134,"column":43},"action":"remove","lines":["t"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":41},"end":{"row":134,"column":42},"action":"remove","lines":["u"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":40},"end":{"row":134,"column":41},"action":"remove","lines":["p"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":39},"end":{"row":134,"column":40},"action":"remove","lines":["n"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":38},"end":{"row":134,"column":39},"action":"remove","lines":["i"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":37},"end":{"row":134,"column":38},"action":"remove","lines":["$"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":36},"end":{"row":134,"column":38},"action":"remove","lines":["()"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":35},"end":{"row":134,"column":36},"action":"remove","lines":["g"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":34},"end":{"row":134,"column":35},"action":"remove","lines":["m"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":33},"end":{"row":134,"column":34},"action":"remove","lines":["I"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":33},"end":{"row":134,"column":34},"action":"insert","lines":["I"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":34},"end":{"row":134,"column":35},"action":"insert","lines":["m"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":35},"end":{"row":134,"column":36},"action":"insert","lines":["g"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":36},"end":{"row":134,"column":38},"action":"insert","lines":["()"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":37},"end":{"row":134,"column":38},"action":"insert","lines":["$"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":38},"end":{"row":134,"column":39},"action":"insert","lines":["s"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":39},"end":{"row":134,"column":40},"action":"insert","lines":["i"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":40},"end":{"row":134,"column":41},"action":"insert","lines":["t"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":41},"end":{"row":134,"column":42},"action":"insert","lines":["e"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":42},"end":{"row":134,"column":43},"action":"insert","lines":["-"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":43},"end":{"row":134,"column":44},"action":"insert","lines":[">"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":43},"end":{"row":134,"column":44},"action":"remove","lines":[">"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":42},"end":{"row":134,"column":43},"action":"remove","lines":["-"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":41},"end":{"row":134,"column":42},"action":"remove","lines":["e"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":40},"end":{"row":134,"column":41},"action":"remove","lines":["t"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":39},"end":{"row":134,"column":40},"action":"remove","lines":["i"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":38},"end":{"row":134,"column":39},"action":"remove","lines":["s"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":38},"end":{"row":134,"column":39},"action":"insert","lines":["p"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":39},"end":{"row":134,"column":40},"action":"insert","lines":["o"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":40},"end":{"row":134,"column":41},"action":"insert","lines":["s"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":41},"end":{"row":134,"column":42},"action":"insert","lines":["t"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":42},"end":{"row":134,"column":43},"action":"insert","lines":["-"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":43},"end":{"row":134,"column":44},"action":"insert","lines":[">"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":44},"end":{"row":134,"column":45},"action":"insert","lines":["u"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":45},"end":{"row":134,"column":46},"action":"insert","lines":["r"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":46},"end":{"row":134,"column":47},"action":"insert","lines":["l"]}]}],[{"group":"doc","deltas":[{"start":{"row":134,"column":48},"end":{"row":134,"column":49},"action":"insert","lines":[")"]}]}],[{"group":"doc","deltas":[{"start":{"row":125,"column":0},"end":{"row":126,"column":2},"action":"remove","lines":["\t\t$corrector->getImg($post->url);","\t\t"]}]}],[{"group":"doc","deltas":[{"start":{"row":124,"column":2},"end":{"row":125,"column":0},"action":"remove","lines":["",""]}]}],[{"group":"doc","deltas":[{"start":{"row":138,"column":14},"end":{"row":139,"column":0},"action":"remove","lines":["",""]}]}]]},"ace":{"folds":[],"scrolltop":1560,"scrollleft":0,"selection":{"start":{"row":142,"column":3},"end":{"row":142,"column":3},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":14,"state":"php-start","mode":"ace/mode/php"}},"timestamp":1418011363468,"hash":"e0b8e772d5fd0ca5cb0ba23fa191a550ec371793"}