<div class="card card-primary card-outline">
  <div class="card-body box-profile">
    <h3 class="text-center">Notifications</h3>
    <p class="text-muted text-center"><a class="custom" href="index.php">[Back to Homepage]</a></p>

    <hr>

    <div class="card collapsed-card elevation-1">
      <div class="card-header">


        <div class="container">
          <div class="row">

            <div class="col-md-12">
              <div class="box shadow-sm rounded bg-white mb-3">
                <div class="box-title border-bottom p-3">
                  <h6 class="m-0">Unread</h6>
                  <div class="form-group">
                    <div>
                      <input id = "notifSelectAll" type="checkbox" data-on-text = "<i class = 'fa fa-bars'></i>" data-off-text = "<i class = 'fa fa-minus'></i>" class="switch" data-backdrop="static" data-keyboard="false" />

                    </div>
                    <div class="notifButtons pull-right mt-4">
                      <button class="btn btn-md btn-secondary btnMultiDisapprove">Disapprove</button>
                      &nbsp;<button class="btn btn-md btn-danger btnMultiApprove">Approve</button>
                    </div>
                  </div>
                </div>
                <div id="notifTodayContainer" class="box-body p-0">

                </div>
              </div>
              <div class="box shadow-sm rounded bg-white mb-3">
                <div class="box-title border-bottom p-3">
                  <h6 class="m-0">Recent</h6>
                </div>
                <div id="notifEarlierContainer" class="box-body p-0">

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

</div>