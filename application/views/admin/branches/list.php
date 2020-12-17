<div class="datalist">
	<table id="example1" class="table table-bordered table-hover">
		<thead>
			<tr>
				<th width="50"><?= trans('id') ?></th>
				<th><?= trans('branch_no') ?></th>
				<th><?= trans('branch_name') ?></th>
				<th width="120"><?= trans('action') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($info as $row): ?>
			<tr>
				<td>
					<?=$row['id']?>
				</td>
				<td>
					<?=$row['branch_no']?>
				</td>
				<td>
					<?=$row['branch_name']?>
				</td>
				<td>
					<a href="<?= base_url("admin/branches/edit/".$row['id']); ?>" class="btn btn-warning btn-xs mr5">
						<i class="fa fa-edit"></i>
					</a>
					<!-- <a href="<?= base_url("admin/admin/delete/".$row['admin_id']); ?>" onclick="return confirm('are you sure to delete?')" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a> -->
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</div>
