@extends('layouts.base')

@section('body')
    <div class="container container-content">

      <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">

          <h1 class="text-center">Accidents Happen</h1>
          
          <br />

            <form method="POST" action="{{ URL::to('/users/forgot_password') }}" accept-charset="UTF-8">
                <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">

                <div class="form-group">
                    <label for="email" class="sr-only">{{{ Lang::get('confide::confide.e_mail') }}}</label>
                    <input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
                </div>

                <input class="btn btn-default" type="submit" value="{{{ Lang::get('confide::confide.forgot.submit') }}}">

                @if (Session::get('error'))
                    <div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
                @endif

                @if (Session::get('notice'))
                    <div class="alert">{{{ Session::get('notice') }}}</div>
                @endif
            </form>

          <br />

          <p class="text-center">Remember it now? <a href="/users/login">Login!</a>

        </div>
      </div>

    </div> <!-- /container -->
@stop