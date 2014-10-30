<br />

{{ Form::open(['url' => '/discussions/' . $discussion_id . '/comments/' . $comment_id . '/store', 'method' => 'POST']) }}
	<div class="form-group">
		{{ Form::label('comment', 'Reply') }}
		{{ Form::textarea('comment', '', ['class' => 'form-control', 'rows' => '3']) }}
	</div>

	{{ Form::submit('Reply', ['class' => 'btn btn-default']) }}
{{ Form::close() }}