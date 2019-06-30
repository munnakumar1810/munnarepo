<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('uploads/logos/'.@$settings->favicon) ?>">

	<title>Login Panel | <?= SITENAME ?></title>

	<!-- Bootstrap Core CSS -->
	<link href="<?= base_url('dist/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('dist/css/animate.css') ?>" rel="stylesheet">
	<link href="<?= base_url('dist/css/style.css') ?>" rel="stylesheet">
	<link href="<?= base_url('dist/css/colors/default.css') ?>" id="theme" rel="stylesheet">
</head>
<body>
	<!-- Preloader -->
	<div class="preloader">
		<div class="cssload-speeding-wheel"></div>
	</div>

	<section id="wrapper" class="new-login-register" style="background-image: linear-gradient(#2874f0, #7b7b7b);background-repeat: no-repeat;">
		<div class="new-login-box">
			<div class="white-box">
				<a href="<?= base_url() ?>" class="text-center db m-b-20">
					<?php if (@$settings->logo) { ?>
						<img src="<?= base_url('uploads/logos/'.@$settings->logo) ?>" class="img-responsive" alt="">
					<?php } ?>
				</a>
				<form class="form-horizontal form-material" id="loginform" action="<?= admin_url('login') ?><?= ($this->input->get('redirectto'))? '?redirectto='.$this->input->get('redirectto') : ''; ?>" method="post">

					<?php if (!empty($msg)): ?>
						<?= $msg ?>
					<?php endif ?>

					<div class="form-group  m-t-20">
						<div class="col-xs-12">
							<input class="form-control" type="text" name="username" required="" placeholder="Username" autocomplete="off">
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off" required="">
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-12">
							<div class="checkbox checkbox-main pull-left p-t-0">
								<input id="checkbox-signup" type="checkbox" checked="checked">
								<label for="checkbox-signup"> Remember me </label>
							</div>
							<a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot Password?</a>
						</div>
					</div>

					<div class="form-group text-center m-t-20">
						<div class="col-xs-12">
							<button class="btn btn-main btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit">Log In</button>
						</div>
					</div>
				</form>

				<form class="form-horizontal" id="recoverform" action="">
					<div class="form-group ">
						<div class="col-xs-12">
							<h3>Recover Password</h3>
							<p class="text-muted">Enter your Email and instructions will be sent to you! </p>
						</div>
					</div>
					<div class="form-group ">
						<div class="col-xs-12">
							<input class="form-control" type="email" name="recover_email" required="" placeholder="Email">
						</div>
					</div>
					<div class="form-group text-center m-t-20">
						<div class="col-xs-12">
							<button class="btn btn-main btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>

	<!-- jQuery -->
	<script src="<?= base_url('plugins/jquery/dist/jquery.min.js') ?>"></script>
	<script src="<?= base_url('dist/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('plugins/sidebar-nav/dist/sidebar-nav.min.js') ?>"></script>
	<script src="<?= base_url('dist/js/jquery.slimscroll.js') ?>"></script>
	<script src="<?= base_url('dist/js/waves.js') ?>"></script>
	<script src="<?= base_url('dist/js/custom.min.js') ?>"></script>
	<script src="<?= base_url('plugins/styleswitcher/jQuery.style.switcher.js') ?>"></script>

	<script>
		$(window).load(function() {
			$(".alert").delay(7000).fadeOut(1500);
		});
	</script>
</body>
</html>