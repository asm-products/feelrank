{"filter":false,"title":"PostsController.php","tooltip":"/app/controllers/PostsController.php","undoManager":{"mark":2,"position":2,"stack":[[{"group":"doc","deltas":[{"start":{"row":8,"column":0},"end":{"row":9,"column":0},"action":"remove","lines":["use FeelRank\\Validators\\FetchValidator;",""]}]}],[{"group":"doc","deltas":[{"start":{"row":69,"column":0},"end":{"row":93,"column":0},"action":"remove","lines":["\tpublic function fetch()","\t{","\t\t$input = Input::all();","","\t\tif (substr($input['url'], 0, 7) !== \"http://\")","\t\t{","\t\t\t$input['url'] = 'http://' . $input['url'];","\t\t}","","\t\ttry","\t\t{","\t\t\t$url_info = $this->PostService->fetch($input);","\t\t}","\t\tcatch (FeelRank\\Validators\\ValidationException $e)","\t\t{","\t\t\treturn Redirect::back()->withInput()->withErrors($e->getErrors());","\t\t}","\t\tcatch (Guzzle\\Http\\Exception\\ClientErrorResponseException $e)","\t\t{","\t\t\treturn Redirect::back()->withInput()->withErrors($e->getMessage());","\t\t}","","\t\treturn View::make('posts.fetch', compact('url_info'));","\t}",""]}]}],[{"group":"doc","deltas":[{"start":{"row":68,"column":0},"end":{"row":69,"column":0},"action":"remove","lines":["",""]}]}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":68,"column":0},"end":{"row":68,"column":0},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1421263689802,"hash":"7bd4dd6716dfd541f8c059395698c8cac67481e8"}