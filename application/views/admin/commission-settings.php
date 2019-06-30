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
		<form action="<?= admin_url('settings/update') ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-12">
					<div class="white-box">
						<h3 class="box-title m-b-30">Commission Points</h3>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label class="col-sm-2 text-right">
										E-Shop Points :
									</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="eshopPoint" id="eshopPoint" value="<?= @$data->eshopPoint ?>" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 text-right">
										Level-1 Points :
									</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="level1" id="level1" value="<?= @$data->level1 ?>" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 text-right">
										Level-2 Points :
									</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="level2" id="level2" value="<?= @$data->level2 ?>" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 text-right">
										Level-3 Points :
									</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="level3" id="level3" value="<?= @$data->level3 ?>" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 text-right">
										Level-4 Points :
									</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="level4" id="level4" value="<?= @$data->level4 ?>" autocomplete="off">
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