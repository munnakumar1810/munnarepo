<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row bg-title">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h4 class="page-title"><?= $title ?></h4>
			</div>
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active"><?= $title ?></li>
				</ol>
			</div>
		</div>
		<form action="<?= admin_url('settings/save') ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-12">
					<div class="white-box">
						<h3 class="box-title m-b-30"><?= $title ?></h3>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label class="col-sm-2 text-right">
										Address : <span>*</span>
									</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="address" id="address" value="<?= $data->address ?>" autocomplete="off" required="">
										<input type="hidden" id="longitude">
										<input type="hidden" id="latitude">
										<input type="hidden" id="route">
										<input type="hidden" id="street_number">
										<input type="hidden" id="locality">
										<input type="hidden" id="postal_code">
										<input type="hidden" id="administrative_area_level_1">
										<input type="hidden" id="country">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 text-right">
										Email : <span>*</span>
									</label>
									<div class="col-sm-10">
										<input type="email" class="form-control" name="email" id="email" value="<?= $data->email ?>" autocomplete="off" required="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 text-right">
										Phone : <span>*</span>
									</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="phone" id="phone" value="<?= $data->phone ?>" autocomplete="off" required="">
									</div>
								</div>
							</div>
						</div>
						<h3 class="box-title m-b-20 m-b-30">Social Media Settings</h3>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label class="col-sm-2 text-right">
										Facebook :
									</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="facebook" id="facebook" value="<?= $data->facebook ?>" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 text-right">
										Twitter :
									</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="twitter" id="twitter" value="<?= $data->twitter ?>" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 text-right">
										Linkedin :
									</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="linkedin" id="linkedin" value="<?= $data->linkedin ?>" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 text-right">
										Google Plus :
									</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="google_plus" id="google_plus" value="<?= $data->google_plus ?>" autocomplete="off">
									</div>
								</div>
							</div>
							<div class="col-sm-4 col-sm-offset-4">
								<div class="form-group">
									<input type="submit" class="btn btn-success" name="settings" id="settings" value="Save"/>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>