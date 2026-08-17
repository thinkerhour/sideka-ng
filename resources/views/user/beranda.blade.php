@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <!-- HERO BACKGROUND OVERLAY -->
    <div class="hero-background"></div>

    <!-- HEADER / NAVIGATION -->
    <header class="navbar">
        <div class="container navbar-container">
            <div class="brand">
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
            </div>

            <nav class="nav-links">
                <a href="#daftar-domain" class="nav-item">Daftar Domain</a>
                <a href="#pengajuan" class="nav-item" id="nav-pengajuan">Pengajuan</a>
                <a href="#cek-status" class="nav-item">Cek Status</a>
                <a href="#faq" class="nav-item nav-pill">
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

    <!-- HERO SECTION -->
    <main class="hero-section">
        <div class="container hero-container">
            <div class="hero-content">
                <h1 class="hero-title">
                    Pengajuan Sistem Informasi Desa<br>dan Kawasan <em>New Generation</em>
                </h1>
                <p class="hero-subtitle">
                    Ajukan permohonan layanan dan pantau proses pengajuan website desa melalui layanan SIDeKa-NG.
                </p>
                <div class="hero-cta">
                    <button class="btn btn-primary" id="btn-ajukan-sideka">
                        Ajukan SIDeKa-NG &rarr;
                    </button>
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

<!-- ================================================== -->
<!-- MODAL 1: INFORMASI PERSYARATAN -->
<!-- ================================================== -->
<div class="modal-backdrop" id="modal-persyaratan">
    <div class="modal-card">
        <!-- Modal Header -->
        <div class="modal-header">
            <div class="modal-title-group">
                <div class="modal-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10 9 9 9 8 9"></polyline>
                    </svg>
                </div>
                <h2>Pengajuan SIDeKa-NG Domain .desa.id</h2>
            </div>
            <button class="modal-close-btn" data-close-modal>&times;</button>
        </div>

        <!-- Modal Body -->
        <div class="modal-body">
            <div class="alert-box">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
                <span>Pastikan seluruh berkas telah disiapkan dan diisi sesuai dengan dokumen resmi yang diperlukan.</span>
            </div>

            <div class="section-subtitle">
                <h3>Berkas dan Syarat yang Wajib Disiapkan <span class="info-icon">&#9432;</span></h3>
            </div>

            <div class="requirements-grid">
                <div class="req-item">
                    <span class="req-num">1.</span>
                    <span class="req-text">Surat Permohonan Fasilitasi Domain desa.id</span>
                </div>
                <div class="req-item">
                    <span class="req-num">3.</span>
                    <span class="req-text">Surat Keputusan Pengangkatan Kepala Desa</span>
                </div>
                <div class="req-item req-with-download">
                    <div class="req-text-wrap">
                        <span class="req-num">2.</span>
                        <span class="req-text">Surat Kuasa</span>
                    </div>
                    <a href="#download-template" class="btn btn-download-template" id="btn-download-template">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" y1="15" x2="12" y2="3"></line>
                        </svg>
                        Unduh Template Surat Kuasa
                    </a>
                </div>
                <div class="req-item">
                    <span class="req-num">4.</span>
                    <span class="req-text">Surat Penunjukan Admin Website desa.id</span>
                </div>
            </div>
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer">
            <button class="btn btn-secondary-action" id="btn-next-to-form">
                SELANJUTNYA
            </button>
        </div>
    </div>
</div>

