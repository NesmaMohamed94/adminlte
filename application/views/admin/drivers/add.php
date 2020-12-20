  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Main content -->
  	<section class="content">
  		<div class="card card-default color-palette-bo">
  			<div class="card-header">
  				<div class="d-inline-block">
  					<h3 class="card-title"> <i class="fa fa-plus"></i>
  						<?=trans('add_new_driver')?> </h3>
  				</div>
  				<div class="d-inline-block float-right">
  					<a href="<?=base_url('admin/drivers');?>" class="btn btn-success"><i class="fa fa-list"></i>
  						<?=trans('driver_list')?></a>
  				</div>
  			</div>
  			<div class="card-body">
  				<div class="row">
  					<div class="col-md-12">
  						<div class="box">
  							<!-- form start -->
  							<div class="box-body">

  								<!-- For Messages -->
  								<?php $this->load->view('admin/includes/_messages.php')?>

  								<?php echo form_open(base_url('admin/drivers/add'), 'class="form-horizontal"'); ?>
  								<div class="form-group">
  									<label for="first_name"
  										class="col-md-12 control-label"><?=trans('first_name')?></label>

  									<div class="col-md-12">
  										<input type="text" name="first_name" class="form-control" id="first_name"
  											placeholder="">
  									</div>
  								</div>
  								<div class="form-group">
  									<label for="last_name"
  										class="col-md-12 control-label"><?=trans('last_name')?></label>

  									<div class="col-md-12">
  										<input type="text" name="last_name" class="form-control" id="last_name"
  											placeholder="">
  									</div>
  								</div>
  								<div class="form-group">
  									<label for="email" class="col-md-12 control-label"><?=trans('email')?></label>

  									<div class="col-md-12">
  										<input type="email" name="email" class="form-control" id="email"
  											placeholder="">
  									</div>
  								</div>
  								<div class="form-group">
  									<label for="phone" class="col-md-12 control-label"><?=trans('mobile_no')?></label>

  									<div class="col-md-12">
  										<input type="number" name="phone" class="form-control" id="phone"
  											placeholder="">
  									</div>
  								</div>
  								<div class="form-group">
  									<label for="vendor" class="col-md-4 control-label"><?=trans('teams')?></label>
  									<div class="col-md-12">
  										<select name="team_id" class="form-control">
  											<option value=""><?=trans('teams')?></option>
  											<?php foreach($teams as $team):?>
  											<option value="<?= $team['team_id']; ?>"><?=$team['team_name'];?>
  											</option>
  											<?php endforeach;?>
  										</select>
  									</div>
  								</div>
  								<div class="form-group">
  									<label for="licence_plate"
  										class="col-md-12 control-label"><?=trans('licence_plate')?></label>

  									<div class="col-md-12">
  										<input type="text" name="licence_plate" class="form-control" id="licence_plate"
  											placeholder="">
  									</div>
  								</div>
  								<div class="form-group">
  									<label for="username"
  										class="col-md-12 control-label"><?=trans('username')?></label>

  									<div class="col-md-12">
  										<input type="text" name="username" class="form-control" id="username"
  											placeholder="">
  									</div>
  								</div>
  								<div class="form-group">
  									<label for="password"
  										class="col-md-12 control-label"><?=trans('password')?></label>

  									<div class="col-md-12">
  										<input type="password" name="password" class="form-control" id="password"
  											placeholder="">
  									</div>
  								</div>

  								<div class="form-group">
  									<div class="col-md-12">
  										<input type="submit" name="submit" value="<?=trans('add_driver')?>"
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
