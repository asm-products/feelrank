<a class="btn btn-success" data-toggle="modal" data-target="#modal-login"><i class="fa fa-thumbs-o-up fa-lg"></i></a>
<a class="btn btn-link">{{ $post->ranks()->sum('vote') }}</a>
<a class="btn btn-danger" data-toggle="modal" data-target="#modal-login"><i class="fa fa-thumbs-o-down fa-lg"></i></a>