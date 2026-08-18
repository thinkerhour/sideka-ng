@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <!-- HEADER / NAVIGATION (Shared Header) -->
    <header class="navbar">
        <div class="container navbar-container">
            <div class="brand">
                <a href="/" class="brand-link" style="display: flex; align-items: center; gap: 12px; text-decoration: none;">
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
                    <!-- Left Content -->
                    <div class="faq-detail-content">
                        <!-- FAQ Header Icon -->
                        <div class="faq-detail-header">
                            <h1 class="faq-detail-title">
                                FAQ
                                <span class="faq-question-badge">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                                        <line x1="12" y1="17" x2="12.01" y2="17"></line>
                                    </svg>
                                </span>
                            </h1>
                        </div>

                        <!-- Selected Question Title -->
                        <h2 class="selected-question-title">
                            Di mana saya bisa mengunduh template Surat Kuasa?
                        </h2>

                        <!-- Answer Content -->
                        <div class="selected-answer-body">
                            <p>
                                Template Surat Kuasa dapat diunduh langsung melalui pop-up informasi persyaratan saat Anda menekan tombol <strong>"Ajukan SIDeKa-NG"</strong> pada beranda utama, atau dengan mengeklik link <a href="#download-template" style="color: #60a5fa; text-decoration: underline;">Unduh Template Surat Kuasa</a>.
                            </p>
                            <p style="margin-top: 12px; color: #94a3b8; font-size: 13px;">
                                Dokumen tersebut wajib diisi dan ditandatangani oleh Kepala Desa sebelum diunggah kembali ke sistem dalam format PDF, DOC, atau DOCX.
                            </p>
                        </div>

                        <!-- Accordion for Other Questions -->
                        <div class="other-questions-container">
                            <h4 class="other-questions-heading">Pertanyaan lainnya:</h4>
                            
                            <div class="accordion-item">
                                <button class="accordion-trigger" type="button">
                                    <span>Berapa lama estimasi proses kerja pengajuan domain?</span>
                                    <svg class="accordion-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </button>
                                <div class="accordion-content">
                                    <p>Proses verifikasi dokumen oleh Admin Diskominfotik membutuhkan waktu 1-3 hari kerja sejak dokumen berhasil di-submit.</p>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <button class="accordion-trigger" type="button">
                                    <span>Berapa biaya pengajuan domain?</span>
                                    <svg class="accordion-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </button>
                                <div class="accordion-content">
                                    <p>Layanan fasilitasi pengajuan domain .desa.id melalui Diskominfotik Kabupaten Bandung Barat sepenuhnya gratis tanpa dipungut biaya.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Back Button -->
                        <div class="faq-back-wrapper">
                            <a href="/#faq" class="btn btn-back">
                                &lsaquo; Kembali
                            </a>
                        </div>
                    </div>

                    <!-- Right Illustration Graphic -->
                    <div class="faq-detail-illustration">
                        <div class="illustration-placeholder">
                            <svg width="240" height="240" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="1">
                                <rect x="3" y="3" width="18" height="18" rx="2" stroke-dasharray="4 4"/>
                                <path d="M12 8v8M8 12h8" stroke-width="1.5"/>
                                <circle cx="12" cy="12" r="6" stroke-width="1.5"/>
                            </svg>
                            <span class="illustration-caption">Ilustrasi FAQ & Informasi</span>
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
