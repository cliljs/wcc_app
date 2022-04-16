<div class="card card-primary card-outline">
  <div class="card-body box-profile">
    <h3 class="text-center" id = "trainingLabel"></h3>
    <p class="text-muted text-center"><a class="custom" href="index.php?view=trainings">[Back to Trainings]</a></p>

    <hr>
    <div class="card elevation-2">
      <div class="card-body">
        <table class="table table-hover table-striped" id="tblSOL">
          <thead>
            <tr>
              <th>Lesson</th>
              <th>Self Check</th>
              <th>Confirmed By</th>
            </tr>
          </thead>
          <tbody id="tblLessonBody">
            <?php
            for ($i = 1; $i < 6; $i++) {
              echo "<tr>";
              echo "<td>Lesson $i</td>";
              echo "<td>";
              echo "<div class='custom-control custom-switch custom-switch-off-danger custom-switch-on-success'>";
              echo "<input data-attribute='{$i}' type='checkbox' class='custom-control-input switchSOLInput' id='swSOLLesson{$i}' name='swSOLLesson{$i}'>";
              echo "<label class='custom-control-label switchSOLLabel' for='swSOLLesson{$i}'>Absent</label>";
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
        <button id="btnSubmitSOL" class="btn btn-block btn-secondary">Submit</button>
      </div>
    </div>
  </div>

</div>