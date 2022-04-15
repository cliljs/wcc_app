<div class="card card-primary card-outline">
  <div class="card-body box-profile">
    <h3 class="text-center">QR Maintenance</h3>
    <p class="text-muted text-center"><a class="custom" href="index.php">[Back to Homepage]</a></p>

    <hr>
    <div id="qrlist">

    </div>




  </div>

</div>


<div class="modal fade" id="mdlQRMaintenance" tabindex="-1" role="dialog" aria-labelledby="mdlScannerLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mdlScannerLabel">View Generated QR</h5>

      </div>
      <div class="modal-body">

        <div class="form-group text-center mt-3">
          <p class="text-muted" id="qr-branch">Bataan Branch</p>

        </div>
        <div id="viewQRCodeMaintenance" class="text-center"></div>
        <div class="form-group text-center mt-3">
          <p class="text-muted" id="qr-view-content"></p>

        </div>
        <div class="form-group text-center mt-5">
          <button id="newQRCodeMaintenance" class="btn btn-block btn-info">Update QR</button>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>