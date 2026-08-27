<?php $__env->startSection('title', 'Detail Pengajuan - ' . ($pengajuan->desa->nama_desa ?? 'Belum Ditautkan')); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('success')): ?>
        <div style="background: #f0fdf4; border: 1px solid #bbf7d0; color: #166534; padding: 12px 18px; border-radius: 12px; font-size: 13.5px; font-weight: 600; margin-bottom: 20px; display: flex; align-items: center; gap: 8px;">
            <span>✓</span> <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div style="background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; padding: 12px 18px; border-radius: 12px; font-size: 13.5px; font-weight: 600; margin-bottom: 20px;">
            ⚠️ <?php echo e($errors->first()); ?>

        </div>
    <?php endif; ?>

    <div style="margin-bottom: 24px; display: flex; align-items: center; justify-content: space-between;">
        <div>
            <a href="<?php echo e(route('admin.pengajuan.index')); ?>" class="btn-action-secondary" style="display: inline-flex; align-items: center; gap: 8px; margin-bottom: 12px; text-decoration: none; font-weight: 700; font-size: 13.5px; padding: 8px 16px; border-radius: 8px;">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Data Pengajuan
            </a>
            <h1 style="font-size: 24px; font-weight: 800; color: #0f172a;">
                Pengajuan Desa <?php echo e($pengajuan->desa->nama_desa ?? '(Belum Ditautkan)'); ?>

            </h1>
            <p style="font-size: 14px; color: #64748b;">
                <?php if($pengajuan->desa): ?>
                    Kecamatan <?php echo e($pengajuan->desa->kecamatan); ?> • 
                <?php else: ?>
                    <span style="color: #dc2626; font-weight: 600;">⚠️ Desa Belum Ditautkan • </span>
                <?php endif; ?>
                Diajukan tanggal <?php echo e(\Carbon\Carbon::parse($pengajuan->tanggal_pengajuan)->locale('id')->isoFormat('D MMMM YYYY, HH:mm')); ?> WIB
            </p>
        </div>

        <div>
            <?php if($pengajuan->status === 'Diproses'): ?>
                <span class="badge-status badge-diproses" style="font-size: 14px; padding: 8px 18px;">Status: Diproses</span>
            <?php elseif($pengajuan->status === 'Revisi'): ?>
                <span class="badge-status badge-revisi" style="font-size: 14px; padding: 8px 18px;">Status: Revisi</span>
            <?php elseif($pengajuan->status === 'Domain Berhasil'): ?>
                <span class="badge-status badge-berhasil" style="font-size: 14px; padding: 8px 18px;">Status: Domain Berhasil</span>
            <?php endif; ?>
        </div>
    </div>

    <!-- Info Desa Card -->
    <div class="admin-card" style="margin-bottom: 24px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
            <h2 style="font-size: 16px; font-weight: 700; color: #1e293b; margin: 0;">Informasi Admin & Pemangku Desa</h2>
            <?php if(!$pengajuan->desa): ?>
                <span style="font-size: 12px; color: #b45309; background: #fef3c7; border: 1px solid #fde68a; padding: 4px 10px; border-radius: 6px; font-weight: 700;">
                    ⚠️ Desa Belum Ditautkan
                </span>
            <?php endif; ?>
        </div>

        <?php if($pengajuan->desa): ?>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px;">
                <div>
                    <div style="font-size: 12px; color: #64748b; font-weight: 600;">Nama Desa & Kecamatan</div>
                    <div style="font-size: 14.5px; font-weight: 700; color: #0f172a;">Desa <?php echo e($pengajuan->desa->nama_desa); ?> (Kec. <?php echo e($pengajuan->desa->kecamatan); ?>)</div>
                </div>
                <div>
                    <div style="font-size: 12px; color: #64748b; font-weight: 600;">Kepala Desa / Pemangku</div>
                    <div style="font-size: 14.5px; font-weight: 700; color: #0f172a;"><?php echo e($pengajuan->desa->nama_kepala_desa ?? '-'); ?></div>
                </div>
                <div>
                    <div style="font-size: 12px; color: #64748b; font-weight: 600;">Admin Website Desa</div>
                    <div style="font-size: 14.5px; font-weight: 700; color: #0f172a;"><?php echo e($pengajuan->desa->nama_admin_website ?? '-'); ?></div>
                </div>
                <div>
                    <div style="font-size: 12px; color: #64748b; font-weight: 600;">Email Admin</div>
                    <div style="font-size: 14.5px; font-weight: 700; color: #0f172a;"><?php echo e($pengajuan->desa->email_admin ?? '-'); ?></div>
                </div>
                <div>
                    <div style="font-size: 12px; color: #64748b; font-weight: 600;">No. Telepon / WhatsApp</div>
                    <div style="font-size: 14.5px; font-weight: 700; color: #0f172a;"><?php echo e($pengajuan->desa->no_telp_admin ?? '-'); ?></div>
                </div>
            </div>
        <?php else: ?>
            <div style="padding: 16px 20px; background: #fffbeb; border-radius: 10px; border: 1px dashed #f59e0b; color: #92400e; font-size: 13.5px; line-height: 1.6;">
                <strong>Perhatian:</strong> Dokumen pengajuan ini belum terhubung dengan data desa mana pun di database. Silakan periksa 4 dokumen di bawah, lalu pilih nama desa pemohon pada pilihan dropdown <strong>"Pilih Data Desa Pemohon"</strong> di form pembaruan status di bawah untuk menghubungkannya.
            </div>
        <?php endif; ?>
    </div>

    <!-- 4 Dokumen Persyaratan Wajib -->
    <div class="admin-card" style="margin-bottom: 24px;">
        <h2 style="font-size: 16px; font-weight: 700; color: #1e293b; margin-bottom: 8px;">Pemeriksaan 4 Dokumen Persyaratan</h2>
        <p style="font-size: 13.5px; color: #64748b; margin-bottom: 20px;">Periksa keabsahan dan kejelasan 4 dokumen wajib yang diunggah oleh desa sebelum menyetujui atau meminta revisi.</p>

        <div class="documents-grid">
            <!-- 1. Surat Permohonan -->
            <div class="doc-card">
                <div class="doc-icon">📄</div>
                <div class="doc-title">1. Surat Permohonan Fasilitasi Domain desa.id</div>
                <?php if(isset($dokumens['surat_permohonan']) && $dokumens['surat_permohonan']): ?>
                    <div style="color: #166534; font-size: 12px; font-weight: 700;">✓ Tersedia</div>
                    <a href="<?php echo e(asset($dokumens['surat_permohonan']->path_file)); ?>" target="_blank" class="btn-action-primary" style="font-size: 12px; padding: 6px 12px;">
                        Buka / Unduh Dokumen
                    </a>
                <?php else: ?>
                    <div style="color: #991b1b; font-size: 12px; font-weight: 600;">✗ Belum Diunggah</div>
                <?php endif; ?>
            </div>

            <!-- 2. SK Kepala Desa -->
            <div class="doc-card">
                <div class="doc-icon">📜</div>
                <div class="doc-title">2. SK Pengangkatan Kepala Desa</div>
                <?php if(isset($dokumens['sk_kepala_desa']) && $dokumens['sk_kepala_desa']): ?>
                    <div style="color: #166534; font-size: 12px; font-weight: 700;">✓ Tersedia</div>
                    <a href="<?php echo e(asset($dokumens['sk_kepala_desa']->path_file)); ?>" target="_blank" class="btn-action-primary" style="font-size: 12px; padding: 6px 12px;">
                        Buka / Unduh Dokumen
                    </a>
                <?php else: ?>
                    <div style="color: #991b1b; font-size: 12px; font-weight: 600;">✗ Belum Diunggah</div>
                <?php endif; ?>
            </div>

            <!-- 3. Surat Kuasa -->
            <div class="doc-card">
                <div class="doc-icon">📝</div>
                <div class="doc-title">3. Surat Kuasa Pembuat / Pengelola</div>
                <?php if(isset($dokumens['surat_kuasa']) && $dokumens['surat_kuasa']): ?>
                    <div style="color: #166534; font-size: 12px; font-weight: 700;">✓ Tersedia</div>
                    <a href="<?php echo e(asset($dokumens['surat_kuasa']->path_file)); ?>" target="_blank" class="btn-action-primary" style="font-size: 12px; padding: 6px 12px;">
                        Buka / Unduh Dokumen
                    </a>
                <?php else: ?>
                    <div style="color: #991b1b; font-size: 12px; font-weight: 600;">✗ Belum Diunggah</div>
                <?php endif; ?>
            </div>

            <!-- 4. Surat Penunjukan Admin -->
            <div class="doc-card">
                <div class="doc-icon">👤</div>
                <div class="doc-title">4. Surat Penunjukan Admin Website</div>
                <?php if(isset($dokumens['surat_penunjukan_admin']) && $dokumens['surat_penunjukan_admin']): ?>
                    <div style="color: #166534; font-size: 12px; font-weight: 700;">✓ Tersedia</div>
                    <a href="<?php echo e(asset($dokumens['surat_penunjukan_admin']->path_file)); ?>" target="_blank" class="btn-action-primary" style="font-size: 12px; padding: 6px 12px;">
                        Buka / Unduh Dokumen
                    </a>
                <?php else: ?>
                    <div style="color: #991b1b; font-size: 12px; font-weight: 600;">✗ Belum Diunggah</div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Update Status Form Card -->
    <div class="admin-card">
        <h2 style="font-size: 16px; font-weight: 700; color: #1e293b; margin-bottom: 16px;">Tautkan Data Desa & Pembaruan Status Pengajuan</h2>

        <form action="<?php echo e(route('admin.pengajuan.update', $pengajuan->id_pengajuan)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <!-- Field Dropdown Pilihan Desa -->
            <div style="margin-bottom: 20px;">
                <label for="id_desa" style="display: block; font-size: 13.5px; font-weight: 700; color: #1e293b; margin-bottom: 8px;">
                    Pilih Data Desa Pemohon
                </label>
                <select name="id_desa" id="id_desa" style="width: 100%; max-width: 520px; padding: 10px 14px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 14px; color: #0f172a; background-color: #ffffff; outline: none; cursor: pointer;">
                    <option value="">-- Belum Ditautkan / Pilih Desa --</option>
                    <?php $__currentLoopData = $desas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $desaItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($desaItem->id_desa); ?>" <?php echo e(old('id_desa', $pengajuan->id_desa) == $desaItem->id_desa ? 'selected' : ''); ?>>
                            Desa <?php echo e($desaItem->nama_desa); ?> (Kec. <?php echo e($desaItem->kecamatan); ?>) - Admin: <?php echo e($desaItem->nama_admin_website); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <p style="font-size: 12px; color: #64748b; margin-top: 6px;">Pilih data desa yang sesuai dengan dokumen yang diunggah untuk menghubungkan relasi data desa dengan pengajuan ini.</p>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 13.5px; font-weight: 700; color: #1e293b; margin-bottom: 8px;">Pilih Status Pengajuan</label>
                <div style="display: flex; gap: 20px;">
                    <label style="display: flex; align-items: center; gap: 8px; font-size: 14px; font-weight: 600; cursor: pointer;">
                        <input type="radio" name="status" value="Diproses" <?php echo e(old('status', $pengajuan->status) === 'Diproses' ? 'checked' : ''); ?> onchange="toggleFormFields()">
                        <span class="badge-status badge-diproses">Diproses</span>
                    </label>

                    <label style="display: flex; align-items: center; gap: 8px; font-size: 14px; font-weight: 600; cursor: pointer;">
                        <input type="radio" name="status" value="Revisi" <?php echo e(old('status', $pengajuan->status) === 'Revisi' ? 'checked' : ''); ?> onchange="toggleFormFields()">
                        <span class="badge-status badge-revisi">Revisi</span>
                    </label>

                    <label style="display: flex; align-items: center; gap: 8px; font-size: 14px; font-weight: 600; cursor: pointer;">
                        <input type="radio" name="status" value="Domain Berhasil" <?php echo e(old('status', $pengajuan->status) === 'Domain Berhasil' ? 'checked' : ''); ?> onchange="toggleFormFields()">
                        <span class="badge-status badge-berhasil">Domain Berhasil</span>
                    </label>
                </div>
            </div>

            <!-- Field Keterangan Revisi (hanya jika Revisi) -->
            <div id="revisiField" style="margin-bottom: 20px; display: <?php echo e(old('status', $pengajuan->status) === 'Revisi' ? 'block' : 'none'); ?>;">
                <label style="display: block; font-size: 13.5px; font-weight: 700; color: #1e293b; margin-bottom: 8px;">Catatan Keterangan Revisi <span style="color: #ef4444;">*</span></label>
                <textarea name="keterangan_revisi" 
                          rows="4" 
                          style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #cbd5e1; font-family: inherit; font-size: 14px;" 
                          placeholder="Jelaskan dokumen mana yang kurang atau perlu diperbaiki oleh pihak desa..."><?php echo e(old('keterangan_revisi', $pengajuan->keterangan_revisi)); ?></textarea>
            </div>

            <!-- Field Nama Domain (hanya jika Domain Berhasil) -->
            <div id="domainField" style="margin-bottom: 20px; display: <?php echo e(old('status', $pengajuan->status) === 'Domain Berhasil' ? 'block' : 'none'); ?>;">
                <label style="display: block; font-size: 13.5px; font-weight: 700; color: #1e293b; margin-bottom: 8px;">Nama Domain yang Terdaftar (contoh: ciburuy.desa.id)</label>
                <input type="text" 
                       name="nama_domain" 
                       value="<?php echo e(old('nama_domain', $pengajuan->desa->domain->nama_domain ?? (strtolower(str_replace(' ', '', $pengajuan->desa->nama_desa ?? '')) . '.desa.id'))); ?>" 
                       style="width: 100%; max-width: 400px; padding: 10px 14px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 14px;" 
                       placeholder="nama_desa.desa.id">
            </div>

            <button type="submit" class="btn-action-primary" style="padding: 10px 24px; font-size: 14px;">
                Simpan Perubahan
            </button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    function toggleFormFields() {
        const selectedStatus = document.querySelector('input[name="status"]:checked').value;
        const revisiField = document.getElementById('revisiField');
        const domainField = document.getElementById('domainField');

        revisiField.style.display = selectedStatus === 'Revisi' ? 'block' : 'none';
        domainField.style.display = selectedStatus === 'Domain Berhasil' ? 'block' : 'none';
    }
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\User\sideka-ng\resources\views/admin/pengajuan/show.blade.php ENDPATH**/ ?>