<div class="datalist">
	<table id="example1" class="table table-bordered table-hover">
		<thead>
			<tr>
				<th><?= trans('warehouse_no') ?></th>
				<th><?= trans('warehouse_name') ?></th>
				<th><?= trans('warehouse_location') ?></th>
				<!-- <th width="120"><?= trans('action') ?></th> -->
			</tr>
		</thead>
		<tbody>
			<?php foreach($info as $row): ?>
			<tr>
				<td>
					<?=$row['warehouse_no']?>
				</td>
				<td>
					<?=$row['warehouse_name']?>
				</td>
				<td>
					<?=$row['warehouse_location']?>
				</td>
				<!-- <td>
					<a href="<?= base_url("admin/warehouses/edit/".$row['warehouse_no']); ?>" class="btn btn-warning btn-xs mr5">
						<i class="fa fa-edit"></i>
					</a>
				</td> -->
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</div>
