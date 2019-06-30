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

		<?php if (!empty($menu_id)) { ?>
			<form action="<?= admin_url('menus/update/').$data->menu_id ?>" class="form-horizontal" method="post">
				<div class="row">
					<div class="col-md-12">
						<div class="white-box">
							<h3 class="box-title m-b-30"><?= @$title ?></h3>
							<div class="row">
								<div class="col-sm-8 col-sm-offset-2">
									<div class="form-group">
										<label class="col-sm-3">Menu Name <span>*</span></label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="label" id="label" value="<?= $data->label ?>" required="">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3">Menu Link <span>*</span></label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="link" id="link" value="<?= $data->link ?>" required="">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3">Menu Icon </label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="icon" id="icon" value="<?= $data->icon ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3">Parent Menu </label>
										<div class="col-sm-9">
											<?= form_dropdown('parent', $parent_menus, $data->parent, 'class="form-control select2" id="parent"'); ?>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-3"></div>
										<div class="sm-9">
											<div class="checkbox-inline">
												<label>
													<input type="checkbox" name="status" value="1" <?= ($data->status == 1)? 'checked=""' : ''; ?>>
													Will be listed in Menu?
												</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-4 col-sm-offset-4 m-t-20">
											<button type="submit" class="btn btn-success waves-effect waves-light">Update Menu</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		<?php } else { ?>
			<form action="<?= admin_url('menus/create') ?>" class="form-horizontal" method="post">
				<div class="row">
					<div class="col-md-12">
						<div class="white-box">
							<h3 class="box-title m-b-30"><?= @$title ?></h3>
							<div class="row">
								<div class="col-sm-8 col-sm-offset-2">
									<div class="form-group">
										<label class="col-sm-3">Menu Name <span>*</span></label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="label" id="label" value="" required="">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3">Menu Link <span>*</span></label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="link" id="link" value="" required="">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3">Menu Icon </label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="icon" id="icon" value="">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3">Parent Menu </label>
										<div class="col-sm-9">
											<?= form_dropdown('parent', $parent_menus, '', 'class="form-control select2" id="parent"'); ?>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-3"></div>
										<div class="sm-9">
											<div class="checkbox-inline">
												<label>
													<input type="checkbox" name="status" value="1" checked="">
													Will be listed in Menu?
												</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-4 col-sm-offset-4 m-t-20">
											<button type="submit" class="btn btn-success waves-effect waves-light">Add Menu</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		<?php } ?>
	</div>