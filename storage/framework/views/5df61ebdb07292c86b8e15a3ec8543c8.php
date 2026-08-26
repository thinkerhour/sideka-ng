<?php $__env->startSection('content'); ?>
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
                <a href="#domain-terdaftar" class="nav-item">Daftar Domain</a>
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
                    <button class="btn-ajukan-round" id="btn-ajukan-sideka">
                        Ajukan SIDeKa-NG &rarr;
                    </button>
                </div>
            </div>
        </div>
    </main>

    <!-- ================================================== -->
    <!-- SECTION DOMAIN TERDAFTAR                           -->
    <!-- ================================================== -->
    <section class="domain-section" id="domain-terdaftar">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Domain Terdaftar</h2>
                <p class="section-subtitle-text">
                    Daftar domain desa yang telah terdaftar melalui layanan SIDeKa-NG.
                </p>
            </div>

            <div class="search-bar-wireframe">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <input type="text" placeholder="Cari domain atau nama desa..." readonly class="search-input-wireframe">
            </div>

            <div class="table-responsive">
                <table class="domain-table">
                    <thead>
                        <tr>
                            <th class="col-no">No</th>
                            <th class="col-desa">Nama Desa</th>
                            <th class="col-kecamatan">Kecamatan</th>
                            <th class="col-domain">Nama Domain Desa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>Wangunsari</td>
                            <td>Sindangkerta</td>
                            <td class="domain-cell">wangunsari-sindangkerta.desa.id</td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>Rancasenggang</td>
                            <td>Sindangkerta</td>
                            <td class="domain-cell">rancasenggang-sindangkerta.desa.id</td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td>Buninagara</td>
                            <td>Sindangkerta</td>
                            <td class="domain-cell">buninagara-sindangkerta.desa.id</td>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td>Cibedug</td>
                            <td>Rongga</td>
                            <td class="domain-cell">cibedug.desa.id</td>
                        </tr>
                        <tr>
                            <td class="text-center">5</td>
                            <td>Padalarang</td>
                            <td>Padalarang</td>
                            <td class="domain-cell">padalarang-padalarang.desa.id</td>
                        </tr>
                        <tr>
                            <td class="text-center">6</td>
                            <td>Pakuhaji</td>
                            <td>Ngamprah</td>
                            <td class="domain-cell">pakuhaji-kbb.desa.id</td>
                        </tr>
                        <tr>
                            <td class="text-center">7</td>
                            <td>Mekarsari</td>
                            <td>Ngamprah</td>
                            <td class="domain-cell">mekarsari-ngamprah.desa.id</td>
                        </tr>
                        <tr>
                            <td class="text-center">8</td>
                            <td>Lembang</td>
                            <td>Lembang</td>
                            <td class="domain-cell">lembang.desa.id</td>
                        </tr>
                        <tr>
                            <td class="text-center">9</td>
                            <td>Cihanjuang</td>
                            <td>Parongpong</td>
                            <td class="domain-cell">cihanjuang.desa.id</td>
                        </tr>
                        <tr>
                            <td class="text-center">10</td>
                            <td>Batujajar Barat</td>
                            <td>Batujajar</td>
                            <td class="domain-cell">batujajarbarat.desa.id</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="table-footer-action">
                <button class="btn btn-secondary-action btn-next-page" type="button">
                    Selanjutnya &rarr;
                </button>
            </div>
        </div>
    </section>

    <!-- ================================================== -->
    <!-- SECTION FAQ LANDING PAGE (UPDATED WITH SEARCH INPUT) -->
    <!-- ================================================== -->
    <section class="faq-landing-section" id="faq">
        <div class="container">
            <div class="faq-landing-card">
                <div class="faq-header-group">
                    <h2 class="faq-title">
                        FAQ
                        <span class="faq-icon-group">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </span>
                    </h2>
                    <p class="faq-subtitle-text">
                        Masih memiliki pertanyaan? Ketik pertanyaan Anda di bawah ini untuk mencari jawaban seputar layanan SIDeKa-NG.
                    </p>
                </div>

                <!-- FAQ Search Input and Auto-preview Dropdown -->
                <div class="faq-search-wrapper">
                    <div class="faq-search-bar">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="faq-search-icon">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                        <input type="text" id="faq-search-input" placeholder="Ketik kata kunci pertanyaan... (Contoh: gratis, biaya, apa itu)" class="faq-search-input-field" autocomplete="off">
                        <button type="button" class="btn-faq-search-submit" id="btn-faq-search-submit">Cari</button>
                    </div>

                    <!-- Autocomplete dropdown suggestions -->
                    <div class="faq-preview-dropdown" id="faq-preview-dropdown">
                        <!-- Populated dynamically via JS -->
                    </div>
                </div>

                <!-- Answer Container -->
                <div class="faq-answer-container" id="faq-answer-container" style="display: none;">
                    <div class="faq-answer-card">
                        <h4 class="faq-answer-question" id="faq-answer-question"></h4>
                        <p class="faq-answer-text" id="faq-answer-text"></p>
                    </div>
                </div>

                <div class="faq-cta-wrapper">
                    <button class="btn btn-faq-cta" id="btn-faq-ajukan">
                        Ajukan Sekarang &rsaquo;
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- ================================================== -->
    <!-- SECTION CEK STATUS                                 -->
    <!-- ================================================== -->
    <section class="cek-status-section" id="cek-status">
        <div class="container">
            <div class="cek-status-grid">
                <div class="cek-status-illustration">
                    <div class="graphic-window-box">
                        <div class="window-header-dots">
                            <span></span><span></span><span></span>
                        </div>
                        <div class="window-content-inner">
                            <svg width="120" height="90" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="1.5">
                                <rect x="2" y="3" width="20" height="14" rx="2"></rect>
                                <line x1="8" y1="21" x2="16" y2="21"></line>
                                <line x1="12" y1="17" x2="12" y2="21"></line>
                                <polygon points="10 8 16 11 10 14 10 8" fill="#60a5fa"></polygon>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="cek-status-content">
                    <h2 class="cek-status-title">Cek Status</h2>
                    <p class="cek-status-subtitle">
                        Cek status berkas dan domain yang sudah diajukan. Belum mengajukan? <a href="#ajukan" id="link-cek-status-ajukan" style="color: #ffffff; text-decoration: underline;">Ajukan sekarang.</a>
                    </p>

                    <form class="cek-status-search-box" id="form-cek-status" onsubmit="return false;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#64748b" stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                        <input type="text" id="input-search-desa" placeholder="Nama Domain atau Nama Desa..." class="cek-status-input">
                        <button type="submit" class="btn-search-trigger" id="btn-search-status">Cari</button>
                    </form>

                    <div class="search-demo-hints">
                        <span>Coba ketik data mock:</span>
                        <button type="button" class="hint-badge hint-yellow" id="btn-mock-wangunsari">Wangunsari (Diproses)</button>
                        <button type="button" class="hint-badge hint-red" id="btn-mock-pasirhalang">Pasirhalang (Revisi)</button>
                        <button type="button" class="hint-badge hint-green" id="btn-mock-lembang">Lembang (Berhasil)</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================================================== -->
    <!-- FOOTER (DISCOMINFOTIK KBB)                         -->
    <!-- ================================================== -->
    <footer class="footer-kbb">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h4 class="footer-col-title">KONTAK KAMI:</h4>
                    <div class="footer-address">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <span>Gedung B Komplek Perkantoran Pemerintah Kabupaten Bandung Barat Jl. Raya Padalarang-Cisarua Km.2 Ngamprah</span>
                    </div>
                    <div class="footer-map-placeholder">
                        <svg width="100%" height="60" viewBox="0 0 300 60" fill="none">
                            <rect width="300" height="60" fill="#0c1738" rx="6"/>
                            <path d="M0 20 Q 75 40 150 20 T 300 30" stroke="#1e3a8a" stroke-width="2" fill="none"/>
                            <path d="M50 0 L 50 60 M 150 0 L 150 60 M 250 0 L 250 60" stroke="#1e293b" stroke-width="1"/>
                            <circle cx="150" cy="30" r="10" fill="#ef4444"/>
                            <circle cx="150" cy="30" r="4" fill="#ffffff"/>
                        </svg>
                    </div>
                </div>

                <div class="footer-col">
                    <ul class="footer-contact-list">
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                            <span>diskominfotik.bandungbaratkab.go.id/</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                            <span>diskominfotik@bandungbaratkab.go.id</span>
                        </li>
                    </ul>
                    <div class="footer-social-icons">
                        <a href="#instagram" class="social-circle">IG</a>
                        <a href="#youtube" class="social-circle">YT</a>
                        <a href="#facebook" class="social-circle">FB</a>
                    </div>
                </div>

                <div class="footer-col">
                    <ul class="footer-nav-list">
                        <li><a href="#top">&rsaquo; Beranda</a></li>
                        <li><a href="#domain-terdaftar">&rsaquo; Daftar Domain</a></li>
                        <li><a href="#pengajuan" id="footer-nav-pengajuan">&rsaquo; Pengajuan</a></li>
                        <li><a href="#faq">&rsaquo; FAQ</a></li>
                    </ul>
                </div>

                <div class="footer-col footer-col-logo">
                    <div class="footer-logo-badge">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="2">
                            <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                            <polyline points="2 17 12 22 22 17"></polyline>
                            <polyline points="2 12 12 17 22 12"></polyline>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="footer-bottom-bar">
                <p>&copy; 2026 Diskominfo - Portal Layanan Domain Desa Resmi (.desa.id)</p>
            </div>
        </div>
    </footer>
