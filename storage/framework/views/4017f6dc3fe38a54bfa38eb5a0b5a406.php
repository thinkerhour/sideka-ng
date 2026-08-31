<?php $__env->startSection('title', 'Daftar Domain Terdaftar'); ?>

<?php $__env->startSection('content'); ?>
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
        <div>
            <h1 style="font-size: 24px; font-weight: 800; color: #0f172a;">Daftar Domain Desa.id Terdaftar</h1>
            <p style="font-size: 14px; color: #64748b;">Kelola informasi domain aktif dan tanggal kadaluarsa domain desa di Kabupaten Bandung Barat.</p>
        </div>

        <button onclick="document.getElementById('addDomainModal').style.display='flex'" class="btn-action-primary">
            + Tambah / Input Info Domain
        </button>
    </div>

    <!-- Filter & Search Section -->
    <div class="admin-card">
        <form action="<?php echo e(route('admin.domain.index')); ?>" method="GET" style="display: flex; gap: 16px; align-items: center;">
            <input type="text" 
                   name="search" 
                   value="<?php echo e($search); ?>" 
                   placeholder="Cari domain atau nama desa..." 
                   style="flex: 1; max-width: 400px; padding: 10px 16px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 14px; outline: none;">
            <button type="submit" class="btn-action-primary">Cari Domain</button>
            <?php if($search): ?>
                <a href="<?php echo e(route('admin.domain.index')); ?>" class="btn-action-secondary">Reset</a>
            <?php endif; ?>
        </form>
    </div>

    <!-- Table of Domains -->
    <div class="admin-card">
        <?php if($domains->isEmpty()): ?>
            <div style="text-align: center; padding: 48px; color: #94a3b8;">
                <svg width="48" height="48" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-bottom: 12px; opacity: 0.5;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                </svg>
                <p style="font-size: 16px; font-weight: 700; color: #475569;">Belum ada data domain terdaftar</p>
                <p style="font-size: 13.5px;">Gunakan tombol di atas atau ubah status pengajuan menjadi "Domain Berhasil" untuk merekam domain baru.</p>
            </div>
        <?php else: ?>
            <div style="overflow-x: auto;">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Nama Desa</th>
                            <th>Kecamatan</th>
                            <th>Nama Domain</th>
                            <th>Tanggal Aktif</th>
                            <th>Tanggal Kadaluarsa</th>
                            <th>Status Domain</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $domains; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $domain): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($domains->firstItem() + $index); ?></td>
                                <td><strong><?php echo e($domain->desa->nama_desa ?? '-'); ?></strong></td>
                                <td><?php echo e($domain->desa->kecamatan ?? '-'); ?></td>
                                <td>
                                    <a href="https://<?php echo e($domain->nama_domain); ?>" target="_blank" style="color: #2563eb; font-weight: 600; text-decoration: none; font-style: italic;">
                                        https://<?php echo e($domain->nama_domain); ?>

                                    </a>
                                </td>
                                <td><?php echo e($domain->tanggal_aktif ? \Carbon\Carbon::parse($domain->tanggal_aktif)->translatedFormat('d M Y') : '-'); ?></td>
                                <td><?php echo e($domain->tanggal_kadaluarsa ? \Carbon\Carbon::parse($domain->tanggal_kadaluarsa)->translatedFormat('d M Y') : '-'); ?></td>
                                <td>
                                    <?php if($domain->tanggal_kadaluarsa && \Carbon\Carbon::parse($domain->tanggal_kadaluarsa)->isPast()): ?>
                                        <span class="badge-status badge-revisi">Kadaluarsa</span>
                                    <?php else: ?>
                                        <span class="badge-status badge-berhasil">Aktif</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="pagination-wrapper">
                <?php echo e($domains->appends(request()->query())->links()); ?>

            </div>
        <?php endif; ?>
    </div>

    <!-- Modal Input Domain -->
    <div id="addDomainModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 999; align-items: center; justify-content: center;">
        <div style="background: #ffffff; width: 100%; max-width: 500px; padding: 28px; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h3 style="font-size: 18px; font-weight: 800; color: #0f172a;">Input / Update Domain Desa</h3>
                <button onclick="document.getElementById('addDomainModal').style.display='none'" style="background: none; border: none; font-size: 20px; cursor: pointer;">&times;</button>
            </div>

            <form action="<?php echo e(route('admin.domain.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div style="margin-bottom: 16px;">
                    <label style="display: block; font-size: 13px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Pilih Desa</label>
                    <select name="id_desa" required style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 14px;">
                        <option value="">-- Pilih Desa --</option>
                        <?php $__currentLoopData = \App\Models\Desa::orderBy('nama_desa')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $desa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($desa->id_desa); ?>"><?php echo e($desa->nama_desa); ?> (Kec. <?php echo e($desa->kecamatan); ?>)</option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div style="margin-bottom: 16px;">
                    <label style="display: block; font-size: 13px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Nama Domain (desa.id)</label>
                    <input type="text" name="nama_domain" placeholder="contoh: ciburuy.desa.id" required style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 14px;">
                </div>

                <div style="margin-bottom: 16px;">
                    <label style="display: block; font-size: 13px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Tanggal Aktif</label>
                    <input type="date" name="tanggal_aktif" value="<?php echo e(date('Y-m-d')); ?>" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 14px;">
                </div>

                <div style="margin-bottom: 24px;">
                    <label style="display: block; font-size: 13px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Tanggal Kadaluarsa</label>
                    <input type="date" name="tanggal_kadaluarsa" value="<?php echo e(date('Y-m-d', strtotime('+1 year'))); ?>" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 14px;">
                </div>

                <div style="display: flex; justify-content: flex-end; gap: 10px;">
                    <button type="button" onclick="document.getElementById('addDomainModal').style.display='none'" class="btn-action-secondary">Batal</button>
                    <button type="submit" class="btn-action-primary">Simpan Domain</button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\User\sideka-ng\resources\views/admin/domain/index.blade.php ENDPATH**/ ?>