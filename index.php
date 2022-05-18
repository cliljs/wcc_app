<?php
// if (stristr($_SERVER['HTTP_USER_AGENT'], 'Mobile') || stristr($_SERVER['HTTP_USER_AGENT'], 'Android')) {
// } else {
//   echo "<h1>403 Forbidden</h1><p>Phone lang bay.</p>";
//   exit;
// }
date_default_timezone_set('Asia/Manila');
session_start();
// $_SESSION["is_admin"] = "1";
$source = (isset($_GET["view"])) ? $_GET["view"] : "home";
$is_login = (isset($_SESSION["pk"])) ? true : false;
if (!$is_login) {
  header("Location: login.php");
}

$is_admin = ($_SESSION["is_admin"] == "1") ? true : false;
$is_leader = ($_SESSION["is_leader"] == "1") ? true : false;
$is_pastor = ($_SESSION["is_pastor"] == "1") ? true : false;

$day_now = date("l");
$today = date("F j Y, l");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Bryan Nikko V. Barata, Calil Christopher Jaudian">
  <title id="app_title">WCC</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="frontend/plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="frontend/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="frontend/dist/css/preloader.css">
  <link rel="stylesheet" href="frontend/plugins/sweetalert2/sweetalert2.min.css">
  <link rel="stylesheet" href="frontend/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="frontend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="frontend/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="frontend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="frontend/dist/css/materialdesignicons.css" />

  <style>
    a.dropdown-item {
      color: #34495e !important;
    }

    .dropdown-list-image {
      position: relative;
      height: 2.5rem;
      width: 2.5rem;
    }

    .dropdown-list-image img {
      height: 2.5rem;
      width: 2.5rem;
    }

    .btn-light {
      color: #2cdd9b;
      background-color: #e5f7f0;
      border-color: #d8f7eb;
    }

    .left-icon-holder {
      position: relative;
    }

    .left-icon-holder .fa {
      position: absolute;
      line-height: 24px;
      top: 50%;
      margin-top: -12px;
      left: 10px;
    }

    .bg-orange {
      color: white !important;
    }

    .theme-color {
      color: #c0392b;
    }

    .card-primary.card-outline {
      border-top: 3px solid #c0392b !important;
    }

    .card-primary:not(.card-outline)>.card-header {
      background-color: #c0392b !important;
    }

    a {
      color: #ffffff !important;
    }

    a.custom,
    a.notifName {
      color: #c0392b !important;
    }

    a.btn-dark,
    a.btn-success {
      color: #ffffff !important;
    }

    .vh-50 {
      min-width: 45vh !important;
    }

    .widget-user .widget-user-image {
      top: 150px !important;
      margin-left: -60px !important;
    }

    .widget-user .widget-user-header {
      height: 240px !important;
    }

    .widget-user .widget-user-image>img {
      width: 120px !important;
    }

    .with-attendance {
      color: green !important;
    }

    .no-attendance {
      color: red !important;
    }
  </style>
</head>

