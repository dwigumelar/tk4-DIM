<?php $__env->startSection('css'); ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <?php echo e($message); ?>

            </div>
        <?php endif; ?>
        <div class="card">
          <div class="card-header">
            <a class="btn btn-success" href="<?php echo e(route('pegawai.create')); ?>"> Buat Pegawai</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="pegawai" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th style="width:5%">Id</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Hp</th>
                <th>Jabatan</th>
                <th>Bagian</th>
                <th style="width:20%">Action</th>
              </tr>
              </thead>
              <tbody>
              <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pegawai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($pegawai->id_pegawai); ?></td>
                <td><?php echo e($pegawai->nama_pegawai); ?></td>
                <td><?php echo e($pegawai->alamat_pegawai); ?></td>
                <td><?php echo e($pegawai->hp_pegawai); ?></td>
                <td><?php echo e($pegawai->jabatan_pegawai); ?></td>
                <td><?php echo e($pegawai->nama_bagian); ?></td>
                <td>
                  <form action="<?php echo e(route('pegawai.destroy',$pegawai->id_pegawai)); ?>" method="Post">
                      <a class="btn btn-primary" href="<?php echo e(route('pegawai.edit',$pegawai->id_pegawai)); ?>">Edit</a>
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('DELETE'); ?>
                      <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin mau menghapus ini?')">Delete</button>
                  </form>
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
              <tfoot>
                <tr>
                  <th style="width:5%">Id</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Hp</th>
                  <th>Jabatan</th>
                  <th>Bagian</th>
                  <th style="width:20%">Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script src="<?php echo e(asset('plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/jszip/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/pdfmake/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/pdfmake/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-buttons/js/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-buttons/js/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-buttons/js/buttons.colVis.min.js')); ?>"></script>
<script>
  $(function () {
    $("#pegawai").DataTable({
      "responsive": true,
      "autoWidth": false,
      "lengthMenu":  [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
      "dom": "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#pegawai_wrapper .col-md-6:eq(0)');
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tk4\resources\views/pegawai/index.blade.php ENDPATH**/ ?>