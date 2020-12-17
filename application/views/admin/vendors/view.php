  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Main content -->
  	<section class="content">
  		<div class="card card-default color-palette-bo">
  			<div class="card-header">
  				<div class="d-inline-block">
  					<h3 class="card-title"> <i class="fa fa-pencil"></i>
  						<?=trans('edit_vendor')?> </h3>
  				</div>
  				<div class="d-inline-block float-right">
  					<a href="<?=base_url('admin/vendors');?>" class="btn btn-success"><i class="fa fa-list"></i>
  						<?=trans('vendor_list')?></a>
  				</div>
  			</div>
  			<div class="card-body">
  				<div class="form-group">
  					<label for="username" class="col-md-2 control-label"><?=trans('username')?></label>

  					<div class="col-md-12">
  						<input type="text" name="username" value="<?=$vendor['user_name'];?>" class="form-control"
  							id="username" placeholder="" readOnly>
  					</div>
  				</div>
  				<div class="form-group">
  					<label for="apikey" class="col-md-2 control-label"><?=trans('apikey')?></label>

  					<div class="col-md-12">
  						<input type="text" name="apikey" value="<?=$vendor['apikey'];?>" class="form-control"
  							id="apikey" placeholder="" readOnly>
  					</div>
  				</div>
  				<div class="form-group">
  					<label for="contact_name" class="col-md-12 control-label"><?=trans('contact_name')?></label>

  					<div class="col-md-12">
  						<input type="text" name="contact_name" class="form-control" id="contact_name"
  							value="<?=$vendor['contact_name'];?>" placeholder="" readOnly>
  					</div>
  				</div>
  				<div class="form-group">
  					<label for="other_contact" class="col-md-12 control-label"><?=trans('other_contact')?></label>

  					<div class="col-md-12">
  						<input type="text" name="other_contact" class="form-control" id="other_contact"
  							value="<?=$vendor['other_contact'];?>" placeholder="" readOnly>
  					</div>
  				</div>
  				<div class="form-group">
  					<label for="company_name" class="col-md-12 control-label"><?=trans('company_name')?></label>

  					<div class="col-md-12">
  						<input type="text" name="company_name" class="form-control" id="company_name"
  							value="<?=$vendor['company_name'];?>" placeholder="" readOnly>
  					</div>
  				</div>
  				<div class="form-group">
  					<label for="company_address" class="col-md-12 control-label"><?=trans('company_address')?></label>

  					<div class="col-md-12">
  						<input type="text" name="company_address" class="form-control" id="company_address"
  							value="<?=$vendor['company_address'];?>" placeholder="" readOnly>
  					</div>
  				</div>
  				<div class="form-group">
  					<label for="company_info" class="col-md-12 control-label"><?=trans('company_info')?></label>

  					<div class="col-md-12">
  						<input type="text" name="company_info" class="form-control" id="company_info"
  							value="<?=$vendor['company_info'];?>" placeholder="" readOnly>
  					</div>
  				</div>
  				<div class="form-group">
  					<label for="country_code" class="col-md-12 control-label"><?=trans('country_code')?></label>

  					<div class="col-md-12">
  						<input type="text" name="country_code" class="form-control" id="country_code"
  							value="<?=$vendor['country_code'];?>" placeholder="" readOnly>
  					</div>
  				</div>

  				<div class="form-group">
  					<label for="email" class="col-md-2 control-label"><?=trans('email')?></label>

  					<div class="col-md-12">
  						<input type="email" name="email_address" value="<?=$vendor['email_address'];?>"
  							class="form-control" id="email" placeholder="" readOnly>
  					</div>
  				</div>
  				<div class="form-group">
  					<label for="mobile_no" class="col-md-2 control-label"><?=trans('mobile_no')?></label>

  					<div class="col-md-12">
  						<input type="number" name="mobile_number" value="<?=$vendor['mobile_number'];?>"
  							class="form-control" id="mobile_no" placeholder="" readOnly>
  					</div>
  				</div>
  				<div class="form-group">
  					<label for="status" class="col-md-2 control-label"><?=trans('status')?></label>

  					<div class="col-md-12">
  						<input type="text" name="status" value="<?=$vendor['status'];?>" class="form-control"
  							id="status" placeholder="" readOnly>
  					</div>
  				</div>
  				<div class="form-group">
  					<label for="password" class="col-md-12 control-label"><?=trans('password')?></label>
  					<div class="col-md-12">
  						<input type="password" name="password" class="form-control" id="password"
  							value="<?=$vendor['password'];?>" placeholder="" readOnly>
  					</div>
  				</div>
  			</div>
  			<!-- /.box-body -->
  		</div>
  	</section>
  </div>
