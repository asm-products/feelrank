<a class="btn btn-success" ic-src="/posts/{{ $post->id }}/ranks/up" ic-verb="get" ic-trigger-on="click" ic-target="#post-ranks-{{ $post->id }}"><i class="fa fa-thumbs-o-up fa-lg"></i></a>
<a class="btn btn-link">{{ $post->ranks()->sum('vote') }}</a>
<a class="btn btn-danger disabled"><i class="fa fa-thumbs-o-down fa-lg"></i></a>