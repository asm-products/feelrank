@if ($post->tags()->count() > 0)
    @foreach ($post->cardTags as $tag)
        <a href="/tags/{{ $tag->id }}" class="btn btn-default btn-sm">{{ $tag->name }}</a>
    @endforeach
@else
    No tags yet.
@endif