<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--Bootstrap CSS-->

	<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>">

  <script src="<?php echo base_url('js/jquery-3.2.1.min.js') ?>"></script>
  <script src="<?php echo base_url('js/bootstrap.min.js') ?>"></script>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/pagination.css') ?>">

	<style media="screen">
		.nav-custom{
			background-color: transparent;
			border: none;
			border-bottom: 1px solid lightgray;
			margin-top: 20px;
		}
	</style>
</head>

<body>
	<div class="container-fluid">
		<div class="parallax">

			<div class="header-text">
				<h1>A Simple Blog with Bootstrap and Codeigniter</h1>
			</div>
		</div> <!--Parallax Scroll-->

		<nav class="navbar navbar-default nav-custom">
		    <ul class="nav navbar-nav">
		    	<li><a href="<?php echo base_url('Home/index') ?>">Home</a></li>
		    	<li class="dropdown">
		    		<a class="dropdown-toggle" data-toggle="dropdown" href="">Category
		    			<span class="caret"></span>
		    		</a>
		    		<ul class="dropdown-menu">
			          <li><a href="<?php echo base_url('Category/lap-trinh'); ?>">Lap trinh</a></li>
			          <li><a href="<?php echo base_url('Category/tin-moi'); ?>">Tin moi</a></li>
			          <li><a href="<?php echo base_url('Category/chuyen-linh-tinh'); ?>">Chuyen linh tinh</a></li>
			        </ul>
		    	</li>
		    	<li><a href="">Lien he</a></li>
		    </ul>

		    <form class="navbar-form navbar-right" role="search" action="<?php echo base_url('Search') ?>"
					method="get">
			  <div class="form-group">
			    <input type="text" class="form-control" placeholder="Search" name="search-key">
			  </div>
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
		</nav> <!--Nav-->
		<hr>

		<?php $this->load->view($subview); ?> <!--subview hay maincontain-->

	</div> <!--Container -->

	<!--Bootstrap Javascript-->

</body>
</html>
