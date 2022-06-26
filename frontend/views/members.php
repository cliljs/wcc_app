<div class="card card-primary card-outline">
  <div class="card-body box-profile">
    <h3 class="text-center">Member inquiry</h3>
    <p class="text-muted text-center"><a class="custom" href="index.php">[Back to Homepage]</a></p>

    <hr>
    <div class="card elevation-2">

      <div class="card-body">
        <form id="frmMembers">
          <div class="form-group">

            <label class="my-2 text-muted">Please select a member from the list</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <select id="select_name" name="select_name" class="form-control select2bs4">

              </select>

            </div>
            <div class="row mt-3">
              <div class="col-12">
                <div class="d-flex flex-row-reverse">
                  <input type="submit" class="btn btn-info btn-md" value="Check Lifestyle">
                </div>
              </div>
            </div>
          </div>
        </form>
        <hr>
        <h5 id="lblMember"></h5>
        <p id="lblTL" class="text-muted"></p>

        <div id="memberLS" style="display:none;">
          <button id="btnMemberCellgroup" class="btn btn-md btn-danger btn-block">Cellgroup</button>
          <button id="btnMemberTraining" class="btn btn-md btn-danger btn-block">Trainings</button>
          <button id="btnMemberMentoring" class="btn btn-md btn-danger btn-block">Mentoring</button>
          <button id="btnMemberSunday" class="btn btn-md btn-danger btn-block">Sunday Celebration Attendance</button>
        </div>
      </div>
      <div class="card-footer">

      </div>
    </div>
  </div>

</div>


<div class="modal fade" id="mdlLifeStyle" tabindex="-1" role="dialog" aria-labelledby="mdlLifeStyleLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="mdlLifeStyleMemberName"></h5>
      </div>
      <div class="modal-body">
        <div id="mdlCellgroup" style="display:none;">
          <h5 class="text-muted">Cellgroup</h5>
          <table class="table table-hover table-striped" id="tblCellgroup">
            <thead>
              <tr>
                <th>Cell Member</th>
                <th>Place</th>
                <th>Date</th>
                <th>Time</th>
              </tr>
            </thead>
            <tbody id="tblCellgroupBody">

            </tbody>
          </table>
        </div>
        <div id="mdlTrainings" style="display:none;">
          <h5 class="text-muted">Trainings</h5>
          <div class="card card-outline card-primary collapsed-card">
            <div class="card-header">
              <h3 class="card-title">Life Class</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" id="collapseLifeclass">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
            </div>
            <div class="card-body" style="display: none;">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Lesson</th>
                    <th>Attendance</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody id="tblLifeclassContainer">

                </tbody>
              </table>
            </div>
          </div>

          <div class="card card-outline card-primary collapsed-card">
            <div class="card-header">
              <h3 class="card-title">SOL1</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" id="collapseSOL1">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
            </div>
            <div class="card-body" style="display: none;">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Lesson</th>
                    <th>Attendance</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody id="tblSOL1Container">

                </tbody>
              </table>
            </div>
          </div>

          <div class="card card-outline card-primary collapsed-card">
            <div class="card-header">
              <h3 class="card-title">SOL2</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" id="collapseSOL2">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
            </div>
            <div class="card-body" style="display: none;">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Lesson</th>
                    <th>Attendance</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody id="tblSOL2Container">

                </tbody>
              </table>
            </div>
          </div>

          <div class="card card-outline card-primary collapsed-card">
            <div class="card-header">
              <h3 class="card-title">SOL3</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" id="collapseSOL3">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
            </div>
            <div class="card-body" style="display: none;">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Lesson</th>
                    <th>Attendance</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody id="tblSOL3Container">

                </tbody>
              </table>
            </div>
          </div>

          <div class="card card-outline card-primary collapsed-card">
            <div class="card-header">
              <h3 class="card-title">Re-encounter</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" id="collapseReencounter">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
            </div>
            <div class="card-body" style="display: none;">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Lesson</th>
                    <th>Attendance</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody id="tblReencounterContainer">

                </tbody>
              </table>
            </div>
          </div>

        </div>
        <div id="mdlMentoring" style="display:none;">
          <h5 class="text-muted">Mentoring</h5>
          <table class="table table-hover table-striped" id="tblMentoring">
            <thead>
              <tr>
                <th>Date</th>
                <th>Self Check</th>
              </tr>
            </thead>
            <tbody id="tblMentoringBody">

            </tbody>
          </table>
        </div>
        <div id="mdlSundayCelebration" style="display:none;">
          <h5 class="text-muted">Sunday Celebration Attendance</h5>

          <div class="form-group">
            <label>Year:</label>
            <select id="member_select_year" name="member_select_year" class="form-control">
              <?php
              for ($i = 2022; $i < 2099; $i++) {
                if ($i == date("Y")) {
                  echo "<option value = '$i' selected>$i</option>";
                } else {
                  echo "<option value = '$i'>$i</option>";
                }
              }
              ?>
            </select>
          </div>

          <i class='fa fa-circle' style='color:#2c3e50'></i> &nbsp; Absent &nbsp;
          <i class='fa fa-circle' style='color:orange'></i> &nbsp; Waiting Confirmation &nbsp;
          <i class='fa fa-circle' style='color:green'></i> &nbsp; Attended &nbsp;


          <table class="table table-hover table-striped" id="tblMemberAttendance">

          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

</div>