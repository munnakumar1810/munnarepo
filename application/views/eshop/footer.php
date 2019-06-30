			<footer class="footer text-center"> <?= date('Y'); ?> &copy; <?= SITENAME ?> </footer>
		</div>
	</div>
	<input type="hidden" id="baseUrl" value="<?= base_url() ?>">
	<input type="hidden" id="adminUrl" value="<?= admin_url() ?>">
	<input type="hidden" id="eshopUrl" value="<?= seller_url() ?>">


	<!-- Bootstrap Core JavaScript -->
	<script src="<?= base_url('dist/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('dist/js/jquery.slimscroll.js') ?>"></script>
	<script src="<?= base_url('dist/js/waves.js') ?>"></script>
	<script src="<?= base_url('dist/js/dataTables.buttons.min.js') ?>"></script>
	<script src="<?= base_url('plugins/custom-select/custom-select.min.js') ?>"></script>
	<script src="<?= base_url('plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') ?>"></script>
	<script src="<?= base_url('plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') ?>"></script>
	<script src="<?= base_url('plugins/intlInputPhone/intlInputPhone.min.js') ?>"></script>
	<script src="<?= base_url('plugins/intlInputPhone/intlInputPhone.js') ?>"></script>
	<script src="<?= base_url('plugins/summernote/dist/summernote.min.js') ?>"></script>
	<script src="<?= base_url('plugins/switchery/dist/') ?>switchery.min.js"></script>
	<script src="<?= base_url('plugins/sweetalert/sweetalert.min.js') ?>"></script>
	<script src="<?= base_url('plugins/sweetalert/jquery.sweet-alert.custom.js') ?>"></script>
	<script src="<?= base_url('plugins/sidebar-nav/dist/sidebar-nav.min.js') ?>"></script>
	<script src="<?= base_url('plugins/waypoints/lib/jquery.waypoints.js') ?>"></script>
	<script src="<?= base_url('plugins/counterup/jquery.counterup.min.js') ?>"></script>
	<script src="<?= base_url('plugins/datatables/jquery.dataTables.min.js') ?>"></script>
	<script src="<?= base_url('plugins/toast-master/js/jquery.toast.js') ?>"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
	<script src="<?= base_url('plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') ?>"></script>
	<script src="<?= base_url('plugins/jquery-asColorPicker-master/libs/jquery-asColor.js') ?>"></script>
	<script src="<?= base_url('plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js') ?>"></script>
	<script src="<?= base_url('plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js') ?>"></script>
	<script src="<?= base_url('plugins/jasny-bootstrap/jasny-bootstrap.min.js') ?>"></script>

	<!-- Custom Theme JavaScript -->
	<script src="<?= base_url('dist/js/custom.js') ?>"></script>
	<script src="<?= base_url('dist/js/script.js?v=').time() ?>"></script>
	<script src="<?= base_url('dist/js/dashboard1.js') ?>"></script>
	<script src="<?= base_url('dist/js/custom-ajax.js?v=').time() ?>"></script>

	<!-- Google Map Autocomplete -->
	<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyCnpy9pw8rP7BPlD-5IR7zekxtq5bOw4R4&libraries=places&callback=initAutocomplete" async defer></script>
	<script type="text/javascript" src="<?= base_url('dist/js/custom-map.js') ?>"></script>

	<?php if (!empty($this->session->flashdata('msg'))): ?>
		<?php if ($this->session->flashdata('msg') == 'error') { ?>
			<script>
				alert_func(["Some error occured, Please try again!", "error", "#DD6B55"]);	
			</script>
		<?php } else { ?>
			<script>
				alert_func(<?= $this->session->flashdata('msg') ?>);
			</script>
		<?php } ?>
	<?php endif ?>

</body>
</html>