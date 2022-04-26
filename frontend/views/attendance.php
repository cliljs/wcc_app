<div class="card card-primary card-outline">
  <div class="card-body box-profile">
    <h3 class="text-center">Sunday Celebration Attendance</h3>
    <p class="text-muted text-center"><a class="custom" href="index.php">[Back to Homepage]</a></p>
    <hr>
    <div class="card elevation-2">
      <div class="card-header">
        <div class="form-group">
          <label>Date:</label>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
            </div>
            <input value="<?php echo $today; ?>" type="text" class="form-control" disabled>
          </div>

        </div>
        <div class="form-group">
        <label>Invites:</label>
          <select id="select_invites" class="select2bs4" multiple="multiple" data-placeholder="Select Name of Invites" style="width: 100%;">

          </select>
        </div>
        
        <div class="form-group">
          <label>Expected VIP:</label>
          <input type="text" class="form-control" id="vip_name" name="vip_name" placeholder="Input VIP's Full Name">
        </div>
        <div class="row my-3">
          <div class="col-12">
            <div class="d-flex flex-row-reverse">
              <button id="btnAddVIP" class="btn btn-info btn-md">Add to VIP List</button>
            </div>
          </div>
        </div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>VIP</th>
              <th style="width: 40px"></th>
            </tr>
          </thead>
          <tbody id="tblVIPBody">

          </tbody>
        </table>
        <div class="form-group">
          <button id="btnShowQR" class="btn btn-block btn-secondary"><b>Scan QR Code</b></button>
        </div>
      </div>

    </div>
  </div>

</div>
<div class="modal fade" id="mdlScanner" role="dialog" aria-labelledby="mdlScannerLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mdlScannerLabel">Scan QR Code</h5>

      </div>
      <div class="modal-body">
        <div class="alert alert-info alert-dismissible">
          <h5><i class="icon fas fa-info"></i> Info</h5>
          IOS users please ung Safari browser
        </div>
        <div class="form-group text-center mt-3">
          <p class="text-muted">Please scan any authorized QR code</p>
          <div class="card elevation-2">
            <div class="card-header">
              <p><i class="fa fa-user"></i> &nbsp; Number of Invite(s): <span id="mdlInvites"></span></p>
              <p><i class="fa fa-user"></i> &nbsp; Number of VIP(s): <span id="mdlVIPs"></span></p>
            </div>
          </div>

        </div>
        <div id="readerbypass" style="display:none;">
          <p class="text-muted">Approach any tribe leader and ask for credentials</p>
          <form id="frmByPass">
            <div class="form-group">
              <label>Leader's Username</label>
              <input class="form-control" type="text" id="tlusername" name="tlusername" required />
            </div>
            <div class="form-group">
              <label>Leader's Password</label>
              <input class="form-control" type="password" id="tlpassword" name="tlpassword" required />
            </div>
            <div class="form-group mt-2">
              <input type="submit" class="btn btn-block btn-md btn-info" value="Submit" />
            </div>
          </form>
        </div>
        <div id="reader" class="text-center" width="100%"></div>
        <div class="form-group text-center mt-3">
          <button id="qrmode" class="btn btn-block btn-outline-dark">QR Scanner not working?</button>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>