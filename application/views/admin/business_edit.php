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
		<div class="row">
			<div class="col-sm-12">
				<a href="<?= admin_url('business/lists') ?>" class="btn btn-primary m-b-20">
					<i class="fa fa-list"></i>&nbsp;
					Business Type List
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<form action="<?= admin_url('business/update') ?>" method="post" enctype="multipart/form-data">
					<div class="white-box">
						<h3 class="box-title m-b-30 m-t-10"><?= $title ?></h3>
						<div class="row">
							<div class="col-sm-8 col-sm-offset-2">
								<div class="form-group">
									<label>Business Type <span>*</span></label>
									<input type="text" class="form-control" name="businessTypeName" id="businessTypeName" autocomplete="off" value="<?= $data->businessTypeName ?>" required="">
									<input type="hidden" name="businessTypeId" id="businessTypeId" value="<?= $data->businessTypeId ?>" required="">
								</div>
								<div class="form-group">
									<label>Status <span>*</span></label>
									<select class="form-control" name="status" id="status" required="">
										<option value="1" <?= ($data->status == 1)? 'selected' : '' ?>>
											Active
										</option>
										<option value="0" <?= ($data->status == 0)? 'selected' : '' ?>>
											Deactive
										</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4 col-sm-offset-4">
								<div class="form-group m-t-20">
									<button type="submit" class="btn btn-success waves-effect waves-light">
										Create
									</button>
									<a class="btn btn-default waves-effect waves-light m-l-30" href="<?= admin_url('business/lists') ?>">
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