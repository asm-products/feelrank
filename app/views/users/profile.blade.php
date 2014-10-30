@extends('layouts.base')

@section('body')
    <div class="container container-content">

      <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">

          <h1 class="text-center">Edit Profile</h1>
          
          <br />

          {{ Form::model($user, ['url' => 'users/update', 'method' => 'post']) }}
            <div class="form-group">
              {{ Form::label('username', 'Username') }}
              {{ Form::text('username', $user->username, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
              {{ Form::label('email', 'Email') }}
              {{ Form::text('email', $user->email, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
              <a href="">Change Password</a>
            </div>

            <br />

            {{ Form::submit('Update', ['class' => 'btn btn-default']) }}
          {{ Form::close() }}

        </div>
      </div>

    </div> <!-- /container -->
@stop