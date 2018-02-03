 <div class="modal-dialog modal-lg add-user-form">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title">View</h4>
    </div>

    <div class="modal-body">
 <div class="container wow fadeInUp">
        <div class="section-header">
          <h2>  {{ $patient->firstname }} {{ $patient->lastname }} </h2>
        </div>
      </div>

      <div class="container">
        <div class="col-lg-6">
        <div class="table-responsive"></div>       
            <table class="table" style="width:100%">
              <thead>
              </thead>
              <tbody>
                <tr>
                  <td width="30%">First Name:</td>
                  <td width="70%"><b>{{ $patient->firstname }}</b></td>
                </tr>
                <tr>
                  <td>Last Name:</td>
                  <td><b>{{ $patient->lastname }}</b></td>
                </tr>
                <tr>
                  <td>Nickname:</td>
                  <td><b>{{ $patient->nickname }}</b></td>
                </tr>
                <tr>
                  <td>Date of Birth:</td>
                  <td><b>{{ date('F d, Y', strtotime($patient->birthdate)) }}</b></td>
                </tr>
                <tr>
                  <td>Gender:</td>
                  <td><b>{{ $patient->gender }}</b></td>
                </tr>
                <tr>
                  <td>Status:</td>
                  <td><b>{{ $patient->status }}</b></td>
                </tr>
                <tr>
                  <td>Occuptaion:</td>
                  <td><b>{{ $patient->occupation }}</b></td>
                </tr>
                <tr>
                  <td>Address:</td>
                  <td><b>{{ $patient->address }}</b></td>
                </tr>
                <tr>
                  <td>Partner's Firstname:</td>
                  <td><b>{{ $patient->p_firstname }}</b></td>
                </tr>
                <tr>
                  <td>Partner's Lastname:</td>
                  <td><b>{{ $patient->p_lastname }}</b></td>
                </tr>
                <tr>
                  <td>Referred by:</td>
                  <td><b>{{ $patient->reffered_by }}</b></td>
                </tr>
                <tr>
                  <td>Mobile No.:</td>
                  <td><b>{{ $patient->mobile_no }}</b></td>
                </tr>

                <tr>
                  <td width="30%">Username:</td>
                  <td width="70%"><b>{{ $user->username }}</b></td>
                </tr>
              </tbody>
            </table>
          </div>
      </div>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>

  </div>
</div>
