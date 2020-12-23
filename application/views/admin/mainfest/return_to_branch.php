<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datepicker/datepicker3.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="card card-default">
			<div class="card-header">
				<div class="d-inline-block">
					<h3 class="card-title"> <i class="fa fa-plus"></i>
						&nbsp; <?= trans('add_new_mainfest') ?> </h3>
				</div>
				<div class="d-inline-block float-right">
					<a href="<?= base_url('admin/mainfest'); ?>" class="btn btn-success"><i class="fa fa-list"></i>
						<?= trans('mainfest_list') ?></a>
				</div>
			</div>
			<div class="card-body">

				<!-- For Messages -->
				<?php $this->load->view('admin/includes/_messages.php') ?>

				<?php echo form_open( base_url('admin/mainfest/return_branch')); ?>
				<div class="row">
					<div class="col-md-6">
						<div class="card">
							<div class="card-header with-border">
								<h3 class="card-title"><?= trans('mainfest_header') ?></h3>
							</div>
							<!-- /.card-header -->
							<!-- form start -->
							<div class="card-body">
								<div class="form-group">
									<label for="warehouse_no" class="control-label"><?= trans('warehouse_name') ?></label>
									<select class="form-control" name="warehouse_no" id="warehouse_name" required="">
										<option value="">Please Select Warehouse</option>
										<?php foreach ($warehouses as $warehouse): ?>
										<option value="<?= $warehouse['warehouse_no'] ?>">
											<?= $warehouse['warehouse_name'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>

								<div class="form-group">
									<label for="type" class="control-label"><?= trans('type') ?></label>
									<input type="text" name="type" class="form-control" id="type" value="out"
										placeholder="" readOnly>
								</div>
								<div class="form-group">
									<label for="to_from" class="control-label"><?= trans('to_from') ?></label>
									<input type="text" name="to_from" class="form-control" id="to_from" value="branch"
										placeholder="" readOnly>
								</div>
								<div class="form-group">
									<label for="to_from_id" class="control-label"><?= trans('to_from_id') ?></label>
									<select class="form-control" name="to_from_id" id="to_from_id" required="">
										<option value="">Please Select Branch</option>
										<?php foreach ($branches as $branch): ?>
										<option value="<?= $branch['id'] ?>">
											<?= $branch['branch_name'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="form-group">
									<label for="note" class="control-label"><?= trans('note') ?></label>
									<input type="text" name="note" class="form-control" id="note" value=""
										placeholder="" >
								</div>
							</div>
							<!-- /.card-body -->
						</div>
					</div>
					<div class="col-md-12">
						<div class="card">
						<div> 
						<div class="input-group mb-3">
							  <div class="input-group-prepend">
    							<span class="input-group-text">Scan</span>
  							  </div>
  							<input type="text" id="scan" class="form-control" placeholder="#awb">
						</div>
						</div>
							<div class="card-body">							    
								<table class="table">
									<thead>
										<tr>
											<th><?= trans('action') ?></th>
											<th width="40%"><?= trans('shipment_no') ?></th>
										</tr>
									</thead>
									<tbody class="field_wrapper">
										
									</tbody>
								</table>
							</div>
							<!-- /.card-body -->
						</div>
					</div>
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<input type="submit" name="submit" value="Save Mainfest"
									class="btn btn-primary pull-right">
							</div>
						</div>
					</div>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</section>



	<!-- bootstrap datepicker -->
	<script src="<?= base_url() ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
	<script>
	$( document ).ready(function() 
	{
        $(window).keydown(function (event) {
				if (event.keyCode == 13) {
					event.preventDefault();
					return false;
				}
			});
		$('.datepicker').datepicker({
			autoclose: true
		});

      //---------------------------------------------------------------
      //$(document).on("click change paste keyup", ".calcEvent", function() {
      //  calculate_total();
	  //console.log("Hello world!"); 
      //});

      var max_field = 10;
      var add_button = $('.add_button');
      var wrapper = $('.field_wrapper');
      var html_fields = '<tr class="item"><td> <a href="javascript:void(0);" class="remove_button btn btn-sm btn-danger" title="Remove field"><i class="fa fa-minus"></i></a> </td> <td> <div class="form-group"> <input type="text" name="product_description[]" class="form-control calcEvent" id="product_description" placeholder="AWB#" required> </div> </td> <td> <div class="form-group"> </td> </tr>';

      var x = 1; // 

      $(add_button).click(function(){
        if(x < max_field){
          x++;
          $(wrapper).append(html_fields);
        }

      });

      $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).closest('tr').remove(); //Remove field html
        x--; //Decrement field counter
      });

	$("#scan").keyup(function(e)
	{ 
    var code = e.which; 
	console.log(code); 
    if(code==13)
     {
      e.preventDefault();
      var scan       = $(this).val();
	  var html_fields = '<tr class="item"><td> <a href="javascript:void(0);" class="remove_button btn btn-sm btn-danger" title="Remove field"><i class="fa fa-minus"></i></a> </td> <td> <div class="form-group"> <input type="text" name="product_description[]" value="'+scan+'" class="form-control" id="product_description" placeholder="AWB#" readonly> </div> </td> <td> <div class="form-group"> </td> </tr>';
	  $(wrapper).append(html_fields);
      $(this).val('');
	  //alert(scan)      
     }
	});

	// $("form").on('submit',function(e){
    // e.preventDefault();
    //ajax code here
// });

	});
	</script>
