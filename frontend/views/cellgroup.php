<div class="card card-primary card-outline">
  <div class="card-body box-profile">
    <h3 class="text-center">Cell Group</h3>
    <p class="text-muted text-center"><a class = "custom" href="index.php?view=lifestyle">[Back to Lifestyle]</a></p>

    <hr>
    <div class="card elevation-2">

      <div class="card-body">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <div class="form-group">
              <label>Date:</label>
              <div class="input-group date" id="cg_date" data-target-input="nearest">
                <div class="input-group-prepend" data-target="#cg_date" data-toggle="datetimepicker">
                  <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                </div>
                <input type="text" class="form-control datetimepicker-input" data-target="#cg_date" placeholder="Input date">
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div class="bootstrap-timepicker">
              <div class="form-group">
                <label>Time:</label>
                <div class="input-group date" id="cg_time" data-target-input="nearest">
                  <div class="input-group-prepend" data-target="#cg_time" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                  </div>
                  <input type="text" class="form-control datetimepicker-input" data-target="#cg_time" placeholder="Input time" />
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="form-group">
          <label>Place:</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Input place">
          </div>
        </div>
        <table class="table table-hover table-striped" id="tblCellgroup">
          <thead>
            <tr>
              <th>Cell Member Attendance</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody id="tblCellgroupBody">
            <tr>
              <td>Sample 1</td>
              <td>March 1, 2022</td>
            </tr>
            <tr>
              <td>Sample 2</td>
              <td>March 2, 2022</td>
            </tr>
            <tr>
              <td>Sample 3</td>
              <td>March 3, 2022</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="card-footer">
        <button class="btn btn-block btn-secondary">Submit</button>
        <button class="btn btn-block btn-secondary">Show History</button>
      </div>
    </div>
  </div>

</div>