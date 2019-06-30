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
			<div class="col-md-12">
				<form action="<?= admin_url('banner/update') ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
					<div class="white-box">
						<h3 class="box-title m-b-30 m-t-10"><?= $title ?></h3>
						<div class="row">
							<div class="col-sm-10 col-sm-offset-1">
								<div class="form-group">
									<label class="col-sm-3">Title <span>*</span></label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="bannerTitle" id="bannerTitle" autocomplete="off" value="<?= @$data->bannerTitle ?>" required="">
										<input type="hidden" name="bannerId" id="bannerId" value="<?= @$data->bannerId ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3"> Image <span>*</span></label>
									<div class="col-sm-9">
										<div class="fileinput fileinput-new" data-provides="fileinput">
											<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
												<?php if (@$data->bannerImage && file_exists('./uploads/slider/'.@$data->bannerImage)) { ?>
													<img src="<?= base_url('uploads/slider/'.@$data->bannerImage) ?>" alt="">
												<?php } else { ?>
													<img src="<?= base_url('dist/images/noimage.jpg') ?>" alt="">
												<?php } ?>
											</div>
											<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
											<div>
												<span class="btn btn-default btn-file">
													<span class="fileinput-new">Select image</span>
													<span class="fileinput-exists">Change</span>
													<input type="file" name="bannerImage" accept="images/*">
													<input type="hidden" name="oldBannerImage" value="<?= @$data->bannerImage ?>">
												</span>
												<a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
											</div>
										</div>
										<div class="clearfix margin-top-10 m-b-20" style="display: block;">
											<span class="label label-danger">Format</span>&nbsp;jpg, jpeg, png, gif
											<span class="label label-danger">Max Upload Size</span>&nbsp;1mb
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4 col-sm-offset-4">
								<div class="form-group m-t-20">
									<button type="submit" class="btn btn-success waves-effect waves-light">
										Update
									</button>
									<a class="btn btn-default waves-effect waves-light m-l-30" href="<?= admin_url('banner/lists') ?>">
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