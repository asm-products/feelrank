{"filter":false,"title":"forgot_password.blade.php","tooltip":"/vendor/zizaco/confide/src/views/forgot_password.blade.php","undoManager":{"mark":0,"position":0,"stack":[[{"group":"doc","deltas":[{"start":{"row":0,"column":0},"end":{"row":21,"column":0},"action":"remove","lines":["<form method=\"POST\" action=\"{{ URL::to('/users/forgot_password') }}\" accept-charset=\"UTF-8\">","    <input type=\"hidden\" name=\"_token\" value=\"{{{ Session::getToken() }}}\">","","    <div class=\"form-group\">","        <label for=\"email\">{{{ Lang::get('confide::confide.e_mail') }}}</label>","        <div class=\"input-append input-group\">","            <input class=\"form-control\" placeholder=\"{{{ Lang::get('confide::confide.e_mail') }}}\" type=\"text\" name=\"email\" id=\"email\" value=\"{{{ Input::old('email') }}}\">","            <span class=\"input-group-btn\">","                <input class=\"btn btn-default\" type=\"submit\" value=\"{{{ Lang::get('confide::confide.forgot.submit') }}}\">","            </span>","        </div>","    </div>","","    @if (Session::get('error'))","        <div class=\"alert alert-error alert-danger\">{{{ Session::get('error') }}}</div>","    @endif","","    @if (Session::get('notice'))","        <div class=\"alert\">{{{ Session::get('notice') }}}</div>","    @endif","</form>",""]},{"start":{"row":0,"column":0},"end":{"row":39,"column":5},"action":"insert","lines":["@extends('layouts.base')","","@section('body')","    <div class=\"container container-content\">","","      <div class=\"row\">","        <div class=\"col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4\">","","          <h1 class=\"text-center\">Accidents Happen</h1>","          ","          <br />","","            <form method=\"POST\" action=\"{{ URL::to('/users/forgot_password') }}\" accept-charset=\"UTF-8\">","                <input type=\"hidden\" name=\"_token\" value=\"{{{ Session::getToken() }}}\">","","                <div class=\"form-group\">","                    <label for=\"email\" class=\"sr-only\">{{{ Lang::get('confide::confide.e_mail') }}}</label>","                    <input class=\"form-control\" placeholder=\"{{{ Lang::get('confide::confide.e_mail') }}}\" type=\"text\" name=\"email\" id=\"email\" value=\"{{{ Input::old('email') }}}\">","                </div>","","                <input class=\"btn btn-default\" type=\"submit\" value=\"{{{ Lang::get('confide::confide.forgot.submit') }}}\">","","                @if (Session::get('error'))","                    <div class=\"alert alert-error alert-danger\">{{{ Session::get('error') }}}</div>","                @endif","","                @if (Session::get('notice'))","                    <div class=\"alert\">{{{ Session::get('notice') }}}</div>","                @endif","            </form>","","          <br />","","          <p class=\"text-center\">Remember it now? <a href=\"/users/login\">Login!</a>","","        </div>","      </div>","","    </div> <!-- /container -->","@stop"]}]}]]},"ace":{"folds":[],"scrolltop":36,"scrollleft":0,"selection":{"start":{"row":39,"column":5},"end":{"row":39,"column":5},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":1,"state":"start","mode":"ace/mode/php"}},"timestamp":1419222223651,"hash":"04fcdd294d83c88888bb6ad162631dc64ab50356"}