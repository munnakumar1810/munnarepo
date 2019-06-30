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
				<form action="<?= admin_url('seller/update') ?>" method="post" enctype="multipart/form-data">
					<div class="white-box">
						<h3 class="box-title m-b-30 m-t-10">
							Personal Information&nbsp;
							<span class="pull-right m-r-50">
								<img src="<?= base_url('/dist/images/wallet.png') ?>" alt="">&nbsp;
								<span style="line-height: 2;"><?= @$data->credits ?></span>
							</span>
						</h3>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>First Name <span>*</span></label>
									<input type="text" class="form-control" name="fname" id="fname" value="<?= $user->firstName ?>" required="">
									<input type="hidden" name="userId" value="<?= $userId ?>" required="">
									<input type="hidden" name="sellerId" value="<?= $userId ?>" required="">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Last Name <span>*</span></label>
									<input type="text" class="form-control" name="lname" id="lname" value="<?= $user->lastName ?>" required="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Email Address <span>*</span></label>
									<input type="email" class="form-control" name="email" id="email" value="<?= $user->email ?>" data-validation="email" required="">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Mobile <span>*</span></label>
									<input type="text" class="form-control" name="mobile" id="mobile" value="<?= $user->mobile ?>" required="">
								</div>
							</div>
						</div>
						<h3 class="box-title m-b-30 m-t-10">Contact Information</h3>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label>Address <span>*</span></label>
									<input type="text" class="form-control" name="address" id="address" value="<?= $user->address ?>" autocomplete="off" required="">
									<input type="hidden" name="contactId" value="<?= $user->contactId ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>City <span>*</span></label>
									<input type="text" class="form-control" name="city" id="locality" value="<?= $user->city ?>" autocomplete="off" required="">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Postcode <span>*</span></label>
									<input type="text" class="form-control" name="postcode" id="postal_code" value="<?= $user->postcode ?>" autocomplete="off" required="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Region / State <span>*</span></label>
									<input type="text" class="form-control" name="region" id="administrative_area_level_1" value="<?= $user->region ?>" autocomplete="off" required="">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Country <span>*</span></label>
									<input type="text" class="form-control" name="country" id="country" value="<?= $user->country ?>" autocomplete="off" required="">
								</div>
							</div>
						</div>
						<h3 class="box-title m-b-30 m-t-10">Other Information</h3>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Store Name <span>*</span></label>
									<input type="text" class="form-control" name="store_name" id="store_name" value="<?= $user->store_name ?>" autocomplete="off" disabled="" >
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Created On <span>*</span></label>
									<input type="text" class="form-control" name="created" id="created" value="<?= date('d-m-Y h:i a', strtotime($user->created)) ?>" disabled="" >
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Updated On <span>*</span></label>
									<input type="text" class="form-control" name="modified" id="modified" value="<?= date('d-m-Y h:i a', strtotime($user->modified)) ?>" disabled="" >
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Status <span>*</span></label>
									<select name="status" class="form-control" id="status" required="">
										<option value="1" <?= ($user->status == 1)? 'selected' : '' ?>>
											Active
										</option>
										<option value="0" <?= ($user->status == 0)? 'selected' : '' ?>>
											Deactive
										</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4 col-sm-offset-4">
								<div class="form-group m-t-30">
									<button type="submit" class="btn btn-success waves-effect waves-light">
										Update
									</button>
									<a class="btn btn-default waves-effect waves-light m-l-30" href="<?= admin_url('seller/lists') ?>">
										Back
									</a>
								</div>
							</div>
						</div>
					</div>
				</form>
				<form action="<?= admin_url('seller/changepassword') ?>" method="post" enctype="multipart/form-data">
					<div class="white-box">
						<h3 class="box-title m-b-30 m-t-10">Change Password</h3>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>New Password <span>*</span></label>
									<input type="password" class="form-control" name="password_confirmation" id="new-password" value="" autocomplete="off" required="">
									<input type="hidden" name="userId" value="<?= $userId ?>">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Re-enter Password <span>*</span></label>
									<input type="password" class="form-control" name="password" id="repeat-password" data-validation="confirmation" value="" required="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4 col-sm-offset-4">
								<div class="form-group m-t-30">
									<button type="submit" class="btn btn-success waves-effect waves-light">
										Change Password
									</button>
									<button class="btn btn-default waves-effect waves-light m-l-30" type="reset">
										Reset
									</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>