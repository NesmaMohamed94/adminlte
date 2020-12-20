<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<section class="content">
		<!-- For Messages -->
		<?php $this->load->view('admin/includes/_messages.php') ?>
		<div class="card">
			<div class="card-body">
				<div class="d-inline-block">
					<h3 class="card-title">
						<i class="fa fa-list"></i>
						<?= trans('driver_list') ?>
					</h3>
				</div>
			</div>
		</div>
	</section>


	<!-- Main content -->
	<section class="content mt10">
		<div class="card">
			<div class="card-body">
				<!-- Load Admin list (json request)-->
				<div class="data_container"></div>
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>



<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script>
	$(function () {
		$("#example1").DataTable();
	});

</script>

<script>
	//------------------------------------------------------------------
	function load_records() {
		$('.data_container').html('<div class="text-center"><img src="<?=base_url('assets/dist/img')?>/loading.png"/></div>');
		$('.data_container').load('<?=base_url('admin/drivers/list_data')?>');
	}
	load_records();
	//---------------------------------------------------------------------
	$("body").on("change", ".tgl_checkbox", function () {
		$.post('<?=base_url("admin/drivers/change_status")?>', {
				'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
				id: $(this).data('id'),
				status: $(this).is(':checked') == true ? 'active' : 'suspended'
			},
			function (data) {
				$.notify("Status Changed Successfully", "success");
			});
	});

</script>
