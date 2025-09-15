<?php $__env->startSection('content'); ?>
    <h2 class="mb-4 fw-bold">📊 Dashboard</h2>

    
    <div class="row g-4 mb-4">
        
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted">Jumlah Pegawai</h6>
                            <h3 class="fw-bold"><?php echo e($totalPegawai ?? 0); ?></h3>
                        </div>
                        <div class="text-primary fs-2">
                            <i class="bi bi-people-fill"></i>
                        </div>
                    </div>
                    <hr>
                    <ul class="list-unstyled small mb-0 text-muted">
                        <li>👷 Helper: <?php echo e($pegawaiRole['helper'] ?? 0); ?></li>
                        <li>👨‍💼 Supervisor: <?php echo e($pegawaiRole['supervisor'] ?? 0); ?></li>
                        <li>🛠 Foreman: <?php echo e($pegawaiRole['foreman'] ?? 0); ?></li>
                        <li>🔥 Insulator: <?php echo e($pegawaiRole['insulator'] ?? 0); ?></li>
                        <li>🔨 Carpenter: <?php echo e($pegawaiRole['carpenter'] ?? 0); ?></li>
                    </ul>
                </div>
            </div>
        </div>

        
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100 bg-light-success">
                <div class="card-body text-center">
                    <div class="text-success fs-1 mb-2">
                        <i class="bi bi-box-arrow-in-down"></i>
                    </div>
                    <h6 class="text-muted">Barang Masuk Hari Ini</h6>
                    <h3 class="fw-bold text-success"><?php echo e($barangMasukHariIni ?? 0); ?></h3>
                </div>
            </div>
        </div>

        
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100 bg-light-danger">
                <div class="card-body text-center">
                    <div class="text-danger fs-1 mb-2">
                        <i class="bi bi-box-arrow-up"></i>
                    </div>
                    <h6 class="text-muted">Barang Keluar Hari Ini</h6>
                    <h3 class="fw-bold text-danger"><?php echo e($barangKeluarHariIni ?? 0); ?></h3>
                </div>
            </div>
        </div>

        
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100 bg-light-primary">
                <div class="card-body text-center">
                    <div class="text-primary fs-1 mb-2">
                        <i class="bi bi-clock-history"></i>
                    </div>
                    <h6 class="text-muted">Total Jam Kerja</h6>
                    <h3 class="fw-bold"><?php echo e($totalJamKerja ?? 0); ?></h3>
                    <small class="text-muted">(Mingguan / Bulanan)</small>
                </div>
            </div>
        </div>
    </div>

    
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <i class="bi bi-calendar-check"></i> Rekap Absensi Hari Ini
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Nama Pegawai</th>
                            <th>Jam Masuk</th>
                            <th>Jam Keluar</th>
                            <th>Total Jam</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $rekapAbsensi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $absen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($absen->pegawai->nama); ?></td>
                                <td>
                                    <span class="badge bg-success">
                                        <?php echo e($absen->jam_masuk); ?>

                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-danger">
                                        <?php echo e($absen->jam_keluar); ?>

                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-primary">
                                        <?php echo e($absen->total_jam); ?>

                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="4" class="text-center text-muted">
                                    Belum ada data absensi hari ini
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\X390\webadmin\resources\views/pages/dashboard.blade.php ENDPATH**/ ?>