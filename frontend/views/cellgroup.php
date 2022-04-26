<div class="card card-primary card-outline">
  <div class="card-body box-profile">
    <h3 class="text-center">Cellgroup</h3>
    <p class="text-muted text-center"><a class="custom" href="index.php?view=lifestyle">[Back to Lifestyle]</a></p>

    <hr>
    <div class="card elevation-2">

      <div class="card-body">
        <form id="frmCellgroup">
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <div class="form-group">
                <label>Date:</label>
                <div class="input-group date" id="cg_date" data-target-input="nearest">
                  <div class="input-group-prepend" data-target="#cg_date" data-toggle="datetimepicker">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                  <input id = "event_date" name = "event_date" type="text" class="form-control datetimepicker-input" data-target="#cg_date" placeholder="Input Date">
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
                    <input id = "event_time" name = "event_time" type="text" class="form-control datetimepicker-input" data-target="#cg_time" placeholder="Input Time" />
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
              <input id = "event_place" name = "event_place" type="text" class="form-control" placeholder="Input Place">
            </div>
          </div>
          <div class="form-group">
            <label>Member:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input id = "inp_name" name = "inp_name" type="text" class="form-control" placeholder="Input Member's Name">
            </div>
            <label class="my-2 text-muted">or select an existing member from the list:</label>
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
                  <input type = "submit" class="btn btn-info btn-md" value = "Add to Cellgroup">
                </div>
              </div>
            </div>
          </div>
        </form>
        <table class="table table-hover table-striped" id="tblCellgroup">
          <thead>
            <tr>
              <th>Cell Member</th>
              <th>Place</th>
              <th>Date</th>
              <th>Time</th>
              <th></th>
            </tr>
          </thead>
          <tbody id="tblCellgroupBody">
          
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