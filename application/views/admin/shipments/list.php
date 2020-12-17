<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css"> 

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-list"></i>
              &nbsp; <?= trans('shipment_list') ?> </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/shipments/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i><?= trans('add_new_shipment') ?> </a>
          </div>
        </div>
        <div class="card-body table-responsive">
          <table id="example1" class="table table-bordered table-striped ">
          <thead>
          <tr>
            <th><?= trans('vshipment_id') ?></th>
            <th><?= trans('trans_type') ?> </th>
            <th><?= trans('description') ?> </th>
  		      <th><?= trans('delivery_date') ?> </th>
  		      <th><?= trans('received_date') ?> </th>
  		      <th><?= trans('status') ?> </th>
  		      <th><?= trans('substatus') ?> </th>
            <th><?= trans('branch') ?> </th>
            <th><?= trans('customer_name') ?> </th>
            <th><?= trans('customer_contact_number') ?> </th>
            <th><?= trans('customer_city') ?> </th>
            <th><?= trans('vendor') ?> </th>
            <th width="150" class="text-right"><?= trans('action') ?> </th>
            
          </tr>
          </thead>
          <tbody>
            <?php foreach($shipments as $data): ?>
            <tr>
              <td><?= $data['vshipment_id']; ?></td>
              <td><?= $data['trans_type']; ?></td>
              <td><?= $data['description']; ?></td>
              <td><?= date_time($data['delivery_date']); ?></td>
              <td><?= date_time($data['received_date']); ?></td>
              <td><?= $data['status']; ?></td>
              <td><?= $data['substatus']; ?></td>
              <td><?= $data['branch_name']; ?></td>
              <td><?= $data['customer_name']; ?></td>
              <td><?= $data['contact_number']; ?></td>
              <td><?= $data['customer_city']; ?></td>
              <td><?= $data['user_name']; ?></td>

              <td><div class="btn-group pull-right">
                <!-- <a href="<?= base_url('admin/shipments/view/'.$data['id']); ?>" class="btn btn-info"><i class="fa fa-eye"></i></a> -->
                <a href="<?= base_url('admin/shipments/edit/'.$data['id']); ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
              </div></td>
  		      </tr>
            <?php endforeach; ?>
          </tbody>
          </table>
        </div>
      </div>
    <!-- /.box -->
  </section>  
</div>

<!-- DataTables -->
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script> 
<script>
  $("#invoices").addClass('active');
</script>        