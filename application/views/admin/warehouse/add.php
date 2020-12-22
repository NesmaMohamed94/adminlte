  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Main content -->
  	<section class="content">
  		<div class="card card-default color-palette-bo">
  			<div class="card-header">
  				<div class="d-inline-block">
  					<h3 class="card-title"> <i class="fa fa-plus"></i>
  						<?= trans('add_new_warehouse') ?> </h3>
  				</div>
  				<div class="d-inline-block float-right">
  					<a href="<?= base_url('admin/warehouses'); ?>" class="btn btn-success"><i class="fa fa-list"></i>
  						<?= trans('warehouse_list') ?></a>
  				</div>
  			</div>
  			<div class="card-body">
  				<div class="row">
  					<div class="col-md-12">
  						<div class="box">
  							<!-- form start -->
  							<div class="box-body">

  								<!-- For Messages -->
  								<?php $this->load->view('admin/includes/_messages.php') ?>
  								<?php echo form_open(base_url('admin/warehouses/add'), 'class="form-horizontal"');  ?>
  								<div class="form-group">
  									<label for="warehouse_name"
  										class="col-md-12 control-label"><?= trans('warehouse_name') ?></label>

  									<div class="col-md-12">
  										<input type="text" name="warehouse_name" class="form-control" id="warehouse_name"
  											placeholder="">
  									</div>
  								</div>
  								<div class="form-group">
  									<label for="warehouse_location"
  										class="col-md-12 control-label"><?= trans('warehouse_location') ?></label>

  									<div class="col-md-12">
  										<input type="text" name="warehouse_location" class="form-control" id="warehouse_location"
  											placeholder="">
  									</div>
  								</div>
  								<div class="form-group">
  									<div class="col-md-12">
  										<input type="submit" name="submit" value="<?= trans('add_warehouse') ?>"
  											class="btn btn-primary pull-right">
  									</div>
  								</div>
  								<?php echo form_close(); ?>
  							</div>
  							<!-- /.box-body -->
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</section>
  </div>
