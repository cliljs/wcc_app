<div class="card card-primary card-outline">
  <div class="card-body box-profile">
    <h3 class="text-center">Notifications</h3>
    <p class="text-muted text-center"><a class="custom" href="index.php">[Back to Homepage]</a></p>

    <hr>

    <div class="card collapsed-card elevation-1">
      <div class="card-header">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />

        <div class="container">
          <div class="row">

            <div class="col-md-12">
              <div class="box shadow-sm rounded bg-white mb-3">
                <div class="box-title border-bottom p-3">
                  <h6 class="m-0">Today</h6>
                </div>
                <div id="notifTodayContainer" class="box-body p-0">
                  <div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
                    <div class="dropdown-list-image mr-3">
                      <img class="rounded-circle" src="https://via.placeholder.com/150" alt="user_avatar" />
                    </div>
                    <div class="font-weight-bold mr-3">
                      <div><span class="font-weight-normal"><a data-user = "1" href = "Javascript:void(0);" class = "notifName"><b>Ricardo J. Madlangtuta</b></a> enrolled to Life Class training.</div>
                      <div class="mb-2"><span class="font-weight-light">April 17, 2022 00:00:00</span></div>
                      <button type="button" data-id = "1" class="btn btn-outline-dark btn-sm btnNotifDecline">Decline</button>
                      <button type="button" data-id = "1" class="btn btn-info btn-sm btnNotifApprove">Approve</button>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="box shadow-sm rounded bg-white mb-3">
                <div class="box-title border-bottom p-3">
                  <h6 class="m-0">Earlier</h6>
                </div>
                <div id="notifEarlierContainer" class="box-body p-0">
                  <p class = "text-muted text-center">No notifications available</p>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

</div>