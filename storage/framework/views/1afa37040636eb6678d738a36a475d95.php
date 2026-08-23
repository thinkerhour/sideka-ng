<?php $__env->startSection('title', 'Data Pengajuan'); ?>

<?php $__env->startSection('content'); ?>
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
        <div>
            <h1 style="font-size: 24px; font-weight: 800; color: #0f172a;">Pengelolaan Data Pengajuan Domain</h1>
            <p style="font-size: 14px; color: #64748b;">Periksa kelengkapan dokumen pengajuan dan kelola status permohonan desa.id.</p>
        </div>
    </div>

    <!-- Filter & Search Section -->
    <div class="admin-card">
        <form action="<?php echo e(route('admin.pengajuan.index')); ?>" method="GET" style="display: flex; gap: 16px; flex-wrap: wrap; align-items: center; justify-content: space-between;">
            <!-- Status Filter Buttons -->
            <div style="display: flex; gap: 8px;">
                <a href="<?php echo e(route('admin.pengajuan.index')); ?>" 
                   class="<?php echo e(empty($status) ? 'btn-action-primary' : 'btn-action-secondary'); ?>">
                    Semua Status
                </a>
                <a href="<?php echo e(route('admin.pengajuan.index', ['status' => 'Diproses'])); ?>" 
                   class="<?php echo e($status === 'Diproses' ? 'btn-action-primary' : 'btn-action-secondary'); ?>">
                    Diproses
                </a>
                <a href="<?php echo e(route('admin.pengajuan.index', ['status' => 'Revisi'])); ?>" 
                   class="<?php echo e($status === 'Revisi' ? 'btn-action-primary' : 'btn-action-secondary'); ?>">
                    Revisi
                </a>
                <a href="<?php echo e(route('admin.pengajuan.index', ['status' => 'Domain Berhasil'])); ?>" 
                   class="<?php echo e($status === 'Domain Berhasil' ? 'btn-action-primary' : 'btn-action-secondary'); ?>">
                    Domain Berhasil
                </a>
            </div>

            <!-- Search Input -->
            <div style="display: flex; gap: 8px;">
                <?php if($status): ?>
                    <input type="hidden" name="status" value="<?php echo e($status); ?>">
                <?php endif; ?>
                <input type="text" 
                       name="search" 
                       value="<?php echo e($search); ?>" 
                       placeholder="Cari desa / kecamatan..." 
                       style="padding: 8px 16px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 13.5px; outline: none; width: 240px;">
                <button type="submit" class="btn-action-primary">Cari</button>
            </div>
        </form>
    </div>

    <!-- Data Table Card -->
    <div class="admin-card">
        <?php if($pengajuans->isEmpty()): ?>
            <div style="text-align: center; padding: 48px; color: #94a3b8;">
                <svg width="48" height="48" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-bottom: 12px; opacity: 0.5;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <p style="font-size: 16px; font-weight: 700; color: #475569;">Tidak ada data pengajuan ditemukan</p>
                <p style="font-size: 13.5px;">Belum ada pengajuan desa yang sesuai dengan filter pencarian ini.</p>
            </div>
        <?php else: ?>
            <div style="overflow-x: auto;">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Nama Desa</th>
                            <th>Kecamatan</th>
                            <th>Admin Website</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Status</th>
                            <th>Keterangan Revisi</th>
                            <th style="width: 120px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $pengajuans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $pengajuan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($pengajuans->firstItem() + $index); ?></td>
                                <td><strong><?php echo e($pengajuan->desa->nama_desa ?? '-'); ?></strong></td>
                                <td><?php echo e($pengajuan->desa->kecamatan ?? '-'); ?></td>
                                <td><?php echo e($pengajuan->desa->nama_admin_website ?? '-'); ?></td>
                                <td><?php echo e(\Carbon\Carbon::parse($pengajuan->tanggal_pengajuan)->translatedFormat('d M Y, H:i')); ?></td>
                                <td>
                                    <?php if($pengajuan->status === 'Diproses'): ?>
                                        <span class="badge-status badge-diproses">Diproses</span>
                                    <?php elseif($pengajuan->status === 'Revisi'): ?>
                                        <span class="badge-status badge-revisi">Revisi</span>
                                    <?php elseif($pengajuan->status === 'Domain Berhasil'): ?>
                                        <span class="badge-status badge-berhasil">Domain Berhasil</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($pengajuan->status === 'Revisi' && $pengajuan->keterangan_revisi): ?>
                                        <span style="font-size: 12.5px; color: #b45309; font-style: italic;">
                                            "<?php echo e(Str::limit($pengajuan->keterangan_revisi, 35)); ?>"
                                        </span>
                                    <?php else: ?>
                                        <span style="color: #94a3b8;">-</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('admin.pengajuan.show', $pengajuan->id_pengajuan)); ?>" class="btn-action-primary">
                                        Detail Dokumen
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="pagination-wrapper">
                <?php echo e($pengajuans->appends(request()->query())->links()); ?>

            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\User\sideka-ng\resources\views/admin/pengajuan/index.blade.php ENDPATH**/ ?>