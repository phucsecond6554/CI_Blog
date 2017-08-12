<h1 class="text-center">Them thanh vien</h1>  <hr>

<form action="<?php echo base_url('Admin/Signup') ?>" method="post" id="signup-form">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" placeholder="Your name" class="form-control"
    value="<?php echo set_value('name'); ?>" required>
    <?php echo form_error('name'); ?>
  </div> <!--Name-->

  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" name="username" placeholder="Username" class="form-control"
    value="<?php echo set_value('username'); ?>">
    <?php echo form_error('username'); ?>
  </div> <!--Username-->

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" placeholder="Password" class="form-control"
    pattern="^.{8,}" title="At least 8 character" required>
    <?php echo form_error('password');?>
  </div><!--Password-->

  <div class="form-group">
    <label for="password">Password Confirmation</label>
    <input type="password" name="passconf" placeholder="Password Confirmation" class="form-control"
    required>
    <?php echo form_error('password') ?>
  </div><!--Password-->

  <div class="form-group">
    <label for="gender">Gioi tinh</label>
    <select name="gender" class="form-control">
      <option value="Nam">Nam</option>
      <option value="Nu">Nu</option>
      <option value="Khac">Khac</option>
    </select>
  </div> <!--Gioi tinh -->

  <div class="form-group">
    <label>Ngay sinh</label>
    <div class="row">
      <div class="col-md-3">
        <input type="text" name="b_day" id="b_day" class="form-control" placeholder="Day"
        pattern="^\d{1,2}$" title="One or Two digit" required>
      </div> <!--Ngay sinh -->

      <div class="col-md-6">
        <select name="b_month" id="b_month" class="form-control">
          <option value="1">Thang 1</option>
          <option value="2">Thang 2</option>
          <option value="3">Thang 3</option>
          <option value="4">Thang 4</option>
          <option value="5">Thang 5</option>
          <option value="6">Thang 6</option>
          <option value="7">Thang 7</option>
          <option value="8">Thang 8</option>
          <option value="9">Thang 9</option>
          <option value="10">Thang 10</option>
          <option value="11">Thang 11</option>
          <option value="12">Thang 12</option>
        </select> <!--Thang sinh -->
      </div> <!--Dung HTML Tinh thay vi js cho muot-->

      <div class="col-md-3">
        <input type="text" name="b_year" id="b_year" class="form-control" placeholder="Year"
        pattern="^\d{4}$" title="4 Digit" required>
      </div>
    </div>
    <span id="b_error"></span> <!--Hien thi loi ngay thang -->
  </div> <!--Ngay thang nam sinh -->

  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" placeholder="Email" class="form-control"
    value="<?php echo set_value('email'); ?>">
    <?php echo form_error('email') ?>
  </div>

  <input type="submit" name="addmember" value="Add member" class="btn btn-primary">

</form>

<script src="<?php echo base_url('js/checkdate.js'); ?>">

</script>
