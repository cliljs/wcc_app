<div class="card card-primary card-outline">
  <div class="card-body box-profile">
    <h3 class="text-center">Sunday Celebration</h3>
    <p class="text-muted text-center"><a class = "custom" href="index.php?view=lifestyle">[Back to Lifestyle]</a></p>
    <hr>
    <div class="card elevation-2">
      <div class="card-header">
        <div class="form-group">
          <label>Year:</label>
          <select id="year" name="year" class="form-control select2bs4" style="width: 100%;">
            <?php
            for ($i = 2022; $i < 2099; $i++) {
              echo "<option value = '$i'>$i</option>";
            }
            ?>
          </select>
        </div>


        <table class="table table-bordered">
          <thead>

          </thead>
          <tbody>
            <?php
            for ($i = 1; $i < 13; $i++) {
              $monthName   = date('F', mktime(0, 0, 0, $i, 10));
              $days = getSundays(2022, $i);
              echo "<tr>";
              echo "<td class = 'text-center' colspan = '5' style = 'font-weight: 900;'>$monthName</td>";
              echo "</tr>";
              echo "<tr>";
              foreach ($days as $day) {
                echo "<td class = 'text-center'>$day</td>";
              }
              echo "</tr>";
              echo "<tr>";
              foreach ($days as $day) {
                echo "<td class = 'text-center'><i class = 'fa fa-circle' style = 'color:green'></i></td>";
              }
              
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
        <div class="form-group">
          <a href="#" class="btn btn-block btn-secondary"><b>Attendance of your tribe</b></a>
          <a href="#" class="btn btn-block btn-secondary"><b>Admin Records</b></a>
        </div>
      </div>

    </div>
  </div>

</div>

<?php

function getSundays($y, $m)
{
  $date = "$y-$m-01";
  $first_day = date('N', strtotime($date));
  $first_day = 7 - $first_day + 1;
  $last_day =  date('t', strtotime($date));
  $days = array();
  for ($i = $first_day; $i <= $last_day; $i = $i + 7) {
    $days[] = $i;
  }
  return  $days;
}

?>