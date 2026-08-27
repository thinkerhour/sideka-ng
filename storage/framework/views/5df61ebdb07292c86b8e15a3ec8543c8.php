<?php $__env->startSection('content'); ?>
<div class="page-wrapper">
    <!-- HERO BACKGROUND OVERLAY -->
    <div class="hero-background"></div>

  <!-- HEADER / NAVIGATION -->
<header class="navbar">
    <div class="container navbar-container">
        <div class="brand">
            <a href="<?php echo e(url('/')); ?>" class="brand-link">
                <img src="<?php echo e(asset('assets/images/logo_diskominfotik.png')); ?>" alt="Logo Diskominfotik" class="brand-logo-img">
                <div class="brand-text">
                    <span class="brand-title">DISKOMINFOTIK</span>
                    <span class="brand-subtitle">KABUPATEN BANDUNG BARAT</span>
                </div>
            </a>
        </div>

        <nav class="nav-links">
            <a href="#domain-terdaftar" class="nav-item">Daftar Domain</a>
            <a href="#pengajuan" class="nav-item" id="nav-pengajuan">Pengajuan</a>
            <a href="#cek-status" class="nav-item">Cek Status</a>
            <a href="#faq" class="nav-item nav-pill-faq">
                <span>FAQ</span>
                <img src="<?php echo e(asset('assets/icons/question.svg')); ?>" alt="FAQ" class="faq-icon-img" width="18" height="18">
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
                    Ajukan permohonan layanan, pantau proses pengajuan, dan akses informasi layanan website desa melalui Diskominfotik Kab. Bandung Barat
                </p>
                <div class="hero-cta">
                    <button class="btn-ajukan-img" id="btn-ajukan-sideka" type="button" aria-label="Ajukan SIDeKa-NG">
                        <img src="<?php echo e(asset('assets/images/button_ajukan.png')); ?>" alt="Ajukan SIDEKA-NG" class="img-btn-ajukan">
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
                <h2 class="section-title">Domain desa Terdaftar</h2>
                <p class="section-subtitle-text">
                    Daftar domain resmi website desa dan kawasan yang telah aktif dan dikelola oleh Diskominfotik Kab. Bandung Barat
                </p>
            </div>

            <form method="GET" action="<?php echo e(url('/#domain-terdaftar')); ?>" class="search-bar-wireframe" id="form-search-domain">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#000130" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <input type="text" name="search" id="input-search-domain" value="<?php echo e($search ?? ''); ?>" placeholder="Cari domain atau nama desa..." class="search-input-wireframe" autocomplete="off">
            </form>

            <div class="table-responsive">
                <table class="domain-table">
                    <thead>
                        <tr>
                            <th class="col-no">No.</th>
                            <th class="col-desa">Desa</th>
                            <th class="col-kecamatan">Kecamatan</th>
                            <th class="col-domain">Domain</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $domains; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $domain): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="text-center"><?php echo e(($domains->firstItem() ? $domains->firstItem() + $index : $index + 1)); ?>.</td>
                            <td><?php echo e($domain->desa ? $domain->desa->nama_desa : '-'); ?></td>
                            <td><?php echo e($domain->desa ? $domain->desa->kecamatan : '-'); ?></td>
                            <td class="domain-cell"><?php echo e($domain->nama_domain); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4" class="text-center" style="padding: 24px; color: #64748b;">
                                Belum ada domain terdaftar.
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <?php if($domains->hasPages()): ?>
            <div class="table-footer-action">
                <?php if($domains->hasMorePages()): ?>
                <a href="<?php echo e($domains->nextPageUrl()); ?>#domain-terdaftar" class="btn-selanjutnya-img" aria-label="Selanjutnya">
                    <img src="<?php echo e(asset('assets/images/button_selanjutnya.png')); ?>" alt="Selanjutnya" class="img-btn-selanjutnya">
                </a>
                <?php else: ?>
                <span class="btn-selanjutnya-img disabled">
                    <img src="<?php echo e(asset('assets/images/button_selanjutnya.png')); ?>" alt="Selanjutnya" class="img-btn-selanjutnya" style="opacity: 0.45;">
                </span>
                <?php endif; ?>
            </div>
            <?php endif; ?>
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

                <div class="faq-cta-wrapper" style="margin-top: 28px; display: flex; justify-content: center;">
                    <button class="btn-ajukan-img" id="btn-faq-ajukan" type="button" aria-label="Ajukan SIDeKa-NG">
                        <img src="<?php echo e(asset('assets/images/button_ajukan.png')); ?>" alt="Ajukan SIDEKA-NG" class="img-btn-ajukan">
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
                        <img src="<?php echo e(asset('assets/images/logo_cekstatus.png')); ?>" alt="Ilustrasi Cek Status" class="img-cek-status-logo">
                </div>

                <div class="cek-status-content">
                    <h2 class="cek-status-title">Cek Status</h2>
                    <p class="cek-status-subtitle">
                        Cek status berkas dan domain yang sudah diajukan. Belum mengajukan? <a href="#pengajuan" id="link-cek-status-ajukan" class="link-ajukan-inline">Ajukan sekarang.</a>
                    </p>

                    <form class="cek-status-search-box" id="form-cek-status" onsubmit="return false;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#000130" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" class="search-icon-navy">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                        <input type="text" id="input-search-desa" placeholder="Nama Domain..." class="cek-status-input" autocomplete="off">
                        <button type="submit" class="btn-search-trigger" id="btn-search-status">Cari</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- ================================================== -->
    <!-- FOOTER (DISCOMINFOTIK KBB - FIGMA MATCHING)        -->
    <!-- ================================================== -->
    <footer class="footer-kbb">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h4 class="footer-col-title">KONTAK KAMI:</h4>
                    <a href="https://maps.app.goo.gl/2rjbucCU76uYxtKSA" target="_blank" rel="noopener noreferrer" style="text-decoration: none; color: inherit; display: block;" title="Buka di Google Maps">
                        <div class="footer-address">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="footer-icon-pin">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span>Gedung B Komplek Perkantoran Pemerintah Kabupaten Bandung Barat Jl. Raya Padalarang-Cisarua Km.2 Ngamprah</span>
                        </div>
                    </a>
                    <div class="footer-map-placeholder" title="Preview Lokasi Kantor Diskominfotik KBB">
                        <iframe 
                            src="https://maps.google.com/maps?q=Gedung+B+Komplek+Perkantoran+Pemerintah+Kabupaten+Bandung+Barat&t=&z=15&ie=UTF8&iwloc=&output=embed" 
                            width="100%" 
                            height="100" 
                            style="border:0; display:block; border-radius: 6px;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>

                <div class="footer-col">
                    <ul class="footer-contact-list">
                        <li>
                            <a href="https://diskominfotik.bandungbaratkab.go.id/" target="_blank" rel="noopener noreferrer" class="footer-contact-link">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                                <span>diskominfotik.bandungbaratkab.go.id/</span>
                            </a>
                        </li>
                        <li>
                            <a href="mailto:diskominfotik@bandungbaratkab.go.id" class="footer-contact-link">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                <span>diskominfotik@bandungbaratkab.go.id</span>
                            </a>
                        </li>
                    </ul>
                    <div class="footer-social-icons">
                        <a href="https://www.instagram.com/diskominfotik_kbb?igsi=MWM1bTFzN3hucGFlbg==" target="_blank" rel="noopener noreferrer" class="social-circle" title="Instagram Diskominfotik KBB">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                        </a>
                        <a href="https://youtube.com/@infratekdiskominfotikkabbandun?si=Kdp3sMdR_BMz-8O6" target="_blank" rel="noopener noreferrer" class="social-circle" title="YouTube Diskominfotik KBB">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19.1c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.43z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02" fill="currentColor"></polygon></svg>
                        </a>
                        <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" class="social-circle" title="Facebook Diskominfotik KBB">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                        </a>
                    </div>
                </div>

                <div class="footer-col">
                    <ul class="footer-nav-list">
                        <li><a href="#top">&#9654; Beranda</a></li>
                        <li><a href="#domain-terdaftar">&#9654; Daftar Domain</a></li>
                        <li><a href="#pengajuan" id="footer-nav-pengajuan">&#9654; Pengajuan</a></li>
                        <li><a href="#faq">&#9654; FAQ</a></li>
                    </ul>
                </div>

                <div class="footer-col footer-col-logo">
                    <img src="<?php echo e(asset('assets/images/logo_diskominfotik.png')); ?>" alt="Logo Diskominfotik" class="footer-logo-img">
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
    <div class="modal-card modal-card-persyaratan">
        <div class="modal-header modal-header-dark">
            <div class="modal-title-group">
                <div class="modal-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10 9 9 9 8 9"></polyline>
                    </svg>
                </div>
                <h2 class="modal-persyaratan-title">Pengajuan SIDEKA-NG Domain .desa.id</h2>
            </div>
            <button class="modal-close-btn" data-close-modal aria-label="Tutup">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>

        <div class="modal-body modal-body-persyaratan">
            <div class="alert-box alert-box-persyaratan">
                <span>Isi data pemerintah desa dan pemohon secara lengkap dan teliti sesuai dokumen resmi Surat Permohonan dari Kepala Desa.</span>
            </div>

            <div class="section-subtitle-persyaratan">
                <h3>
                    Berkas dan Syarat yang wajib disiapkan 
                    <img src="<?php echo e(asset('assets/icons/syarat_pengajuan.svg')); ?>" width="18" height="18" alt="info" class="icon-syarat-img">
                </h3>
            </div>

            <div class="requirements-grid-persyaratan">
                <!-- Row 1, Col 1: Syarat 1 -->
                <div class="req-item-block">
                    <div class="req-label-text">1. Surat Permohonan Fasilitasi Domain desa.id</div>
                    <a href="<?php echo e(asset('documents/pengajuan/contoh-surat-permohonan.pdf')); ?>" download="contoh-surat-permohonan.pdf" class="btn btn-download-template" id="btn-download-permohonan">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" y1="15" x2="12" y2="3"></line>
                        </svg>
                        <span>Contoh Surat Permohonan</span>
                    </a>
                </div>

                <!-- Row 1, Col 2: Syarat 3 -->
                <div class="req-item-block">
                    <div class="req-label-text">3. Surat Keputusan Pengangkatan Kepala Desa</div>
                </div>

                <!-- Row 2, Col 1: Syarat 2 -->
                <div class="req-item-block">
                    <div class="req-label-text">2. Surat Kuasa</div>
                    <a href="<?php echo e(asset('documents/pengajuan/template-surat-kuasa.pdf')); ?>" download="template-surat-kuasa.pdf" class="btn btn-download-template" id="btn-download-template">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" y1="15" x2="12" y2="3"></line>
                        </svg>
                        <span>Template Surat Kuasa</span>
                    </a>
                </div>

                <!-- Row 2, Col 2: Syarat 4 -->
                <div class="req-item-block">
                    <div class="req-label-text">4. Surat Penunjukan Admin Website desa.id</div>
                    <a href="<?php echo e(asset('documents/pengajuan/contoh-surat-penunjukan-admin.pdf')); ?>" download="contoh-surat-penunjukan-admin.pdf" class="btn btn-download-template" id="btn-download-admin">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" y1="15" x2="12" y2="3"></line>
                        </svg>
                        <span>Contoh Surat Penunjukan Admin</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="modal-footer modal-footer-persyaratan">
            <button class="btn btn-selanjutnya-dark" id="btn-next-to-form">SELANJUTNYA</button>
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
                <span>Silakan unggah seluruh dokumen persyaratan yang telah disiapkan.</span>
            </div>

            <form id="form-upload-berkas" onsubmit="return false;" enctype="multipart/form-data" autocomplete="off">
                <?php echo csrf_field(); ?>
                <div class="upload-grid">
                    <div class="upload-field-card">
                        <label class="upload-label" for="file-surat-permohonan">1. Surat Permohonan Fasilitasi Domain desa.id</label>
                        <div class="file-input-wrapper">
                            <input type="file" id="file-surat-permohonan" name="surat_permohonan" accept=".pdf" class="file-input" autocomplete="off">
                            <div class="file-input-custom">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                                <span class="file-name-display">Pilih file atau drag ke sini</span>
                            </div>
                        </div>
                    </div>

                    <div class="upload-field-card">
                        <label class="upload-label" for="file-sk-kades">2. Surat Keputusan Pengangkatan Kepala Desa</label>
                        <div class="file-input-wrapper">
                            <input type="file" id="file-sk-kades" name="sk_kepala_desa" accept=".pdf" class="file-input" autocomplete="off">
                            <div class="file-input-custom">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                                <span class="file-name-display">Pilih file atau drag ke sini</span>
                            </div>
                        </div>
                    </div>

                    <div class="upload-field-card">
                        <label class="upload-label" for="file-surat-kuasa">3. Surat Kuasa</label>
                        <div class="file-input-wrapper">
                            <input type="file" id="file-surat-kuasa" name="surat_kuasa" accept=".pdf" class="file-input" autocomplete="off">
                            <div class="file-input-custom">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                                <span class="file-name-display">Pilih file atau drag ke sini</span>
                            </div>
                        </div>
                    </div>

                    <div class="upload-field-card">
                        <label class="upload-label" for="file-surat-admin">4. Surat Penunjukan Admin Website desa.id</label>
                        <div class="file-input-wrapper">
                            <input type="file" id="file-surat-admin" name="surat_penunjukan_admin" accept=".pdf" class="file-input" autocomplete="off">
                            <div class="file-input-custom">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                                <span class="file-name-display">Pilih file atau drag ke sini</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="format-note">
                    Format file yang diperbolehkan: <strong>PDF</strong> (Ukuran minimal <strong>1 MB</strong> per berkas)
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