<div class="card card-primary card-outline">
  <div class="card-body box-profile">
    <h3 class="text-center">Sunday Celebration</h3>
    <p class="text-muted text-center"><a class = "custom" href="index.php?view=lifestyle">[Back to Lifestyle]</a></p>
    <hr>
    <div class="card elevation-2">
      <div class="card-header">
        <div class="form-group">
          <label>Year:</label>
          <select id="select_year" name="select_year" class="form-control select2bs4" style="width: 100%;">
            <?php
            for ($i = 2022; $i < 2099; $i++) {
              if($i == date("Y")){
                echo "<option value = '$i' selected>$i</option>";
              } else{
                echo "<option value = '$i'>$i</option>";
              }
            }
            ?>
          </select>
        </div>
        
        <i class = 'fa fa-circle' style = 'color:#2c3e50'></i> &nbsp; Absent &nbsp;
        <i class = 'fa fa-circle' style = 'color:orange'></i> &nbsp; Waiting Confirmation &nbsp;
        <i class = 'fa fa-circle' style = 'color:green'></i> &nbsp; Attended &nbsp;
        <table class="table table-bordered mt-3">
          <thead>

          </thead>
          <tbody id = "tblAttendanceBody">
            
          </tbody>
        </table>
        <div class="form-group">
          <a href="index.php?view=tribeattendance" class="btn btn-block btn-secondary"><b>Attendance of your tribe</b></a>
          <a href="#" class="btn btn-block btn-secondary"><b>Admin Records</b></a>
        </div>
      </div>

    </div>
  </div>

</div>
