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
				<form action="<?= admin_url('products/update') ?>" method="post" enctype="multipart/form-data">
					<div class="white-box">
						<h3 class="box-title m-b-30 m-t-10"><?= $title ?></h3>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label class="control-label">Product Name:</label>
									<input type="text" name="productname" value="<?= $data->productName ?>" placeholder="Product Name" id="autoGenerateUrl" class="form-control" autocomplete="off" required="">
									<input type="hidden" name="url" id="autoFillUrl" value="<?= $data->url ?>">
									<input type="hidden" name="productId" value="<?= $productId ?>">
								</div>
								<div class="form-group">
									<label class="control-label" for="input-status">Seller:</label>
									<select class="form-control select2" name="sellerId" id="seller" required="">
										<option value="">Select Seller</option>
										<?php if (count($sellerList) > 0): ?>
											<?php foreach ($sellerList as $key => $v): ?>
												<option value="<?= $v->userId ?>" <?= ($v->userId == $data->sellerId)? 'selected' : ''; ?>>
													<?= $v->firstName ?> <?= $v->lastName ?>(<?= $v->store_name ?>)
												</option>
											<?php endforeach ?>
										<?php endif ?>
									</select>
								</div>
								<div class="form-group">
									<label class="control-label" for="input-status">Product Category:</label>
									<select class="form-control select2" name="category" id="category" onchange="subCategoryListing($(this).val());" required="">
										<option value="">Select Category</option>
										<?php if (count($categoryList) > 0): ?>
											<?php foreach ($categoryList as $key => $v): ?>
												<option value="<?= $v->categoryId ?>" <?= ($v->categoryId == $data->categoryId)? 'selected' : ''; ?>>
													<?= $v->categoryName ?>
												</option>
											<?php endforeach ?>
										<?php endif ?>
									</select>
								</div>
								<div class="form-group">
									<label class="control-label" for="input-status">Product Sub Category:</label>
									<select class="form-control select2" id="subCategory" name="subcategory" required="">
										<option value="">Select Subcategory</option>
										<?php if (count($subCategoryList) > 0): ?>
											<?php foreach ($subCategoryList as $key => $v): ?>
												<option value="<?= $v->subcategoryId ?>" <?= ($v->subcategoryId == $data->subcategoryId)? 'selected' : ''; ?>>
													<?= $v->subcategoryName ?>
												</option>
											<?php endforeach ?>
										<?php endif ?>
									</select>
								</div>
								<div class="form-group">
									<label class="control-label">Description:</label>
									<textarea class="summernote" name="desc"><?= $data->description ?></textarea>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">SKU:</label>
									<input type="text" name="sku" placeholder="SKU" class="form-control" autocomplete="off" value="<?= $data->sku ?>">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">Price ($):</label>
									<input type="text" name="price" placeholder="46.00" class="form-control" autocomplete="off" value="<?= $data->price ?>">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">Max. Price ($):</label>
									<input type="text" name="maxprice" placeholder="50.00" class="form-control" autocomplete="off" value="<?= $data->maxPrice ?>">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="control-label">Discount Text:</label>
									<input type="text" name="discount" placeholder="For e.g. - 20% off" class="form-control" autocomplete="off" value="<?= $data->discountText ?>">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="control-label">Stock:</label>
									<input type="text" name="stock" placeholder="10" class="form-control" autocomplete="off" value="<?= $data->stock ?>">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="control-label" for="input-status">Stock Availability:</label>
									<select class="form-control select2" name="stockavailability" required="">
										<option value="">Choose</option>
										<option value="1" <?= ($data->stockAvailability == 1)? 'selected' : ''; ?>>
											Available
										</option>
										<option value="0" <?= ($data->stockAvailability == 0)? 'selected' : ''; ?>>
											Not Available
										</option>
									</select>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="control-label" for="input-status">Status:</label>
									<select class="form-control select2" name="status" required="">
										<option value="">Choose</option>
										<option value="1" <?= ($data->status == 1)? 'selected' : ''; ?>>
											Enabled
										</option>
										<option value="0" <?= ($data->status == 0)? 'selected' : ''; ?>>
											Disabled
										</option>
									</select>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="control-label">Brand:</label>
									<input type="text" name="brand" placeholder="Samsung, Adidas, Titans" class="form-control" autocomplete="off" required="">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="control-label">Keywords:</label>
									<input type="text" name="keywords" placeholder="Enter your keywords" class="form-control" data-role="tagsinput" autocomplete="off" required="">
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label class="control-label" for="input-status">Product Image:</label>+
									<div>
										<?php if (count($productImagesList) > 0): ?>
											<?php foreach ($productImagesList as $key => $v): ?>
												<div class="fileinput fileinput-new" data-provides="fileinput">
													<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
														<?php if (file_exists('./uploads/products/small/'.$v->productImage)) { ?>
															<img src="<?= base_url('uploads/products/small/'.$v->productImage) ?>" alt="">
														<?php } else { ?>
															<img src="<?= base_url('dist/images/noimage.jpg') ?>" alt="">
														<?php } ?>
														<span class="delete-product-image" onclick="deleteProductImage('<?= $v->productImage ?>', '<?= $v->productImageId ?>', $(this));">
															<i class="fa fa-times"></i>
														</span>
													</div>
												</div>
											<?php endforeach ?>
										<?php endif ?>
									</div>
									<div class="clearfix margin-top-10 m-b-20" style="display: block;">
										<span class="label label-danger">Format</span> 
										jpg, jpeg, png, gif
										<span class="btn btn-success btn-sm m-l-50" id="add-more-image">Add Image</span>
									</div>
									<div id="image-group">
										<div class="fileinput fileinput-new" data-provides="fileinput">
											<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
												<img src="<?= base_url('dist/images/noimage.jpg') ?>" alt="">
											</div>
											<div class="fileinput-preview fileinput-exists thumbnail" style="width: 200px; max-height: 150px;"></div>
											<div>
												<span class="btn btn-default btn-file">
													<span class="fileinput-new">Select image</span>
													<span class="fileinput-exists">Change</span>
													<input type="file" name="images[]" accept="images/*">
												</span>
												<a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-4 col-sm-offset-4">
								<div class="form-group m-t-30">
									<button type="submit" class="btn btn-success waves-effect waves-light">
										Update
									</button>
									<a class="btn btn-default waves-effect waves-light m-l-30" href="<?= admin_url('products/lists') ?>">
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