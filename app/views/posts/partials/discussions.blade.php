@if ($post->discussions()->count() > 0)
    @foreach ($post->cardDiscussions as $discussion)
        <p>{{ $discussion->title }}</p>
        <a href="/discussions/{{ $discussion->id }}">
            {{ $comment_count = $discussion->comments()->count() }}
            
            @if ($comment_count > 1 || $comment_count == 0)
                Comments
            @else
                Comment
            @endif
        </a>
        <hr />
    @endforeach
@else
    No discussions yet.
    <hr />
@endif