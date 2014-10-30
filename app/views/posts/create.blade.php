@extends('layouts.base')

@section('body')
    <div class="container container-content">
      <div class="row">
        <div class="col-md-12">
          <h2>Create a Post <small>(1)</small></h2><br />

          {{ Form::open(['url' => 'posts/fetch', 'method' => 'post']) }}
            <div class="form-group">
              {{ Form::label('url', 'Url') }}
              {{ Form::text('url', '', ['class' => 'form-control', 'placeholder' => 'Let\'s discuss...']) }}
            </div>

            {{ Form::submit('Fetch', ['class' => 'btn btn-default']) }}
          {{ Form::close() }}
        </div>
      </div>
    </div>
@stop