</div>

<!-- ================================================== -->
<!-- MODAL 1: INFORMASI PERSYARATAN OVERLAY             -->
<!-- ================================================== -->
<div class="modal-backdrop" id="modal-persyaratan">
    <div class="modal-card">
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
                <div class="req-item req-with-download">
                    <div class="req-text-wrap">
                        <span class="req-num">1.</span>
                        <span class="req-text">Surat Permohonan Fasilitasi Domain desa.id</span>
                    </div>
                    <a href="<?php echo e(asset('documents/pengajuan/contoh-surat-permohonan.pdf')); ?>" download="contoh-surat-permohonan.pdf" class="btn btn-download-template" id="btn-download-permohonan">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" y1="15" x2="12" y2="3"></line>
                        </svg>
                        Contoh Surat Permohonan
                    </a>
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
                    <a href="<?php echo e(asset('documents/pengajuan/template-surat-kuasa.pdf')); ?>" download="template-surat-kuasa.pdf" class="btn btn-download-template" id="btn-download-template">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" y1="15" x2="12" y2="3"></line>
                        </svg>
                        Template Surat Kuasa
                    </a>
                </div>
                <div class="req-item req-with-download">
                    <div class="req-text-wrap">
                        <span class="req-num">4.</span>
                        <span class="req-text">Surat Penunjukan Admin Website desa.id</span>
                    </div>
                    <a href="<?php echo e(asset('documents/pengajuan/contoh-surat-penunjukan-admin.pdf')); ?>" download="contoh-surat-penunjukan-admin.pdf" class="btn btn-download-template" id="btn-download-admin">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" y1="15" x2="12" y2="3"></line>
                        </svg>
                        Contoh Surat Penunjukan Admin
                    </a>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button class="btn btn-secondary-action" id="btn-next-to-form">SELANJUTNYA</button>
        </div>
    </div>
