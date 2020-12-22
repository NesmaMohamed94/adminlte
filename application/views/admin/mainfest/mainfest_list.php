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
              &nbsp; <?= trans('mainfest_list') ?> </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/mainfest/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i><?= trans('add_new_invoice') ?> </a>
          </div>
        </div>
        <div class="card-body table-responsive">
          <table id="example1" class="table table-bordered table-striped ">
          <thead>
          <tr>
            <th><?= trans('mainfest') ?>#</th>
            <th><?= trans('date') ?> </th>
            <th><?= trans('type') ?> </th>
            <th><?= trans('to_from') ?> </th>
            <th><?= trans('to_from_id') ?> </th>
  		      <th><?= trans('warehouse_name') ?> </th>
            <!-- <th width="150" class="text-right"><?= trans('action') ?> </th> -->
            
          </tr>
          </thead>
          <tbody>
            <?php foreach($mainfest_detail as $data): ?>
            <tr>
              <td><?= $data['id']; ?></td>
              <td><?= $data['created_at']; ?></td>
              <td><?= $data['type'] ?></td>
              <td><?= $data['to_from'] ?></td>
              <td><?= $data['user_name'] ?></td>
              <td><?= $data['warehouse_name'] ?></td>
              <!-- <td><div class="btn-group pull-right">
                <a href="<?= base_url('admin/invoices/view/'.$data['id']); ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                <a href="<?= base_url('admin/invoices/invoice_pdf_download/'.$data['id']); ?>" class="btn btn-primary"><i class="fa fa-download"></i></a>
                <a href="<?= base_url('admin/invoices/edit/'.$data['id']); ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                <a href="<?= base_url('admin/invoices/del/'.$data['id']); ?>" class="btn btn-danger"><i class="fa fa-remove"></i></a>
              </div></td> -->
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