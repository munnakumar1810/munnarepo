<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row bg-title">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h4 class="page-title"><?= @$title ?></h4>
			</div>
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active"><?= @$title ?></li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<form action="<?= admin_url('users/create') ?>" method="post" enctype="multipart/form-data">
					<div class="white-box">
						<h3 class="box-title m-b-30 m-t-10">Personal Information</h3>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>First Name <span>*</span></label>
									<input type="text" class="form-control" name="fname" id="fname" value="" required="">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Last Name <span>*</span></label>
									<input type="text" class="form-control" name="lname" id="lname" value="" required="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Email Address <span>*</span></label>
									<input type="email" class="form-control" name="email" id="email" value="" data-validation="email" required="">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Mobile <span>*</span></label>
									<input type="text" class="form-control" name="mobile" id="mobile" value="" required="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group pos-rel">
									<label>Reference </label>
									<select class="form-control select2" name="reference" id="reference">
										<option value="">Select Referer</option>
										<?php foreach ($referenceList as $key => $v): ?>
											<option value="<?= @$v->id ?>"><?= @$v->name ?> (<?= @$v->mobile ?>)</option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Password <span>*</span></label>
									<input type="password" class="form-control" name="password" autocomplete="off" id="password" value="" required="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4 col-sm-offset-4">
								<div class="form-group m-t-30">
									<button type="submit" class="btn btn-success waves-effect waves-light">
										Create
									</button>
									<a class="btn btn-default waves-effect waves-light m-l-30" href="<?= admin_url('users/lists') ?>">
										Back
									</a>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>