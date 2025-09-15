

<?php $__env->startSection('content'); ?>
<h2 class="mb-4 fw-bold">👷 Data Pegawai</h2>

<?php if(session('success')): ?>
<div class="alert alert-success"><?php echo e(session('success')); ?></div>
<?php endif; ?>

<div class="mb-3">
    <a href="<?php echo e(route('pegawai.create')); ?>" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Tambah Pegawai</a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Nama</th>
                    <th>NIK KTP</th>
                    <th>No KK</th>
                    <th>Badge ID</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($p->nama); ?></td>
                    <td><?php echo e($p->nik_ktp); ?></td>
                    <td><?php echo e($p->no_kk); ?></td>
                    <td><?php echo e($p->badge_id); ?></td>
                    <td><?php echo e(ucfirst($p->role)); ?></td>
                    <td>
                        <a href="<?php echo e(route('pegawai.edit', $p->id_pegawai)); ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                        <form action="<?php echo e(route('pegawai.destroy', $p->id_pegawai)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus pegawai ini?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="text-center text-muted">Belum ada data pegawai</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\X390\webadmin\resources\views/pages/pegawai/index.blade.php ENDPATH**/ ?>