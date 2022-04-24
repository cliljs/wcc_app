<div class="card card-primary card-outline">
  <div class="card-body box-profile">
    <a href="index.php?view=tribe" class="btn btn-block btn-lg btn-secondary"><b>My Tribe</b></a>
    <?php
    // if ($day_now == 'Sunday') {
    //   echo '<a href="index.php?view=attendance" class="btn btn-block btn-lg bg-orange"><b>Sunday Celebration</b></a>';
    // } else {
    //   echo '<a href="Javascript:void(0);" class="btn btn-block btn-lg bg-orange disabled"><b>Sunday Celebration</b></a>';
    // }
    echo '<a href="index.php?view=attendance" class="btn btn-block btn-lg btn-secondary"><b>Sunday Celebration</b></a>';
    ?>
    <a href="Javascript:void(0);" id="btnShowBadge" class="btn btn-block btn-lg btn-secondary"><b>My Badge</b></a>
    <a href="index.php?view=lifestyle" class="btn btn-block btn-lg btn-secondary"><b>Lifestyle</b></a>
    <?php
    if ($is_leader || $is_admin) {
      echo "<a href='index.php?view=notifications' class='btn btn-block btn-lg btn-secondary'><b>Notifications</b></a>";
    }
    if ($is_admin) {
      echo '<a href="index.php?view=qrmaintenance" class="btn btn-block btn-lg btn-secondary"><b>QR Maintenance</b></a>';
    }
    ?>

    <!-- <a href="Javascript:void(0);" class="btn btn-block btn-lg btn-secondary"><b>Tribe Approval&nbsp;<span class="badge bg-danger">1</span></b></a> -->
    <a href="logout.php" class="btn btn-block btn-lg btn-secondary"><b>Logout</b></a>
  </div>
</div>


<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">About Me</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <strong><i class="fas fa-users mr-1"></i> Tribe Leader</strong>

    <p id="user_tl" class="text-muted">

    </p>

    <hr>
    <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

    <p id="user_address" class="text-muted">

    </p>

    <hr>

    <strong><i class="fas fa-phone mr-1"></i> Contact</strong>

    <p id="user_contact" class="text-muted"></p>

    <hr>

    <strong><i class="fas fa-calendar mr-1"></i> Birthdate</strong>
    <p id="user_birthdate" class="text-muted"></p>
  </div>

</div>

