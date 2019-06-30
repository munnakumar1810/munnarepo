<div class="clearfix"></div>
<div class="innerpage-ban">
	<div class="container">
		<div class="title-breadcrumb"> How can we help you </div>
		<ul class="breadcrumb-cate">
			<li><a href="#"><i class="fa fa-home"></i></a></li>
			<li><a href="#">Contact us</a></li>
		</ul>
	</div>
</div>
<section class="inner-content bg-grey">

	<div class="container">

		<div class="">

			<div class="contact-form-panel">

				<div class="row">

					<div class="col-md-6">

						<div class="map">

							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6292.772373604548!2d145.19876787649673!3d-37.94476783031717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad646b5d2ba4df7%3A0x4045675218ccd90!2sMelbourne+VIC%2C+Australia!5e0!3m2!1sen!2sin!4v1535190813940" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen>

							</iframe>

						</div>

					</div>

					<div class="col-md-6">
						<h2>Please fill out the form below</h2>

						<?php if($this->session->flashdata('success_msg')!=''){ ?>
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">&#10006;</button>
								<strong>
									<?php echo @$this->session->flashdata('success_msg');?>
								</strong>
							</div>
						<?php } ?>
						<?php if($this->session->flashdata('error')!=''){ ?>
							<div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert">&#10006;</button>
								<strong>
									<?php echo @$this->session->flashdata('error');?>
								</strong>
							</div>
						<?php } ?>

						<form action="<?=base_url('contact/add')?>" method="post">

							<div class="row">

								<div class="col-md-12">

									<div class="form-group">

										<input type="text" name="name" value="<?=set_value('name') ?>" class="form-control" placeholder="Enter Your Name">
										<span class="error"><?php echo form_error('name'); ?></span>

									</div>

								</div>



								<div class="col-md-6">

									<div class="form-group">

										<input type="email" name="email"  value="<?=set_value('email')?>" class="form-control" placeholder="Email Address">
										<span class="error"><?php echo form_error('email'); ?></span>

									</div>

								</div>

								<div class="col-md-6">

									<div class="form-group">

										<input type="tel" class="form-control" name="phone" value="<?=set_value('phone')?>" placeholder="Phone Number">
										<span class="error"><?php echo form_error('phone'); ?></span>

									</div>

								</div>

								<div class="col-md-12">

									<div class="form-group">

										<textarea class="form-control" rows="6" cols="5" name="message" placeholder="Message">
											<?=set_value('message')?>
										</textarea>
										<span class="error"><?php echo form_error('message'); ?></span>

									</div>	

								</div>

								<div class="col-md-12">

									<div class="form-group pull-right">

										<input type="submit" class="btn" value="send">

									</div>

								</div>

							</div>

						</form>

					</div>

				</div>

			</div>

			<div class="contact-info">

				<div class="row">

					<div class="col-md-4 col-sm-4">

						<div class="contact-box con-add">

							<h2>Address</h2>

							<p>Street 1, Melbourne, Australia</p>

						</div>

					</div>

					<div class="col-md-4 col-sm-4">					

						<div class="contact-box con-tel">

							<h2>Call Us</h2>

							<p>+123 4848 848</p>

						</div>

					</div>

					<div class="col-md-4 col-sm-4">

						<div class="contact-box con-mail">

							<h2> Mail Us</h2>

							<p>info@pepted.com</p>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

</section>