

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Daftar Barang Masuk</h2>
    <a href="<?php echo e(route('barang_masuk.create')); ?>" class="btn btn-primary mb-3">+ Tambah Barang Masuk</a>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Penerima</th>
                <th>Tanggal Masuk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $barang_masuk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($bm->id_barang_masuk); ?></td>
                <td><?php echo e($bm->barang->nama_barang ?? '-'); ?></td>
                <td><?php echo e($bm->jumlah); ?></td>
                <td><?php echo e($bm->penerima->nama ?? '-'); ?></td>
                <td><?php echo e($bm->tanggal_masuk); ?></td>
                <td>
                    <a href="<?php echo e(route('barang_masuk.edit', $bm->id_barang_masuk)); ?>" class="btn btn-warning btn-sm">Edit</a>
                    <form action="<?php echo e(route('barang_masuk.destroy', $bm->id_barang_masuk)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <?php echo e($barang_masuk->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\X390\webadmin\resources\views/pages/barangmasuk/index.blade.php ENDPATH**/ ?>