<div class="modal fade" id="modal-create-discussion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Start a Discussion</h4>
      </div>
      <div class="modal-body">
        
        {{ Form::open(['url' => '/discussions/store', 'method' => 'post']) }}
          <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', '', ['class' => 'form-control']) }}
          </div>
        
          {{ Form::hidden('post_id') }}
        
          {{ Form::submit('Discuss', ['class' => 'btn btn-default']) }}
        {{ Form::close() }}
        
      </div>
    </div>
  </div>
</div>