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

				<div class="white-box">

					<h3 class="box-title m-b-0"><?= $title ?></h3>

					<p class="text-muted m-b-30"></p>

					<div class="table-responsive">

						<table class="table table-striped table-responsive datatable1">

							<thead>

								<tr>

									<th>#</th>

									<th>Order No.</th>

									<th>Name</th>

									<th>Eshop</th>

									<th>Total Amount</th>

									<th>Order Date/Time</th>

									<th>Status</th>

									<th class="text-center">Action</th>

								</tr>

							</thead>

							<tbody>

								<?php $i = 1; ?>

								<?php foreach ($list as $key => $v): ?>

									<tr>

										<td><?= $i ?></td>

										<td><?= @$v->orderNo ?></td>

										<td><?= @$v->firstName ?> <?= @$v->lastName ?></td>

										<td><?= @$v->eshopName ?> (<?= @$v->eshopId ?>)</td>

										<td><?= @$v->totalAmount ?></td>

										<td><?= date('d-m-Y \a\t h:i a', strtotime(@$v->created)) ?></td>

										<td>

											<label class="switch">

												<input type="checkbox" value="<?= @$v->status ?>" <?= (@$v->status == 1)? 'checked="checked"' : ''; ?> onchange="changeSellerStatus(<?= @$v->userId ?>, $(this))">

												<span class="slider round"></span>

											</label>

										</td>

										<td class="text-center">

											<a href="#" class="btn btn-primary" data-toggle="tooltip" title="Edit">

												<i class="ti-pencil-alt"></i>

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