</div>

<!-- ================================================== -->
<!-- MODAL 2: FORM PENGAJUAN (4 UPLOAD FIELDS ONLY)     -->
<!-- ================================================== -->
<div class="modal-backdrop" id="modal-form">
    <div class="modal-card modal-card-large">
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

        <div class="modal-body">
            <div class="alert-box">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
                <span>Silakan unggah seluruh dokumen persyaratan yang telah disiapkan.</span>
            </div>

            <form id="form-upload-berkas" onsubmit="return false;" enctype="multipart/form-data" autocomplete="off">
                <?php echo csrf_field(); ?>
                <div class="upload-grid">
                    <div class="upload-field-card">
                        <label class="upload-label" for="file-surat-permohonan">1. Surat Permohonan Fasilitasi Domain desa.id</label>
                        <div class="file-input-wrapper">
                            <input type="file" id="file-surat-permohonan" name="surat_permohonan" accept=".pdf,.doc,.docx" class="file-input" autocomplete="off">
                            <div class="file-input-custom">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                                <span class="file-name-display">Pilih file atau drag ke sini</span>
                            </div>
                        </div>
                    </div>

                    <div class="upload-field-card">
                        <label class="upload-label" for="file-sk-kades">2. Surat Keputusan Pengangkatan Kepala Desa</label>
                        <div class="file-input-wrapper">
                            <input type="file" id="file-sk-kades" name="sk_kepala_desa" accept=".pdf,.doc,.docx" class="file-input" autocomplete="off">
                            <div class="file-input-custom">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                                <span class="file-name-display">Pilih file atau drag ke sini</span>
                            </div>
                        </div>
                    </div>

                    <div class="upload-field-card">
                        <label class="upload-label" for="file-surat-kuasa">3. Surat Kuasa</label>
                        <div class="file-input-wrapper">
                            <input type="file" id="file-surat-kuasa" name="surat_kuasa" accept=".pdf,.doc,.docx" class="file-input" autocomplete="off">
                            <div class="file-input-custom">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                                <span class="file-name-display">Pilih file atau drag ke sini</span>
                            </div>
                        </div>
                    </div>

                    <div class="upload-field-card">
                        <label class="upload-label" for="file-surat-admin">4. Surat Penunjukan Admin Website desa.id</label>
                        <div class="file-input-wrapper">
                            <input type="file" id="file-surat-admin" name="surat_penunjukan_admin" accept=".pdf,.doc,.docx" class="file-input" autocomplete="off">
                            <div class="file-input-custom">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
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

        <div class="modal-footer">
            <button class="btn btn-primary" id="btn-submit-form">SUBMIT</button>
        </div>
    </div>
