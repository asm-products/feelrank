@if (count($posts) > 0)
  @foreach ($posts as $post)
    @include ('posts.post')
  @endforeach
@else
  <div class="col-xs-12">
    <p>No posts found!</p>
  </div>
@endif