<div class="card card-primary card-outline">
  <div class="card-body box-profile">
    <h3 class="text-center">Member inquiry</h3>
    <p class="text-muted text-center"><a class="custom" href="index.php">[Back to Homepage]</a></p>

    <hr>
    <div class="card elevation-2">

      <div class="card-body">
        <button id="btnMemberCellgroup" class="btn btn-lg btn-secondary btn-block">Cellgroup</button>
        <button id="btnMemberMentoring" class="btn btn-lg btn-secondary btn-block">Mentoring</button>
        <button id="btnMemberSunday" class="btn btn-lg btn-secondary btn-block">Sunday Celebration Attendance</button>
        <button id="btnMemberEnrollment" class="btn btn-lg btn-secondary btn-block">Training Enrollment</button>

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

        <div id="mdlTrainings" style="display:none;">
          <h5 class="text-muted">Trainings</h5>
          <table class="table table-hover table-striped" id="tblMemberEnrollment">
            <thead>
              <tr>
                <th>Date Enrolled</th>
                <th class="">Name</th>
                <th class="">Training</th>
                <th class="">Remarks</th>
              </tr>
            </thead>
            <tbody id="tblMemberEnrollmentBody">

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

          <table class="table table-hover table-striped" id="tblMemberAttendance">
            <thead>
              <tr>
                <th>Date</th>
                <th class="text-center">WCC Regular Attendees</th>
                <th class="text-center">VIP</th>
                <th class="text-center">Invites</th>
              </tr>
            </thead>
            <tbody id="tblMemberAttendanceBody">

            </tbody>
          </table>
        </div>

        <div id="mdlCellgroup" style="display:none;">
          <div class="form-group">
            <label>Year:</label>
            <select id="cellgroup_select_year" name="cellgroup_select_year" class="form-control">
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
          <table class="table table-hover table-striped" id="tblMemberCellgroup">
            <thead>
              <tr>
                <th>Member's Name</th>
                <th class="">Date/Time</th>
                <th class="">Cell Member</th>
                <th class="">Place</th>
              </tr>
            </thead>
            <tbody id="tblMemberCellgroupBody">

            </tbody>
          </table>
        </div>
        <div id="mdlMentoring" style="display:none;">
          <div class="form-group">
            <label>Year:</label>
            <select id="mentoring_select_year" name="mentoring_select_year" class="form-control">
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
          <table class="table table-hover table-striped" id="tblMemberMentoring">
            <thead>
              <tr>
                <th>Member's Name</th>
                <th class="">Date/Time</th>
                <th class="">Remarks</th>
              </tr>
            </thead>
            <tbody id="tblMemberMentoringBody">

            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

</div>