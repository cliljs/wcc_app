<?php
// if (stristr($_SERVER['HTTP_USER_AGENT'], 'Mobile') || stristr($_SERVER['HTTP_USER_AGENT'], 'Android')) {
// } else {
//   echo "<h1>403 Forbidden</h1><p>Phone lang bay.</p>";
//   exit;
// }
session_start();
$is_login = (isset($_SESSION["pk"])) ? true : false;
if ($is_login) {
  header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WCC | Account Registration</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="frontend/plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="frontend/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="frontend/plugins/sweetalert2/sweetalert2.min.css">
  <link rel="stylesheet" href="frontend/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="frontend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <style>
    .bg-orange {
      color: white !important;
    }

    .card-primary.card-outline {
      border-top: 3px solid #c0392b !important;
    }

    .card-primary:not(.card-outline)>.card-header {
      background-color: #c0392b !important;
    }

    a {
      color: #c0392b !important;
    }

    .vh-50 {
      min-width: 60vh !important;
    }


    .widget-user .widget-user-header {
      height: 240px !important;
    }

    .card {
      margin-bottom: 0px !important;
    }
  </style>
</head>

<body class="hold-transition login-page pt-5" style="justify-content:flex-start !important">
  <div class="wrapper">
    <div class="container">
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 vh-50">
              <div class="card card-widget widget-user shadow-lg">

                <div class="widget-user-header text-white p-2" style="background: url('frontend/assets/wcc.jpg ') center center;">

                </div>


              </div>
              <div class="login-box vh-50">

                <div class="card card-outline card-primary">
                  <div class="card-header text-center">
                    <a href="Javascript:void(0);" class="h1"><b>WCC </b>Account Registration</a>
                  </div>
                  <div class="card-body">
                    <p class="login-box-msg">Fill-out all information fields below</p>

                    <form id="frmRegister">
                      <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter desired username">
                      </div>
                      <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter your first name">
                      </div>
                      <div class="form-group">
                        <label for="middlename">Middle Name</label>
                        <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Enter your middle name">
                      </div>
                      <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter your last name">
                      </div>
                      <div class="form-group">
                        <label for="birthdate">Birthdate</label>
                        <input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="Enter your birthdate">
                      </div>
                      <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address">
                      </div>
                      <div class="form-group">
                        <label for="contact">Contact No.</label>
                        <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter your contact number">
                      </div>
                      <div class="form-group">
                        <label for="gender">Gender</label>
                        <select id="gender" name="gender" class="form-control select2bs4" style="width: 100%;">
                          <option selected="selected" disabled="disabled">Please select your gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
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
                      <div class="form-group">
                        <label for="branch">Branch</label>
                        <select id="branch" name="branch" class="form-control select2bs4" style="width: 100%;">
                          <option selected="selected" disabled="disabled">Please select your branch</option>
                          <option value="Bataan">Bataan</option>
                          <option value="Gensan">Gensan</option>
                          <option value="Kalibo">Kalibo</option>
                          <option value="Valenzuela">Valenzuela</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="inviter">Inviter</label>
                        <select id="inviter" name="inviter" class="form-control select2bs4" style="width: 100%;">
                          <option selected="selected" disabled="disabled">Please select your inviter</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="ref_code">Tribe Leader</label>
                        <select id="leader_name" name="leader_name" class="form-control select2bs4" style="width: 100%;">


                        </select>
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your new password">
                      </div>
                      <div class="form-group">
                        <label for="contact">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm new password">
                      </div>
                      <div class="row">
                        <div class="col-4 mt-4">
                          <a style="color:#ffffff !important;" href="login.php" class="btn btn-secondary btn-block">Back</a>
                        </div>
                        <div class="col-4">

                        </div>
                        <div class="col-4 mt-4">

                          <button type="submit" class="btn btn-danger btn-block">Register</button>
                        </div>

                      </div>
                    </form>


                  </div>

                </div>

              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

  <script src="frontend/plugins/jquery/jquery.min.js"></script>
  <script src="frontend/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="frontend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="frontend/plugins/select2/js/select2.full.min.js"></script>
  <script src="frontend/dist/js/adminlte.min.js"></script>
  <script src="frontend/dist/js/common.js"></script>
  <script>
    $(function() {

      getLeaders();
      $('#frmRegister').on('submit', function(e) {
        e.preventDefault();
        let fd = new FormData(this);
        let data = fireAjax('AccountController.php?action=create_account', fd, true).then(function(data) {
          let obj = jQuery.parseJSON(data.trim());
          if (obj.success == 1) {
            fireSwal("Account Registration", "Failed to create account. Please try again.", "error");
            Swal.fire({
              icon: 'success',
              title: 'Account Registration',
              text: 'Account created successfully. Click OK to return to login page.',
              showDenyButton: false,
              showCancelButton: false,
              allowOutsideClick: false,
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = home_url + 'login.php';
              }
            })
          }
        }).catch(function(err) {
          console.log(err)
          fireSwal("Account Registration", "Failed to create account. Please try again.", "error");
        });
      });
      $("#branch").on("change", function() {
        let payload = {
          branch: $(this).val()
        };
        getInviters(payload);
      });
      $("#profile_picture").on("change", function() {
        $(".custom-file-label").html("Image Selected");
      });

      function getInviters(branch) {
        let data = fireAjax('TribeController.php?action=get_inviter_names', branch, false).then(function(data) {
          console.log(data)
          let obj = jQuery.parseJSON(data.trim());
          let tls = obj.data;
          let renderVal = '<option selected="selected" disabled="disabled">Please select your inviter</option>';
          $.each(tls, function(k, v) {
            renderVal += '<option value="' + v.id + '">' + v.fullname + '</option>';
          });
          $("#inviter").html(renderVal);
        }).catch(function(err) {
          console.log(err)
          fireSwal('Account Registration', 'Failed to retrieve list of inviters. Please reload the page', 'error');
        })



        $('#inviter').select2({
          theme: 'bootstrap4'
        });
      }

      function getLeaders() {


        let data = fireAjax('TribeController.php?action=get_leader_names', '', false).then(function(data) {
          console.log(data)
          let obj = jQuery.parseJSON(data.trim());
          let tls = obj.data;
          let renderVal = '<option selected="selected" disabled="disabled">Please select your tribe leader</option>';
          $.each(tls, function(k, v) {
            renderVal += '<option value="' + v.id + '">' + v.fullname + '</option>';
          });
          $("#leader_name").html(renderVal);
        }).catch(function(err) {
          console.log(err)
          fireSwal('Account Registration', 'Failed to retrieve list of tribe leaders. Please reload the page', 'error');
        })



        $('#leader_name').select2({
          theme: 'bootstrap4'
        });
      }

    });
  </script>
</body>

</html>