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

		<form action="<?= admin_url('settings/logosave') ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-12">
					<div class="white-box">
						<h3 class="box-title m-b-30"><?= $title ?></h3>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="old_password" class="col-sm-2 text-right">
										Logo : <span>*</span>
									</label>
									<div class="col-sm-10">
										<div class="fileinput fileinput-new" data-provides="fileinput">
											<div class="fileinput-new thumbnail" style="width: 200px; height: auto;">
												<?php if ($data->logo != '' && !is_null($data->logo) && file_exists('./uploads/logos/'.$data->logo)) { ?>
													<img src="<?= base_url('uploads/logos/'.$data->logo) ?>" alt="">
												<?php } else { ?>
													<img src="<?= base_url('dist/images/noimage.jpg') ?>" alt="">
												<?php } ?>
											</div>
											<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: auto;"></div>
											<div>
												<span class="btn btn-default btn-file">
													<span class="fileinput-new">Select image</span>
													<span class="fileinput-exists">Change</span>
													<input type="file" name="logo" accept="images/*" >
													<input type="hidden" name="oldLogo" value="<?= $data->logo ?>" required="">
												</span>
												<a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
											</div>
										</div>
										<div class="clearfix margin-top-10 m-b-20" style="display: block;">
											<span class="label label-main">Format</span> 
											jpg, jpeg, png&nbsp;&nbsp;
											<span class="label label-main">Max Size</span> 
											1 MB
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="old_password" class="col-sm-2 text-right">
										Favicon : <span>*</span>
									</label>
									<div class="col-sm-10">
										<div class="fileinput fileinput-new" data-provides="fileinput">
											<div class="fileinput-new thumbnail" style="width: 200px; height: auto;">
												<?php if ($data->favicon != '' && !is_null($data->favicon) && file_exists('./uploads/logos/'.$data->favicon)) { ?>
													<img src="<?= base_url('uploads/logos/'.$data->favicon) ?>" alt="">
												<?php } else { ?>
													<img src="<?= base_url('dist/images/noimage.jpg') ?>" alt="">
												<?php } ?>
											</div>
											<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: auto;"></div>
											<div>
												<span class="btn btn-default btn-file">
													<span class="fileinput-new">Select image</span>
													<span class="fileinput-exists">Change</span>
													<input type="file" name="favicon" accept="images/*" >
													<input type="hidden" name="oldFavicon" value="<?= $data->favicon ?>" required="">
												</span>
												<a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
											</div>
										</div>
										<div class="clearfix margin-top-10 m-b-20" style="display: block;">
											<span class="label label-main">Format</span> 
											png, ico&nbsp;&nbsp;
											<span class="label label-main">Max Size</span> 
											1 MB
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="old_password" class="col-sm-2 text-right">
										Title Logo : <span>*</span>
									</label>
									<div class="col-sm-10">
										<div class="fileinput fileinput-new" data-provides="fileinput">
											<div class="fileinput-new thumbnail" style="width: 200px; height: auto;">
												<?php if ($data->title != '' && !is_null($data->title) && file_exists('./uploads/logos/'.$data->title)) { ?>
													<img src="<?= base_url('uploads/logos/'.$data->title) ?>" alt="">
												<?php } else { ?>
													<img src="<?= base_url('dist/images/noimage.jpg') ?>" alt="">
												<?php } ?>
											</div>
											<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: auto;"></div>
											<div>
												<span class="btn btn-default btn-file">
													<span class="fileinput-new">Select image</span>
													<span class="fileinput-exists">Change</span>
													<input type="file" name="title" accept="images/*" >
													<input type="hidden" name="oldTitle" value="<?= $data->title ?>" required="">
												</span>
												<a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
											</div>
										</div>
										<div class="clearfix margin-top-10 m-b-20" style="display: block;">
											<span class="label label-main">Format</span> 
											jpg, jpeg, png&nbsp;&nbsp;
											<span class="label label-main">Max Size</span> 
											1 MB
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-4 col-sm-offset-4">
								<div class="form-group">
									<input type="submit" class="btn btn-success" name="logo_settings" id="logo_settings" value="Save"/>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>