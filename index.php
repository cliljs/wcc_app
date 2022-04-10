<?php
// if (stristr($_SERVER['HTTP_USER_AGENT'], 'Mobile') || stristr($_SERVER['HTTP_USER_AGENT'], 'Android')) {
// } else {
//   echo "<h1>403 Forbidden</h1><p>Phone lang bay.</p>";
//   exit;
// }
session_start();
$source = (isset($_GET["view"])) ? $_GET["view"] : "home";
$is_admin = (isset($_SESSION["is_admin"])) ? true : false;
$is_login = (isset($_SESSION["user_id"])) ? true : false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WCC | Logged User</title>

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
      border-top: 3px solid #fd7e14 !important;
    }

    .card-primary:not(.card-outline)>.card-header {
      background-color: #fd7e14 !important;
    }

    a {
      color: #fd7e14 !important;
    }

    .vh-50 {
      min-width: 60vh !important;
    }

    .widget-user .widget-user-image {
      top: 185px !important;
      margin-left: -60px !important;
    }

    .widget-user .widget-user-header {
      height: 240px !important;
    }

    .widget-user .widget-user-image>img {
      width: 120px !important;
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

                <div class="widget-user-header text-white" style="background: url('frontend/assets/wcc.jpg ') center center;">
                  <h3 class="widget-user-username text-right">Father Bro</h3>
                  <h5 class="widget-user-desc text-right">Bataan Branch</h5>
                </div>
                <div class="widget-user-image">
                  <img class="img-circle elevation-1" src="https://via.placeholder.com/250" alt="User Avatar">
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-sm-6 border-right">
                      <div class="description-block">
                        <h5 class="description-header">3,200</h5>
                        <span class="description-text">Members</span>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="description-block">
                        <h5 class="description-header">13,000</h5>
                        <span class="description-text">Invites</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
              switch ($source) {
                case "home":
                  include "frontend/views/home.php";
                  break;
                case "tribe":
                  include "frontend/views/tribe.php";
                  break;
                case "attendance":
                  include "frontend/views/attendance.php";
                  break;
                case "badge":
                  include "frontend/views/badge.php";
                  break;
                case "lifestyle":
                  include "frontend/views/lifestyle.php";
                  break;
                case "trainings":
                  include "frontend/views/trainings.php";
                  break;
                case "celebration":
                  include "frontend/views/celebration.php";
                  break;
                default:
                  include "frontend/views/404.php";
                  break;
              }
              ?>
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
  <script src="frontend/dist/js/common.js"></script>
  <script src="frontend/dist/js/adminlte.min.js"></script>
  <script>
    $(function() {
      let me = getUrlVars()['view'];
      if (me == null || me == 'home') {

      } else if (me == 'tribe') {

      } else if (me == 'attendance') {

      }

    });

    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });

    function getUrlVars() {
      let vars = [],
        hash;
      let hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
      for (let i = 0; i < hashes.length; i++) {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1]
      }
      return vars
    }
  </script>
</body>

</html>