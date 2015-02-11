@extends('layouts.base')

@section('title')
Post a New Link
@stop

@section('body')
  <div id="create-site-container" class="container container-content">
    <div class="row">
      <div class="col-md-12">
        <h2>Add a Site</h2><br />

        {{ Form::open(['url' => '/posts', 'method' => 'post', 'ic-post-to' => '/posts', 'ic-trigger-on' => 'submit', 'ic-target' => '#create-site-container', 'ic-indicator' => '#loading-icon']) }}
          <div class="form-group">
            {{ Form::label('url', 'Url') }}
            {{ Form::text('url', '', ['class' => 'form-control', 'placeholder' => 'Paste a link!']) }}
          </div>

          {{ Form::submit('Add', ['class' => 'btn btn-default']) }}
        {{ Form::close() }}
      </div>
    </div>
    
    <h1 id="loading-icon">
      <i class="fa fa-circle-o-notch fa-spin"></i><br />
      <small>Fetching site details...</small>
    </h1>
  </div>
@stop