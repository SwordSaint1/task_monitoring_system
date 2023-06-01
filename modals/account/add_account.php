<div class="modal fade bd-example-modal-xl" id="add_account" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            <b>Add Account</b>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"  onclick="javascript:window.location.reload()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12" id="user_type_col">
                <label>User Type:</label>
                <select id="user_type" class="form-control" onchange="check_user_type()">
                    <option value="">Select User Type</option>
                    <option value="hr">Human Resources</option>
                    <option value="hd">Head Department</option>
                    <option value="tm">Top Management</option>
                    <option value="employee">Employee</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12" id="emp_col">
                <label>Employee ID:</label>
                <input type="text" id="employee_id" class="form-control" autocomplete="off">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12" id="username_col">
                <label>Username:</label>
                <input type="text" id="username" class="form-control" autocomplete="off">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12" id="password_col">
                <label>Password:</label>
                <input type="text" id="password" class="form-control" autocomplete="off">
            </div>
        </div>
        </div> 
          <div class="modal-footer">
            <div class="row">
                <div class="col-12">
                    <div class="float-right">
                        <a href="#" class="btn btn-primary" onclick="save_account()">Register Account</a>
                    </div>
                </div>
            </div>
          </div>
    </div>
  </div>
</div>