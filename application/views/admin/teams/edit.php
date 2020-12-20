  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Main content -->
  	<section class="content">
  		<div class="card card-default color-palette-bo">
  			<div class="card-header">
  				<div class="d-inline-block">
  					<h3 class="card-title"> <i class="fa fa-pencil"></i>
  						<?= trans('edit_team') ?> </h3>
  				</div>
  				<div class="d-inline-block float-right">
  					<a href="<?= base_url('admin/teams'); ?>" class="btn btn-success"><i class="fa fa-list"></i>
  						<?= trans('team_list') ?></a>
  				</div>
  			</div>
  			<div class="card-body">
  				<!-- For Messages -->
  				<?php $this->load->view('admin/includes/_messages.php') ?>

  				<?php echo form_open(base_url('admin/teams/edit/'.$team['team_id']), 'class="form-horizontal"' )?>
  				<div class="form-group">
  					<label for="team_name" class="col-md-2 control-label"><?= trans('team_name') ?></label>

  					<div class="col-md-12">
  						<input type="text" name="team_name" value="<?= $team['team_name']; ?>"
  							class="form-control" id="team_name" placeholder="">
  					</div>
  				</div>
  				<div class="form-group">
  					<div class="col-md-12">
  						<input type="submit" name="submit" value="Update Team" class="btn btn-primary pull-right">
  					</div>
  				</div>
  				<?php echo form_close(); ?>
  			</div>
  			<!-- /.box-body -->
  		</div>
  	</section>
  </div>
