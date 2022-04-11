<div class="card card-primary card-outline">
  <div class="card-body box-profile">
    <a href="index.php?view=tribe" class="btn btn-block bg-orange"><b>My Tribe</b></a>
    <?php
    if ($day_now == 'Sunday') {
      echo '<a href="index.php?view=attendance" class="btn btn-block bg-orange"><b>Sunday Celebration</b></a>';
    } else {
      echo '<a href="Javascript:void(0);" class="btn btn-block bg-orange disabled"><b>Sunday Celebration</b></a>';
    }
    ?>
    <a href="index.php?view=badge" class="btn btn-block bg-orange"><b>My Badge</b></a>
    <a href="index.php?view=lifestyle" class="btn btn-block bg-orange"><b>Lifestyle</b></a>
    <a href="Javascript:void(0);" class="btn btn-block bg-orange"><b>Tribe Approval&nbsp;<span class="badge bg-danger">1</span></b></a>
    <a href="logout.php" class="btn btn-block bg-orange"><b>Logout</b></a>
  </div>
</div>


<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">About Me</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <strong><i class="fas fa-users mr-1"></i> Tribe Leader</strong>

    <p id = "user_tl" class="text-muted">

    </p>

    <hr>
    <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

    <p id = "user_address" class="text-muted">
     
    </p>

    <hr>

    <strong><i class="fas fa-phone mr-1"></i> Contact</strong>

    <p id = "user_contact" class="text-muted"></p>

    <hr>

    <strong><i class="fas fa-calendar mr-1"></i> Birthdate</strong>
    <p id = "user_birthdate" class="text-muted"></p>
  </div>

</div>