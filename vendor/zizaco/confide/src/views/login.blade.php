@extends('layouts.base')

@section('body')
    <div class="container container-content">

      <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">

          <h1 class="text-center">Welcome Back!</h1>
          
          <br />

        <form method="POST" action="{{{ URL::to('/users/login') }}}" accept-charset="UTF-8">
            <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
            <div class="form-group">
                <label class="sr-only" for="email">{{{ Lang::get('confide::confide.username_e_mail') }}}</label>
                <input class="form-control" tabindex="1" placeholder="{{{ Lang::get('confide::confide.username_e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
            </div>
            <div class="form-group">
                <label class="sr-only" for="password">
                    {{{ Lang::get('confide::confide.password') }}}
                    <small>
                        <a href="{{{ URL::to('/users/forgot_password') }}}">{{{ Lang::get('confide::confide.login.forgot_password') }}}</a>
                    </small>
                </label>
                <input class="form-control" tabindex="2" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
            </div>
            <div class="checkbox">
                <label for="remember">
                    <input tabindex="4" type="checkbox" name="remember" id="remember" value="1">{{{ Lang::get('confide::confide.login.remember') }}}
                    <input type="hidden" name="remember" value="0">
                </label>
            </div>
            <!--@if (Session::get('error'))
                <div class="alert alert-error">{{{ Session::get('error') }}}</div>
            @endif

            @if (Session::get('notice'))
                <div class="alert">{{{ Session::get('notice') }}}</div>
            @endif-->

            <br />

            <button tabindex="3" type="submit" class="btn btn-default">{{{ Lang::get('confide::confide.login.submit') }}}</button>
        </form>
            
          <br />

          <p class="text-center">Not a member yet? <a href="/users/create">Sign up!</a></p>

          <p class="text-center"><a href="{{{ URL::to('/users/forgot_password') }}}">Forgot your password?</a></p>


        </div>
      </div>

    </div> <!-- /container -->
@stop