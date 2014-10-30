<a style="opacity: 0.5;"><i class="fa fa-chevron-up text-success"></i></a>
&nbsp;{{ $post->ranks()->sum('vote') }}&nbsp;
<a ic-src="/posts/{{ $post->id }}/ranks/down" ic-verb="get" ic-trigger-on="click" ic-target="#post-ranks-{{ $post->id }}"><i class="fa fa-chevron-down text-danger"></i></a>