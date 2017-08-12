<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Admin Signin</title>
  	<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/admin-style.css') ?>">
  </head>
  <body style="padding-top:0">
    <div class="signin-wrapper">
      <div class="signin-form">
        <form action="<?php echo base_url('Admin/Signin') ?>" method="post">
          <h3 class="text-center">Dang nhap</h3>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Username" class="form-control"
            value="<?php echo set_value('username') ?>" required>
            <?php echo form_error('username'); ?>
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password" class="form-control"
            value="<?php echo set_value('password') ?>" pattern="^.{8,}" title="At least 8 Character" required>
            <?php echo form_error('password'); ?>
          </div>

          <input type="submit" name="signin" value="Sign in" class="btn btn-primary center-btn">
          <?php echo form_error('signin'); ?>
        </form>
      </div>
    </div>
  </body>
</html>
