<div class="modal fade" id="modal-add-tags" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Tags</h4>
      </div>
      <div class="modal-body">
        
        {{ Form::open(['url' => '/tags/add', 'method' => 'post']) }}
        
            <div class="form-group">
              {{ Form::label('tags', 'Tags (Separate with Commas)') }}
              {{ Form::text('tags', '', ['class' => 'form-control center-block', 'id' => 'tags']) }}
            </div>
        
          {{ Form::hidden('post_id') }}
        
          {{ Form::submit('Add', ['class' => 'btn btn-default']) }}
        {{ Form::close() }}
        
      </div>
    </div>
  </div>
</div>