</div>

<!-- ================================================== -->
<!-- MODAL 3: KONFIRMASI BERHASIL SUBMIT                -->
<!-- ================================================== -->
<div class="modal-backdrop" id="modal-konfirmasi">
    <div class="modal-card modal-card-small">
        <div class="modal-header modal-header-clean">
            <div></div>
            <button class="modal-close-btn" data-close-modal>&times;</button>
        </div>

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

        <div class="modal-footer modal-footer-centered">
            <button class="btn btn-primary btn-full-width" id="btn-ok-konfirmasi">OK</button>
        </div>
    </div>
</div>

<!-- ================================================== -->
<!-- MODAL STATUS POPUP: KONDISI 1 - DIPROSES           -->
<!-- ================================================== -->
<div class="modal-backdrop" id="popup-status-diproses">
    <div class="status-popup-card">
        <div class="status-popup-header">
            <div>
                <h2 class="status-village-title" id="diproses-village-name">Desa Wangunsari</h2>
                <p class="status-village-sub" id="diproses-village-sub">Kecamatan Sindangkerta, Kab. Bandung Barat</p>
            </div>
            <div class="status-badge-wrap">
                <span class="status-badge-label">STATUS BERKAS PENGAJUAN</span>
                <div class="status-pill status-pill-yellow">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                    Sedang Diproses
                </div>
            </div>
        </div>

        <div class="status-popup-body">
            <div class="status-popup-grid">
                <div class="status-popup-left">
                    <h3 class="popup-section-heading">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
                        RINCIAN PENGAJUAN FASILITASI
                    </h3>

                    <div class="info-boxes-row">
                        <div class="dark-info-box">
                            <span class="info-box-label">Usulan Domain</span>
                            <span class="info-box-value domain-code" id="diproses-domain">wangunsari.desa.id</span>
                        </div>
                        <div class="dark-info-box">
                            <span class="info-box-label">Tanggal Pengajuan</span>
                            <span class="info-box-value" id="diproses-date">10 Januari 2026</span>
                        </div>
                    </div>

                    <div class="status-notice-box notice-yellow">
                        <div class="notice-title">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            Proses Verifikasi Berkas Sedang Berjalan
                        </div>
                        <p class="notice-desc">
                            Pengajuan Anda telah diterima oleh Tim Verifikasi Diskominfo Kabupaten Bandung Barat. Dokumen sedang diteliti kelengkapannya.
                        </p>
                    </div>

                    <div class="docs-uploaded-section">
                        <h4 class="docs-list-title">DAFTAR 4 BERKAS YANG TELAH DIUNGGAH:</h4>
                        <div class="doc-file-item">
                            <div class="doc-file-info">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2-2V8z"></path></svg>
                                <span class="doc-label">Surat Permohonan Fasilitasi Domain</span>
                            </div>
                            <span class="doc-filename">Surat_Permohonan_Wangunsari.pdf</span>
                        </div>
                        <div class="doc-file-item">
                            <div class="doc-file-info">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path></svg>
                                <span class="doc-label">Surat Kuasa</span>
                            </div>
                            <span class="doc-filename">Surat_Kuasa_Wangunsari.pdf</span>
                        </div>
                        <div class="doc-file-item">
                            <div class="doc-file-info">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path></svg>
                                <span class="doc-label">SK Pengangkatan Kepala Desa</span>
                            </div>
                            <span class="doc-filename">SK_Kades_Wangunsari.pdf</span>
                        </div>
                        <div class="doc-file-item">
                            <div class="doc-file-info">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path></svg>
                                <span class="doc-label">Surat Penunjukan Admin Website</span>
                            </div>
                            <span class="doc-filename">Surat_Penunjukan_Admin_Wangunsari.pdf</span>
                        </div>
                    </div>
                </div>

                <div class="status-popup-right">
                    <div class="active-status-card">
                        <h4 class="active-status-title">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                            Status Masa Aktif Domain & Jatuh Tempo
                        </h4>
                        <div class="active-status-inner-placeholder">
                            <div class="placeholder-info-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                            </div>
                            <h5 class="placeholder-title">Masa Aktif Belum Diterbitkan</h5>
                            <p class="placeholder-desc">
                                Tanggal aktif dan jatuh tempo domain akan secara otomatis muncul di sini setelah keabsahan berkas dinyatakan benar dan pengajuan Domain diterima dan berhasil oleh Kominfo.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="status-popup-footer">
                <button type="button" class="btn-tutup-status" data-close-modal>Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- ================================================== -->
