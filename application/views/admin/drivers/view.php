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
  				<div class="form-group">
  					<label for="username" class="col-md-2 control-label"><?=trans('username')?></label>

  					<div class="col-md-12">
  						<input type="text" name="username" value="<?=$driver['username'];?>" class="form-control"
  							id="username" placeholder="" readOnly>
  					</div>
  				</div>
  				<div class="form-group">
  					<label for="first_name" class="col-md-2 control-label"><?=trans('first_name')?></label>

  					<div class="col-md-12">
  						<input type="text" name="first_name" value="<?=$driver['first_name'];?>" class="form-control"
  							id="first_name" placeholder="" readOnly>
  					</div>
  				</div>
  				<div class="form-group">
  					<label for="last_name" class="col-md-12 control-label"><?=trans('last_name')?></label>

  					<div class="col-md-12">
  						<input type="text" name="last_name" class="form-control" id="last_name"
  							value="<?=$driver['last_name'];?>" placeholder="" readOnly>
  					</div>
  				</div>
  				<div class="form-group">
  					<label for="team" class="col-md-12 control-label"><?=trans('team')?></label>

  					<div class="col-md-12">
  						<input type="text" name="team" class="form-control" id="team"
  							value="<?=$driver['team_name'];?>" placeholder="" readOnly>
  					</div>
  				</div>
  				<div class="form-group">
  					<label for="licence_plate" class="col-md-12 control-label"><?=trans('licence_plate')?></label>

  					<div class="col-md-12">
  						<input type="text" name="licence_plate" class="form-control" id="licence_plate"
  							value="<?=$driver['licence_plate'];?>" placeholder="" readOnly>
  					</div>
  				</div>
  				<div class="form-group">
  					<label for="email" class="col-md-2 control-label"><?=trans('email')?></label>

  					<div class="col-md-12">
  						<input type="email" name="email_address" value="<?=$driver['email'];?>"
  							class="form-control" id="email" placeholder="" readOnly>
  					</div>
  				</div>
  				<div class="form-group">
  					<label for="mobile_no" class="col-md-2 control-label"><?=trans('mobile_no')?></label>

  					<div class="col-md-12">
  						<input type="number" name="mobile_number" value="<?=$driver['phone'];?>" class="form-control"
  							id="mobile_no" placeholder="" readOnly>
  					</div>
  				</div>
  				<div class="form-group">
  					<label for="status" class="col-md-2 control-label"><?=trans('status')?></label>

  					<div class="col-md-12">
  						<input type="text" name="status" value="<?=$driver['status'];?>" class="form-control"
  							id="status" placeholder="" readOnly>
  					</div>
  				</div>
  			</div>
  			<!-- /.box-body -->
  		</div>
  	</section>
  </div>
