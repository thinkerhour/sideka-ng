<?php $__env->startSection('title', 'Data Desa'); ?>

<?php $__env->startSection('content'); ?>
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
        <div>
            <h1 style="font-size: 24px; font-weight: 800; color: #0f172a;">Pengelolaan Data Desa</h1>
            <p style="font-size: 14px; color: #64748b;">Kelola daftar desa, informasi kepala desa, dan kontak admin website desa.</p>
        </div>

        <a href="<?php echo e(route('admin.desa.create')); ?>" class="btn-action-primary">
            + Tambah Data Desa
        </a>
    </div>

    <!-- Search Section -->
    <div class="admin-card">
        <form action="<?php echo e(route('admin.desa.index')); ?>" method="GET" style="display: flex; gap: 16px; align-items: center;">
            <input type="text" 
                   name="search" 
                   value="<?php echo e($search); ?>" 
                   placeholder="Cari desa, kecamatan, kepala desa, atau admin..." 
                   style="flex: 1; max-width: 440px; padding: 10px 16px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 14px; outline: none;">
            <button type="submit" class="btn-action-primary">Cari Data</button>
            <?php if($search): ?>
                <a href="<?php echo e(route('admin.desa.index')); ?>" class="btn-action-secondary">Reset</a>
            <?php endif; ?>
        </form>
    </div>

    <!-- Data Desa Table -->
    <div class="admin-card">
        <?php if($desas->isEmpty()): ?>
            <div style="text-align: center; padding: 48px; color: #94a3b8;">
                <svg width="48" height="48" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-bottom: 12px; opacity: 0.5;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5m3 0h1m-1-4h.01M9 16h.01M9 12h.01M9 8h.01M15 16h.01M15 12h.01M15 8h.01"/>
                </svg>
                <p style="font-size: 16px; font-weight: 700; color: #475569;">Belum ada data desa</p>
                <p style="font-size: 13.5px;">Klik tombol "+ Tambah Data Desa" untuk menginput desa baru.</p>
            </div>
        <?php else: ?>
            <div style="overflow-x: auto;">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Nama Desa</th>
                            <th>Kecamatan</th>
                            <th>Kepala Desa / Pemangku</th>
                            <th>Admin Website</th>
                            <th>Email Admin</th>
                            <th>No. Telepon</th>
                            <th>Website</th>
                            <th style="width: 140px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $desas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $desa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($desas->firstItem() + $index); ?></td>
                                <td><strong><?php echo e($desa->nama_desa); ?></strong></td>
                                <td><?php echo e($desa->kecamatan); ?></td>
                                <td><?php echo e($desa->nama_kepala_desa); ?></td>
                                <td><?php echo e($desa->nama_admin_website); ?></td>
                                <td><?php echo e($desa->email_admin); ?></td>
                                <td><?php echo e($desa->no_telp_admin); ?></td>
                                <td>
                                    <?php if($desa->website): ?>
                                        <a href="<?php echo e($desa->website); ?>" target="_blank" style="color: #2563eb; text-decoration: none; font-size: 13px;">
                                            <?php echo e($desa->website); ?>

                                        </a>
                                    <?php else: ?>
                                        <span style="color: #94a3b8;">-</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div style="display: flex; gap: 6px;">
                                        <a href="<?php echo e(route('admin.desa.show', $desa->id_desa)); ?>" class="btn-action-secondary" style="padding: 6px 10px; font-size: 12px;" title="Lihat Detail">
                                            👁️
                                        </a>
                                        <a href="<?php echo e(route('admin.desa.edit', $desa->id_desa)); ?>" class="btn-action-primary" style="padding: 6px 10px; font-size: 12px;" title="Edit Data">
                                            ✏️
                                        </a>
                                        <form action="<?php echo e(route('admin.desa.destroy', $desa->id_desa)); ?>" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data desa <?php echo e($desa->nama_desa); ?>?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn-action-danger" style="padding: 6px 10px; font-size: 12px;" title="Hapus Data">
                                                🗑️
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="pagination-wrapper">
                <?php echo e($desas->appends(request()->query())->links()); ?>

            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\User\sideka-ng\resources\views/admin/desa/index.blade.php ENDPATH**/ ?>