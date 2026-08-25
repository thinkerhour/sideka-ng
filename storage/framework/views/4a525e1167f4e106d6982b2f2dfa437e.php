<?php $__env->startSection('title', 'Detail Desa - ' . $desa->nama_desa); ?>

<?php $__env->startSection('content'); ?>
    <div style="margin-bottom: 24px;">
        <a href="<?php echo e(route('admin.desa.index')); ?>" style="color: #64748b; font-size: 13.5px; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 6px; margin-bottom: 8px;">
            ← Kembali ke Data Desa
        </a>
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h1 style="font-size: 24px; font-weight: 800; color: #0f172a;">Profil & Detail Desa <?php echo e($desa->nama_desa); ?></h1>
                <p style="font-size: 14px; color: #64748b;">Kecamatan <?php echo e($desa->kecamatan); ?>, Kabupaten Bandung Barat</p>
            </div>
            <div style="display: flex; gap: 10px;">
                <a href="<?php echo e(route('admin.desa.edit', $desa->id_desa)); ?>" class="btn-action-primary">
                    ✏️ Edit Data Desa
                </a>
            </div>
        </div>
    </div>

    <!-- Details Card -->
    <div class="admin-card">
        <h2 style="font-size: 16px; font-weight: 700; color: #1e293b; margin-bottom: 20px;">Informasi Identitas Desa & Kontak</h2>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 24px;">
            <div>
                <div style="font-size: 12px; color: #64748b; font-weight: 700; text-transform: uppercase;">Nama Desa</div>
                <div style="font-size: 16px; font-weight: 800; color: #0f172a;"><?php echo e($desa->nama_desa); ?></div>
            </div>
            <div>
                <div style="font-size: 12px; color: #64748b; font-weight: 700; text-transform: uppercase;">Kecamatan</div>
                <div style="font-size: 16px; font-weight: 800; color: #0f172a;"><?php echo e($desa->kecamatan); ?></div>
            </div>
            <div>
                <div style="font-size: 12px; color: #64748b; font-weight: 700; text-transform: uppercase;">Kepala Desa / Pemangku</div>
                <div style="font-size: 16px; font-weight: 800; color: #0f172a;"><?php echo e($desa->nama_kepala_desa); ?></div>
            </div>
            <div>
                <div style="font-size: 12px; color: #64748b; font-weight: 700; text-transform: uppercase;">Admin Website</div>
                <div style="font-size: 16px; font-weight: 800; color: #0f172a;"><?php echo e($desa->nama_admin_website); ?></div>
            </div>
            <div>
                <div style="font-size: 12px; color: #64748b; font-weight: 700; text-transform: uppercase;">Email Admin</div>
                <div style="font-size: 15px; font-weight: 700; color: #2563eb;"><?php echo e($desa->email_admin); ?></div>
            </div>
            <div>
                <div style="font-size: 12px; color: #64748b; font-weight: 700; text-transform: uppercase;">Nomor Telepon / WA</div>
                <div style="font-size: 15px; font-weight: 700; color: #0f172a;"><?php echo e($desa->no_telp_admin); ?></div>
            </div>
            <div>
                <div style="font-size: 12px; color: #64748b; font-weight: 700; text-transform: uppercase;">Status Domain desa.id</div>
                <div>
                    <?php if($desa->domain): ?>
                        <span class="badge-status badge-berhasil">Aktif: <?php echo e($desa->domain->nama_domain); ?></span>
                    <?php else: ?>
                        <span class="badge-status badge-diproses">Belum Memiliki Domain</span>
                    <?php endif; ?>
                </div>
            </div>
            <div>
                <div style="font-size: 12px; color: #64748b; font-weight: 700; text-transform: uppercase;">Website Official</div>
                <div>
                    <?php if($desa->website): ?>
                        <a href="<?php echo e($desa->website); ?>" target="_blank" style="color: #2563eb; font-weight: 700; text-decoration: none;"><?php echo e($desa->website); ?></a>
                    <?php else: ?>
                        <span style="color: #94a3b8;">-</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Pengajuan Info -->
    <div class="admin-card">
        <h2 style="font-size: 16px; font-weight: 700; color: #1e293b; margin-bottom: 16px;">Status Pengajuan Domain Desa Ini</h2>
        
        <?php if($desa->pengajuan): ?>
            <div style="display: flex; align-items: center; justify-content: space-between; padding: 16px; background: #f8fafc; border-radius: 12px; border: 1px solid #e2e8f0;">
                <div>
                    <div style="font-size: 14.5px; font-weight: 700; color: #0f172a;">
                        Diajukan pada: <?php echo e(\Carbon\Carbon::parse($desa->pengajuan->tanggal_pengajuan)->translatedFormat('d MMMM YYYY, H:i')); ?> WIB
                    </div>
                    <?php if($desa->pengajuan->keterangan_revisi): ?>
                        <div style="font-size: 13px; color: #b45309; margin-top: 4px;">
                            Catatan Revisi: "<?php echo e($desa->pengajuan->keterangan_revisi); ?>"
                        </div>
                    <?php endif; ?>
                </div>
                <a href="<?php echo e(route('admin.pengajuan.show', $desa->pengajuan->id_pengajuan)); ?>" class="btn-action-primary">
                    Lihat Dokumen Pengajuan
                </a>
            </div>
        <?php else: ?>
            <div style="padding: 24px; text-align: center; color: #94a3b8;">
                Desa ini belum mengajukan permohonan domain melalui sistem.
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\User\sideka-ng\resources\views/admin/desa/show.blade.php ENDPATH**/ ?>