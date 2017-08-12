<?php
  $title = isset($title) ? $title : '';
  if(!empty($this->session->userdata('username')) && $this->session->userdata('username') != ''){
    $username = $this->session->userdata('username');
  }
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>

    <meta name="author" content="Nguyen Huynh Thanh Phuc">
    <meta name="description" content="Mot Blog don gian dung Codeigniter">
    <meta name="keywords" content="Codeigniter,CI,Blog,Tech,Bootstrap">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  	<link rel="stylesheet" href="<?php echo base_url("css/bootstrap.min.css");?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("css/admin-style.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("css/pagination.css");?>">

    <script src="<?php echo base_url("js/jquery-3.2.1.min.js") ?>"></script>
    <script src="<?php echo base_url("js/bootstrap.min.js") ?>"></script>
  </head>
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
          <!-- Nav -->
          <div class="navbar-header">
              <a class="navbar-brand" href="#">Simple Blog</a>
          </div>
          <!-- Nav collapse -->
          <div class="collapse navbar-collapse" id="menu">
              <div class="navbar-right">
                  <i>Xin chao <?php echo $username ?></i>
                  <a href="<?php echo base_url('Admin/Signin/sign_out'); ?>" class="btn btn-info navbar-btn">Sign out</a>
              </div>
          </div>
      </div>
      <!-- /.container -->
    </nav>
      <!-- /Navigation -->

      <div class="container-fluid">
        <div class="row wrapper">
          <div class="col-md-2" id="left-sidebar">
            <ul>
              <li><a href="<?php echo base_url('Admin/Dashboard'); ?>">Dashboard</a></li>
              <li><a href="<?php echo base_url('Admin/Post'); ?>">Post</a></li>
              <li><a href="<?php echo base_url('Admin/Allpost'); ?>">All post</a></li>
              <li><a href="#">Account</a></li>
              <li><a href="#">Change web info</a></li>
            </ul>
          </div> <!--Left sidebar-->

          <div class="col-md-10 main-board">
            <?php $this->load->view($subview); ?>
          </div>
        </div> <!--Main content -->
      </div> <!--Wrapper-->

  </body>
</html>
