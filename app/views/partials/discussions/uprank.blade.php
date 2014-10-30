<a style="opacity: 0.5;"><i class="fa fa-chevron-up text-success"></i></a>
&nbsp;{{ $discussion->ranks()->sum('vote') }}&nbsp;
<a ic-src="/discussions/{{ $discussion->id }}/ranks/down" ic-verb="get" ic-trigger-on="click" ic-target="#diss-ranks-{{ $discussion->id }}"><i class="fa fa-chevron-down text-danger"></i></a>