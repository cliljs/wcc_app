<div class="card card-primary card-outline">
  <div class="card-body box-profile">
    <h3 class="text-center">System Administrators</h3>
    <p class="text-muted text-center"><a class="custom" href="index.php">[Back to Homepage]</a></p>

    <hr>
    <div class="form-group">
      <button class="btn btn-md btn-info form-control" id="btnAddAdmin" data-toggle="modal" data-target="#mdlAdmin" data-backdrop="static">Add New Administrator</button>
    </div>
    <hr>
    <div id="adminlist">

    </div>

  </div>

</div>

<div class="modal fade" id="mdlAdmin" tabindex="-1" role="dialog" aria-labelledby="mdlAdminLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="frmAdmins">
        <div class="modal-header">
          <h5 class="modal-title" id="mdlAdminLabel">Add New Administrator</h5>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="branch">Branch</label>
            <select id="branch" name="branch" class="form-control select2bs4" style="width: 100%;">
              <option selected="selected" disabled="disabled">Please select a branch</option>
              <option value="Bataan">Bataan</option>
              <option value="Gensan">Gensan</option>
              <option value="Kalibo">Kalibo</option>
              <option value="Valenzuela">Valenzuela</option>
            </select>
          </div>
          <div class="form-group">
            <label for="members">Member's Name</label>
            <select id="members" name="members" class="form-control select2bs4" style="width: 100%;">
              <option selected="selected" disabled="disabled">Please select a branch first</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info" id="btnRegisterAdmin">Add</button>
          </div>
        </div>
      </form>
    </div>
  </div>

</div>