

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Daftar Barang</h2>
    <a href="<?php echo e(route('barang.create')); ?>" class="btn btn-primary mb-3">+ Tambah Barang</a>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Serial Number</th>
                <th>Total Quantity</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($b->id_barang); ?></td>
                <td><?php echo e($b->nama_barang); ?></td>
                <td><?php echo e($b->serial_number ?? '-'); ?></td>
                <td><?php echo e($b->quantity_total); ?></td>
                <td>
                    <a href="<?php echo e(route('barang.edit', $b->id_barang)); ?>" class="btn btn-warning btn-sm">Edit</a>
                    <form action="<?php echo e(route('barang.destroy', $b->id_barang)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <?php echo e($barang->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\X390\webadmin\resources\views/pages/barang/index.blade.php ENDPATH**/ ?>