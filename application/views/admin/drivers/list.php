<div class="datalist">
	<table id="example1" class="table table-bordered table-hover">
		<thead>
			<tr>
				<th width="50"><?= trans('id') ?></th>
				<th><?= trans('username') ?></th>
				<th><?= trans('mobile_no') ?></th>
				<th><?= trans('email') ?></th>
				<th><?= trans('status') ?></th>
				<th width="120"><?= trans('action') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($info as $row): ?>
			<tr>
				<td>
					<?=$row['driver_id']?>
				</td>
				<td>
					<?=$row['username']?>
				</td>
				<td>
					<?=$row['phone']?>
				</td>
				<td>
					<?=$row['email']?>
				</td>
				<td>
                <input class='tgl tgl-ios tgl_checkbox' data-id="<?=$row['driver_id']?>"
						id='cb_<?=$row['driver_id']?>' type='checkbox'
						<?php echo ($row['status'] == "active")? "checked" : ""; ?> />
					<label class='tgl-btn' for='cb_<?=$row['driver_id']?>'></label>
				</td>
				<td>
					<a href="<?= base_url("admin/drivers/edit/".$row['driver_id']); ?>"
						class="btn btn-warning btn-xs mr5">
						<i class="fa fa-edit"></i>
					</a>
					<a href="<?= base_url("admin/drivers/view/".$row['driver_id']); ?>"
						class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a>
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</div>
