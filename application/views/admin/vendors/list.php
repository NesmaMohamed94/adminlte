<div class="datalist">
    <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th width="50"><?= trans('id') ?></th>
                <th><?= trans('username') ?></th>
                <th><?= trans('mobile_no') ?></th>
                <th><?= trans('email') ?></th>
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
                    <?=$row['user_name']?>
                </td> 
                <td>
					<?=$row['mobile_number']?>
                </td>
                <td>
					<?=$row['email_address']?>
                </td>
                <td>
                    <a href="<?= base_url("admin/vendors/edit/".$row['id']); ?>" class="btn btn-warning btn-xs mr5" >
                    <i class="fa fa-edit"></i>
                    </a>
                    <a href="<?= base_url("admin/vendors/view/".$row['id']); ?>"  class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>

