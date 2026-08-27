<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Dashboard Admin'); ?> - SIDeKa-NG</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Admin Custom CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>?v=<?php echo e(time()); ?>">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>

<div class="admin-wrapper">
    <!-- ================= SIDEBAR ================= -->
    <aside class="admin-sidebar">
        <!-- SVG Polygon Pattern Background Overlay -->
        <svg class="sidebar-polygon-bg" viewBox="0 0 250 800" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
            <polygon points="0,0 250,0 120,150 0,200" fill="#ffffff" fill-opacity="0.08"/>
            <polygon points="120,150 250,0 250,300 100,350" fill="#ffffff" fill-opacity="0.05"/>
            <polygon points="0,200 120,150 100,350 0,450" fill="#ffffff" fill-opacity="0.1"/>
            <polygon points="100,350 250,300 250,550 140,580" fill="#ffffff" fill-opacity="0.06"/>
            <polygon points="0,450 100,350 140,580 0,700" fill="#ffffff" fill-opacity="0.08"/>
            <polygon points="140,580 250,550 250,800 0,800" fill="#ffffff" fill-opacity="0.05"/>
        </svg>

        <!-- Sidebar Header / Brand -->
        <div class="sidebar-header">
            <svg class="sidebar-logo-icon" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="20" cy="20" r="19" fill="#4f46e5" stroke="#ffffff" stroke-width="2"/>
                <path d="M12 22 C12 15 17 11 24 12 C28 12.5 30 15 29 19 C28 23 23 24 19 22.5 C16 21.5 14 24 16 27 C18 30 24 29 27 26" stroke="#ffffff" stroke-width="3" stroke-linecap="round" fill="none"/>
                <circle cx="20" cy="19" r="3" fill="#38bdf8"/>
            </svg>
            <div class="sidebar-brand-text">
                <span class="sidebar-brand-title">Dashboard Admin</span>
                <span class="sidebar-brand-name">SIDEKA-NG</span>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="sidebar-nav">
            <!-- 1. Dashboard -->
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="sidebar-nav-item <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
                <span class="sidebar-nav-icon">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <rect x="3" y="3" width="7" height="7" rx="1.5" stroke-width="2"/>
                        <rect x="14" y="3" width="7" height="7" rx="1.5" stroke-width="2"/>
                        <rect x="14" y="14" width="7" height="7" rx="1.5" stroke-width="2"/>
                        <rect x="3" y="14" width="7" height="7" rx="1.5" stroke-width="2"/>
                    </svg>
                </span>
                <span>Dashboard</span>
            </a>

            <!-- 2. Data Pengajuan -->
            <a href="<?php echo e(route('admin.pengajuan.index')); ?>" class="sidebar-nav-item <?php echo e(request()->routeIs('admin.pengajuan.*') ? 'active' : ''); ?>">
                <span class="sidebar-nav-icon">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </span>
                <span>Data Pengajuan</span>
            </a>

            <!-- 3. Daftar Domain -->
            <a href="<?php echo e(route('admin.domain.index')); ?>" class="sidebar-nav-item <?php echo e(request()->routeIs('admin.domain.*') ? 'active' : ''); ?>">
                <span class="sidebar-nav-icon">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                    </svg>
                </span>
                <span>Daftar Domain</span>
            </a>

            <!-- 4. Data Desa -->
            <a href="<?php echo e(route('admin.desa.index')); ?>" class="sidebar-nav-item <?php echo e(request()->routeIs('admin.desa.*') ? 'active' : ''); ?>">
                <span class="sidebar-nav-icon">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5m3 0h1m-1-4h.01M9 16h.01M9 12h.01M9 8h.01M15 16h.01M15 12h.01M15 8h.01"/>
                    </svg>
                </span>
                <span>Data Desa</span>
            </a>

            <!-- 5. Grafik Pengajuan -->
            <a href="<?php echo e(route('admin.grafik')); ?>" class="sidebar-nav-item <?php echo e(request()->routeIs('admin.grafik') ? 'active' : ''); ?>">
                <span class="sidebar-nav-icon">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/>
                    </svg>
                </span>
                <span>Grafik Pengajuan</span>
            </a>
        </nav>

        <!-- Sidebar Footer / Logout -->
        <div class="sidebar-footer" style="display: flex; justify-content: center; align-items: center; padding: 24px 20px; width: 100%;">
            <form action="<?php echo e(route('admin.logout')); ?>" method="POST" style="margin: 0; width: 100%; display: flex; justify-content: center;">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn-sidebar-logout" style="margin: 0 auto;">
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- ================= MAIN CONTENT AREA ================= -->
    <div class="admin-main">
        <!-- Top Header Bar -->
        <?php
            $pendingCount = \App\Models\Pengajuan::where('status', 'Diproses')->count();
        ?>
        <header class="admin-header">
            <div class="header-left-group">
                <!-- Notification Button (Clickable -> Center Screen Modal) -->
                <button class="btn-header-notif" id="btn-trigger-admin-notif" title="Notifikasi Pengajuan Baru" type="button">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                    <?php if($pendingCount > 0): ?>
                        <span class="notif-badge-dot" title="<?php echo e($pendingCount); ?> data pengajuan baru"></span>
                    <?php endif; ?>
                </button>

                <!-- Real-time Date Badge -->
                <div class="header-date-badge" id="header-realtime-date" style="display: inline-flex; align-items: center; gap: 10px; background: #ffffff; color: #1e293b; padding: 8px 18px; border-radius: 8px; font-size: 13.5px; font-weight: 700; white-space: nowrap; flex-shrink: 0; box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1); height: 42px;">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: #475569;">
                        <rect x="3" y="4" width="18" height="18" rx="2" stroke-width="2"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 2v4M8 2v4M3 10h18"/>
                    </svg>
                    <span id="date-display-text"><?php echo e(\Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY')); ?></span>
                </div>

                <!-- Header Search Bar (Hanya tampil di 3 modul: Data Pengajuan, Daftar Domain, Data Desa) -->
                <?php if(request()->routeIs('admin.pengajuan.*') || request()->routeIs('admin.domain.*') || request()->routeIs('admin.desa.*') || request()->is('admin/pengajuan*') || request()->is('admin/domain*') || request()->is('admin/desa*')): ?>
                    <div class="header-search-bar" style="position: relative; width: 320px; flex-shrink: 0;">
                        <svg class="header-search-icon" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <input type="text" id="admin-global-search" class="header-search-input" placeholder="Cari data..." autocomplete="off">
                        <div id="admin-search-preview" class="header-search-preview-box" style="display: none;"></div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Profile Info with Clickable Dropdown -->
            <div class="profile-dropdown-wrapper" id="profile-dropdown-wrapper" style="position: relative; cursor: pointer; user-select: none;">
                <div class="header-profile-group" style="display: flex; align-items: center; gap: 12px; padding: 4px 8px; border-radius: 8px;">
                    <div class="header-profile-text" style="text-align: right;">
                        <div class="header-profile-name" style="font-size: 14px; font-weight: 700; color: #ffffff; line-height: 1.2; white-space: nowrap;"><?php echo e(Auth::user()->name ?? 'Administrator'); ?></div>
                        <div class="header-profile-role" style="font-size: 11.5px; color: #cbd5e1; white-space: nowrap;">Kabupaten Bandung Barat</div>
                    </div>
                    <div class="header-avatar" style="width: 42px; height: 42px; border-radius: 50%; background: #cbd5e1; display: flex; align-items: center; justify-content: center; color: #475569;">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: #cbd5e1;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </div>

                <!-- Dropdown Menu (Hidden by default, shown on click) -->
                <div class="profile-dropdown-menu" id="profile-dropdown-menu" style="display: none; position: absolute; top: calc(100% + 10px); right: 0; min-width: 220px; background: #ffffff; border-radius: 12px; box-shadow: 0 12px 30px rgba(0, 0, 0, 0.25); padding: 14px; z-index: 99999; border: 1px solid #e2e8f0; color: #1e293b;">
                    <div style="padding-bottom: 10px; border-bottom: 1px solid #f1f5f9; margin-bottom: 10px;">
                        <div style="font-size: 13.5px; font-weight: 800; color: #0f172a;"><?php echo e(Auth::user()->name ?? 'Administrator'); ?></div>
                        <div style="font-size: 11.5px; color: #64748b; margin-top: 2px;"><?php echo e(Auth::user()->email ?? 'admin@sideka.go.id'); ?></div>
                    </div>
                    <form action="<?php echo e(route('admin.logout')); ?>" method="POST" style="margin: 0;">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn-dropdown-logout" style="width: 100%; display: flex; align-items: center; justify-content: center; gap: 8px; padding: 10px 16px; background: #fef2f2; color: #ef4444; border: 1px solid #fecaca; border-radius: 8px; font-family: inherit; font-size: 13px; font-weight: 700; cursor: pointer; transition: all 0.2s ease;">
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Flash Messages -->
        <div style="padding: 24px 32px 0 32px;">
            <?php if(session('success')): ?>
                <div style="background: #f0fdf4; border: 1px solid #bbf7d0; color: #166534; padding: 12px 20px; border-radius: 10px; font-size: 14px; font-weight: 600; margin-bottom: 0;">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>
            <?php if(session('error')): ?>
                <div style="background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; padding: 12px 20px; border-radius: 10px; font-size: 14px; font-weight: 600; margin-bottom: 0;">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>
        </div>

        <!-- Main View Area -->
        <main class="admin-content">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</div>

<!-- ================= CENTER SCREEN NOTIFICATION MODAL ================= -->
<div class="modal-admin-backdrop" id="modal-admin-notif" style="display: none; position: fixed; inset: 0; background: rgba(15, 23, 42, 0.65); backdrop-filter: blur(4px); z-index: 999999; align-items: center; justify-content: center; padding: 20px;">
    <div class="modal-admin-card" style="background: #ffffff; width: 440px; max-width: 90%; border-radius: 16px; padding: 28px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); position: relative; color: #1e293b;">
        <div class="modal-admin-header" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
            <h3 class="modal-admin-title" style="font-size: 18px; font-weight: 800; color: #0f172a; margin: 0;">Notifikasi Pengajuan</h3>
            <button type="button" class="modal-admin-close" id="btn-close-admin-notif" style="background: none; border: none; font-size: 24px; line-height: 1; color: #64748b; cursor: pointer; padding: 4px;">&times;</button>
        </div>
        <div class="modal-admin-body" style="font-size: 14px; color: #475569; line-height: 1.6; margin-bottom: 24px;">
            <?php if($pendingCount > 0): ?>
                Terdapat <strong style="color: #0f172a;"><?php echo e($pendingCount); ?> pengajuan domain baru</strong> yang perlu diverifikasi oleh Tim Diskominfo.
            <?php else: ?>
                Tidak ada pengajuan domain baru saat ini. Semua permohonan telah ditinjau.
            <?php endif; ?>
        </div>
        <div class="modal-admin-footer" style="display: flex; justify-content: flex-end;">
            <?php if($pendingCount > 0): ?>
                <a href="<?php echo e(route('admin.pengajuan.index', ['status' => 'Diproses'])); ?>" class="btn-action-primary" style="display: inline-flex; align-items: center; justify-content: center; gap: 8px; width: 100%; text-decoration: none; padding: 12px 20px; background: #2563eb; color: #ffffff; border-radius: 8px; font-weight: 700; font-size: 14px;">
                    Lihat Data Pengajuan &rarr;
                </a>
            <?php else: ?>
                <button type="button" class="btn-action-secondary" id="btn-dismiss-admin-notif" style="width: 100%; padding: 10px 20px; background: #f1f5f9; color: #475569; border: 1px solid #cbd5e1; border-radius: 8px; font-weight: 700; cursor: pointer;">Tutup</button>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    // 1. Real-time Indonesian Date Update
    function updateRealtimeDate() {
        const now = new Date();
        const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        const dayName = days[now.getDay()];
        const day = now.getDate();
        const monthName = months[now.getMonth()];
        const year = now.getFullYear();
        const formattedDate = `${dayName}, ${day} ${monthName} ${year}`;
        const el = document.getElementById('date-display-text');
        if (el) el.textContent = formattedDate;
    }

    document.addEventListener("DOMContentLoaded", function() {
        updateRealtimeDate();
        setInterval(updateRealtimeDate, 60000);

        // 2. Notification Center Screen Modal Open/Close Logic
        const btnTriggerNotif = document.getElementById('btn-trigger-admin-notif');
        const modalAdminNotif = document.getElementById('modal-admin-notif');
        const btnCloseNotif = document.getElementById('btn-close-admin-notif');
        const btnDismissNotif = document.getElementById('btn-dismiss-admin-notif');

        if (btnTriggerNotif && modalAdminNotif) {
            btnTriggerNotif.addEventListener('click', function(e) {
                e.stopPropagation();
                modalAdminNotif.style.display = 'flex';
            });
        }

        if (btnCloseNotif && modalAdminNotif) {
            btnCloseNotif.addEventListener('click', function(e) {
                e.stopPropagation();
                modalAdminNotif.style.display = 'none';
            });
        }

        if (btnDismissNotif && modalAdminNotif) {
            btnDismissNotif.addEventListener('click', function(e) {
                e.stopPropagation();
                modalAdminNotif.style.display = 'none';
            });
        }

        if (modalAdminNotif) {
            modalAdminNotif.addEventListener('click', function(e) {
                if (e.target === modalAdminNotif) {
                    modalAdminNotif.style.display = 'none';
                }
            });
        }

        // 3. Profile Clickable Dropdown Toggle
        const profileTrigger = document.getElementById('profile-dropdown-wrapper');
        const profileMenu = document.getElementById('profile-dropdown-menu');

        if (profileTrigger && profileMenu) {
            profileTrigger.addEventListener('click', function(e) {
                e.stopPropagation();
                if (profileMenu.style.display === 'none' || profileMenu.style.display === '') {
                    profileMenu.style.display = 'block';
                } else {
                    profileMenu.style.display = 'none';
                }
            });

            document.addEventListener('click', function(e) {
                if (!profileTrigger.contains(e.target)) {
                    profileMenu.style.display = 'none';
                }
            });
        }

        // 4. Admin Header Search Autocomplete Logic
        const adminSearchInput = document.getElementById('admin-global-search');
        const adminSearchPreview = document.getElementById('admin-search-preview');
        let adminSearchTimer = null;

        if (adminSearchInput && adminSearchPreview) {
            adminSearchInput.addEventListener('input', function() {
                clearTimeout(adminSearchTimer);
                const q = adminSearchInput.value.trim();
                if (!q) {
                    adminSearchPreview.style.display = 'none';
                    adminSearchPreview.innerHTML = '';
                    return;
                }
                adminSearchTimer = setTimeout(function() {
                    fetch('<?php echo e(route("admin.search-preview")); ?>?q=' + encodeURIComponent(q))
                        .then(res => res.json())
                        .then(data => {
                            if (!data || data.length === 0) {
                                adminSearchPreview.innerHTML = '<div style="padding: 12px 16px; font-size: 12.5px; color: #94a3b8; text-align: center;">Tidak ada data ditemukan</div>';
                                adminSearchPreview.style.display = 'block';
                                return;
                            }
                            let html = '';
                            data.forEach(item => {
                                let badge = '';
                                if (item.status === 'Diproses') {
                                    badge = '<span class="badge-status badge-diproses" style="font-size: 10px; padding: 2px 6px;">Diproses</span>';
                                } else if (item.status === 'Revisi') {
                                    badge = '<span class="badge-status badge-revisi" style="font-size: 10px; padding: 2px 6px;">Revisi</span>';
                                } else if (item.status === 'Domain Berhasil') {
                                    badge = '<span class="badge-status badge-berhasil" style="font-size: 10px; padding: 2px 6px;">Berhasil</span>';
                                }
                                html += `
                                    <a href="${item.url}" class="search-preview-item">
                                        <div>
                                            <div class="search-preview-title">${item.title}</div>
                                            <div class="search-preview-sub">${item.subtitle}</div>
                                        </div>
                                        ${badge}
                                    </a>
                                `;
                            });
                            adminSearchPreview.innerHTML = html;
                            adminSearchPreview.style.display = 'block';
                        })
                        .catch(err => console.error('Admin search preview error:', err));
                }, 200);
            });

            document.addEventListener('click', function(e) {
                if (!adminSearchInput.contains(e.target) && !adminSearchPreview.contains(e.target)) {
                    adminSearchPreview.style.display = 'none';
                }
            });
        }
    });
</script>

<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\Users\User\sideka-ng\resources\views/layouts/admin.blade.php ENDPATH**/ ?>