<?php $setting = $this->mymodel->getSettings(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="GOIGI">
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('uploads/logos/'.@$setting->favicon) ?>">

	<title><?= (!empty($title) && $title != '')? $title.' | ' : ''; ?><?= SITENAME ?></title>

	<link href="<?= base_url('dist/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('plugins/sidebar-nav/dist/sidebar-nav.min.css') ?>" rel="stylesheet">

	<link href="<?= base_url('plugins/toast-master/css/jquery.toast.css') ?>" rel="stylesheet">
	<link href="<?= base_url('plugins/morrisjs/morris.css') ?>" rel="stylesheet">
	<link href="<?= base_url('plugins/datatables/jquery.dataTables.min.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('dist/css/buttons.dataTables.min.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') ?>" rel="stylesheet" />
	<link href="<?= base_url('plugins/custom-select/custom-select.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('plugins/summernote/dist/summernote.css') ?>" rel="stylesheet" />
	<link href="<?= base_url('plugins/switchery/dist/switchery.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('plugins/bootstrap3-editable/css/bootstrap-editable.css') ?>" rel="stylesheet">
	<link href="<?= base_url('plugins/sweetalert/sweetalert.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('plugins/jquery-asColorPicker-master/css/asColorPicker.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('plugins/jasny-bootstrap/jasny-bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />

	<link href="<?= base_url('dist/css/animate.css') ?>" rel="stylesheet">
	<link href="<?= base_url('dist/css/style.css?v=').time() ?>" rel="stylesheet">
	<link href="<?= base_url('dist/css/colors/default.css?v=').time() ?>" id="theme" rel="stylesheet">

	<script src="<?= base_url('plugins/jquery/dist/jquery.min.js') ?>"></script>
	<style>
		.navbar-static-top {z-index: 1010; position: fixed; border-bottom: solid 1px #ccc;
    box-shadow: 0 0 5px #ccc;}
		#page-wrapper {margin-top: 60px;}
		.form-horizontal label {text-align: right;}
	</style>
</head>
<body class="fix-sidebar">
	<!-- Preloader -->
	<div class="preloader">
		<svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
		</svg>
	</div>

	<div id="wrapper">
		<nav class="navbar navbar-default navbar-static-top m-b-0">
			<div class="navbar-header">
				<div class="top-left-part">
					<a class="logo" href="<?= seller_url() ?>">
						<b>
							<img src="<?= base_url('uploads/logos/'.@$setting->favicon) ?>" alt="" class="dark-logo" />
							<img src="<?= base_url('uploads/logos/'.@$setting->favicon) ?>" alt="" class="light-logo" />
						</b>
						<span class="hidden-xs">
							<img src="<?= base_url('uploads/logos/'.@$setting->title) ?>" alt="" class="dark-logo" />
							<img src="<?= base_url('uploads/logos/'.@$setting->title) ?>" alt="" class="light-logo" />
						</span>
					</a>
				</div>

				<ul class="nav navbar-top-links navbar-left">
					<li>
						<a href="javascript:void(0)" class="open-close waves-effect waves-light">
							<i class="ti-menu"></i>
						</a>
					</li>
				</ul>

				<ul class="nav navbar-top-links navbar-right pull-right">
					<li class="dropdown">
						<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#">
							<img src="<?= base_url('dist/images/users/user.png') ?>" alt="user-img" width="36" class="img-circle">
							<b class="hidden-xs">Admin</b><span class="caret"></span>
						</a>
						
						<ul class="dropdown-menu dropdown-user animated flipInY">
							<li>
								<div class="dw-user-box">
									<div class="u-img">
										<img src="<?= base_url('dist/images/') ?>users/user.png" alt="user" />
									</div>
									<div class="u-text">
										<h4>System Admin</h4>
										<p class="text-muted"><?= $this->session->userdata('uemail'); ?></p>
										<a href="<?= seller_url('profile') ?>" class="btn btn-rounded btn-main btn-sm">View Profile</a>
									</div>
								</div>
							</li>
							<li role="separator" class="divider"></li>
							<li>
								<a href="<?= seller_url('change_password') ?>">
									<i class="ti-key"></i> Change Password
								</a>
							</li>
							<li role="separator" class="divider"></li>
							<li>
								<a href="<?= seller_url('logout')?>">
									<i class="fa fa-power-off"></i> Logout
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>