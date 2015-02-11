@extends('layouts.base')

@section('title')
Posts ({{ $sort }})
@stop

@section('body')
  <div class="container container-content">

    <div class="row">
      <div class="col-xs-12">
        <h2>Posts <small>({{ $sort }})</small></h2>
        <br />
      </div>
    </div>

    <div class="row">

      @if (count($posts) > 0)
        @foreach ($posts as $post)
          <div class="col-sm-12 col-md-6 col-lg-4 col-card">
            @include ('posts.post')
          </div>
        @endforeach
      @else
        <div class="col-xs-12">
          <p>No posts found!</p>
        </div>
      @endif

    </div>
  </div>
  
  @include('modals.add-tags')
  @include('modals.create-discussion')
@stop

@section('more_js')
  {{ HTML::script('js/bootstrap-tagsinput.min.js') }}
  
  <script>
    $('#tags').tagsinput({
      confirmKeys: [13, 32]
    });
    
    var item;
    
    $('#tags').tagsinput('add', item);
    
    $('#tags').on('beforeItemAdd', function(e) {
      e.item = e.item.toLowerCase().replace(/[-!$%^&*()_+|~=`{}\[\]:";'<>?,.\/#]/, '');
      
      console.log(e.item);
    }).tagsinput('refresh');
  </script>
  
  <script>
    $(function() {
      $('#modal-add-tags').on('show.bs.modal', function(e) {
        var button = $(e.relatedTarget);
        var recipient = button.data('postid');
        
        var modal = $(this);
        modal.find('input[name="post_id"]').val(recipient);
      });
      
      $('#modal-create-discussion').on('show.bs.modal', function(e) {
        var button = $(e.relatedTarget);
        var recipient = button.data('postid');
        
        var modal = $(this);
        modal.find('input[name="post_id"]').val(recipient);
      });
    });
  </script>
@stop