<!-- ================================================== -->
<!-- MODAL 2: FORM PENGAJUAN (4 UPLOAD FIELDS ONLY) -->
<!-- ================================================== -->
<div class="modal-backdrop" id="modal-form">
    <div class="modal-card modal-card-large">
        <!-- Modal Header -->
        <div class="modal-header">
            <div class="modal-title-group">
                <div class="modal-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="12" y1="18" x2="12" y2="12"></line>
                        <line x1="9" y1="15" x2="15" y2="15"></line>
                    </svg>
                </div>
                <h2>Pengajuan SIDeKa-NG Domain .desa.id</h2>
            </div>
            <button class="modal-close-btn" data-close-modal>&times;</button>
        </div>

        <!-- Modal Body -->
        <div class="modal-body">
            <div class="alert-box">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
                <span>Silakan unggah seluruh dokumen persyaratan yang telah disiapkan.</span>
            </div>

            <!-- Form Upload Grid (2 Column Desktop, 1 Column Mobile) -->
            <form id="form-upload-berkas" onsubmit="return false;">
                <div class="upload-grid">
                    <!-- Field 1 -->
                    <div class="upload-field-card">
                        <label class="upload-label" for="file-surat-permohonan">
                            1. Surat Permohonan Fasilitasi Domain desa.id
                        </label>
                        <div class="file-input-wrapper">
                            <input type="file" id="file-surat-permohonan" accept=".pdf,.doc,.docx" class="file-input">
                            <div class="file-input-custom">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                    <polyline points="17 8 12 3 7 8"></polyline>
                                    <line x1="12" y1="3" x2="12" y2="15"></line>
                                </svg>
                                <span class="file-name-display">Pilih file atau drag ke sini</span>
                            </div>
                        </div>
                    </div>

                    <!-- Field 2 -->
                    <div class="upload-field-card">
                        <label class="upload-label" for="file-sk-kades">
                            2. Surat Keputusan Pengangkatan Kepala Desa
                        </label>
                        <div class="file-input-wrapper">
                            <input type="file" id="file-sk-kades" accept=".pdf,.doc,.docx" class="file-input">
                            <div class="file-input-custom">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                    <polyline points="17 8 12 3 7 8"></polyline>
                                    <line x1="12" y1="3" x2="12" y2="15"></line>
                                </svg>
                                <span class="file-name-display">Pilih file atau drag ke sini</span>
                            </div>
                        </div>
                    </div>

                    <!-- Field 3 -->
                    <div class="upload-field-card">
                        <label class="upload-label" for="file-surat-kuasa">
                            3. Surat Kuasa
                        </label>
                        <div class="file-input-wrapper">
                            <input type="file" id="file-surat-kuasa" accept=".pdf,.doc,.docx" class="file-input">
                            <div class="file-input-custom">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                    <polyline points="17 8 12 3 7 8"></polyline>
                                    <line x1="12" y1="3" x2="12" y2="15"></line>
                                </svg>
                                <span class="file-name-display">Pilih file atau drag ke sini</span>
                            </div>
                        </div>
                    </div>

                    <!-- Field 4 -->
                    <div class="upload-field-card">
                        <label class="upload-label" for="file-surat-admin">
                            4. Surat Penunjukan Admin Website desa.id
                        </label>
                        <div class="file-input-wrapper">
                            <input type="file" id="file-surat-admin" accept=".pdf,.doc,.docx" class="file-input">
                            <div class="file-input-custom">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                    <polyline points="17 8 12 3 7 8"></polyline>
                                    <line x1="12" y1="3" x2="12" y2="15"></line>
                                </svg>
                                <span class="file-name-display">Pilih file atau drag ke sini</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="format-note">
                    Format file yang diperbolehkan: <strong>PDF, DOC, DOCX</strong>
                </div>
            </form>
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer">
            <button class="btn btn-primary" id="btn-submit-form">
                SUBMIT
            </button>
        </div>
    </div>
</div>

<!-- ================================================== -->
<!-- MODAL 3: KONFIRMASI BERHASIL SUBMIT -->
<!-- ================================================== -->
<div class="modal-backdrop" id="modal-konfirmasi">
    <div class="modal-card modal-card-small">
        <!-- Modal Header -->
        <div class="modal-header modal-header-clean">
            <div></div>
            <button class="modal-close-btn" data-close-modal>&times;</button>
        </div>

        <!-- Modal Body -->
        <div class="modal-body modal-body-centered">
            <div class="success-icon">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2.5">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
            </div>
            <h2 class="confirmation-title">Berkas Berhasil Di-submit</h2>
            <p class="confirmation-desc">
                Berkas pengajuan Anda berhasil dikirim dan akan diproses oleh Admin.
            </p>
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer modal-footer-centered">
            <button class="btn btn-primary btn-full-width" id="btn-ok-konfirmasi">
                OK
            </button>
        </div>
    </div>
</div>
@endsection
