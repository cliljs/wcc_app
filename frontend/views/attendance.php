<div class="card card-primary card-outline">
  <div class="card-body box-profile">
    <h3 class="text-center">Sunday Celebration Attendance</h3>
    <p class="text-muted text-center"><a href="index.php">[Back to Homepage]</a></p>
    <hr>
    <div class="card elevation-2">
      <div class="card-header">
        <div class="form-group">
          <label>Date:</label>

          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
            </div>
            <input value="April 10, 2022 Sunday" type="text" class="form-control" disabled>
          </div>
          <!-- /.input group -->
        </div>
        <div class="form-group">
          <label>Invites:</label>
          <select class="select2bs4" multiple="multiple" data-placeholder="Select Name of Invites" style="width: 100%;">
            <option>Sample Name #1</option>
            <option>Sample Name #2</option>
            <option>Sample Name #3</option>
          </select>
        </div>
        <div class="form-group">
          <label>Expected VIP:</label>
          <input type="text" class="form-control" id="vip_name" name="vip_name" placeholder="Input VIP's Name then press Enter">
        </div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>VIP</th>
              <th style="width: 40px"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>VIP #1</td>
              <td><button class="btn btn-danger btn-sm">Remove</button></td>
            </tr>
            <tr>
              <td>VIP #2</td>
              <td><button class="btn btn-danger btn-sm">Remove</button></td>
            </tr>
          </tbody>
        </table>
        <div class="form-group">
          <button class="btn btn-block bg-orange"><b>Scan QR Code</b></button>
        </div>
      </div>

    </div>
  </div>

</div>