  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Main content -->
  	<section class="content">
  		<div class="card card-default color-palette-bo">
  			<div class="card-header">
  				<div class="d-inline-block">
  					<h3 class="card-title"> <i class="fa fa-plus"></i>
  						<?= trans('add_new_branch') ?> </h3>
  				</div>
  				<div class="d-inline-block float-right">
  					<a href="<?= base_url('admin/branches'); ?>" class="btn btn-success"><i class="fa fa-list"></i>
  						<?= trans('branch_list') ?></a>
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
  								<?php echo form_open(base_url('admin/branches/add'), 'class="form-horizontal"');  ?>
  								<div class="form-group">
  									<label for="branch_no"
  										class="col-md-12 control-label"><?= trans('branch_no') ?></label>

  									<div class="col-md-12">
  										<input type="text" name="branch_no" class="form-control" id="branch_no"
  											placeholder="">
  									</div>
  								</div>
  								<div class="form-group">
  									<label for="branch_name"
  										class="col-md-12 control-label"><?= trans('branch_name') ?></label>

  									<div class="col-md-12">
  										<input type="text" name="branch_name" class="form-control" id="branch_name"
  											placeholder="">
  									</div>
  								</div>
  								<div class="form-group">
  									<div class="col-md-12">
  										<input type="submit" name="submit" value="<?= trans('add_branch') ?>"
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
