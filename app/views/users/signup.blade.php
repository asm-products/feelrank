@extends('layouts.base')

@section('body')
    <div class="container container-content">

      <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">

          <h1 class="text-center">You'll Love It Here</h1>
          
          <br />

        <form method="POST" action="{{{ URL::to('users') }}}" accept-charset="UTF-8">
            <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
                <div class="form-group">
                    <label class="sr-only" for="username">{{{ Lang::get('confide::confide.username') }}}</label class="sr-only">
                    <input class="form-control" placeholder="{{{ Lang::get('confide::confide.username') }}}" type="text" name="username" id="username" value="{{{ Input::old('username') }}}">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="email">{{{ Lang::get('confide::confide.e_mail') }}} <small>{{ Lang::get('confide::confide.signup.confirmation_required') }}</small></label class="sr-only">
                    <input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="password">{{{ Lang::get('confide::confide.password') }}}</label class="sr-only">
                    <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="password_confirmation">{{{ Lang::get('confide::confide.password_confirmation') }}}</label class="sr-only">
                    <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}" type="password" name="password_confirmation" id="password_confirmation">
                </div>

                <br />

              <button type="submit" class="btn btn-default">Sign Up</button>
        </form>

          <br />

          <p class="text-center">Already a member? <a href="/users/login">Login!</a>

        </div>
      </div>

    </div> <!-- /container -->
@stop