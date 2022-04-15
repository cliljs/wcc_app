<?php
// if (stristr($_SERVER['HTTP_USER_AGENT'], 'Mobile') || stristr($_SERVER['HTTP_USER_AGENT'], 'Android')) {
// } else {
//   echo "<h1>403 Forbidden</h1><p>Phone lang bay.</p>";
//   exit;
// }
session_start();
$_SESSION["is_admin"] = "1";
$source = (isset($_GET["view"])) ? $_GET["view"] : "home";
$is_admin = (isset($_SESSION["is_admin"])) ? true : false;
$is_leader = (isset($_SESSION["is_leader"])) ? true : false;
$is_pastor = (isset($_SESSION["is_pastor"])) ? true : false;
$is_login = (isset($_SESSION["pk"])) ? true : false;
$day_now = date("l");
print_r($_SESSION);
if (!$is_login) {
  header("Location: login.php");
}
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
  <style>
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

    a.custom {
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
                        <h5 class="description-header">SOL2 - Class 2</h5>
                        <span class="description-text text-muted">Training</span>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="description-block">
                        <h5 class="description-header">13,000</h5>
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
                case "sol":
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
            <h3 class="text-muted" id="badge_name">Jonathan Loyloy</h3>
            <img class="img-fluid" src="https://via.placeholder.com/500">
            <div class="card elevation-1 mt-3">
              <div class="card-header text-center">
                <h4 class="theme-color">April 15, 2022</h4>
                <h5 class="theme-color">Sunday Celebration Attendance Submitted</h5>

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
            const qrCodeSuccessCallback = (decodedText, decodedResult) => {
              let mergedArray = vip_list.concat(invite_list);
              console.log(mergedArray);
              let payload = {
                bro: mergedArray,
                qr: decodedText
              };
              console.log(payload);
              html5QrCode.stop();
              submitSundayAttendance(payload);

            };
            const config = {
              fps: 10,
              rememberLastUsedCamera: true,
              qrbox: {
                width: 500,
                height: 500
              }
            };
            //$('video').attr('style', 'width: ' + $('#mdlScanner').width() + 'px !important');
            html5QrCode.start({
              facingMode: "environment"
            }, config, qrCodeSuccessCallback);

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
            if ($(this).html() == 'Absent') {
              $(this).html('Attended');
            } else {
              $(this).html('Absent');
            }
          });
          $('#btnSubmitLC').on('click', function() {

          });
        } else if (me == 'sol') {

          $('body').on('click', '.switchSOLLabel', function() {
            if ($(this).html() == 'Absent') {
              $(this).html('Attended');
            } else {
              $(this).html('Absent');
            }
          });
          $('#btnSubmitSOL').on('click', function() {

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
          $('#select_year').on('change',function(){
            render_calendar($(this).val());
          });
        }

      });

      // $('.select2bs4').select2({
      //   theme: 'bootstrap4'
      // });
      function showBadge() {
        $('#mdlBadge').modal({
          backdrop: 'static'
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
              $('.' + v.sunday_date).html("<i class = 'fa fa-circle' style = 'color:green'></i>");
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