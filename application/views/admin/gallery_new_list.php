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

			<div class="col-sm-12">

				<a href="<?= admin_url('gallery/addnew') ?>" class="btn btn-primary m-b-20">

					<i class="fa fa-plus"></i>&nbsp;

					Add Image

				</a>

			</div>

		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="white-box">
					<h3 class="box-title m-b-0"><?= $title ?></h3>
					<p class="text-muted m-b-30"></p>
					<div class="table-responsive">
						<table class="table table-striped table-responsive datatable1">
							<thead>
								<tr>
									<th>#</th>
									<th> Image</th>
									<th> Title</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach (@$list as $key => $v): ?>
									<tr>
										<td><?= $i ?></td>
										<td>
											<?php if (@$v->images && file_exists('./uploads/home/'.@$v->images)) { ?>
												<img src="<?= base_url('uploads/home/'.@$v->images) ?>" alt="" style="width: auto; max-height: 80px;">
											<?php } else { ?>
												<img src="<?= base_url('uploads/home/'.@$v->images) ?>" alt="" style="width: auto; max-height: 80px;">
											<?php } ?>
										</td>
										<td class="v-a-m"><?= @$v->title ?></td>
										<td class="text-center v-a-m">
											<a href="<?= admin_url('gallery/editnew/'.$v->id) ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit">
												<i class="ti-pencil-alt"></i>
											</a>
											<button class="btn btn-danger" data-toggle="tooltip" title="Delete" onclick="deleteBanner(<?= @$v->id ?>)">
												<i class="ti-trash"></i>
											</button>
										</td>
									</tr>
									<?php $i++; ?>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		function deleteBanner(id) {
			swal({
				title: 'Are You sure want to delete this banner?',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#A5DC86',
				cancelButtonColor: '#DD6B55',
				confirmButtonText: 'Yes',
				cancelButtonText: 'No',
				closeOnConfirm: true,
				closeOnCancel: true
			}, function(isConfirm){
				if (isConfirm) {
					window.location.href = '<?= admin_url('gallery/deletenew/') ?>'+id
				}
			});
		}
	</script>