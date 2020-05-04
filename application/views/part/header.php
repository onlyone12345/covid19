<!-- header -->
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Covid-19 Lamsel</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" href="<?php echo site_url() ?>assets/img/favicon.png">

	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo site_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo site_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo site_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
	<!-- toastr -->
	<link rel="stylesheet" href="<?php echo site_url() ?>assets/bower_components/toastr/toastr.min.css">	
	<!-- bootstrap datepicker -->
	<link rel="stylesheet" href="<?php echo site_url() ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="<?php echo site_url() ?>assets/bower_components/select2/dist/css/select2.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo site_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<!-- validator -->
	<link rel="stylesheet" href="<?php echo site_url() ?>assets/bower_components/bootstrap-validator/dist/css/bootstrapValidator.css"/>
	<!-- wysihtml5 -->
	<link rel="stylesheet" href="<?php echo site_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  	<!-- Theme style -->
 	<link rel="stylesheet" href="<?php echo site_url() ?>assets/dist/css/AdminLTE.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?php echo site_url() ?>assets/dist/css/skins/_all-skins.min.css"> 

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


	<!-- js -->
	<!-- jQuery 3 -->
	<script src="<?php echo site_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?php echo site_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- select2 -->
	<script src="<?php echo site_url() ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
	<!-- bootstrap datepicker -->
	<script	src="<?php echo site_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<!-- daterangepicker -->
	<script src="<?php echo site_url() ?>assets/bower_components/moment/min/moment.min.js"></script>
	<!-- Slimscroll -->
	<script src="<?php echo site_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="<?php echo site_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
	<!-- toastr -->
	<script src="<?php echo site_url() ?>assets/bower_components/toastr/toastr.min.js"></script>
	<!-- datatables -->
	<script src="<?php echo site_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo site_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<!-- validator -->
	<script src="<?php echo site_url() ?>assets/bower_components/bootstrap-validator/dist/js/bootstrapValidator.js"></script>
	<!-- wysihtml5 -->
	<script src="<?php echo site_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>


</head>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<header class="main-header">
			<!-- Logo -->
			
			<a href="index2.html" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				
				<span class="logo-mini"><img style="height:45px" src="<?php echo site_url() ?>assets/img/logo.png" alt=""></span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><b>Covid Lamsel</b></span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<?php if($this->session->userdata('level')==0) : ?>
						<!-- Tasks: style can be found in dropdown.less -->
						<li class="dropdown tasks-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-gear"></i>
							</a>
							<ul class="dropdown-menu">
								<li class="header">Pengaturan</li>
								<li>
									<!-- inner menu: contains the actual data -->
									<ul class="menu">
										<li>
											<!-- Task item -->
											<a href="<?php echo site_url() ?>user">
												<h3>Managemen User</h3>
											</a>
										</li>
									
									</ul>
								</li>
							</ul>
						</li>
						<?php endif; ?>
						<!-- User Account: style can be found in dropdown.less -->
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-chevron-down"></i>
								<?php echo $this->session->userdata('nama') !== NULL ? $this->session->userdata('nama') : 'err' ?>
							</a>
							<ul class="dropdown-menu">
								<!-- User image -->
								<li class="user-header">
									<img src="<?php echo site_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle"
										alt="User Image">
									<p>
										<?php echo $this->session->userdata('nama') !== NULL ? $this->session->userdata('nama') : 'err' ?>
									</p>
								</li>


								<!-- /.row -->
						</li>
						<!-- Menu Footer-->
						<li class="user-footer">
							<div class="pull-right">
								<a href="<?php echo site_url('logout') ?>" class="btn btn-danger btn-flat">Sign out</a>
							</div>
						</li>
					</ul>
					</li>
					<!-- Control Sidebar Toggle Button -->

					</ul>
				</div>
			</nav>
		</header>
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				
				<br>

				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu" data-widget="tree">
					<li class="header">MAIN NAVIGATION</li>
					<li class="<?php echo ($active=="dashboard") ? 'active' : '' ?>">
						<a href="<?php echo site_url() ?>backend/dashboard">
							<i class="fa fa-home"></i> <span>Home</span>
						</a>
					</li>

					<?php if($this->session->userdata('level')==0 || $this->session->userdata('level')==1 ) : ?>
					<li class="treeview <?php echo ($active=="rilis" || $active=="detail" || $active=="sebaran") ? 'active' : '' ?>">
						<a href="#">
							<i class="fa fa-database"></i> <span>Data</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li class="<?php echo ($active=="rilis") ? 'active' : '' ?>"><a href="<?php echo site_url() ?>backend/rilis"><i class="fa fa-book"></i> Rilis Data</a></li>
							<li class="<?php echo ($active=="detail") ? 'active' : '' ?>"><a href="<?php echo site_url() ?>backend/detail"><i class="fa fa-book"></i> detail corona</a></li>
							<li class="<?php echo ($active=="sebaran") ? 'active' : '' ?>"><a href="<?php echo site_url() ?>backend/sebaran"><i class="fa fa-book"></i> sebaran corona</a></li>
						</ul>
					</li>
					<?php endif; ?>

					<?php if($this->session->userdata('level')==0 || $this->session->userdata('level')==2 ) : ?>
					<li class="<?php echo ($active=="berita") ? 'active' : '' ?>">
						<a href="<?php echo site_url() ?>backend/berita">
							<i class="fa fa-globe"></i> <span>Berita</span>
						</a>
					</li>
					<?php endif; ?>

					<!-- <li class="active">
						<a href="#">
							<i class="fa fa-home"></i> <span>Berita</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li class="active"><a href="<?php //echo site_url() ?>backend/dashboard"><i class="fa fa-book"></i> Berita</a></li>
						</ul>
					</li> -->
				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>
