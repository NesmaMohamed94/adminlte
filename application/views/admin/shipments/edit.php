<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datepicker/datepicker3.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="card card-default">
			<div class="card-header">
				<div class="d-inline-block">
					<h3 class="card-title"> <i class="fa fa-plus"></i>
						&nbsp; <?=trans('edit_shipment')?> </h3>
				</div>
				<div class="d-inline-block float-right">
					<a href="<?=base_url('admin/shipments');?>" class="btn btn-success"><i class="fa fa-list"></i>
						<?=trans('shipment_list')?></a>
				</div>
			</div>
			<div class="card-body">

				<!-- For Messages -->
				<?php $this->load->view('admin/includes/_messages.php')?>

				<?php echo form_open(base_url('admin/shipments/edit/' . $shipment['id'])); ?>
				<div class="row">
					<div class="col-md-6">
						<div class="card">
							<div class="card-header with-border">
								<h3 class="card-title"><?=trans('sender')?></h3>
							</div>
							<!-- /.card-header -->
							<!-- form start -->
							<div class="card-body">
								<!-- <div class="form-group">
									<label for="dropoff_contact_name" class="control-label"><?=trans('dropoff_contact_name')?></label>
									<input type="text" name="dropoff_contact_name" class="form-control" id="dropoff_contact_name"
										placeholder="" value="<?=$shipment['dropoff_contact_name']?>" required>
								</div> -->

								<div class="form-group">
									<label for="dropoff_contact_number" class="control-label"><?=trans('dropoff_contact_number')?></label>
									<input type="number" name="dropoff_contact_number" class="form-control" id="dropoff_contact_number"
										placeholder=""  value="<?=$shipment['dropoff_contact_number']?>" required>
								</div>
								<!-- <div class="form-group">
									<label for="dropoff_addr_type" class="col-md-2 control-label"><?=trans('dropoff_addr_type')?></label>
									<div class="col-md-12">
										<select name="dropoff_addr_type" class="form-control">
											<option value=""><?=trans('dropoff_addr_type')?></option>
											<option value="home" <?= ($shipment->dropoff_addr_type == 'home') ? 'selected' : '';?>>
												<?=trans('home')?>
											</option>
											<option value="business" <?= ($shipment->dropoff_addr_type == 'business') ? 'selected' : '';?>>
												<?=trans('business')?></option>
										</select>
									</div>
								</div> -->
								<!-- <div class="form-group">
									<label for="dropoff_email" class="control-label"><?=trans('dropoff_email')?></label>
									<input type="email" name="dropoff_email" class="form-control" id="dropoff_email" placeholder="" value="<?=$shipment['dropoff_email']?>" >
								</div> -->
								<!-- <div class="form-group">
									<label for="dropoff_country" class="control-label"><?=trans('dropoff_country')?></label>
									<input type="text" name="dropoff_country" class="form-control" id="dropoff_country" placeholder="" value="<?=$shipment['dropoff_country']?>"
										required>
								</div> -->

								<div class="form-group">
									<label for="dropoff_city" class="control-label"><?=trans('dropoff_city')?></label>
									<input type="text" name="dropoff_city" class="form-control" id="dropoff_city" placeholder="" required value="<?=$shipment['dropoff_city']?>">
								</div>
								<!-- <div class="form-group">
									<label for="dropoff_dist" class="control-label"><?=trans('dropoff_dist')?></label>
									<input type="text" name="dropoff_dist" class="form-control" id="dropoff_dist" placeholder="" value="<?=$shipment['dropoff_dist']?>" required>
								</div>
								<div class="form-group">
									<label for="dropoff_street" class="control-label"><?=trans('dropoff_street')?></label>
									<input type="text" name="dropoff_street" class="form-control" id="dropoff_street"  value="<?=$shipment['dropoff_street']?>"placeholder=""
										required>
								</div>
								<div class="form-group">
									<label for="dropoff_zipcode" class="control-label"><?=trans('dropoff_zipcode')?></label>
									<input type="text" name="dropoff_zipcode" class="form-control" id="dropoff_zipcode" value="<?=$shipment['dropoff_zipcode']?>" placeholder=""
										required>
								</div>
								<div class="form-group">
									<label for="dropoff_building" class="control-label"><?=trans('dropoff_building')?></label>
									<input type="text" name="dropoff_building" class="form-control" id="dropoff_building" value="<?=$shipment['dropoff_building']?>" placeholder=""
										required>
								</div>
								<div class="form-group">
									<label for="dropoff_extra" class="control-label"><?=trans('dropoff_extra')?></label>
									<input type="text" name="dropoff_extra" class="form-control" id="dropoff_extra" value="<?=$shipment['dropoff_extra']?>" placeholder=""
										required>
								</div> -->


							</div>
							<!-- /.card-body -->
						</div>
					</div>

					<div class="col-md-6">
						<div class="card">
							<div class="card-header with-border">
								<h3 class="card-title"><?=trans('receiver')?></h3>
							</div>
							<!-- /.card-header -->
							<!-- form start -->
							<div class="card-body">
								<!-- <div class="form-group">
									<label for="customer_name" class="control-label"><?=trans('customer_name')?></label>
									<input type="text" name="customer_name" class="form-control" id="customer_name" placeholder="" value="<?=$shipment['customer_name']?>"
										required>
								</div>
								<div class="form-group">
									<label for="customer_contact_name" class="control-label"><?=trans('customer_contact_name')?></label>
									<input type="text" name="customer_contact_name" class="form-control" id="customer_contact_name"
										placeholder=""  value="<?=$shipment['customer_contact_name']?>" required>
								</div> -->

								<div class="form-group">
									<label for="customer_contact_number"
										class="control-label"><?=trans('customer_contact_number')?></label>
									<input type="number" name="customer_contact_number" class="form-control" id="customer_contact_number"
										placeholder="" value="<?=$shipment['contact_number']?>" required>
								</div>
								<!-- <div class="form-group">
									<label for="customer_addr_type"
										class="col-md-2 control-label"><?=trans('customer_addr_type')?></label>

									<div class="col-md-12">
										<select name="customer_addr_type" class="form-control">
											<option value=""><?=trans('customer_addr_type')?></option>
											<option value="home" <?= ($shipment->customer_addr_type == 'home') ? 'selected' : '';?>>
												<?=trans('home')?>
											</option>
											<option value="business" <?= ($shipment->customer_addr_type == 'business') ? 'selected' : '';?>>
												<?=trans('business')?></option>
										</select>
									</div>
								</div> -->
								<!-- <div class="form-group">
									<label for="delivery_address" class="control-label"><?=trans('delivery_address')?></label>
									<input type="text" name="delivery_address"  class="form-control" id="delivery_address" value="<?=$shipment['delivery_address']?>"  placeholder="">
								</div>
								<div class="form-group">
									<label for="customer_email" class="control-label"><?=trans('customer_email')?></label>
									<input type="email" name="customer_email" class="form-control" id="customer_email" value="<?=$shipment['customer_email']?>" placeholder="">
								</div>
								<div class="form-group">
									<label for="customer_country" class="control-label"><?=trans('customer_country')?></label>
									<input type="text" name="customer_country" class="form-control" id="customer_country" value="<?=$shipment['customer_country']?>"placeholder=""
										required>
								</div> -->

								<div class="form-group">
									<label for="customer_city" class="control-label"><?=trans('customer_city')?></label>
									<input type="text" name="customer_city" class="form-control" id="customer_city" value="<?=$shipment['customer_city']?>" placeholder=""
										required>
								</div>
								<!-- <div class="form-group">
									<label for="customer_dist" class="control-label"><?=trans('customer_dist')?></label>
									<input type="text" name="customer_dist" class="form-control" id="customer_dist" value="<?=$shipment['customer_dist']?>" placeholder=""
										required>
								</div>
								<div class="form-group">
									<label for="customer_street" class="control-label"><?=trans('customer_street')?></label>
									<input type="text" name="customer_street" class="form-control" id="customer_street" value="<?=$shipment['customer_street']?>" placeholder=""
										required>
								</div>
								<div class="form-group">
									<label for="customer_zipcode" class="control-label"><?=trans('customer_zipcode')?></label>
									<input type="text" name="customer_zipcode" class="form-control" id="customer_zipcode"  value="<?=$shipment['customer_zipcode']?>" placeholder=""
										required>
								</div>
								<div class="form-group">
									<label for="customer_building" class="control-label"><?=trans('customer_building')?></label>
									<input type="text" name="customer_building" class="form-control" id="customer_building" value="<?=$shipment['customer_building']?>" placeholder=""
										required>
								</div>
								<div class="form-group">
									<label for="customer_extra" class="control-label"><?=trans('customer_extra')?></label>
									<input type="text" name="customer_extra" class="form-control" id="customer_extra" value="<?=$shipment['customer_building']?>" placeholder=""
										required>
								</div> -->


							</div>
							<!-- /.card-body -->
						</div>
					</div>

					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="col-md-12">
									<div class="form-group">
										<label for="cod" class="control-label"><?=trans('cod')?></label>
										<input type="number" name="cod" class="form-control" id="cod" value="<?=$shipment['cod']?>" placeholder="" required>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="branch" class="col-md-2 control-label"><?=trans('branch')?></label>
										<div class="col-md-12">
											<select name="branch_id" class="form-control">
												<option value=""><?=trans('branch')?></option>
												<?php foreach($branches as $branch):?>
												<option value="<?= $branch['id']; ?>"
													<?= ($shipment['branch_id'] == $branch['id']) ? 'selected' : '';?>><?=$branch['branch_name'];?></option>
												<?php endforeach;?>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<input type="submit" name="submit" value="Save Invoice" class="btn btn-primary pull-right">
							</div>
						</div>
					</div>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</section>



	<!-- bootstrap datepicker -->
	<script src="<?=base_url()?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
	<script>
		$('.datepicker').datepicker({
			autoclose: true
		});

	</script>

	<script type="text/javascript">
		$(function () {

			//---------------------------------------------------------------
			$('#customer').change(function (e) {
				var id = $('#customer').val();
				var post_data = {
					'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
				};
				$.ajax({
					type: 'POST',
					url: '<?=base_url("admin/invoices/customer_detail/");?>' + id,
					data: post_data,
					success: function (response) {
						var data = JSON.parse(response);
						console.log(data.id);
						$('#firstname').val(data.firstname);
						$('#address').val(data.address);
						$('#email').val(data.email);
						$('#mobile_no').val(data.mobile_no);
					}
				});

			});

			//---------------------------------------------------------------
			$(document).on("click change paste keyup", ".calcEvent", function () {
				calculate_total();
			});

			var max_field = 10;
			var add_button = $('.add_button');
			var wrapper = $('.field_wrapper');
			var html_fields =
				'<tr class="item"><td> <a href="javascript:void(0);" class="remove_button btn btn-sm btn-danger" title="Remove field"><i class="fa fa-minus"></i></a> </td> <td> <div class="form-group"> <input type="text" name="product_description[]" class="form-control calcEvent" id="product_description" placeholder="Description" required> </div> </td> <td> <div class="form-group"> <input type="text" name="quantity[]" value="1" class="form-control calcEvent quantity" id="quantity" placeholder="" required> </div> </td> <td> <div class="form-group"> <input type="text" name="price[]" class="form-control calcEvent price" id="price" placeholder="" required> </div> </td> <td> <div class="form-group"> <input type="text" name="tax[]" class="form-control calcEvent tax" id="tax" placeholder="" required> </div> </td> <td> <input type="hidden" name="total[]" class="form-control calcEvent item_total" placeholder="" required><strong class="item_total">0.00</strong> </td> </tr>';

			var x = 1; //

			$(add_button).click(function () {
				if (x < max_field) {
					x++;
					$(wrapper).append(html_fields);
				}

			});

			$(wrapper).on('click', '.remove_button', function (e) {
				e.preventDefault();
				$(this).closest('tr').remove(); //Remove field html
				x--; //Decrement field counter
			});

		});


		//---------------------------------------------------------------
		function calculate_total() {

			var sub_total = 0;
			var total = 0;
			var amountDue = 0;
			var total_tax = 0;

			$('tr.item').each(function () {
				var quantity = parseFloat($(this).find(".quantity").val());
				var price = parseFloat($(this).find(".price").val());
				var item_tax = $(this).find(".tax").val();

				var item_total = parseFloat(quantity * price) > 0 ? parseFloat(quantity * price) : 0;
				sub_total += parseFloat(price * quantity) > 0 ? parseFloat(price * quantity) : 0;
				total_tax += parseFloat(price * quantity * item_tax / 100) > 0 ? parseFloat(price * quantity * item_tax /
					100) : 0;

				$(this).find('.item_total').text(item_total.toFixed(2));
				$(this).find('.item_total').val(item_total.toFixed(2));
			});

			var discount = parseFloat($("[name='discount']").val()) > 0 ? parseFloat($("[name='discount']").val()) : 0;
			total += parseFloat(sub_total + total_tax - discount);

			$('.sub_total').text(sub_total.toFixed(2));
			$('.sub_total').val(sub_total.toFixed(2)); // for hidden field

			$('.total_tax').text(total_tax.toFixed(2));
			$('.total_tax').val(total_tax.toFixed(2)); // for hidden field

			$('#grand_total').text(total.toFixed(2));
			$('.grand_total').val(total.toFixed(2)); // for hidden field

		}

	</script>

	<script>
		$('#invoices').addClass('active');

	</script>