<!-- MODAL STATUS POPUP: KONDISI 2 - REVISI             -->
<!-- ================================================== -->
<div class="modal-backdrop" id="popup-status-revisi">
    <div class="status-popup-card">
        <div class="status-popup-header">
            <div>
                <h2 class="status-village-title" id="revisi-village-name">Desa Pasirhalang</h2>
                <p class="status-village-sub" id="revisi-village-sub">Kecamatan Cisarua, Kab. Bandung Barat</p>
            </div>
            <div class="status-badge-wrap">
                <span class="status-badge-label">STATUS BERKAS PENGAJUAN</span>
                <div class="status-pill status-pill-red">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                    Revisi Dokumen
                </div>
            </div>
        </div>

        <div class="status-popup-body">
            <div class="status-popup-grid">
                <div class="status-popup-left">
                    <h3 class="popup-section-heading">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
                        RINCIAN PENGAJUAN FASILITASI
                    </h3>

                    <div class="info-boxes-row">
                        <div class="dark-info-box">
                            <span class="info-box-label">Usulan Domain</span>
                            <span class="info-box-value domain-code" id="revisi-domain">pasirhalang.desa.id</span>
                        </div>
                        <div class="dark-info-box">
                            <span class="info-box-label">Tanggal Pengajuan</span>
                            <span class="info-box-value" id="revisi-date">10 Januari 2026</span>
                        </div>
                    </div>

                    <div class="status-notice-box notice-red">
                        <div class="notice-title">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                            Catatan Revisi
                        </div>
                        <p class="notice-desc" id="revisi-note-text">
                            "Stempel pada Surat Kuasa belum terlihat jelas dan SK Pengangkatan Kepala Desa belum melampirkan lembar pengesahan terakhir."
                        </p>
                    </div>

                    <div class="docs-uploaded-section">
                        <div class="docs-list-header-row">
                            <h4 class="docs-list-title">DAFTAR 4 BERKAS YANG TELAH DIUNGGAH:</h4>
                            <button type="button" class="btn-unggah-ulang" id="btn-trigger-reupload">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                                Unggah Ulang
                            </button>
                        </div>

                        <div class="doc-file-item" id="doc-item-1">
                            <div class="doc-file-info">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path></svg>
                                <span class="doc-label">Surat Permohonan Fasilitasi Domain</span>
                            </div>
                            <div class="doc-file-right">
                                <span class="doc-filename">Surat_Permohonan_Pasirhalang.pdf</span>
                                <button type="button" class="btn-remove-doc" onclick="removeDocItem('doc-item-1')">&times;</button>
                            </div>
                        </div>
                        <div class="doc-file-item" id="doc-item-2">
                            <div class="doc-file-info">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path></svg>
                                <span class="doc-label">Surat Kuasa</span>
                            </div>
                            <div class="doc-file-right">
                                <span class="doc-filename">Surat_Kuasa_Pasirhalang.pdf</span>
                                <button type="button" class="btn-remove-doc" onclick="removeDocItem('doc-item-2')">&times;</button>
                            </div>
                        </div>
                        <div class="doc-file-item" id="doc-item-3">
                            <div class="doc-file-info">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path></svg>
                                <span class="doc-label">SK Pengangkatan Kepala Desa</span>
                            </div>
                            <div class="doc-file-right">
                                <span class="doc-filename">SK_Kades_Pasirhalang.pdf</span>
                                <button type="button" class="btn-remove-doc" onclick="removeDocItem('doc-item-3')">&times;</button>
                            </div>
                        </div>
                        <div class="doc-file-item" id="doc-item-4">
                            <div class="doc-file-info">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path></svg>
                                <span class="doc-label">Surat Penunjukan Admin Website</span>
                            </div>
                            <div class="doc-file-right">
                                <span class="doc-filename">Surat_Penunjukan_Admin_Pasirhalang.pdf</span>
                                <button type="button" class="btn-remove-doc" onclick="removeDocItem('doc-item-4')">&times;</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="status-popup-right">
                    <div class="active-status-card">
                        <h4 class="active-status-title">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                            Status Masa Aktif Domain & Jatuh Tempo
                        </h4>
                        <div class="active-status-inner-placeholder">
                            <div class="placeholder-info-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                            </div>
                            <h5 class="placeholder-title">Masa Aktif Belum Diterbitkan</h5>
                            <p class="placeholder-desc">
                                Tanggal aktif dan jatuh tempo domain akan secara otomatis muncul di sini setelah keabsahan berkas dinyatakan benar dan pengajuan Domain diterima dan berhasil oleh Kominfo.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="status-popup-footer">
                <button type="button" class="btn-tutup-status" data-close-modal>Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- ================================================== -->
