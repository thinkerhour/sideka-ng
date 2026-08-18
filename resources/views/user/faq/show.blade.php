@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <!-- HEADER / NAVIGATION (Shared Header) -->
    <header class="navbar">
        <div class="container navbar-container">
            <div class="brand">
                <a href="/" class="brand-link" style="display: flex; align-items: center; gap: 14px; text-decoration: none;">
                    <div class="brand-logo-placeholder">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="brand-text">
                        <span class="brand-title">DISKOMINFOTIK</span>
                        <span class="brand-subtitle">KABUPATEN BANDUNG BARAT</span>
                    </div>
                </a>
            </div>

            <nav class="nav-links">
                <a href="/#domain-terdaftar" class="nav-item">Daftar Domain</a>
                <a href="/#pengajuan" class="nav-item">Pengajuan</a>
                <a href="/#cek-status" class="nav-item">Cek Status</a>
                <a href="/#faq" class="nav-item nav-pill">
                    FAQ
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                        <line x1="12" y1="17" x2="12.01" y2="17"></line>
                    </svg>
                </a>
            </nav>
        </div>
    </header>

    <!-- FAQ DETAIL MAIN SECTION -->
    <main class="faq-detail-section">
        <div class="container">
            <div class="faq-detail-card">
                <div class="faq-detail-grid">
                    <!-- Left Column: FAQ Content -->
                    <div class="faq-detail-content">
                        <!-- FAQ Header Title & Circle Badge -->
                        <div class="faq-detail-header-title">
                            <span class="faq-serif-text">FAQ</span>
                            <span class="faq-question-circle">?</span>
                        </div>

                        <!-- Selected Question -->
                        <h2 class="faq-selected-title">
                            Di mana saya bisa mengunduh template Surat Kuasa?
                        </h2>

                        <!-- Answer Body -->
                        <div class="faq-selected-body">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eu elit eget tellus condimentum porttitor. Integer sollicitudin risus ac porta vehicula. Mauris consequat in ipsum eget maximus. Pellentesque sed mi eros. Donec non nisl vel quam rhoncus sollicitudin in at quam. Fusce posuere nulla ac erat hendrerit lobortis.
                            </p>
                        </div>

                        <!-- Accordion for Other Questions -->
                        <div class="faq-other-questions">
                            <div class="faq-accordion-row">
                                <button type="button" class="faq-accordion-btn">
                                    <span>Berapa lama estimasi proses kerja pengajuan domain?</span>
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M7 10l5 5 5-5z"/>
                                    </svg>
                                </button>
                                <div class="faq-accordion-panel">
                                    <p>Proses verifikasi dokumen oleh Admin Diskominfotik membutuhkan waktu 1-3 hari kerja sejak dokumen berhasil di-submit.</p>
                                </div>
                            </div>

                            <div class="faq-accordion-row">
                                <button type="button" class="faq-accordion-btn">
                                    <span>Berapa biaya pengajuan domain?</span>
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M7 10l5 5 5-5z"/>
                                    </svg>
                                </button>
                                <div class="faq-accordion-panel">
                                    <p>Layanan fasilitasi pengajuan domain .desa.id melalui Diskominfotik Kabupaten Bandung Barat sepenuhnya gratis tanpa dipungut biaya.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Back Button -->
                        <div class="faq-back-btn-row">
                            <a href="/#faq" class="btn-faq-back">
                                &lsaquo; Kembali
                            </a>
                        </div>
                    </div>

                    <!-- Right Column: Vector Illustration (Matching Image 1) -->
                    <div class="faq-detail-illustration-col">
                        <div class="vector-blob-wrapper">
                            <svg width="320" height="260" viewBox="0 0 320 260" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <!-- Background White Blob -->
                                <path d="M40 130C30 70 80 20 160 20C240 20 290 70 280 130C270 190 230 240 160 240C90 240 50 190 40 130Z" fill="#F1F5F9" opacity="0.95"/>
                                <!-- Person Left (User with Laptop) -->
                                <circle cx="110" cy="90" r="16" fill="#3B82F6"/>
                                <path d="M90 120 C90 105 130 105 130 120 L130 160 L90 160 Z" fill="#1E3A8A"/>
                                <rect x="80" y="130" width="40" height="24" rx="4" fill="#93C5FD" stroke="#1D4ED8" stroke-width="2"/>
                                <!-- Person Right (User with Tablet) -->
                                <circle cx="210" cy="85" r="16" fill="#60A5FA"/>
                                <path d="M190 115 C190 100 230 100 230 115 L230 160 L190 160 Z" fill="#1E40AF"/>
                                <rect x="200" y="120" width="36" height="28" rx="4" fill="#DBEAFE" stroke="#2563EB" stroke-width="2"/>
                                <!-- Floating Charts & Cubes -->
                                <rect x="40" y="110" width="30" height="20" rx="3" fill="#2563EB" opacity="0.8"/>
                                <polygon points="260,110 275,95 290,110 275,125" fill="#93C5FD"/>
                                <polygon points="250,160 265,145 280,160 265,175" fill="#3B82F6"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- FOOTER SIMPLE WIREFRAME -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2026 Diskominfotik Kabupaten Bandung Barat - Layanan SIDeKa-NG</p>
        </div>
    </footer>
</div>
@endsection
