<div class="card card-primary card-outline">
  <div class="card-body box-profile">
    <h3 class="text-center">Life Class</h3>
    <p class="text-muted text-center"><a class = "custom" href="index.php?view=trainings">[Back to Trainings]</a></p>

    <hr>
    <div class="card elevation-2">
      <div class="card-body">
        <table class="table table-hover table-striped" id="tblLifeClass">
          <thead>
            <tr>
              <th>Week No.</th>
              <th>Self Check</th>
              <th>Confirmed By</th>
            </tr>
          </thead>
          <tbody id="tblLifeClassBody">
            <?php
            for ($i = 1; $i < 6; $i++) {
              echo "<tr>";
              echo "<td>Week $i</td>";
              echo "<td>";
              echo "<div class='custom-control custom-switch custom-switch-off-danger custom-switch-on-success'>";
              echo "<input data-attribute='{$i}' type='checkbox' class='custom-control-input switchInput' id='swW{$i}' name='swW{$i}'>";
              echo "<label class='custom-control-label switchLabel' for='swW{$i}'>Absent</label>";
              echo "</div>";
              echo "</td>";
              echo "<td>";
              echo "Ricardo J. Madlangtuta";
              echo "</td>";
              echo "</tr>";
            }

            ?>

            <tr>
              <td class="text-center" colspan="3"><b>3 Day Encounter</b></td>
            </tr>

            <?php
            for ($i = 1; $i < 4; $i++) {
              echo "<tr>";
              echo "<td>Day 1</td>";
              echo "<td><button class='btn btn-sm btn-success'>Attended</button></td>";
              echo "<td>Ricardo J. Madlangtuta</td>";
              echo "</tr>";
            }
            ?>
            
         
            <?php
            for ($i = 6; $i < 9; $i++) {
              echo "<tr>";
              echo "<td>Week $i</td>";
              echo "<td>";
              echo "<div class='custom-control custom-switch custom-switch-off-danger custom-switch-on-success'>";
              echo "<input data-attribute='{$i}' type='checkbox' class='custom-control-input switchInput' id='swW{$i}' name='swW{$i}'>";
              echo "<label class='custom-control-label switchLabel' for='swW{$i}'>Absent</label>";
              echo "</div>";
              echo "</td>";
              echo "<td>";
              echo "Ricardo J. Madlangtuta";
              echo "</td>";
              echo "</tr>";
            }

            ?>
          </tbody>
        </table>
      </div>
      <div class="card-footer">
            <button id = "btnSubmitLC" class = "btn btn-block btn-secondary">Submit</button>
      </div>
    </div>
  </div>

</div>