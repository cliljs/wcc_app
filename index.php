<?php
// if (stristr($_SERVER['HTTP_USER_AGENT'], 'Mobile') || stristr($_SERVER['HTTP_USER_AGENT'], 'Android')) {
// } else {
//   echo "<h1>403 Forbidden</h1><p>Phone lang bay.</p>";
//   exit;
// }
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
print_r($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title id="app_title">WCC</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="frontend/plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="frontend/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="frontend/plugins/sweetalert2/sweetalert2.min.css">
  <link rel="stylesheet" href="frontend/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="frontend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="frontend/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="frontend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="frontend/dist/css/materialdesignicons.css" />

  <style>
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
                case "sol1":
                case "sol2":
                case "sol3":
                  include "frontend/views/sol.php";
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
        loadHeader();
        loadSubheader();

        if (me == null || me == 'home') {
          $('#btnShowBadge').on('click', function() {
            $("#mdlBadge").modal({
              backdrop: 'static'
            });
          });

          if (act == 1) {
            showBadge();
          }
        } else if (me == 'tribe') {
          loadDisciples();
          $('body').on('click', '.viewTribeMembers', function() {
            if ($(this).hasClass('fa-minus')) return;
            let tribeID = $(this).attr('data-id');
            loadSubDisciples(tribeID);
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

            // const config = {
            //   fps: 10,
            //   rememberLastUsedCamera: true,
            //   qrbox: {
            //     width: 500,
            //     height: 500
            //   }
            // };
            //$('video').attr('style', 'width: ' + $('#mdlScanner').width() + 'px !important');
            // html5QrCode.start({
            //   facingMode: "environment"
            // }, config, qrCodeSuccessCallback);
            Html5Qrcode.getCameras().then(devices => {
              if (devices && devices.length) {
                var cameraId = devices[0].id;
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
                      submitSundayAttendance(payload);
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
            let payload = {
              vip: vip_list,
              invite: invite_list,
              tlusername: $("#tlusername").val(),
              tlpassword: $("#tlpassword").val(),
            };
            submitSundayAttendance(payload);
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
              fireAjax('Cellgroup Attendance', 'Failed to retrieve list of members. Please try again.', 'error');
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
          $('body').on('click', '.switchLabel', function() {
            let my_attendance = 0;
            let dataID = $(this).attr('data-id');
            if ($(this).is(':checked')) {
              $(this).next().html('Attended');
              my_attendance = 1;
            } else {
              $(this).next().html('Absent');
            }
            let payload = {
              attendance: my_attendance
            }
            fireAjax('SchoolingController.php?action=schooling_attendance&id=' + dataID, payload, false).then(function(data) {
              console.log(data);
              let objData = $.parseJSON(data.trim()).data;
              console.log(objData);
              if (objData.length === 0) {
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
            fireAjax('EnrollmentController.php?action=graduate', '', false).then(function(data) {
              console.log(data);
              let objData = $.parseJSON(data.trim()).data;
              //index.php?view=trainings
              if (objData == false) {
                fireSwal('Training', 'Failed to complete training. Please try again', 'error');
              } else {
                fireSwal('Training', 'Training completed successfully', 'success');
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
            $.each(objData, function(k, v) {
              retval += '<tr>';
              retval += '<td>' + v.lesson_title + '</td>';
              retval += '<td>';
              retval += '<div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">';
              retval += '<input data-id="' + v.id + '" type="checkbox" class="custom-control-input switchInput" id="swW' + v.id + '" name="swW' + v.id + '" ';
              retval += (v.attendance == null || v.attendance == 0) ? '' : 'checked ';
              retval += (v.leader_pk == 0) ? '>' : 'disabled>';
              retval += '<label class="custom-control-label switchLabel" for="swW' + v.id + '">';
              retval += (v.attendance == null || v.attendance == 0) ? 'Absent' : 'Attended ';
              retval += '</label>';
              retval += '</div>';
              retval += '</td>';
              retval += '<td>';
              retval += (v.leader_pk == 0) ? ' ' : v.approve_name;
              retval += '</td>';
              retval += '</tr>';
            });
            $('#tblLifeClassBody').html(retval);
          }).catch(function(err) {
            console.log(err);
            fireAjax('Training', 'Failed to retrieve list of topics. Please reload the page', 'error');
          });
        } else if (me.includes('sol')) {
          $('#trainingLabel').html(me.toUpperCase());
          $('body').on('change', '.switchSOLInput', function() {
            let my_attendance = 0;
            let dataID = $(this).attr('data-id');
            if ($(this).is(':checked')) {
              $(this).next().html('Attended');
              my_attendance = 1;
            } else {
              $(this).next().html('Absent');
            }
            let payload = {
              attendance: my_attendance
            }

            fireAjax('SchoolingController.php?action=schooling_attendance&id=' + dataID, payload, false).then(function(data) {
              console.log(data);
              let objData = $.parseJSON(data.trim()).data;

              if (objData.length === 0) {
                fireSwal('Training', 'Failed to update attendance. Please reload the page', 'error');

              } else {
                fireSwal('Training', 'Attendance updated successfully. Please wait for your leader\'s confirmation', 'success');
              }

            }).catch(function(err) {
              console.log(err);
              fireSwal('Training', 'Failed to update attendance. Please reload the page', 'error');
            })
          });
          $('#btnSubmitSOL').on('click', function() {
            fireAjax('EnrollmentController.php?action=graduate', '', false).then(function(data) {
              console.log(data);
              let objData = $.parseJSON(data.trim()).data;
              //index.php?view=trainings
              if (objData == false) {
                fireSwal('Training', 'Failed to complete training. Please try again', 'error');
              } else {
                fireSwal('Training', 'Training completed successfully', 'success');
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
            $.each(objData, function(k, v) {
              retval += '<tr>';
              retval += '<td>' + v.lesson_title + '</td>';
              retval += '<td>';
              retval += '<div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">';
              retval += '<input data-id="' + v.id + '" type="checkbox" class="custom-control-input switchSOLInput" id="swSOLLesson' + v.id + '" name="swSOLLesson' + v.id + '" ';
              retval += (v.attendance == null || v.attendance == 0) ? '' : 'checked ';
              retval += (v.leader_pk == 0) ? '>' : 'disabled>';
              retval += '<label class="custom-control-label switchSOLLabel" for="swSOLLesson' + v.id + '">';
              retval += (v.attendance == null || v.attendance == 0) ? 'Absent' : 'Attended ';
              retval += '</label>';
              retval += '</div>';
              retval += '</td>';
              retval += '<td>';
              retval += (v.leader_pk == 0) ? ' ' : v.approve_name;
              retval += '</td>';
              retval += '</tr>';
            });
            $('#tblLessonBody').html(retval);
          }).catch(function(err) {
            console.log(err);
            fireAjax('Training', 'Failed to retrieve list of topics. Please reload the page', 'error');
          });
        } else if (me == 'qrmaintenance') {
          let qrID = 0;
          loadAllQR();
          $('body').on('click', '.qr-card', function() {
            let qrcontent = $(this).attr('data-qr');
            qrID = $(this).attr('data-id');
            $('#mdlQRMaintenance').modal({
              backdrop: 'static'
            });
            $('#qr-view-content').html(qrcontent);
            $('#viewQRCodeMaintenance').empty();
            $('#viewQRCodeMaintenance').qrcode({
              text: qrcontent
            });
          });
          $('#newQRCodeMaintenance').on('click', function() {
            console.log('QRController.php?action=update_qr&id=' + qrID);
            fireAjax('QRController.php?action=update_qr&id=' + qrID, '', false).then(function(data) {
              let obj = jQuery.parseJSON(data.trim());

              if (obj.success == 1) {
                loadAllQR();
                $('#mdlQRMaintenance').modal('hide');
                fireSwal('QR Maintenance', 'QR updated successfully', 'success');
              }
            }).catch(function(err) {
              console.log(err);
              fireSwal('QR Maintenance', 'Failed to generate new QR. Please try again.', 'error');
            });
          });
        } else if (me == 'celebration') {
          let selectedYear = $('#select_year').val();
          render_calendar(selectedYear);
          $('#select_year').on('change', function() {
            render_calendar($(this).val());
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
                  let obj = jQuery.parseJSON(data.trim());
                  if (obj.success == 1) {
                    this_button.removeClass('btn-secondary');
                    this_button.addClass('btn-warning');
                    this_span.removeClass('fa-plus');
                    this_span.addClass('fa-clock');
                    fireSwal('Training Enrollment', 'Training has been successfully enrolled. Please wait for admin\'s approval.', 'success');
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
              let set_href = 'index.php?view=' + btnHrefs[lessonIndex];
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
          $('body').on('click', '.btnNotifDecline, .btnNotifApprove', function() {
            let decision = $(this).hasClass('btnNotifDecline') ? 0 : 1;
            let notif_pk = $(this).attr('data-id');
          });
          $('body').on('click', '.notifName', function() {
            let user_pk = $(this).attr('data-id');
          });
          fireAjax('NotificationController.php?action=get_user_notifications', '', false).then(function(data) {
            console.log(data);
            let objData = $.parseJSON(data.trim()).data;
            let notifCaption = '';
            let retval = '';
            console.log(objData);
            $.each(objData, function(k, v) {

              switch (v.action) {
                case "SIGNUP":
                  notifCaption = ' created an account';
                  break;
                case "ENROLL":
                  break;
                case "TRANSFER":
                  break;
                case "ATTENDANCE":
                  break;
                case "SCHOOL":
                  break;
              }
              retval += '<div class="p-3 d-flex align-items-center border-bottom osahan-post-header">';
              retval += '<div class="dropdown-list-image mr-3">';
              retval += '<img class="rounded-circle" src="' + image_url + v.sender_pic + '" alt="user_avatar" />';
              retval += '</div>';
              retval += '<div class="font-weight-bold mr-3">';
              retval += '<div><span class="font-weight-normal"><a data-user = "' + v.sender_pk + '" href = "Javascript:void(0);" class = "notifName"><b>' + v.sender_name + '</b>' + notifCaption + '</div>';
              retval += '<div class="mb-2"><span class="font-weight-light">' + v.date_created + '</span></div>';
              retval += '<button type="button" data-id = "' + v.id + '" class="btn btn-outline-dark btn-sm btnNotifDecline">Decline</button>&nbsp;';
              retval += '<button type="button" data-id = "' + v.id + '" class="btn btn-info btn-sm btnNotifApprove">Approve</button>';
              retval += '</div>';
              retval += '</div>';
            });
            $('#notifTodayContainer').html(retval);
          }).catch(function(err) {
            console.log(err);
            fireSwal('Notifications', 'Failed to retrieve list of notifications. Please reload the page.', 'error');
          })
        }

      });

      function preload(element, is_show) {

      };
      //todo - kuha ng attendance ngaun
      function showBadge() {
        fireAjax('', '', false).then(function(data) {
          console.log(data);
          var objData = $.parseJSON(data.trim()).data;
          let badge_src = image_url;
          switch (objData.current_lesson) {
            case "LIFE_CLASS":
              image_url += 'lc.png';
              break;
            case "SOL1":
              image_url += 'sol1.png';
              break;
            case "SOL2":
              image_url += 'sol2.png';
              break;
            case "SOL3":
              image_url += 'sol3.png';
              break;
            case "RE_ENCOUNTER":
              image_url += 're.png';
              break;
            default:
              break;

          }
          $('#badge_training').attr('src',badge_src);
          if(objData.attendance == null){
            $('#badge_attendance').html('No Attendance Found');
          } else{
            $('#badge_attendance').html('Sunday Celebration Attendance Submitted');
          }
          $('#mdlBadge').modal({
            backdrop: 'static'
          });
        }).catch(function(err) {
          console.log(err);
          fireSwal('Badge', 'Failed to retrieve badge information. Please reload the page', 'error');
        })

      }

      function loadLessons(lesson_type) {

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
            retval += '</span>';
            retval += '<span class="description">' + member_type + ' . ' + member_numbers + '</span>';
            retval += '</div>';
            retval += '<div class="card-tools mt-3">';
            retval += '<button type="button" class="btn btn-tool" data-card-widget="collapse">';
            retval += '<i class="fas fa-plus viewTribeMembers" data-id = "' + v.id + '"></i>';
            retval += '</button>';
            retval += '</div>';
            retval += '</div>';
            retval += '<div class="card-body subDisciple' + v.id + '">';
            retval += '</div>';
            retval += '</div>';
          });
          $('#tribeContainer').html(retval);
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
            retval += '<br><button type="button" data-id = "' + v.id + '" class="mt-3 btn btn-outline-dark btn-sm btnTribeLifestyle">Lifestyle</button>';
            retval += '&nbsp;&nbsp;<button type="button" data-id = "' + v.id + '" class="mt-3 btn btn-info btn-sm btnTribeTransfer">Transfer</button>';
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

      function submitSundayAttendance(payload) {
        fireAjax('AttendanceController.php?action=create_attendance', payload, false).then(function(data) {
          console.log(data);
          let obj = jQuery.parseJSON(data.trim());
          if (obj.success == 1) {
            window.location.href = home_url + 'index.php?view=home&action=1';
          }

        }).catch(function(err) {
          console.log(err);
          fireSwal('Sunday Celebration Attendance', varErrMessage, 'error');
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
            $("#user_training").html(user_header.current_lesson);
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
          if (user_header.profile_pic != null) {
            $("#user_dp").attr('src', image_url + user_header.profile_pic);
          }
          let me = getUrlVars()['view'];
          if (me == null || me == 'home') {
            $("#user_tl").html(user_header.tlname);
            $("#user_address").html(user_header.address);
            $("#user_contact").html(user_header.contact);
            $("#user_birthdate").html(user_header.birthdate);
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