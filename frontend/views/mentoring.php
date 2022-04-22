<div class="card card-primary card-outline">
  <div class="card-body box-profile">
    <h3 class="text-center">Mentoring</h3>
    <p class="text-muted text-center"><a class="custom" href="index.php?view=lifestyle">[Back to Lifestyle]</a></p>

    <hr>
    <div class="card elevation-2">

      <div class="card-body">
        <form id="frmMentoring">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Date:</label>
                <div class="input-group date" id="mentoring_date" data-target-input="nearest">
                  <div class="input-group-prepend" data-target="#mentoring_date" data-toggle="datetimepicker">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                  <input id="mentoring_date_input" name="mentoring_date_input" type="text" class="form-control datetimepicker-input" data-target="#mentoring_date" placeholder="Input Mentoring Date">
                </div>
              </div>
            </div>

          </div>

          <div class="form-group">
            <label>Self Check Attendance:</label>
            <div class="input-group">
            
              <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                <input id="mentoring_check" name="mentoring_check" type="checkbox" class="custom-control-input">
                <label class="custom-control-label" for="mentoring_check">
                  Absent
                </label>
              </div>
            </div>


            <div class="row mt-3">
              <div class="col-12">
                <div class="d-flex flex-row-reverse">
                  <input type="submit" class="btn btn-info btn-md" value="Add to Mentoring">
                </div>
              </div>
            </div>
          </div>
        </form>
        <table class="table table-hover table-striped" id="tblMentoring">
          <thead>
            <tr>
              <th>Date</th>
              <th>Self Check</th>
              <th></th>
             
            </tr>
          </thead>
          <tbody id="tblMentoringBody">

          </tbody>
        </table>
      </div>
      <div class="card-footer">
        <!-- <button class="btn btn-block btn-secondary">Save</button>
        <button class="btn btn-block btn-secondary">Show History</button> -->
      </div>
    </div>
  </div>

</div>