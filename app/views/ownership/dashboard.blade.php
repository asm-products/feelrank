@extends('layouts.base')

@section('title')
{{ $source->name }} Dashboard
@stop

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
                    <div class="panel-heading"><i class="fa fa-comments"></i>&nbsp;&nbsp;&nbsp;Discussion Count</div>
                    <div class="panel-body">
                      <h1 class="text-center">{{ $posts[0]->discussions->count() }}</h1>
                    </div>
                  </div>
                </div>
                
                <div class="col-md-4">
                  <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-eye"></i>&nbsp;&nbsp;&nbsp;Views</div>
                    <div class="panel-body">
                      <h1 class="text-center">X</h1>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="feelings-tab">
              <div class="row">
                <div class="col-xs-12">
                  <h3>Rank History (Last 10 Ranks)</h3>
                  
                  <div id="rankhistory"></div>
                </div>
              </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="users-tab">
              <div class="row">
                <div class="col-xs-12">
                  <h3>Users Also...</h3>
                </div>
              </div>
              
              <div class="row">
                <div class="col-sm-6">
                  <h4>Upranked</h4>
                  
                  <ul>
                    @if (count($also_upranked) > 0)
                      @foreach ($also_upranked as $uprank)
                        <li>{{ $uprank->rankable->title }}</li>
                      @endforeach
                    @endif
                  </ul>
                </div>
                
                <div class="col-sm-6">
                  <h4>Downranked</h4>
                  
                  <ul>
                    @if (count($also_downranked) > 0)
                      @foreach ($also_downranked as $downrank)
                        <li>{{ $downrank->rankable->title }}</li>
                      @endforeach
                    @endif
                  </ul>
                </div>
              </div>
              
              <div class="row">
                <div class="col-sm-6">
                  <h3>Advocates</h3>
                  
                  <ul>
                    @if (count($advocates) > 0)
                      @foreach ($advocates as $advocate)
                        <li>{{ $advocate->username }}</li>
                      @endforeach
                    @endif
                  </ul>
                </div>
                
                <div class="col-sm-6">
                  <h3>Detractors</h3>
                  
                  <ul>
                    @if (count($detractors) > 0)
                      @foreach ($detractors as $detractor)
                        <li>{{ $detractor->username }}</li>
                      @endforeach
                    @endif
                  </ul>
                </div>
              </div>
            </div>

        </div>
        
      </div>
    </div>

  </div>
@stop

@section('more_js')
  {{ HTML::script('js/d3.min.js') }}
  {{ HTML::script('js/c3.min.js') }}
  
  <script>
    var rankhistory = c3.generate({
      bindto: '#rankhistory',
      data: {
        url: '/posts/{{ $posts[0]->id }}/rankhistory',
        mimeType: 'json'
      }
    });
  </script>
@stop