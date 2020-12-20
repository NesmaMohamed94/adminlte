  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Main content -->
  	<section class="content">
  		<div class="card card-default color-palette-bo">
  			<div class="card-header">
  				<div class="d-inline-block">
  					<h3 class="card-title"> <i class="fa fa-pencil"></i>
  						<?=trans('edit_driver')?> </h3>
  				</div>
  				<div class="d-inline-block float-right">
  					<a href="<?=base_url('admin/drivers');?>" class="btn btn-success"><i class="fa fa-list"></i>
  						<?=trans('driver_list')?></a>
  				</div>
  			</div>
  			<div class="card-body">
  				<!-- For Messages -->
  				<?php $this->load->view('admin/includes/_messages.php')?>

  				<?php echo form_open(base_url('admin/drivers/edit/' . $driver['driver_id']), 'class="form-horizontal"') ?>
  				<div class="form-group">
  					<label for="first_name" class="col-md-12 control-label"><?=trans('first_name')?></label>

  					<div class="col-md-12">
  						<input type="text" name="first_name" class="form-control" id="first_name" placeholder=""
  							value="<?=$driver['first_name']?>">
  					</div>
  				</div>
  				<div class="form-group">
  					<label for="last_name" class="col-md-12 control-label"><?=trans('last_name')?></label>

  					<div class="col-md-12">
  						<input type="text" name="last_name" class="form-control" id="last_name" placeholder=""
  							value="<?=$driver['last_name']?>">
  					</div>
  				</div>
  				<div class="form-group">
  					<label for="email" class="col-md-12 control-label"><?=trans('email')?></label>

  					<div class="col-md-12">
  						<input type="email" name="email" class="form-control" id="email" placeholder=""
  							value="<?=$driver['email']?>">
  					</div>
  				</div>
  				<div class="form-group">
  					<label for="phone" class="col-md-12 control-label"><?=trans('phone')?></label>

  					<div class="col-md-12">
  						<input type="number" name="phone" class="form-control" id="phone" placeholder=""
  							value="<?=$driver['phone']?>">
  					</div>
  				</div>
  				<div class="form-group">
  					<label for="driver" class="col-md-4 control-label"><?=trans('teams')?></label>
  					<div class="col-md-12">
  						<select name="team_id" class="form-control">
  							<option value=""><?=trans('driver')?></option>
  							<?php foreach($teams as $team):?>
  							<option <?= ($driver['team_id'] == $team['team_id']) ? "selected" : ""?>
  								value="<?= $team['team_id']; ?>"><?=$team['team_name'];?>
  							</option>
  							<?php endforeach;?>
  						</select>
  					</div>
  				</div>
  				<div class="form-group">
  					<label for="licence_plate" class="col-md-12 control-label"><?=trans('licence_plate')?></label>

  					<div class="col-md-12">
  						<input type="text" name="licence_plate" class="form-control" id="licence_plate" placeholder=""
  							value="<?=$driver['licence_plate']?>">
  					</div>
  				</div>
  				<div class="form-group">
  					<label for="username" class="col-md-12 control-label"><?=trans('username')?></label>

  					<div class="col-md-12">
  						<input type="text" name="username" class="form-control" id="username" placeholder=""
  							value="<?=$driver['username']?>">
  					</div>
  				</div>
  				<div class="form-group">
  					<label for="password" class="col-md-12 control-label"><?=trans('password')?></label>

  					<div class="col-md-12">
  						<input type="password" name="password" class="form-control" id="password" placeholder=""
  							value="<?=$driver['password']?>">
  					</div>
  				</div>
  				<div class="form-group">
  					<div class="col-md-12">
  						<input type="submit" name="submit" value="Update Driver" class="btn btn-primary pull-right">
  					</div>
  				</div>
  				<?php echo form_close(); ?>
  			</div>
  			<!-- /.box-body -->
  		</div>
  	</section>
  </div>