<!-- MODAL STATUS POPUP: KONDISI 3 - BERHASIL DIDAFTARKAN -->
<!-- ================================================== -->
<div class="modal-backdrop" id="popup-status-berhasil">
    <div class="status-popup-card">
        <div class="status-popup-header">
            <div>
                <h2 class="status-village-title" id="berhasil-village-name">Desa Lembang</h2>
                <p class="status-village-sub" id="berhasil-village-sub">Kecamatan Lembang, Kab. Bandung Barat</p>
            </div>
            <div class="status-badge-wrap">
                <span class="status-badge-label">STATUS BERKAS PENGAJUAN</span>
                <div class="status-pill status-pill-green">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    Domain Berhasil Didaftarkan
                </div>
            </div>
        </div>

        <div class="status-popup-body">
            <div class="status-popup-grid">
                <div class="status-popup-left">
                    <h3 class="popup-section-heading">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
                        RINCIAN PENGAJUAN FASILITASI
                    </h3>

                    <div class="info-boxes-row">
                        <div class="dark-info-box">
                            <span class="info-box-label">Usulan Domain</span>
                            <span class="info-box-value domain-code" id="berhasil-domain">lembang.desa.id</span>
                        </div>
                        <div class="dark-info-box">
                            <span class="info-box-label">Tanggal Pengajuan</span>
                            <span class="info-box-value" id="berhasil-date">10 Januari 2026</span>
                        </div>
                    </div>

                    <div class="status-notice-box notice-green">
                        <div class="notice-title">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            Pendaftaran Domain Berhasil Diterbitkan
                        </div>
                        <p class="notice-desc">
                            Selamat! Domain resmi <em>https://lembang.desa.id</em> telah berhasil didaftarkan dan aktif digunakan untuk portal resmi desa.
                        </p>
                    </div>

                    <div class="docs-uploaded-section">
                        <h4 class="docs-list-title">DAFTAR 4 BERKAS YANG TELAH DIUNGGAH:</h4>
                        <div class="doc-file-item">
                            <div class="doc-file-info">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path></svg>
                                <span class="doc-label">Surat Permohonan Fasilitasi Domain</span>
                            </div>
                            <span class="doc-filename">Surat_Permohonan_Lembang.pdf</span>
                        </div>
                        <div class="doc-file-item">
                            <div class="doc-file-info">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path></svg>
                                <span class="doc-label">Surat Kuasa</span>
                            </div>
                            <span class="doc-filename">Surat_Kuasa_Lembang.pdf</span>
                        </div>
                        <div class="doc-file-item">
                            <div class="doc-file-info">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path></svg>
                                <span class="doc-label">SK Pengangkatan Kepala Desa</span>
                            </div>
                            <span class="doc-filename">SK_Kades_Lembang.pdf</span>
                        </div>
                        <div class="doc-file-item">
                            <div class="doc-file-info">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path></svg>
                                <span class="doc-label">Surat Penunjukan Admin Website</span>
                            </div>
                            <span class="doc-filename">Surat_Penunjukan_Admin_Lembang.pdf</span>
                        </div>
                    </div>
                </div>

                <div class="status-popup-right">
                    <div class="active-status-card">
                        <h4 class="active-status-title">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                            Status Masa Aktif Domain & Jatuh Tempo
                        </h4>

                        <div class="date-status-box box-active-date">
                            <span class="date-box-label">Tanggal Aktif Domain</span>
                            <span class="date-box-value" id="berhasil-aktif-date">12 Januari 2026</span>
                        </div>

                        <div class="date-status-box box-expire-date">
                            <span class="date-box-label">Tanggal Jatuh Tempo (Kadaluarsa)</span>
                            <span class="date-box-value" id="berhasil-expire-date">12 Januari 2027</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="status-popup-footer">
                <button type="button" class="btn-tutup-status" data-close-modal>Tutup</button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\User\sideka-ng\resources\views/user/beranda.blade.php ENDPATH**/ ?>