<div class="card card-primary card-outline">
  <div class="card-body box-profile">
    <h3 class="text-center">My Tribe</h3>
    <p class="text-muted text-center"><a class="custom" href="index.php">[Back to Homepage]</a></p>
    <hr>
    <div id="tribeContainer">

    </div>

  </div>

</div>

<div class="modal fade" id="mdlTransfer" tabindex="-1" role="dialog" aria-labelledby="mdlTransferLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mdlTransferLabel">Transfer Member</h5>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Member's Name:</label>
          <input type="text" id="txTransferName" name="txTransferName" class="form-control" disabled>
        </div>
        <div class="form-group">
          <label>Transfer to:</label>
          <select id="new_leader_name" name="new_leader_name" class="form-control select2bs4" style="width: 100%;">
          </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-info" id="btnTransferMember">Trasfer</button>
        </div>
      </div>
    </div>
  </div>

</div>

<!-- <div class="card collapsed-card elevation-1">
              <div class="card-header">
                <div class="user-block">
                  <img class="img-circle img-bordered-sm" src="https://via.placeholder.com/128" alt="user image">
                  <span class="username">
                    <a class = "custom" href="#">Ricardo Madlang-awa Madlangtuta</a>
                  </span>
                  <span class="description">144</span>
                </div>
                <div class="text-right">
                  <button class="btn btn-outline-dark btn-sm">Transfer</button>
                  <button class="btn btn-info btn-sm">Lifestyle</button>
                </div>

              </div>
            </div> -->