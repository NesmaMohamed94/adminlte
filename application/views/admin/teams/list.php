<div class="datalist">
	<table id="example1" class="table table-bordered table-hover">
		<thead>
			<tr>
				<th width="50"><?= trans('team_number') ?></th>
				<th><?= trans('team_name') ?></th>
				<th width="120"><?= trans('action') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($info as $row): ?>
			<tr>
				<td>
					<?=$row['team_id']?>
				</td>
				<td>
					<?=$row['team_name']?>
				</td>
				<td>
					<a href="<?= base_url("admin/teams/edit/".$row['team_id']); ?>" class="btn btn-warning btn-xs mr5">
						<i class="fa fa-edit"></i>
					</a>
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</div>
