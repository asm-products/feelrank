<a ic-src="/comments/{{ $comment_child->id }}/ranks/up" ic-verb="get" ic-trigger-on="click" ic-target="#comm-ranks-{{ $comment_child->id }}"><i class="fa fa-chevron-up text-success"></i></a>
&nbsp;{{ $comment_child->ranks()->sum('vote') }}&nbsp;
<a style="opacity: 0.5;"><i class="fa fa-chevron-down text-danger"></i></a>