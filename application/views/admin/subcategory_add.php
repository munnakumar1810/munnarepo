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
				<form action="<?= admin_url('subcategory/create') ?>" method="post" enctype="multipart/form-data">
					<div class="white-box">
						<h3 class="box-title m-b-30 m-t-10"><?= $title ?></h3>
						<div class="row">
							<div class="col-sm-8 col-sm-offset-2">
								<div class="form-group">
									<label>Sub Category Name <span>*</span></label>
									<input type="text" class="form-control" name="subcategoryName" id="subcategoryName" autocomplete="off" value="" required="">
								</div>
							</div>
							<div class="col-sm-8 col-sm-offset-2">
								<div class="form-group">
									<label>Category <span>*</span></label>
									<select class="form-control" name="categoryId" id="categoryId" required="">
										<?php if (!empty($categoryList) && (count($categoryList) > 0)) { ?>

											<option value="">Select Category</option>

											<?php foreach ($categoryList as $key => $v): ?>

												<option value="<?= $v->categoryId ?>">
													<?= $v->categoryName ?>
												</option>

											<?php endforeach ?>

										<?php } else { ?>

											<option value="">No Categories Found</option>

										<?php } ?>
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
									<a class="btn btn-default waves-effect waves-light m-l-30" href="<?= admin_url('subcategory/lists') ?>">
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