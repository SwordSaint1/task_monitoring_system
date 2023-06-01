<div class="modal fade bd-example-modal-xl" id="edit_account" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            <b>Account Details</b>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"  onclick="javascript:window.location.reload()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12" id="user_type_col_update">
                <label>User Type:</label>
                <input type="hidden" id="id_account">
                <select id="user_type_update" class="form-control" onchange="check_user_type_update()">
                    <option value="">Select User Type</option>
                    <option value="hr">Human Resources</option>
                    <option value="hd">Head Department</option>
                    <option value="tm">Top Management</option>
                    <option value="employee">Employee</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12" id="emp_col_update">
                <label>Employee ID:</label>
                <input type="text" id="employee_id_update" class="form-control" autocomplete="off">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12" id="username_col_update">
                <label>Username:</label>
                <input type="text" id="username_update" class="form-control" autocomplete="off">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12" id="password_col_update">
                <label>Password:</label>
                <input type="text" id="password_update" class="form-control" autocomplete="off">
            </div>
        </div>
        <br>
        <hr>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12">
            <a href="#" class="btn btn-danger" onclick="delete_account()">Delete Account</a>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="float-right">
              <a href="#" class="btn btn-primary" onclick="update_account()">Update Account</a>
            </div>
          </div>
        </div>
        </div> 
    </div>
  </div>
</div>