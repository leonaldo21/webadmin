

<?php $__env->startSection('content'); ?>
<h2 class="mb-4 fw-bold">Edit Pegawai</h2>

<?php if($errors->any()): ?>
<div class="alert alert-danger">
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>

<form action="<?php echo e(route('pegawai.update', $pegawai->id_pegawai)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="<?php echo e(old('nama', $pegawai->nama)); ?>" required>
    </div>
    <div class="mb-3">
        <label>NIK KTP</label>
        <input type="text" name="nik_ktp" class="form-control" value="<?php echo e(old('nik_ktp', $pegawai->nik_ktp)); ?>" required>
    </div>
    <div class="mb-3">
        <label>No KK</label>
        <input type="text" name="no_kk" class="form-control" value="<?php echo e(old('no_kk', $pegawai->no_kk)); ?>" required>
    </div>
    <div class="mb-3">
        <label>No BPJS</label>
        <input type="text" name="no_bpjs" class="form-control" value="<?php echo e(old('no_bpjs', $pegawai->no_bpjs)); ?>">
    </div>
    <div class="mb-3">
        <label>No JMO</label>
        <input type="text" name="no_jmo" class="form-control" value="<?php echo e(old('no_jmo', $pegawai->no_jmo)); ?>">
    </div>
    <div class="mb-3">
        <label>No NPWP</label>
        <input type="text" name="no_npwp" class="form-control" value="<?php echo e(old('no_npwp', $pegawai->no_npwp)); ?>">
    </div>
    <div class="mb-3">
        <label>Badge ID</label>
        <input type="text" name="badge_id" class="form-control" value="<?php echo e(old('badge_id', $pegawai->badge_id)); ?>" required>
    </div>
    <div class="mb-3">
        <label>Role</label>
        <select name="role" class="form-select" required>
            <option value="">-- Pilih Role --</option>
            <option value="helper" <?php echo e($pegawai->role == 'helper' ? 'selected' : ''); ?>>Helper</option>
            <option value="supervisor" <?php echo e($pegawai->role == 'supervisor' ? 'selected' : ''); ?>>Supervisor</option>
            <option value="foreman" <?php echo e($pegawai->role == 'foreman' ? 'selected' : ''); ?>>Foreman</option>
            <option value="insulator" <?php echo e($pegawai->role == 'insulator' ? 'selected' : ''); ?>>Insulator</option>
            <option value="carpenter" <?php echo e($pegawai->role == 'carpenter' ? 'selected' : ''); ?>>Carpenter</option>
        </select>
    </div>

    <button class="btn btn-primary"><i class="bi bi-save"></i> Update</button>
    <a href="<?php echo e(route('pegawai.index')); ?>" class="btn btn-secondary">Batal</a>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\X390\webadmin\resources\views/pages/pegawai/edit.blade.php ENDPATH**/ ?>