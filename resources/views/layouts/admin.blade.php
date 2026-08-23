<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Admin') - SIDeKa-NG</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Admin Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @stack('styles')
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
            <a href="{{ route('admin.dashboard') }}" class="sidebar-nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
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
            <a href="{{ route('admin.pengajuan.index') }}" class="sidebar-nav-item {{ request()->routeIs('admin.pengajuan.*') ? 'active' : '' }}">
                <span class="sidebar-nav-icon">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </span>
                <span>Data Pengajuan</span>
            </a>

            <!-- 3. Daftar Domain -->
            <a href="{{ route('admin.domain.index') }}" class="sidebar-nav-item {{ request()->routeIs('admin.domain.*') ? 'active' : '' }}">
                <span class="sidebar-nav-icon">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                    </svg>
                </span>
                <span>Daftar Domain</span>
            </a>

            <!-- 4. Data Desa -->
            <a href="{{ route('admin.desa.index') }}" class="sidebar-nav-item {{ request()->routeIs('admin.desa.*') ? 'active' : '' }}">
                <span class="sidebar-nav-icon">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5m3 0h1m-1-4h.01M9 16h.01M9 12h.01M9 8h.01M15 16h.01M15 12h.01M15 8h.01"/>
                    </svg>
                </span>
                <span>Data Desa</span>
            </a>

            <!-- 5. Grafik Pengajuan -->
            <a href="{{ route('admin.grafik') }}" class="sidebar-nav-item {{ request()->routeIs('admin.grafik') ? 'active' : '' }}">
                <span class="sidebar-nav-icon">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/>
                    </svg>
                </span>
                <span>Grafik Pengajuan</span>
            </a>
        </nav>

        <!-- Sidebar Footer / Logout -->
        <div class="sidebar-footer">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-sidebar-logout">
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- ================= MAIN CONTENT AREA ================= -->
    <div class="admin-main">
        <!-- Top Header Bar -->
        <header class="admin-header">
            <div class="header-left-group">
                <!-- Notification Bell Button -->
                <button class="btn-header-notif" title="Notifikasi">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                </button>

                <!-- Date Badge -->
                <div class="header-date-badge">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <rect x="3" y="4" width="18" height="18" rx="2" stroke-width="2"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 2v4M8 2v4M3 10h18"/>
                    </svg>
                    <span>{{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</span>
                </div>

                <!-- Search Bar -->
                <div class="header-search-bar">
                    <svg class="header-search-icon" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text" class="header-search-input" placeholder="Cari data...">
                </div>
            </div>

            <!-- Profile Info -->
            <div class="header-profile-group">
                <div class="header-profile-text">
                    <div class="header-profile-name">{{ Auth::user()->name ?? 'Administrator' }}</div>
                    <div class="header-profile-role">Kabupaten Bandung Barat</div>
                </div>
                <div class="header-avatar">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
            </div>
        </header>

        <!-- Flash Messages -->
        <div style="padding: 24px 32px 0 32px;">
            @if(session('success'))
                <div style="background: #f0fdf4; border: 1px solid #bbf7d0; color: #166534; padding: 12px 20px; border-radius: 10px; font-size: 14px; font-weight: 600; margin-bottom: 0;">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div style="background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; padding: 12px 20px; border-radius: 10px; font-size: 14px; font-weight: 600; margin-bottom: 0;">
                    {{ session('error') }}
                </div>
            @endif
        </div>

        <!-- Main View Area -->
        <main class="admin-content">
            @yield('content')
        </main>
    </div>
</div>

@stack('scripts')
</body>
</html>
