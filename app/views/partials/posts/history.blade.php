<div id="post-history" class="col-xs-12 col-sm-4" ic-src="/posts/{{ $post->id }}/history" ic-poll="15s">
  <p class="text-center">Rank History</p>
  <canvas id="rank-history" width="300" height="140"></canvas>

  <input type="hidden" value="{{ $post_rank }}" name="post_rank" id="post_rank" />
</div>

  {{ HTML::script('js/Chart.Core.js') }}
  {{ HTML::script('js/Chart.Line.js') }}

<script>
var ctx = document.getElementById('rank-history').getContext('2d');

var data = {
  labels: [
    'NOW',

    @foreach($post_history as $rank)
      '{{ date("g:i", strtotime($rank->created_at)) }}',
    @endforeach
  ],
  datasets: [
    {
      label: 'rank',
      data: [
        '{{ $original_rank }}',

        @foreach($post_history as $rank)
          '{{ $post_rank += $rank->vote; }}',
        @endforeach
      ]
    }
  ]
};

data.datasets[0].data.reverse();
data.labels.reverse();

var options = {
  responsive: true
}

var postHistory = new Chart(ctx).Line(data, options);
</script>