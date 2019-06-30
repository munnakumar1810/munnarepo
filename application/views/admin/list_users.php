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

		<div class="row m-b-20">
			<div class="col-sm-12">
				<a href="<?= admin_url('question/add_new') ?>" class="btn btn-primary">
					<i class="fa fa-arrow-circle-o-left"></i> Add New
				</a>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<div class="white-box">
					<h3 class="box-title m-b-0"><?= $title ?></h3>
					<p class="text-muted m-b-30"></p>
					<div class="table-responsive">
						<table id="myTable" class="table table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Email</th>
									<th>Phone</th>
									<th>Role</th>
									<th>Country</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach ($list as $key => $v): ?>
									<tr>
										<td><?= $i ?></td>
										<td>
											<?= $v->fname ?> 
											<?= $v->mname ?> 
											<?= $v->lname ?>
										</td>
										<td><?= $v->email ?></td>
										<td><?= $v->phone ?></td>
										<td>
											<span class="label" style="background: <?= (!is_null($v->color) || $v->color != '')? $v->color : '#4c5667'; ?>">
												<?= $v->role ?>
											</span>
										</td>
										<td><?= $v->country ?></td>
										<td>
											<?= form_dropdown('status', unserialize(BASIC_STATUS), $v->status, 'class="change-user-status" data-user-id="'.$v->userid.'"'); ?>
										</td>
										<td class="text-center">
											<a href="<?= admin_url('users/view/').$v->userid ?>" class="btn btn-primary btn-outline" title="View">
												<i class="ti-eye"></i> View
											</a>
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
		$(document).on('change', '.change-user-status', function(event) {
			event.preventDefault();
			var userid = $(this).attr('data-user-id');
			var userstatus = $(this).val().toString();
			$.ajax({
				url: '<?= admin_url('users/changeStatus') ?>',
				type: 'POST',
				dataType: 'json',
				data: {
					userid: userid,
					userstatus: userstatus
				},
			})
			.done(function(data) {
				alert_func(data);
			})
			.fail(function() {
				console.log("error");
			});
			
		});
	</script>