<body class="hold-transition login-page pt-2" style="justify-content:flex-start !important">

  <div class="wrapper">

    <div class="container">


      <section class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12 vh-50">
              <div class="card card-widget widget-user shadow-lg">

                <div class="widget-user-header text-white" style="background: url('frontend/assets/wcc.jpg ') center center;">
                  <h2 id="user_name" class="widget-user-username text-right"></h2>
                  <h5 id="user_branch" class="widget-user-desc text-right"></h5>
                </div>
                <div class="widget-user-image">
                  <img id="user_dp" class="img-circle elevation-1" src="./backend/framework/uploads/images/user.png" alt="User Avatar">
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-sm-6 border-right">
                      <div class="description-block">
                        <h5 class="description-header" id="user_training">N/A</h5>
                        <span class="description-text text-muted">Training</span>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="description-block">
                        <h5 class="description-header" id="user_invites">-</h5>
                        <span class="description-text text-muted">Invites</span>
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
                case "cellgroup":
                  include "frontend/views/cellgroup.php";
                  break;
                case "trainings":
                  include "frontend/views/trainings.php";
                  break;
                case "lifeclass":
                  include "frontend/views/lifeclass.php";
                  break;
                case "mentoring":
                  include "frontend/views/mentoring.php";
                  break;
                case "sol1":
                case "sol2":
                case "sol3":
                  include "frontend/views/sol.php";
                  break;
                case "reencounter":
                  include "frontend/views/reencounter.php";
                  break;
                case "celebration":
                  include "frontend/views/celebration.php";
                  break;
                case "qrmaintenance":
                  include "frontend/views/qrmaintenance.php";
                  break;
                case "notifications":
                  include "frontend/views/notifications.php";
                  break;
                case "tribeattendance":
                  include "frontend/views/tribeattendance.php";
                  break;
                case "admins":
                  include "frontend/views/admins.php";
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
    <div class="modal fade" id="mdlBadge" tabindex="-1" role="dialog" aria-labelledby="mdlBadgeLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="mdlBadgeLabel">My Badge</h5>

          </div>
          <div class="modal-body text-center">
            <h3 class="text-muted" id="badge_name"><?php echo $_SESSION['login_name']; ?></h3>
            <img id="badge_training" class="img-fluid" src="https://via.placeholder.com/500">
            <div class="card elevation-1 mt-3">
              <div class="card-header text-center">
                <h4 id="badge_date" class="theme-color"><?php echo date('F j, Y'); ?></h4>
                <h5 id="badge_attendance" class="theme-color"></h5>

              </div>
              </card>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

    </div>

    <script src="frontend/plugins/jquery/jquery.min.js"></script>
    <script src="frontend/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="frontend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="frontend/plugins/select2/js/select2.full.min.js"></script>
    <script src="frontend/dist/js/jquery.preloader.min.js"></script>
    <script src="frontend/plugins/moment/moment.min.js"></script>
    <script src="frontend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="frontend/dist/js/common.js"></script>
    <script src="frontend/dist/js/adminlte.min.js"></script>
    <script src="frontend/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <script src="frontend/dist/js/html5-qrcode.min.js"></script>
    <script src="frontend/dist/js/jquery-qrcode.min.js"></script>

    <script>
      $(function() {

        let me = getUrlVars()['view'];
        let act = getUrlVars()['action'];
        let session = getUrlVars()['session'];
        loadHeader();
        loadSubheader();

        if (me == null || me == 'home') {
          $('#btnShowBadge').on('click', function() {
            showBadge();
          });

          if (act == 1) {
            showBadge();
          }

          $('#btnPersonalInformation').on('click', function() {
            $('#mdlPersonal').modal({
              backdrop: 'static'
            });
          });

          $('#frmPersonal').on('submit', function(e) {
            e.preventDefault();
            let fd = new FormData(this);
            preload('#frmPersonal', true);
            fireAjax('AccountController.php?action=update_account', fd, true).then(function(data) {
              console.log(data);
              preload('#frmPersonal', false);
              let obj = $.parseJSON(data.trim());
              if (obj.success == 1) {
                Swal.fire({
                  title: 'Personal Information',
                  text: 'Personal Information updated successfully. Click OK to reload the page',
                  icon: 'success',
                  showDenyButton: false,
                  showCancelButton: false,
                  confirmButtonText: 'Ok',
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.reload();
                  }
                })
              } else {
                fireSwal('Personal Information', 'Failed to update personal information. Please try again', 'error');
              }
            }).catch(function(err) {
              console.log(err);
              fireSwal('Personal Information', 'Failed to update personal information. Please try again', 'error');
            });
          });

          $('#newQRCodeMaintenance').on('click', function() {

            fireAjax('QRController.php?action=update_qr', '', false).then(function(data) {

              let obj = jQuery.parseJSON(data.trim()).data;
              if (obj) {
                let qrcontent = obj.qr_code;
                $('#qr-view-content').html(qrcontent);
                $('#viewQRCodeMaintenance').empty();
                $('#viewQRCodeMaintenance').qrcode({
                  text: qrcontent
                });
                fireSwal('QR Maintenance', 'QR updated successfully', 'success');
              }

            }).catch(function(err) {
              console.log(err);
              fireSwal('QR Maintenance', 'Failed to generate new QR. Please try again.', 'error');
            });
          });
          $('#btnQR').on('click', function() {
            fireAjax('QRController.php?action=get_qr_details', '', false).then(function(data) {
              let objData = $.parseJSON(data.trim()).data;
              let qrcontent = objData.qr_code;

              $('#mdlQRMaintenance').modal({
                backdrop: 'static'
              });
              $('#qr-view-content').html(qrcontent);
              $('#viewQRCodeMaintenance').empty();
              $('#viewQRCodeMaintenance').qrcode({
                text: qrcontent
              });
            }).catch(function(err) {
              fireSwal('QR Maintenance', 'Failed to retrieve QR details. Please try again', 'error');
            })

          });
          $("#profile_picture").on("change", function() {
            $(".custom-file-label").html("Image Selected");
          });
        } else if (me == 'tribe') {
          loadDisciples();
          getLeaders();
          $('body').on('click', '.viewTribeMembers', function() {

            if ($(this).hasClass('fa-minus')) return;
            let tribeID = $(this).attr('data-id');
            loadSubDisciples(tribeID);
          });
          $('body').on('click', '.btnTribeTransfer', function() {
            let thisButton = $(this);
            $('#txTransferName').attr('data-id', thisButton.attr('data-id'));
            $('#txTransferName').val(thisButton.attr('data-name'));
            $('#mdlTransfer').modal({
              backdrop: 'static'
            });
          });
          $('body').on('click', '.btnTribePassword', function() {
            let memberID = $(this).attr('data-id');
            let el = $(this).parent();

            Swal.fire({
              icon: 'info',
              title: 'Reset Password',
              text: 'Are you sure you want to reset this member\s password?',
              allowOutsideClick: false,
              showCancelButton: true,
              confirmButtonText: 'Yes, reset',

            }).then((result) => {

              if (result.isConfirmed) {


                fireAjax('AccountController.php?action=reset_password&id=' + memberID, '', false).then(function(data) {
                  console.log(data);

                  let obj = $.parseJSON(data.trim());
                  if (obj.success == 1) {
                    fireSwal('Reset Password', 'Member\'s password reset successfully.', 'success');
                  } else {
                    fireSwal('Reset Password', 'Failed to reset password. Please try again', 'error');
                  }
                }).catch(function(err) {
                  console.log(err);
                  fireSwal('Reset Password', 'Failed to reset password. Please try again', 'error');
                })
              }
            });
          });
          $('body').on('click', '.memberLifestyle', function() {
            let selectedLS = $(this);
            let pk = selectedLS.attr('data-id');
            $('#member_select_year').attr('data-id', pk);
            let ajaxRoute = '';
            let currentFrame = '';
            let frames = ['mdlCellgroup', 'mdlTrainings', 'mdlMentoring', 'mdlSundayCelebration'];
            $.each(frames, function(index, value) {
              $('#' + value).hide();
            });
            switch (selectedLS.html()) {
              case 'Cellgroup':
                currentFrame = 'mdlCellgroup';
                lifestyleCellgroup(pk);
                break;
              case 'Trainings':
                currentFrame = 'mdlTrainings';
                $('#collapseLifeclass').attr('data-id', pk);
                $('#collapseSOL1').attr('data-id', pk);
                $('#collapseSOL2').attr('data-id', pk);
                $('#collapseSOL3').attr('data-id', pk);
                $('#collapseReencounter').attr('data-id', pk);
                break;
              case 'Mentoring':
                currentFrame = 'mdlMentoring';
                lifestyleMentoring(pk);
                break;
              case 'Sunday Celebration Attendance':
                currentFrame = 'mdlSundayCelebration';
                lifestyleSundayAttendance(pk, new Date().getFullYear());
                break;
            }
            $('#mdlLifeStyleMemberName').html(selectedLS.attr('data-name'));
            $('#' + currentFrame).show();
            $('#mdlLifeStyle').modal({
              backdrop: 'static'
            });
          });
          $('#btnTransferMember').on('click', function() {
            let payload = {
              new_leader_pk: $('#new_leader_name').val()
            };
            let member_id = $('#txTransferName').attr('data-id');

            fireAjax('TribeController.php?action=transfer_disciple&pk=' + member_id, payload, false).then(function(data) {
              console.log(data);

              let obj = $.parseJSON(data.trim()).success;
              if (obj == 1) {
                loadDisciples();
                $('#mdlTransfer').modal('hide');
                fireSwal('Transfer Member', 'Member transferred successfully. Please wait for pastor\'s confirmation', 'success');
              } else {
                fireSwal('Transfer Member', 'Failed to transfer member. Please reload the page', 'error');
              }
            }).catch(function(err) {
              console.log(err);
              fireSwal('Transfer Member', 'Failed to transfer member. Please reload the page', 'error');
            });
          });
          $('#collapseLifeclass, #collapseSOL1, #collapseSOL2, #collapseSOL3, #collapseReencounter').on('click', function() {
            let thisButton = $(this);
            let thisID = $(this).attr('id').replace('collapse', '');
            let userID = $(this).attr('data-id');
            let iSpan = thisButton.children(':first');

            if (iSpan.hasClass('fa-plus')) {

              lifestyleTraining(userID, thisID);
            }

          });
          $('#member_select_year').on('change', function() {
            let dataID = $(this).attr('data-id');
            let dataYear = $(this).val();
            render_member_calendar(dataID, dataYear);
          });
        } else if (me == 'attendance') {
          let vip_list = [];
          let invite_list = [];
          const html5QrCode = new Html5Qrcode("reader");

          $('body').on('click', '.btnRemoveVIP', function() {
            let row = $(this).closest('tr');
            let tditem = $(this)
              .closest('tr')
              .children('td')
              .html();
            vip_list.splice(vip_list.findIndex(el => el.vip == tditem), 1);
            row.remove();
          });
          $('body').on('click', '.btnRemoveInvite', function() {
            let row = $(this).closest('tr');
            let tditem = $(this)
              .closest('tr')
              .children('td')
              .html();
            invite_list.splice(invite_list.findIndex(el => el.invite == tditem), 1);
            row.remove();
          });
          $('#btnAddVIP').unbind('click').bind('click', function(e) {

            let vipname = $('#vip_name').val();
            if (vipname.trim() == '') {
              fireSwal("Sunday Celebration Attendance", "Please input VIP's Full Name", "info");
              return;
            }
            vip_list.push({
              vip: vipname
            });
            $('#tblVIPBody').append('<tr><td>' + vipname + '</td><td><button class="btn btn-sm btn-outline-dark btnRemoveVIP">Remove</button></td></tr>');
            $('#vip_name').val('');


          });
          $('#select_invites').on('change', function() {
            let select_div = $(".select2-selection__rendered li");
            invite_list = [];
            select_div.each(function(idx, li) {
              var imbayt = $(li).attr('title');
              if (imbayt != null) {
                invite_list.push({
                  invite: imbayt
                });
              }
            });
          });
          $("#btnShowQR").on("click", function() {
            $('#mdlInvites').html(invite_list.length);
            $('#mdlVIPs').html(vip_list.length);
            $("#mdlScanner").modal({
              backdrop: 'static'
            });
            Html5Qrcode.getCameras().then(devices => {
              if (devices && devices.length) {
                var cameraId = devices[1].id;
                html5QrCode.start(
                    cameraId, {
                      fps: 30,
                      qrbox: {
                        width: 500,
                        height: 500
                      }
                    },
                    (decodedText, decodedResult) => {
                      let mergedArray = vip_list.concat(invite_list);
                      console.log(mergedArray);
                      let payload = {
                        bro: mergedArray,
                        qr: decodedText
                      };
                      console.log(payload);
                      html5QrCode.stop();
                      submitSundayAttendance(payload, 'qr');
                    },
                    (errorMessage) => {

                    })
                  .catch((err) => {

                  });
              }
            }).catch(err => {
              fireSwal('QR Scanner', err, 'error');
            });
          });
          $("#qrmode").on('click', function() {
            let divscan = $("#reader");
            let divaccount = $("#readerbypass");
            let scanMode = $(this).html().includes('not working') ? false : true;
            if (!scanMode) {
              divscan.hide();
              divaccount.show();
              $(this).html('Use QR Scanner');
            } else {
              divscan.show();
              divaccount.hide();
              $(this).html('QR Scanner not working?');

            }
          })

          $("#frmByPass").on('submit', function(e) {
            e.preventDefault();
            let mergedArray = vip_list.concat(invite_list);
            let payload = {
              bro: mergedArray,
              tlusername: $("#tlusername").val(),
              tlpassword: $("#tlpassword").val(),
            };
            submitSundayAttendance(payload, 'bypass');
          })
          $("#mdlScanner").on('hidden.bs.modal', function() {
            html5QrCode.stop();
          });

          getMyInvites();
        } else if (me == 'cellgroup') {
          loadCellMembers();
          loadCellgroup();
          $('#cg_time').datetimepicker({
            format: 'LT'
          });
          $('#cg_date').datetimepicker({
            format: 'YYYY-MM-DD'
          });
          $('#frmCellgroup').on('submit', function(e) {
            e.preventDefault();
            let member = $('#inp_name').val() == '' ? $('#select_name').val() : $('#inp_name').val();
            let payload = {
              member_name: member,
              event_place: $("#event_place").val(),
              event_date: $("#event_date").val(),
              event_time: $("#event_time").val()
            };

            fireAjax('CellgroupController.php?action=add_cell', payload, false).then(function(data) {
              let obj = jQuery.parseJSON(data.trim());

              if (obj.success == 1) {
                loadCellgroup();
                $('#inp_name').val('');
                $('#select_name').val(null).trigger('change');

                fireSwal('Cellgroup Attendance', 'Member added to cellgroup successfully', 'success');
              }
            }).catch(function(err) {
              console.log(err);
              fireSwal('Cellgroup Attendance', varErrMessage, 'error');
            });
          });

          $('body').on('click', '.btnRemoveCellgroup', function() {
            let dataID = $(this).attr('data-id');
            let btn = $(this);

            fireAjax('CellgroupController.php?action=remove_cell&id=' + dataID, '', false).then(function(data) {

              let obj = jQuery.parseJSON(data.trim());

              if (obj.success == 1) {
                btn.closest('tr').remove();
                fireSwal('Cellgroup Attendance', 'Member removed successfully', 'success');
              }
            }).catch(function(err) {
              console.log(err);
              fireSwal('Cellgroup Attendance', varErrMessage, 'error');
            })
          });

          function loadCellMembers() {

            let data = fireAjax('CellgroupController.php?action=get_other_names', '', false).then(function(data) {
              console.log(data)

              let obj = jQuery.parseJSON(data.trim());
              let tls = obj.data;
              let renderVal = '<option selected="selected" disabled="disabled">Please select a member from the list</option>';
              $.each(tls, function(k, v) {
                renderVal += '<option value="' + v.fullname + '">' + v.fullname + '</option>';
              });
              $("#select_name").html(renderVal);
            }).catch(function(err) {
              console.log(err)
              fireSwal('Cellgroup Attendance', 'Failed to retrieve list of members. Please reload the page', 'error');
            })



            $('#select_name').select2({
              theme: 'bootstrap4'
            });
          }

          function loadCellgroup() {

            fireAjax('CellgroupController.php?action=get_cell_list', '', false).then(function(data) {

              console.log(data);
              let obj = jQuery.parseJSON(data.trim());
              let objData = obj.data;

              let table_body = '';
              $.each(objData, function(k, v) {
                table_body += '<tr>';
                table_body += '<td>' + v.member_name + '</td>';
                table_body += '<td>' + v.event_place + '</td>';
                table_body += '<td>' + v.event_date + '</td>';
                table_body += '<td>' + v.event_time + '</td>';
                table_body += '<td>' + renderButton('Remove', v.id, 'btnRemoveCellgroup') + '</td>';
                table_body += '</tr>';
              });
              $('#tblCellgroupBody').html(table_body);
            }).catch(function(err) {
              console.log(err);
              fireSwal('Cellgroup Attendance', 'Failed to retrieve list of members. Please try again.', 'error');
            })
          }

          function renderButton(caption, attr, custom_class) {
            let retClass = '';
            switch (caption) {
              case 'Delete':
              case 'Update':
                retClass = 'btn btn-sm btn-info '
                break;
              case 'Remove':
                retClass = 'btn btn-sm btn-outline-dark ';
                break;
            }
            return '<button class="' + retClass + custom_class + '" data-id = "' + attr + '">' + caption + '</button>&nbsp;';
          }
        } else if (me == 'lifeclass') {
          $('body').on('click', '.switchInput', function() {
            let my_attendance = 0;
            let dataID = $(this).attr('data-id');
            let lesson_id = $(this).attr('data-lesson');
            if ($(this).is(':checked')) {
              $(this).next().html('Attended');
              my_attendance = 1;
            } else {
              $(this).next().html('Absent');
            }
            let payload = {
              attendance: my_attendance,
              lesson_pk: lesson_id
            }

            fireAjax('SchoolingController.php?action=schooling_attendance&id=' + dataID, payload, false).then(function(data) {

              console.log(data);
              let objData = $.parseJSON(data.trim()).data;
              console.log(objData);
              if (objData == false) {
                fireSwal('Training', 'Failed to update attendance. Please reload the page', 'error');

              } else {
                fireSwal('Training', 'Attendance updated successfully. Please wait for your leader\'s confirmation', 'success');
              }

            }).catch(function(err) {
              console.log(err);
              fireSwal('Training', 'Failed to update attendance. Please reload the page', 'error');
            })
          });
          $('#btnSubmitLC').on('click', function() {
            let payload = {
              enroll_pk: session
            };

            fireAjax('EnrollmentController.php?action=graduate', payload, false).then(function(data) {

              console.log(data);
              let objData = $.parseJSON(data.trim()).data;

              if (objData == 0) {
                fireSwal('Training', 'Failed to complete training. Please try again', 'error');
              } else if (objData == -1) {
                fireSwal('Training', 'Please complete all lessons before submitting this training. Be sure that all training attendance are confirmed by your leader', 'info');
              } else {
                Swal.fire({
                  icon: 'success',
                  title: 'Training',
                  text: 'Training completed. Click OK to continue',
                  showDenyButton: false,
                  showCancelButton: false,
                  confirmButtonText: 'Ok',

                }).then((result) => {

                  if (result.isConfirmed) {
                    window.location.href = home_url + 'index.php?view=trainings';
                  }
                });
              }

            }).catch(function(err) {
              console.log(err);
              fireSwal('Training', 'Failed to complete training. Please try again', 'error');
            });
          });
          let payload = {
            lesson_type: 'LIFE_CLASS'
          };

          fireAjax('SchoolingController.php?action=get_user_schooling', payload, false).then(function(data) {

            console.log(data);
            let objData = $.parseJSON(data.trim()).data;
            let retval = '';
            let blankCount = 0;
            let is_completed = false;
            $.each(objData, function(k, v) {
              if (v.graduate_status == 1) is_completed = true;
              retval += '<tr>';
              retval += '<td>' + v.lesson_title + '</td>';
              retval += '<td>';
              if (v.date_approved == null) {
                retval += '<div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">';
                retval += '<input data-lesson = "' + v.lesson_pk + '" data-id="' + v.id + '" type="checkbox" class="custom-control-input switchInput" id="swW' + v.id + '" name="swW' + v.id + '" ';
                retval += (v.attendance == null || v.attendance == 0) ? '' : 'checked ';
                retval += (v.leader_pk == 0) ? '>' : 'disabled>';
                retval += '<label class="custom-control-label switchLabel" for="swW' + v.id + '">';
                retval += (v.attendance == null || v.attendance == 0) ? 'Absent' : 'Attended ';
                retval += '</label>';
                retval += '</div>';
                blankCount++;
              } else {
                retval += '<button class = "btn btn-md btn-success">Attended</button>';
              }

              retval += '</td>';
              retval += '<td>';
              retval += (v.leader_pk == 0) ? ' ' : v.approve_name;
              retval += '</td>';
              retval += '</tr>';
            });
            if (is_completed) {
              $('#btnSubmitLC').remove();
            }
            $('#tblLifeClassBody').html(retval);
          }).catch(function(err) {
            console.log(err);
            fireSwal('Training', 'Failed to retrieve list of lessons. Please reload the page', 'error');
          });
        } else if (me == 'reencounter') {
          $('body').on('click', '.switchRC', function() {
            let my_attendance = 0;
            let dataID = $(this).attr('data-id');
            let lesson_id = $(this).attr('data-lesson');
            if ($(this).is(':checked')) {
              $(this).next().html('Attended');
              my_attendance = 1;
            } else {
              $(this).next().html('Absent');
            }
            let payload = {
              attendance: my_attendance,
              lesson_pk: lesson_id
            }

            fireAjax('SchoolingController.php?action=schooling_attendance&id=' + dataID, payload, false).then(function(data) {

              console.log(data);
              let objData = $.parseJSON(data.trim()).data;
              console.log(objData);
              if (objData == false) {
                fireSwal('Training', 'Failed to update attendance. Please reload the page.', 'error');
              } else {
                fireSwal('Training', 'Attendance updated successfully.', 'success');
              }

            }).catch(function(err) {
              console.log(err);
              fireSwal('Training', 'Failed to update attendance. Please reload the page', 'error');
            });
          });
          $('#btnSubmitRC').on('click', function() {
            let payload = {
              enroll_pk: session
            };

            fireAjax('EnrollmentController.php?action=graduate', payload, false).then(function(data) {

              console.log(data);
              let objData = $.parseJSON(data.trim()).data;
              if (objData == 0) {
                fireSwal('Training', 'Failed to complete training. Please try again', 'error');
              } else if (objData == -1) {
                fireSwal('Training', 'Please complete all lessons before submitting this training. Be sure that all training attendance are confirmed by your leader', 'info');
              } else {
                Swal.fire({
                  icon: 'success',
                  title: 'Training',
                  text: 'Training completed. Click OK to continue',
                  showDenyButton: false,
                  showCancelButton: false,
                  confirmButtonText: 'Ok',

                }).then((result) => {

                  if (result.isConfirmed) {
                    window.location.href = home_url + 'index.php?view=home&action=1';
                  }
                });
              }


            }).catch(function(err) {
              console.log(err);
              fireSwal('Training', 'Failed to complete training. Please try again', 'error');
            });
          });
          let payload = {
            lesson_type: 'RE_ENCOUNTER'
          };

          fireAjax('SchoolingController.php?action=get_user_schooling', payload, false).then(function(data) {

            console.log(data);
            let objData = $.parseJSON(data.trim()).data;
            let retval = '';
            let blankCount = 0;
            let is_completed = false;
            $.each(objData, function(k, v) {
              if (v.graduate_status == 1) is_completed = true;
              retval += '<tr>';
              retval += '<td>' + v.lesson_title + '</td>';
              retval += '<td>';
              if (v.date_approved == null) {
                retval += '<div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">';
                retval += '<input data-lesson = "' + v.lesson_pk + '" data-id="' + v.id + '" type="checkbox" class="custom-control-input switchRC" id="swRC' + v.id + '" name="swRC' + v.id + '" ';
                retval += (v.attendance == null || v.attendance == 0) ? '' : 'checked ';
                retval += (v.leader_pk == 0) ? '>' : 'disabled>';
                retval += '<label class="custom-control-label switchRC" for="swRC' + v.id + '">';
                retval += (v.attendance == null || v.attendance == 0) ? 'Absent' : 'Attended ';
                retval += '</label>';
                retval += '</div>';
                blankCount++;
              } else {
                retval += '<button class = "btn btn-md btn-success">Attended</button>';
              }

              retval += '</td>';
              retval += '<td>';
              retval += (v.leader_pk == 0) ? ' ' : v.approve_name;
              retval += '</td>';
              retval += '</tr>';
            });
            if (is_completed) {
              $('#btnSubmitRC').remove();
            }
            $('#tblReencounterBody').html(retval);
          }).catch(function(err) {
            console.log(err);
            fireAjax('Training', 'Failed to retrieve list of topics. Please reload the page', 'error');
          });
        } else if (me.includes('sol')) {
          $('#trainingLabel').html(me.toUpperCase());
          $('body').on('change', '.switchSOLInput', function() {
            let my_attendance = 0;
            let dataID = $(this).attr('data-id');
            let lesson_id = $(this).attr('data-lesson');
            if ($(this).is(':checked')) {
              $(this).next().html('Attended');
              my_attendance = 1;
            } else {
              $(this).next().html('Absent');
            }
            let payload = {
              attendance: my_attendance,
              lesson_pk: lesson_id
            }

            fireAjax('SchoolingController.php?action=schooling_attendance&id=' + dataID, payload, false).then(function(data) {

              console.log(data);
              let objData = $.parseJSON(data.trim()).data;
              if (objData == false) {
                fireSwal('Training', 'Failed to update attendance. Please reload the page.', 'error');
              } else {
                fireSwal('Training', 'Attendance updated successfully.', 'success');
              }



            }).catch(function(err) {
              console.log(err);
              fireSwal('Training', 'Failed to update attendance. Please reload the page', 'error');
            })
          });
          $('#btnSubmitSOL').on('click', function() {
            let payload = {
              enroll_pk: session
            };

            fireAjax('EnrollmentController.php?action=graduate', payload, false).then(function(data) {

              console.log(data);
              let objData = $.parseJSON(data.trim()).data;
              //index.php?view=trainings
              if (objData == 0) {
                fireSwal('Training', 'Failed to complete training. Please try again', 'error');
              } else if (objData == -1) {
                fireSwal('Training', 'Please complete all lessons before submitting this training. Be sure that all training attendance are confirmed by your leader', 'info');
              } else {

                Swal.fire({
                  icon: 'success',
                  title: 'Training',
                  text: 'Training completed. Click OK to continue',
                  showDenyButton: false,
                  showCancelButton: false,
                  confirmButtonText: 'Ok',

                }).then((result) => {

                  if (result.isConfirmed) {
                    window.location.href = home_url + 'index.php?view=trainings';
                  }
                });
              }

            }).catch(function(err) {
              console.log(err);
              fireSwal('Training', 'Failed to complete training. Please try again', 'error');
            });
          });
          let loadpay = {
            lesson_type: me
          };

          fireAjax('SchoolingController.php?action=get_user_schooling', loadpay, false).then(function(data) {

            console.log(data);
            let objData = $.parseJSON(data.trim()).data;
            let retval = '';
            let blankCount = 0
            let is_completed = false;
            $.each(objData, function(k, v) {
              if (v.graduate_status == 1) is_completed = true;
              retval += '<tr>';
              retval += '<td>' + v.lesson_title + '</td>';
              retval += '<td>';
              if (v.date_approved == null) {
                retval += '<div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">';
                retval += '<input data-lesson = "' + v.lesson_pk + '" data-id="' + v.id + '" type="checkbox" class="custom-control-input switchSOLInput" id="swSOLLesson' + v.id + '" name="swSOLLesson' + v.id + '" ';
                retval += (v.attendance == null || v.attendance == 0) ? '' : 'checked ';
                retval += (v.leader_pk == 0) ? '>' : 'disabled>';
                retval += '<label class="custom-control-label switchSOLLabel" for="swSOLLesson' + v.id + '">';
                retval += (v.attendance == null || v.attendance == 0) ? 'Absent' : 'Attended ';
                retval += '</label>';
                retval += '</div>';
                blankCount++;
              } else {
                retval += '<button class = "btn btn-md btn-success">Attended</button>';
              }

              retval += '</td>';
              retval += '<td>';
              retval += (v.date_approved == null) ? ' ' : v.approve_name;
              retval += '</td>';
              retval += '</tr>';
            });

            $('#tblLessonBody').html(retval);
            if (is_completed) $('#btnSubmitSOL').remove();
          }).catch(function(err) {
            console.log(err);
            fireAjax('Training', 'Failed to retrieve list of topics. Please reload the page', 'error');
          });
        } else if (me == 'qrmaintenance') {
          let qrID = 0;
          loadAllQR();


        } else if (me == 'celebration') {
          let selectedYear = $('#select_year').val();
          render_calendar(selectedYear);
          $('#select_year').on('change', function() {
            render_calendar($(this).val());
          });
        } else if (me == 'admins') {
          $('#branch').on('change', function() {
            let payload = {
              branch: $(this).val()
            };
            let data = fireAjax('SuperAdminController.php?action=get_assignee', payload, false).then(function(data) {

              let obj = jQuery.parseJSON(data.trim());
              let tls = obj.data;
              let renderVal = '<option selected="selected" disabled="disabled">Please select a member to assign</option>';

              $.each(tls, function(k, v) {
                renderVal += '<option value="' + v.id + '">' + v.fullname + '</option>';
              });
              $("#members").html(renderVal);
              $('#members').select2({
                theme: 'bootstrap4'
              });
            }).catch(function(err) {

              fireSwal('Account Registration', 'Failed to retrieve list of inviters. Please reload the page', 'error');
            })
          })

          loadAdmins();
          $('body').on('click', '.btnRemoveAdmin', function() {
            let dataID = $(this).attr('data-id');
            let dataUser = $(this).attr('data-name');
            let thisButton = $(this);
            let payload = {
              id: dataID,
              status: 0
            };


            Swal.fire({
              title: 'Remove Administrator',
              text: 'Are you sure you want to remove ' + dataUser + '?',
              showCancelButton: true,
              allowOutsideClick: false,
              allowEscapeKey: false,
              icon: 'info',
              confirmButtonText: 'Yes, Remove',
              cancelButtonText: 'No',
            }).then((result) => {
              if (result.isConfirmed) {
                fireAjax('SuperAdminController.php?action=remove_admin', payload, false).then(function(data) {
                  let objData = $.parseJSON(data.trim()).data;
                  if (objData) {
                    thisButton.closest('.card').remove();
                    fireSwal('Remove Administrator', 'Administrator removed successfully', 'success');
                  }
                }).catch(function(err) {
                  fireSwal('Remove Administrator', 'Failed to remove administrator. Please reload the page', 'error');
                });
              }
            });
          })

          $('#frmAdmins').on('submit', function(e) {
            e.preventDefault();
            let payload = {
              id: $("#members").val(),
              status: 1
            };
            fireAjax('SuperAdminController.php?action=remove_admin', payload, false).then(function(data) {
              let objData = $.parseJSON(data.trim()).data;
              if (objData) {

                $('#mdlAdmin').modal('hide');
                $('#frmAdmins').trigger('reset');
                loadAdmins();
                fireSwal('New Administrator', 'Member assigned successfully', 'success');
              }
            }).catch(function(err) {
              fireSwal('New Administrator', 'Failed to assign member. Please try again', 'error');
            })
          });

        } else if (me == 'trainings') {
          $('#btnLifeClass, #btnSOL1, #btnSOL2, #btnSOL3, #btnReencounter').on('click', function() {
            if ($(this).hasClass('btn-warning')) {
              fireSwal('Training Enrollment', 'Kindly wait for admin\'s approval', 'info');
              return;
            }
            let lesson_type = {
              'lesson_type': $(this).attr('data-lesson')
            };
            let this_button = $(this);
            let this_span = $(this).children().first();

            Swal.fire({
              title: 'Training Enrollment',
              text: 'Are you sure you want to enroll in this training?',
              showCancelButton: true,

              allowOutsideClick: false,
              allowEscapeKey: false,
              icon: 'info',
              confirmButtonText: 'Yes, Enroll',
              cancelButtonText: 'No',
            }).then((result) => {
              if (result.isConfirmed) {

                fireAjax('EnrollmentController.php?action=create_enrollment', lesson_type, false).then(function(data) {

                  console.log(data);
                  let obj = jQuery.parseJSON(data.trim()).data;
                  if (obj == 1) {
                    this_button.removeClass('btn-secondary');
                    this_button.addClass('btn-warning');
                    this_span.removeClass('fa-plus');
                    this_span.addClass('fa-clock');
                    fireSwal('Training Enrollment', 'Training has been successfully enrolled. Please wait for admin\'s approval.', 'success');
                  } else if (obj == -1) {
                    fireSwal('Training Enrollment', 'Failed to enroll training. Incomplete requirements', 'error');
                  } else {
                    fireSwal('Training Enrollment', 'Failed to enroll training. Please reload the page', 'error');
                  }
                }).catch(function(err) {
                  console.log(err);
                  fireSwal('Training Enrollment', varErrMessage, 'error');
                })
              }
            })
          });

          fireAjax('EnrollmentController.php?action=get_enrollment_list', '', false).then(function(data) {

            console.log(data);
            let obj = jQuery.parseJSON(data.trim());
            let btnHrefs = ['lifeclass', 'sol1', 'sol2', 'sol3', 'reencounter'];
            let btnIDs = ['#btnLifeClass', '#btnSOL1', '#btnSOL2', '#btnSOL3', '#btnReencounter'];
            let trainings = ['LIFE_CLASS', 'SOL1', 'SOL2', 'SOL3', 'RE_ENCOUNTER'];
            $.each(obj.data, function(k, v) {
              let lessonIndex = trainings.indexOf(v.lesson_type);
              let btn = $(btnIDs[lessonIndex]);
              let set_href = 'index.php?view=' + btnHrefs[lessonIndex] + '&session=' + v.id;
              let btn_span = btn.children().first();
              btn.removeClass('disabled');
              if (v.is_graduated == 1) {
                btn.attr('href', set_href);
                btn.unbind('click');
                btn.addClass('btn-success')
                btn_span.addClass('fa-check');

                //btn.removeClass('btn-warning');
                btn.removeClass('btn-secondary');
                btn_span.removeClass('fa-lock');
                //btn_span.removeClass('fa-clock');
                //btn_span.removeClass('fa-book');
                btn_span.removeClass('fa-plus');
                if ((lessonIndex + 1) != trainings.length) {
                  let next_button = btn.next();
                  let next_button_span = next_button.children().first();
                  next_button.removeClass('disabled');
                  next_button_span.removeClass('fa-lock');
                  next_button_span.addClass('fa-plus');


                }
              } else if (v.is_enrolled == 1) {
                btn.attr('href', set_href);
                btn.unbind('click');
                btn.addClass('btn-success')
                btn_span.addClass('fa-book');

                //btn.removeClass('btn-warning');
                btn.removeClass('btn-secondary');
                btn_span.removeClass('fa-lock');
                //btn_span.removeClass('fa-clock');
                //btn_span.removeClass('fa-check');
                btn_span.removeClass('fa-plus');
              } else if (v.is_enrolled == 0) {
                btn.addClass('btn-warning')
                btn_span.addClass('fa-clock');

                //btn.removeClass('btn-success');
                btn.removeClass('btn-secondary');
                btn_span.removeClass('fa-lock');
                //btn_span.removeClass('fa-book');
                //btn_span.removeClass('fa-check');
                btn_span.removeClass('fa-plus');
              }
            });
          }).catch(function(err) {
            console.log(err);
            fireSwal('Trainings', 'Failed to retrieve enrolled trainings. Please reload the page', 'error');
          })

        } else if (me == 'notifications') {
          $('#notifSelectAll').bootstrapSwitch();
          $('#notifSelectAll').on('switchChange.bootstrapSwitch', function(e) {

            if ($(this).is(':checked')) {
              $('.chkNotif').attr('checked', 'checked');
              $('.divChkNotif').show();
              $('.notifButtons').show();
            } else {
              $('.notifButtons').hide();
              $('.divChkNotif').hide();
            }
          });
          $('body').on('click', '.btnMultiDisapprove, .btnMultiApprove', function() {
            let var_decision = $(this).hasClass('btnMultiDisapprove') ? 0 : 1;
            let str_decision = (var_decision == 1) ? 'approve' : 'disapprove';
            let allGoods = true;

            let notif_list = $('#notifTodayContainer').find('.osahan-post-header').each(function() {
              let mainContainer = $(this);
              let chk = $(this).find('.divChkNotif');
              let chkbox = chk.find('.chkNotif');

              if (chkbox.is(':checked')) {
                let var_notif_pk = chkbox.attr('data-id');
                let var_notif_hash = chkbox.attr('data-hash');
                let var_table_pk = chkbox.attr('data-table');
                let var_notif_action = chkbox.attr('data-action');
                let payload = {
                  id: var_notif_pk,
                  hash: var_notif_hash,
                  decision: var_decision,
                  table_pk: var_table_pk,
                  action: var_notif_action
                };
                fireAjax('NotificationController.php?action=notif_decision', payload, false).then(function(data) {


                  let objData = $.parseJSON(data.trim()).data;
                  if (objData == true) {

                    mainContainer.remove();


                    //fireSwal('Notifications', 'Notification ' + str_decision + ' successfully', 'success');
                  } else {
                    allGoods = false;
                    //fireSwal('Notifications', 'Failed to update notifications. Please reload the page', 'error');
                  }
                }).catch(function(err) {
                  allGoods = false;
                });
              }
            });
            getNotifications(1);
            $('#notifSelectAll').removeAttr('checked');
            $('#notifSelectAll').bootstrapSwitch('toggleState', true, true);
            if (allGoods) {
              fireSwal('Notifications', 'Notification(s) ' + str_decision + 'd successfully', 'success');
            } else {
              fireSwal('Notifications', 'Failed to ' + str_decision + ' notification(s). Please reload the page', 'error');
            }
          });
          $('body').on('click', '.btnNotifDecline, .btnNotifApprove', function() {
            let trigger_button = $(this);
            let var_decision = $(this).hasClass('btnNotifDecline') ? 0 : 1;
            let str_decision = $(this).hasClass('btnNotifDecline') ? 'disapproved' : 'approved';
            let var_notif_pk = $(this).attr('data-id');
            let var_notif_hash = $(this).attr('data-hash');
            let var_table_pk = $(this).attr('data-table');
            let var_notif_action = $(this).attr('data-action');
            let payload = {
              id: var_notif_pk,
              hash: var_notif_hash,
              decision: var_decision,
              table_pk: var_table_pk,
              action: var_notif_action
            };

            fireAjax('NotificationController.php?action=notif_decision', payload, false).then(function(data) {

              console.log(data);
              let objData = $.parseJSON(data.trim()).data;
              if (objData == true) {
                trigger_button.closest('.osahan-post-header').fadeOut('fast', function() {
                  $(this).remove();
                });
                getNotifications(1);
                fireSwal('Notifications', 'Notification ' + str_decision + ' successfully', 'success');
              } else {
                fireSwal('Notifications', 'Failed to update notifications. Please reload the page', 'error');
              }
            }).catch(function(err) {
              console.log(err);
              fireSwal('Notifications', 'Failed to update notifications. Please reload the page', 'error');
            });
          });
          $('body').on('click', '.notifName', function() {
            let user_pk = $(this).attr('data-id');
          });
          getNotifications(0);
          getNotifications(1);

          function getNotifications(read) {

            fireAjax('NotificationController.php?action=get_user_notifications&read=' + read, '', false).then(function(data) {

              console.log(data);
              let objData = $.parseJSON(data.trim()).data;
              let notifCaption = '';
              let retval = '';
              let userpic = '';
              $.each(objData, function(k, v) {

                userpic = (v.sender_pic == null) ? 'user.png' : v.sender_pic;
                retval += '<div class="p-3 d-flex align-items-center border-bottom osahan-post-header">';
                if (read == 0) {
                  retval += '<div class="custom-control custom-checkbox divChkNotif"><input data-hash = "' + v.notif_hash + '" data-id = "' + v.id + '" data-table = "' + v.table_pk + '" data-action = "' + v.action + '" class="custom-control-input custom-control-input-info custom-control-input-outline chkNotif" type="checkbox" id = "notifCheck' + v.id + '" ><label for="notifCheck' + v.id + '" class="custom-control-label"></label></div>';
                }

                retval += '<div class="dropdown-list-image mr-3">';
                retval += '<img class="rounded-circle" src="' + image_url + userpic + '" alt="user_avatar" />';
                retval += '</div>';
                retval += '<div class="font-weight-bold mr-3">';
                retval += '<div><span class="font-weight-normal"><p class = "notifName"><b>' + v.sender_name + '</b>' + v.caption + '</p></div>';
                retval += '<div class="mb-2"><span class="font-weight-light">' + v.date_created + '</span></div>';
                if (read == 0 && v.action != 'NONE') {
                  retval += '<button type="button" data-hash = "' + v.notif_hash + '" data-id = "' + v.id + '" data-table = "' + v.table_pk + '" data-action = "' + v.action + '" class="btn btn-outline-dark btn-sm btnNotifDecline">Decline</button>&nbsp;';
                  retval += '<button type="button" data-hash = "' + v.notif_hash + '" data-id = "' + v.id + '" data-table = "' + v.table_pk + '" data-action = "' + v.action + '" class="btn btn-info btn-sm btnNotifApprove">Approve</button>';
                }
                retval += '</div>';
                retval += '</div>';
              });
              $('.divChkNotif').hide();
              $('.notifButtons').hide();
              retval = (retval == '') ? 'No notifications available' : retval;
              if (read == 0) {
                $('#notifTodayContainer').html(retval);
              } else {
                $('#notifEarlierContainer').html(retval);
              }

            }).catch(function(err) {
              console.log(err);
              fireSwal('Notifications', 'Failed to retrieve list of notifications. Please reload the page.', 'error');
            })
          }
        } else if (me == 'mentoring') {
          loadMentoring();
          $('#mentoring_date').datetimepicker({
            format: 'YYYY-MM-DD'
          });
          $('#frmMentoring').on('submit', function(e) {
            e.preventDefault();
            let mentoring_form = $(this);
            let fd = new FormData(this);
            console.log(fd);
            fireAjax('MentoringController.php?action=create_mentoring', fd, true).then(function(data) {
              console.log(data);
              let objData = $.parseJSON(data.trim());
              if (objData.success == 1) {

                loadMentoring();
                fireSwal('Mentoring', 'Entry added successfully', 'success');
              } else {
                fireSwal('Mentoring', 'Failed to add entry. Please try again', 'error');
              }
            }).catch(function(err) {
              console.log(err);
              fireSwal('Mentoring', 'Failed to add entry. Please try again', 'error');
            })

          });
          $('#mentoring_check').on('change', function() {
            if ($(this).is(':checked')) {
              $(this).next().html('Attended');
            } else {
              $(this).next().html('Absent');
            }
          });
          $('body').on('click', '.btnRemoveMentoring', function() {
            let thisButton = $(this);
            let dataID = thisButton.attr('data-id');

            fireAjax('MentoringController.php?action=remove_mentoring&pk=' + dataID, '', false).then(function(data) {

              console.log(data);
              let obj = $.parseJSON(data.trim());
              if (obj.success == 1) {
                thisButton.closest('tr').remove();
                fireSwal('Mentoring', 'Entry removed successfully', 'success');
              } else {
                fireSwal('Mentoring', 'Failed to remove entry. Please reload the page', 'error');
              }

            }).catch(function(err) {
              console.log(err);
              fireSwal('Mentoring', 'Failed to remove entry. Please reload the page', 'error');
            });
          });

          function loadMentoring() {

            fireAjax('MentoringController.php?action=get_mentoring', '', false).then(function(data) {

              console.log(data);
              let objData = $.parseJSON(data.trim()).data;
              let retval = '';
              let attended = '';

              $.each(objData, function(k, v) {
                attended = (v.attendance == 1) ? '<button class = "btn btn-md btn-success disabled">Attended</button>' : '<button class = "btn btn-md btn-danger disabled">Absent</button>';
                retval += '<tr>';
                retval += '<td>' + v.mentor_date + '</td>';
                retval += '<td>' + attended + '</td>';
                retval += '<td><button class = "btn btn-outline-dark btn-md btnRemoveMentoring" data-id = "' + v.id + '">Remove</button></td>';
                retval += '</tr>';
              });
              $('#tblMentoringBody').html(retval);
            }).catch(function(err) {
              console.log(err);
              fireSwal('Mentoring', 'Failed to load mentoring list. Please reload the page', 'error');
            })
          }
        } else if (me == 'tribeattendance') {
          $('#frmTribeAttendance').on('submit', function(e) {
            e.preventDefault();
            let fd = new FormData(this);

            fireAjax('TribeController.php?action=tribe_attendance', fd, true).then(function(data) {

              console.log(data);
              let objData = $.parseJSON(data.trim()).data;
              $('#tblTribeAttendance').html(objData);
            }).catch(function(err) {
              console.log(err);
              fireSwal('Tribe Attendance', 'Failed to retrieve tribe attendance. Please try again', 'error');
            })
          });
        }

      });



      function showBadge() {

        fireAjax('EnrollmentController.php?action=get_badge', '', false).then(function(data) {
          console.log(data);
          preload('false', true);
          var objData = $.parseJSON(data.trim()).data;
          let badge_src = image_url + 'no-training.png';
          switch (objData.lesson_type) {
            case "LIFE_CLASS":
              badge_src = image_url + 'badge_lc.png';
              break;
            case "SOL1":
              badge_src = image_url + 'badge_sol1.png';
              break;
            case "SOL2":
              badge_src = image_url + 'badge_sol2.png';
              break;

            case "SOL3":
              badge_src = image_url + 'badge_sol3.png';
              break;
            case "RE_ENCOUNTER":
              badge_src = image_url + 'graduate.png';
              break;
            default:
              badge_src = image_url + 'no-training.png';
              break;

          }

          $('#badge_training').attr('src', badge_src);

          fireAjax('AttendanceController.php?action=badge_attendance', '', false).then(function(data) {

            console.log(data);
            let attData = $.parseJSON(data.trim()).data;
            if (attData.id == null) {
              $('#badge_attendance').addClass('no-attendance');
              $('#badge_attendance').html('No Attendance Found');
            } else {
              $('#badge_attendance').addClass('with-attendance');
              $('#badge_attendance').html('Sunday Celebration Attendance Submitted');
            }

          }).catch(function(err) {
            console.log(err);
            $('#badge_attendance').addClass('no-attendance');
            $('#badge_attendance').html('Failed to retrieve attendance. Please reload the page');
          }).finally(function() {
            $('#mdlBadge').modal({
              backdrop: 'static'
            });
          });



        }).catch(function(err) {
          console.log(err);
          fireSwal('Badge', 'Failed to retrieve badge information. Please reload the page', 'error');
        })

      }

      function loadLessons(lesson_type) {

      }

      function loadAdmins() {
        fireAjax('SuperAdminController.php?action=get_admins', '', false).then(function(data) {
          let objData = $.parseJSON(data.trim()).data;
          let retval = '';
          let user_url = '';
          let fullname = '';
          $.each(objData, function(k, v) {
            user_url = (v.profile_pic) ? v.profile_pic : 'user.png';
            fullname = v.lastname + ', ' + v.firstname + ' ' + v.middlename;

            retval += '<div class="card collapsed-card elevation-2">';
            retval += '<div class="card-header">';
            retval += '<div class="user-block">';
            retval += '<img class="img-circle img-bordered-sm" src="' + image_url + user_url + '" alt="' + fullname + '">';
            retval += '<span class="username">';
            retval += '<a class="custom linkProfile" href="Javascript:void(0);" data-id = "' + v.id + '">' + fullname + '</a>';
            retval += '<br><span class = "text-muted">' + v.branch + '</span>';
            retval += '<div class="input-group">';

            retval += '<button type="button" data-id = "' + v.id + '" data-name = "' + fullname + '" class="my-1 btn btn-danger btn-sm btnRemoveAdmin">Remove</button>';
            retval += '</div>';
            retval += '</span>';
            retval += '<span class="description"></span>';
            retval += '</div>';

            retval += '</div>';
            retval += '<div class="card-body subDisciple' + v.id + '">';
            retval += '</div>';
            retval += '</div>';
          });
          $('#adminlist').html(retval);
        }).catch(function(err) {
          fireSwal('System Administrators', 'Failed to retrieve list of administrator. Please reload the page', 'error');
        });
      }

      function getLeaders() {
        let data = fireAjax('TribeController.php?action=get_leader_names&me=0', '', false).then(function(data) {
          console.log(data)
          let obj = jQuery.parseJSON(data.trim());
          let tls = obj.data;
          let renderVal = '<option selected="selected" disabled="disabled">Please select a new tribe leader</option>';
          $.each(tls, function(k, v) {
            renderVal += '<option value="' + v.id + '">' + v.fullname + '</option>';
          });
          $("#new_leader_name").html(renderVal);
        }).catch(function(err) {
          console.log(err)
          fireSwal('Member Transfer', 'Failed to retrieve list of tribe leaders. Please reload the page', 'error');
        })
        $('#new_leader_name').select2({
          theme: 'bootstrap4'
        });
      }

      function loadDisciples(leader_pk = 0) {

        let ajaxURL = (leader_pk == 0) ? 'TribeController.php?action=get_disciples' : 'TribeController.php?action=get_disciples&id=' + leader_pk;
        fireAjax(ajaxURL, '', false).then(function(data) {

          let obj = jQuery.parseJSON(data.trim());
          let retval = '';
          let member_type = '';
          let member_numbers = '';
          let user_url = '';
          console.log(obj);
          $.each(obj.data, function(k, v) {
            user_url = (v.profile_pic == null) ? 'user.png' : v.profile_pic;
            member_type = (v.leader_pk == 1) ? 'P12' : '144';
            switch (v.member_count) {
              case 0:
                member_numbers = 'No members';
                break;
              case 1:
                member_numbers = '1 Member';
                break;
              default:
                member_numbers = v.member_count + ' Members';
                break;
            }
            retval += '<div class="card collapsed-card elevation-2">';
            retval += '<div class="card-header">';
            retval += '<div class="user-block">';
            retval += '<img class="img-circle img-bordered-sm" src="' + image_url + user_url + '" alt="' + v.fullname + '">';
            retval += '<span class="username">';
            retval += '<a class="custom linkProfile" href="Javascript:void(0);" data-id = "' + v.id + '">' + v.fullname + '</a>';
            retval += '<div class="input-group">';

            retval += '<button type="button" class="btn btn-outline-dark btn-sm dropdown-toggle my-1" data-toggle="dropdown" aria-expanded="true">Lifestyle</button><div class="dropdown-menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -165px, 0px);"><a class="dropdown-item memberLifestyle" href="Javascript:void(0);" data-name = "' + v.fullname + '" data-id = "' + v.id + '">Cellgroup</a><a class="dropdown-item memberLifestyle" href="Javascript:void(0);" data-name = "' + v.fullname + '" data-id = "' + v.id + '">Trainings</a><a class="dropdown-item memberLifestyle" href="Javascript:void(0);" data-name = "' + v.fullname + '" data-id = "' + v.id + '">Mentoring</a><a class="dropdown-item memberLifestyle" href="Javascript:void(0);" data-name = "' + v.fullname + '" data-id = "' + v.id + '">Sunday Celebration Attendance</a></div>&nbsp;&nbsp;<button type="button" data-id = "' + v.id + '" data-name = "' + v.fullname + '" class="my-1 btn btn-info btn-sm btnTribeTransfer">Transfer</button>&nbsp;&nbsp;';

            retval += '<button type="button" data-id = "' + v.id + '" data-name = "' + v.fullname + '" class="my-1 btn btn-warning btn-sm btnTribePassword">Reset Password</button>';
            retval += '</div>';
            retval += '</span>';
            retval += '<span class="description">' + member_type + ' . ' + member_numbers + '</span>';
            retval += '</div>';
            retval += '<div class="card-tools mt-3">';
            retval += '<button type="button" class="btn btn-tool viewTribeMembers" data-card-widget="collapse" data-id = "' + v.id + '">';
            retval += '<i class="fas fa-plus"></i>';
            retval += '</button>';
            retval += '</div>';
            retval += '</div>';
            retval += '<div class="card-body subDisciple' + v.id + '">';
            retval += '</div>';
            retval += '</div>';
          });
          $('#tribeContainer').html(retval);

          //
        }).catch(function(err) {
          fireSwal('My Tribe', 'Failed to retrieve tribe members. Please reload the page', 'error')
        });
      }

      function loadSubDisciples(leader_pk = 0) {

        let ajaxURL = (leader_pk == 0) ? 'TribeController.php?action=get_disciples' : 'TribeController.php?action=get_disciples&id=' + leader_pk;
        console.log(ajaxURL);

        fireAjax(ajaxURL, '', false).then(function(data) {

          console.log(data);
          let obj = jQuery.parseJSON(data.trim());
          let retval = '';
          let member_type = '';
          let member_numbers = '';
          let user_url = '';

          $.each(obj.data, function(k, v) {
            user_url = (v.profile_pic == null) ? 'user.png' : v.profile_pic;
            member_type = (v.leader_pk == 1) ? 'P12' : '144';
            retval += '<div class="card collapsed-card elevation-2">';
            retval += '<div class="card-header">';
            retval += '<div class="user-block">';
            retval += '<img class="img-circle img-bordered-sm" src="' + image_url + user_url + '" alt="' + v.fullname + '">';
            retval += '<span class="username">';
            retval += '<a class="custom linkProfile" href="Javascript:void(0);" data-id = "' + v.id + '">' + v.fullname + '</a>';
            // retval += '<div class="input-group"><button type="button" class="btn btn-outline-dark btn-sm dropdown-toggle my-1" data-toggle="dropdown" aria-expanded="true">Lifestyle</button><div class="dropdown-menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -165px, 0px);"><a class="dropdown-item" href="#">Cellgroup</a><a class="dropdown-item" href="#">Trainings</a><a class="dropdown-item" href="#">Mentoring</a><a class="dropdown-item" href="#">Sunday Celebration Attendance</a></div>&nbsp;&nbsp;<button type="button" data-id = "' + v.id + '" data-name = "' + v.fullname + '" class="my-1 btn btn-info btn-sm btnTribeTransfer">Transfer</button></div>';
            // retval += '<br><button type="button" data-id = "' + v.id + '" class="mt-3 btn btn-outline-dark btn-sm btnTribeLifestyle">Lifestyle</button>';
            // retval += '&nbsp;&nbsp;<button type="button" data-id = "' + v.id + '" class="mt-3 btn btn-info btn-sm btnTribeTransfer">Transfer</button>';
            retval += '</span>';
            retval += '</div>';
            retval += '</div>';
            retval += '</div>';
          });
          if (obj.data.length == 0) {
            retval = 'No members found';
          }
          $('.subDisciple' + leader_pk).html(retval);
        }).catch(function(err) {
          console.log(err);
          fireSwal('My Tribe', 'Failed to retrieve tribe members. Please reload the page', 'error')
        });
      }

      function render_calendar(selectedYear) {

        fireAjax('AttendanceController.php?action=render_table&year=' + selectedYear, '', false).then(function(data) {

          let obj = jQuery.parseJSON(data.trim());
          let objData = obj.data;
          $('#tblAttendanceBody').html(objData);
          fireAjax('AttendanceController.php?action=get_attendance_list&year=' + selectedYear, '', false).then(function(data) {
            let obj = jQuery.parseJSON(data.trim());
            let objData = obj.data;
            console.log(objData);
            $.each(objData, function(k, v) {
              if (v.confirmed_by == 0) {
                $('.' + v.sunday_date).html("<i class = 'fa fa-circle' style = 'color:orange'></i>");
              } else {
                $('.' + v.sunday_date).html("<i class = 'fa fa-circle' style = 'color:green'></i>");
              }

            });
          }).catch(function(err) {
            console.log(err);
            fireSwal('Sunday Celebration', 'Failed to retrieve attendance list. Please try again', 'error');
          })
        }).catch(function(err) {
          console.log(err);
          fireSwal('Sunday Celebration', 'Failed to retrieve attendance list. Please try again', 'error');
        });
      }

      function render_member_calendar(pk, selectedYear) {

        fireAjax('AttendanceController.php?action=render_table&year=' + selectedYear, '', false).then(function(data) {

          let obj = jQuery.parseJSON(data.trim());
          let objData = obj.data;
          $('#tblMemberAttendance').html(objData);
          fireAjax('AttendanceController.php?action=get_attendance_list&year=' + selectedYear + '&pk=' + pk, '', false).then(function(data) {
            let obj = jQuery.parseJSON(data.trim());
            let objData = obj.data;
            console.log(objData);
            $.each(objData, function(k, v) {
              if (v.confirmed_by == 0) {
                $('.' + v.sunday_date).html("<i class = 'fa fa-circle' style = 'color:orange'></i>");
              } else {
                $('.' + v.sunday_date).html("<i class = 'fa fa-circle' style = 'color:green'></i>");
              }

            });
          }).catch(function(err) {
            console.log(err);
            fireSwal('Sunday Celebration', 'Failed to retrieve attendance list. Please try again', 'error');
          })
        }).catch(function(err) {
          console.log(err);
          fireSwal('Sunday Celebration', 'Failed to retrieve attendance list. Please try again', 'error');
        });
      }

      function getMyInvites() {
        fireAjax('InviteController.php?action=get_invite_list', '', false).then(function(data) {
          console.log(data);
          let retval = '';
          let obj = jQuery.parseJSON(data.trim());
          let objData = obj.data;
          $.each(objData, function(k, v) {
            retval += '<option value = "' + v.id + '">' + v.invitee_name + '</option>';
          });
          $('#select_invites').html(retval);
          $('#select_invites').select2({
            theme: 'bootstrap4'
          });
        }).catch(function(err) {
          console.log(err);
          fireSwal('Sunday Celebration Attendance', 'Failed to retrieve list of invites. Please reload the page.', 'error');
        })

      }

      function loadAllQR() {

        fireAjax('QRController.php?action=get_qr_list', '', false).then(function(data) {

          let obj = jQuery.parseJSON(data.trim());
          let objData = obj.data;
          let retval = '';
          $.each(objData, function(k, v) {
            retval += '<div class="card collapsed-card elevation-2 qr-card" data-id = "' + v.id + '" data-qr = "' + v.qr_code + '">';
            retval += '<div class="card-header">';
            retval += '<div class="user-block">';
            retval += '<img class="img-circle img-bordered-sm" src="https://via.placeholder.com/128" alt="user image">';
            retval += '<span class="username">';
            retval += '<a class="custom qr_branch" href="Javascript:void(0)">' + v.branch + '</a>';
            retval += '</span>';
            retval += '<span class="description qr_content">' + v.qr_code + '</span>';
            retval += '<span class="description qr_owner">' + v.created_by + ' . ' + v.created_at + '</span>';
            retval += '</div>  ';
            retval += '</div>';
            retval += '<div class="card-body">';
            retval += '</div>';
            retval += '</div>';
          });
          $('#qrlist').html(retval);
        }).catch(function(err) {
          console.log(err);
          fireSwal('QR Maintenance', 'Failed to retrieve list of QR. Please try again.', 'error');
        })
      }

      function lifestyleCellgroup(pk) {

        fireAjax('CellgroupController.php?action=get_cell_list&pk=' + pk, '', false).then(function(data) {

          console.log(data);
          let objData = $.parseJSON(data.trim()).data;
          let table_body = '';
          $.each(objData, function(k, v) {
            table_body += '<tr>';
            table_body += '<td>' + v.member_name + '</td>';
            table_body += '<td>' + v.event_place + '</td>';
            table_body += '<td>' + v.event_date + '</td>';
            table_body += '<td>' + v.event_time + '</td>';
            table_body += '</tr>';
          });
          $('#tblCellgroupBody').html(table_body);
        }).catch(function(err) {
          console.log(err);
          fireSwal('Cellgroup', 'Failed to load cellgroup. Please try again.', 'error');
        });
      }

      function lifestyleTraining(pk, lesson) {

        if (lesson == 'Lifeclass') lesson = 'LIFE_CLASS';
        if (lesson == 'Reencounter') lesson = 'RE_ENCOUNTER';
        let payload = {
          user_pk: pk,
          lesson_type: lesson
        };

        fireAjax('SchoolingController.php?action=get_user_schooling', payload, false).then(function(data) {

          console.log(data);
          let objData = $.parseJSON(data.trim()).data;
          if (objData == 0) return;
          let retval = '';
          let table_container = '';
          switch (lesson) {
            case 'LIFE_CLASS':
              table_container = 'tblLifeclassContainer';
              break;
            case 'SOL1':
              table_container = 'tblSOL1Container';
              break;
            case 'SOL2':
              table_container = 'tblSOL2Container';
              break;
            case 'SOL3':
              table_container = 'tblSOL3Container';
              break;
            case 'Reencounter':
              table_container = 'tblReencounterContainer';
              break;
          }
          $.each(objData, function(k, v) {
            retval += '<tr>';
            retval += '<td>' + v.lesson_title + '</td>';
            retval += '<td>';
            retval += '<button class = "btn btn-sm ';
            retval += (v.attendance == null || v.attendance == 0) ? 'btn-danger">Absent</button>' : 'btn-success">Attended</button>';
            retval += '</td>';
            retval += '<td>';
            retval += (v.leader_pk == 0) ? ' ' : v.approve_name;
            retval += '</td>';
            retval += '</tr>';
          });
          retval = (retval == '') ? 'No entry found' : retval;
          $("#" + table_container).html(retval);
        }).catch(function(err) {
          console.log(err);
          fireSwal('Training', 'Failed to load member\'s training. Please reload the page', 'error');
        })
      }

      function lifestyleMentoring(pk) {

        fireAjax('MentoringController.php?action=get_mentoring&pk=' + pk, '', false).then(function(data) {

          console.log(data);
          let objData = $.parseJSON(data.trim()).data;
          let retval = '';
          let attended = '';

          $.each(objData, function(k, v) {
            attended = (v.attendance == 1) ? '<button class = "btn btn-md btn-success disabled">Attended</button>' : '<button class = "btn btn-md btn-danger disabled">Absent</button>';
            retval += '<tr>';
            retval += '<td>' + v.mentor_date + '</td>';
            retval += '<td>' + attended + '</td>';
            retval += '</tr>';
          });
          $('#tblMentoringBody').html(retval);
        }).catch(function(err) {
          console.log(err);
          fireSwal('Mentoring', 'Failed to load mentoring list. Please try again.', 'error');
        });
      }

      function lifestyleSundayAttendance(pk, attendance_year) {
        preload('body', true);
        let payload = {
          user_pk: pk,
          user_year: attendance_year
        };
        render_member_calendar(pk, attendance_year);
      }

      function submitSundayAttendance(payload, submit_method) {

        fireAjax('AttendanceController.php?action=create_attendance', payload, false).then(function(data) {

          console.log(data);

          let obj = jQuery.parseJSON(data.trim());
          if (obj.data == false) {
            if (submit_method == 'qr') {
              fireSwal('Attendance', 'Invalid QR scanned', 'error');
            } else {
              fireSwal('Attendance', 'Invalid Leader\'s credentials', 'error');
            }
          } else {
            Swal.fire({
              title: 'Attendance',
              allowOutsideClick: false,
              text: 'Attendance submitted successfully. Click OK to view your badge',
              showDenyButton: false,
              showCancelButton: false,
              confirmButtonText: 'Ok',
              icon: 'success',
            }).then((result) => {

              if (result.isConfirmed) {
                window.location.href = home_url + 'index.php?view=home&action=1';
              }
            })

          }

        }).catch(function(err) {
          console.log(err);
          fireSwal('Sunday Celebration Attendance', 'Failed to submit attenance. Please check the provided QR/Credentials', 'error');
        });
      }

      function renderTR(table_body, tds) {
        let tr = '<tr>';
        $.each(tds, function(k, v) {
          tr += '<td>' + v + '</td>';
        });
        tr += '</tr>';
        table_body.append(tr);
      }

      function loadSubheader() {
        fireAjax("AccountController.php?action=get_headers", "", false).then(function(data) {
          console.log(data);
          let retval = data.trim();
          let obj = jQuery.parseJSON(retval);
          let user_header = obj.data;
          if (user_header.current_lesson != null) {
            $("#user_training").html(user_header.current_lesson.replace('_', ' '));
          }

          $("#user_invites").html(user_header.invite_count);

        }).catch(function(err) {
          console.log(err);
        });
      }

      function loadHeader() {
        fireAjax("AccountController.php?action=get_account_profile", "", false).then(function(data) {
          console.log(data);
          let retval = data.trim();
          let obj = jQuery.parseJSON(retval);
          let user_header = obj.data;
          $("#user_name").html(user_header.firstname + ' ' + user_header.middlename + ' ' + user_header.lastname);
          $("#user_branch").html(user_header.branch);
          if (user_header.is_pastor == 1) {
            $("#user_branch").html('Pastor');
          }
          if (user_header.is_admin == 1) {
            $("#user_branch").html('Administrator');
          }
          if (user_header.profile_pic != null) {
            $("#user_dp").attr('src', image_url + user_header.profile_pic);
          }
          let me = getUrlVars()['view'];
          if (me == null || me == 'home') {
            $("#user_tl").html(user_header.tlname);
            $("#user_address").html(user_header.address);
            $("#user_contact").html(user_header.contact);
            $("#user_birthdate").html(user_header.birthdate);
            if (user_header.unreadCount == 0) {
              $(".unreadCount").html('');
            } else {
              $(".unreadCount").html(user_header.unreadCount);
            }
          }

          document.title = 'WCC | ' + $("#user_name").html();
        }).catch(function(err) {
          console.log(err);
        });
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