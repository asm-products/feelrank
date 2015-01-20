@extends('layouts.base')

@section('body')
  <div class="container container-content">

    <div class="row">
      <div class="col-xs-12">
        <h2 class="pull-left">{{ $source->name }} Dashboard</h2>
        <select class="form-control">
          @foreach ($posts as $post)
            <option value="{{ $post->id }}">{{ $post->title }}</option>
          @endforeach
        </select>
      </div>
    </div>

    <br />

    <div class="row">
      <div class="col-xs-12">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#overview-tab" role="tab" data-toggle="tab">Overview</a></li>
          <li role="presentation"><a href="#feelings-tab" role="tab" data-toggle="tab">Feelings</a></li>
          <li role="presentation"><a href="#users-tab" role="tab" data-toggle="tab">Users</a></li>
        </ul>

        <br />
        
        <!-- Tab panes -->
        <div class="tab-content">
            
            <div role="tabpanel" class="tab-pane active" id="overview-tab">
              <div class="row">
                
                <div class="col-md-4">
                  <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-line-chart"></i>&nbsp;&nbsp;&nbsp;Current Rank</div>
                    <div class="panel-body">
                      <h1 class="text-center">{{ $posts[0]->ranks->sum('vote') }}</h1>
                    </div>
                  </div>
                </div>
                
                <div class="col-md-4">
                  <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-asterisk"></i>&nbsp;&nbsp;&nbsp;Another Stat</div>
                    <div class="panel-body">
                      <h1 class="text-center">X</h1>
                    </div>
                  </div>
                </div>
                
                <div class="col-md-4">
                  <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-asterisk"></i>&nbsp;&nbsp;&nbsp;Another Stat</div>
                    <div class="panel-body">
                      <h1 class="text-center">X</h1>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="feelings-tab">
              <p>I'm the Feelings panel.</p>
            </div>

            <div role="tabpanel" class="tab-pane" id="users-tab">
              <p>I'm the Users panel.</p>
            </div>

        </div>
        
      </div>
    </div>

  </div>
@stop