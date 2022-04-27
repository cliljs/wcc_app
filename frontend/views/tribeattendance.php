<div class="card card-primary card-outline">
  <div class="card-body box-profile">
    <h3 class="text-center">Tribe Attendance</h3>
    <p class="text-muted text-center"><a class="custom" href="index.php?view=celebration">[Back to Attendance]</a></p>
    <hr>
    <div class="card elevation-2">
      <div class="card-header">
        <div class="form-group">
          <form id="frmTribeAttendance">
            <div class="form-group">
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label>Month</label>
                    <select id="select_month" name="select_month" class="form-control select2bs4" style="width: 100%;">
                      <?php
                      for ($i = 1; $i < 13; $i++) {
                        $mName = date('F', mktime(0, 0, 0, $i, 10));

                        if ($mName == date('F')) {
                          echo "<option value = '$i' selected>" . $mName . "</option>";
                        } else {
                          echo "<option value = '$i'>" . $mName . "</option>";
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label>Year</label>
                    <select id="select_year" name="select_year" class="form-control select2bs4" style="width: 100%;">
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
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group text-right">
                    <button type="submit" class="btn btn-md btn-info">Filter</button>
                  </div>
                </div>
              </div>
            </div>



          </form>
        </div>



        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th rowspan="2">Member's Name</th>
              <th colspan="4" class = "text-center">April 2022</th>
            </tr>
            <tr>
              <th>April 1</th>
              <th>April 1</th>
              <th>April 1</th>
              <th>April 1</th>
            </tr>
          </thead>
          <tbody id="tblTribeAttendanceBody">

          </tbody>
        </table>

      </div>

    </div>
  </div>

</div>