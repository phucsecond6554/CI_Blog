<script>
  var c_month = <?php echo get_month_string($detail->ngaysinh); ?>;
</script>

<h1 class="text-center">Them thanh vien</h1>  <hr>

<form action="<?php echo base_url('Admin/Edit_Member/check_form/').$detail->id;?>" method="post" id="signup-form">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" placeholder="Your name" class="form-control"
    value="<?php echo $detail->realname ?>" required>

    <?php echo form_error('name') ?>
  </div> <!--Name-->

  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" name="username" placeholder="Username" class="form-control"
    value="<?php echo $detail->username?>" disabled>
  </div> <!--Username-->

  <div class="form-group">
    <label for="gender">Gioi tinh</label>
    <select name="gender" class="form-control">
      <option value="Nam" <?php if($detail->gioitinh == 'Nam') echo 'selected'; ?>>Nam</option>
      <option value="Nu"<?php if($detail->gioitinh == 'Nu') echo 'selected'; ?>>Nu</option>
      <option value="Khac" <?php if($detail->gioitinh == 'Khac') echo 'selected'; ?>>Khac</option>
    </select>
  </div> <!--Gioi tinh -->

  <div class="form-group">
    <label>Ngay sinh</label>
    <div class="row">
      <div class="col-md-3">
        <input type="text" name="b_day" id="b_day" class="form-control" placeholder="Day"
        pattern="^\d{1,2}$" title="One or Two digit" value="<?php echo get_date_string($detail->ngaysinh); ?>"
        required>
      </div> <!--Ngay sinh -->

      <div class="col-md-6">
        <select name="b_month" id="b_month" class="form-control">
          <script>
            for(var i = 1 ; i <= 12 ; i++){
              if(i == c_month){
                document.write("<option selected value="+i+">Thang " + i + "</option>");
              }else {
                document.write("<option value="+i+">Thang " + i + "</option>");
              }
            }
          </script>
        </select> <!--Thang sinh -->
      </div> <!--Dung HTML Tinh thay vi js cho muot-->

      <div class="col-md-3">
        <input type="text" name="b_year" id="b_year" class="form-control" placeholder="Year"
        pattern="^\d{4}$" title="4 Digit" value="<?php echo get_year_string($detail->ngaysinh); ?>" required>
      </div>
    </div>
    <span id="b_error"></span> <!--Hien thi loi ngay thang -->
  </div> <!--Ngay thang nam sinh -->

  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" placeholder="Email" class="form-control"
    value="<?php echo $detail->email; ?>">
    <?php echo form_error('email') ?>
  </div>

  <input type="submit" name="addmember" value="Edit member" class="btn btn-primary">

</form>

<script src="<?php echo base_url('js/checkdate.js'); ?>">

</script>
