<div class="modal fade" id="modal-claim-ownership" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Claim Ownership</h4>
      </div>
      <div id="claim-ownership-modal-body" class="modal-body">
        <p>We'd love to connect this site to your account, but first we need to verify it's yours. Follow the simple steps below and you'll have access to tons of useful metrics and engagement tools!</p>
        
        <ol>
          <li>Place the file "feelrank.txt" in your site's root directory.</li>
          <li>Make the contents of the file the text within the following quotes: "{{ Auth::user()->confirmation_code }}"</li>
          <li>Click the claim button below and bask in the glory of your newfound power.</li>
        </ol>
      </div>
      <div class="modal-footer">
        <a href="#" ic-get-from="/posts/{{ $post->id }}/claim" ic-target="#claim-ownership-modal-body" class="btn btn-default">Claim<i class="fa fa-spinner fa-spin ic-indicator" style="display:none"></i></a>
      </div>
    </div>
  </div>
</div>