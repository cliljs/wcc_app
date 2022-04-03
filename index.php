<?php
// if (stristr($_SERVER['HTTP_USER_AGENT'], 'Mobile') || stristr($_SERVER['HTTP_USER_AGENT'], 'Android')) {
// } else {
//   echo "<h1>403 Forbidden</h1><p>Phone lang bay.</p>";
//   exit;
// }
session_start();
$source = (isset($_GET["view"])) ? $_GET["view"] : "home";
$is_admin = (isset($_SESSION["is_admin"])) ? true : false;
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

    .vh-50{
      min-width:60vh !important;
    }
    .widget-user .widget-user-image{
      top:145px !important;
    }
    .widget-user .widget-user-header{
      height: 200px !important;
    }
  </style>
</head>

<body class="hold-transition login-page pt-5" style="justify-content:flex-start !important">
  <div class="wrapper">

    <div class="container">


      <section class="content">
        <div class="container-fluid">
          <?php
          switch ($source) {
            case "home":
              include "frontend/views/home.php";
              break;
            case "tribe":
              include "frontend/views/tribe.php";
              break;
            default:
              include "frontend/views/404.php";
              break;
          }
          ?>
        </div>
      </section>

    </div>


  </div>

  <script src="frontend/plugins/jquery/jquery.min.js"></script>
  <script src="frontend/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="frontend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="frontend/dist/js/adminlte.min.js"></script>
  <script>
    $(function() {
      let me = getUrlVars()['view'];
      if (me == null || me == 'home') {

      }else if (me == 'tribe') {

} 

    });

    function fireSwal(swalTitle, swalBody, swalIcon) {
      Swal.fire({
        title: swalTitle,
        text: swalBody,
        icon: swalIcon
      })
    }


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