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
		<form action="<?= seller_url('profile/save') ?>" class="form-horizontal" method="post">
			<div class="row">
				<div class="col-md-12">
					<div class="white-box">
						<h3 class="box-title m-b-30"><?= @$title ?></h3>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label class="col-sm-3">Name <span>*</span></label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="eshopName" id="eshopName" value="<?= @$data->eshopName ?>" autocomplete="off" required="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3">Email Address <span>*</span></label>
									<div class="col-sm-9">
										<input type="email" class="form-control" name="email" id="email" value="<?= @$data->email ?>" data-validation="email" autocomplete="off" required="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3">Mobile <span>*</span></label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="phone" id="phone" value="<?= @$data->phone ?>" autocomplete="off" required="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3">Address <span>*</span></label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="address" id="address" value="<?= @$data->address ?>" autocomplete="off" autocomplete="off" required="">
										<input type="hidden" name="latitude" id="latitude" value="<?= @$data->latitude ?>">
										<input type="hidden" name="longitude" id="longitude" value="<?= @$data->longitude ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3">City <span>*</span></label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="city" id="locality" value="<?= @$data->city ?>" autocomplete="off" autocomplete="off" required="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3">Postcode <span>*</span></label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="postcode" id="postal_code" value="<?= @$data->postcode ?>" autocomplete="off" autocomplete="off" required="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3">Region / State <span>*</span></label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="region" id="administrative_area_level_1" value="<?= @$data->region ?>" autocomplete="off" autocomplete="off" required="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3">Country <span>*</span></label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="country" id="country" value="<?= @$data->country ?>" autocomplete="off" autocomplete="off" required="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3">Created On <span>*</span></label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="created" id="created" value="<?= date('d-m-Y h:m A', strtotime(@$data->created)) ?>" disabled="" autocomplete="off" required="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3">Last Updated <span>*</span></label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="edited" id="edited" value="<?= date('d-m-Y h:m A', strtotime(@$data->edited)) ?>" disabled="" autocomplete="off" required="">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4 col-sm-offset-4">
								<div class="form-group">
									<button type="submit" class="btn btn-success waves-effect waves-light">Update Profile</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>