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
				<form action="<?= admin_url('eshop/update') ?>" method="post" enctype="multipart/form-data">
					<div class="white-box">
						<h3 class="box-title m-b-30 m-t-10">
							<?= @$title ?>&nbsp;
							<span class="pull-right m-r-50">
								<img src="<?= base_url('dist/images/wallet.png') ?>" alt="">&nbsp;
								<span style="line-height: 2;"><?= @$data->credits ?></span>
							</span>
						</h3>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>E-Shop Id <span>*</span></label>
									<input type="text" class="form-control" name="eshopId" id="eshopId" value="<?= @$data->eshopId ?>" disabled required="">
									<input type="hidden" name="eId" id="eId" value="<?= @$data->eId ?>">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>E-Shop Name <span>*</span></label>
									<input type="text" class="form-control" name="eshopName" id="eshopName" value="<?= @$data->eshopName ?>" required="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Email Address <span>*</span></label>
									<input type="email" class="form-control" name="email" id="email" value="<?= @$data->email ?>" data-validation="email" required="">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Mobile <span>*</span></label>
									<input type="text" class="form-control" name="phone" id="phone" value="<?= @$data->phone ?>" required="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label>Address <span>*</span></label>
									<input type="text" class="form-control" name="address" id="address" value="<?= @$data->address ?>" autocomplete="off" required="">
									<input type="hidden" name="latitude" id="latitude" value="<?= @$data->latitude ?>">
									<input type="hidden" name="longitude" id="longitude" value="<?= @$data->longitude ?>">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>City <span>*</span></label>
									<input type="text" class="form-control" name="city" id="locality" value="<?= @$data->city ?>" autocomplete="off" required="">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Postcode <span>*</span></label>
									<input type="text" class="form-control" name="postcode" id="postal_code" value="<?= @$data->postcode ?>" autocomplete="off" required="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Region / State <span>*</span></label>
									<input type="text" class="form-control" name="region" id="administrative_area_level_1" value="<?= @$data->region ?>" autocomplete="off" required="">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Country <span>*</span></label>
									<input type="text" class="form-control" name="country" id="country" value="<?= @$data->country ?>" autocomplete="off" required="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Password <span style="font-size: 11px;">(Enter only when you want to change the password)</span></label>
									<input type="password" class="form-control" name="password" autocomplete="off" id="password">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Status <span>*</span></label>
									<select class="form-control" name="status" id="status" required="">
										<option value="1" <?= (@$data->status == 1)? 'selected' : '' ?>>
											Active
										</option>
										<option value="0" <?= (@$data->status == 0)? 'selected' : '' ?>>
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
									<a class="btn btn-default waves-effect waves-light m-l-30" href="<?= admin_url('eshop/lists') ?>">
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