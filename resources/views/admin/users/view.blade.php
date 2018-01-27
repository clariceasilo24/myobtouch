<div class="modal-dialog add-user-form">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title">View</h4>
    </div>
 
    <div class="modal-body">
      <table class="table table-hover table-bordered">
        <tr>
          <th class="col-md-3"><b>Username:</b></th>
          <td>{{ $user->username }}</td>
        </tr>
        <tr>
          <th><b>User Type:</b></th>
          <td>{{ ucfirst($user->account_type) }}</td>
        </tr>
      </table> 
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>

  </div>
</div>