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
    if ($is_admin) {
      echo '<a href="index.php?view=qrmaintenance" class="btn btn-block btn-lg btn-secondary"><b>QR Maintenance</b></a>';
    }
    if ($is_pastor) {
      echo '<a href="index.php?view=admins" class="btn btn-block btn-lg btn-secondary"><b>System Administrators</b></a>';
    }
    ?>
    
    <a href='index.php?view=notifications' class='btn btn-block btn-lg btn-secondary'><b>Notifications</b>&nbsp;&nbsp;<span class="badge badge-danger right unreadCount"></span></a>
    
    <a id="btnPersonalInformation" href="Javascript:void(0);" class="btn btn-block btn-lg btn-secondary"><b>Personal Information</b></a>
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

<div class="modal fade" id="mdlPersonal" tabindex="-1" role="dialog" aria-labelledby="mdlPersonalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="frmPersonal">
        <div class="modal-header">
          <h4 class="modal-title" id="mdlPersonalLabel">Personal Information</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter new username" value="<?php echo $_SESSION['username']; ?>">
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter your first name" value="<?php echo $_SESSION['firstname']; ?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="middlename">Middle Name</label>
                <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Enter your middle name" value="<?php echo $_SESSION['middlename']; ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter your last name" value="<?php echo $_SESSION['lastname']; ?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="birthdate">Birthdate</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="Enter your birthdate" value="<?php echo $_SESSION['birthdate']; ?>">
              </div>
            </div>
          </div>


          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address" value="<?php echo $_SESSION['address']; ?>">
          </div>
          <div class="form-group">
            <label for="contact">Contact No.</label>
            <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter your contact number" value="<?php echo $_SESSION['contact']; ?>">
          </div>
          <div class="form-group">
            <label for="profile_picture">Profile Picture</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" accept=".jpg, .png, .jpeg, .bmp" class="custom-file-input" id="profile_picture" name="profile_picture">
                <label class="custom-file-label" for="profile_picture">Choose Image</label>
              </div>

            </div>
          </div>
          <hr>
          <h4>Password</h4>
          <p class="text-muted">Leave blank if unchanged</p>
          <div class="form-group">
            <label for="contact">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your new password">
          </div>
          <div class="form-group">
            <label for="contact">Confirm Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm new password">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info">Update</button>
        </div>
    </div>
    </form>
  </div>
</div>

</div>