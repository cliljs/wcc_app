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
  <title>WCC | Member's Portal</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="frontend/plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="frontend/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="frontend/plugins/sweetalert2/sweetalert2.min.css">
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
      min-width: 45vh !important;
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
                    <p class="h1"><b>WCC </b>Member's Portal</p>
                  </div>
                  <div class="card-body">
                    <p class="login-box-msg">Sign in to start your session</p>
                    <div class="alert alert-danger" style = "display:none;">
                      <h5><i class="icon fas fa-ban"></i> Login</h5>
                      <div class = "err-message">

                      </div>    
                    </div>
                    <form id = "frmLogin">
                      <div class="input-group mb-3">
                        <input id = "username" name = "username" type="text" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-user"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input id = "password" name = "password" type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-8">
                          <p class="mb-1">
                            <a href="Javascript:void(0)">I forgot my password</a>
                          </p>
                          <p class="mb-0">
                            <a href="register.php" class="text-center">Register a new account</a>
                          </p>
                        </div>

                        <div class="col-4">
                          <button type="submit" class="btn btn-danger btn-block">Sign In</button>
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

  <script src="frontend/dist/js/adminlte.min.js"></script>
  <script src="frontend/dist/js/common.js"></script>
  <script>
    $(function() {
     
      $("#frmLogin").on('submit',function(e){
        e.preventDefault();
        $(".alert").hide();
        let fd = new FormData(this);
       
        let data = fireAjax('AccountController.php?action=account_login', fd, true).then(function(data) {
          let obj = jQuery.parseJSON(data.trim()); 
          if(obj.hasOwnProperty('msg')){
            $(".alert").show();
            $(".err-message").html(obj.msg);
          } else{
            window.location.href = home_url;
          }
        }).catch(function(err){
          console.log(err);
          fireSwal("Member's Portal",varErrMessage,"error");
        });
      });
    });
  </script>
</body>

</html>