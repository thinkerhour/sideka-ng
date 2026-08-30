// Helper functions
document.addEventListener('DOMContentLoaded', () => {
    // Elements - Modals & Buttons
    const btnAjukan = document.getElementById('btn-ajukan-sideka');
    const navPengajuan = document.getElementById('nav-pengajuan');
    const footerNavPengajuan = document.getElementById('footer-nav-pengajuan');
    const linkCekStatusAjukan = document.getElementById('link-cek-status-ajukan');
    const btnNextToForm = document.getElementById('btn-next-to-form');
    const btnSubmitForm = document.getElementById('btn-submit-form');
    const btnSubmitRevisi = document.getElementById('btn-submit-revisi');
    const btnOkKonfirmasi = document.getElementById('btn-ok-konfirmasi');
    const btnTriggerReupload = document.getElementById('btn-trigger-reupload');

    // Modals
    const modalPersyaratan = document.getElementById('modal-persyaratan');
    const modalForm = document.getElementById('modal-form');
    const modalFormRevisi = document.getElementById('modal-form-revisi');
    const modalKonfirmasi = document.getElementById('modal-konfirmasi');

    const popupDiproses = document.getElementById('popup-status-diproses');
    const popupRevisi = document.getElementById('popup-status-revisi');
    const popupBerhasil = document.getElementById('popup-status-berhasil');

    // Active Revisi Data tracker
    let currentRevisiData = {
        id_pengajuan: null,
        nama_desa: 'Pasirhalang',
        dokumens: [
            { jenis_dokumen: 'surat_permohonan', nama_file: 'Surat_Permohonan_Pasirhalang.pdf' },
            { jenis_dokumen: 'surat_kuasa', nama_file: 'Surat_Kuasa_Pasirhalang.pdf' },
            { jenis_dokumen: 'sk_kepala_desa', nama_file: 'SK_Kades_Pasirhalang.pdf' },
            { jenis_dokumen: 'surat_penunjukan_admin', nama_file: 'Surat_Penunjukan_Admin_Pasirhalang.pdf' }
        ]
    };

    // Demo hint buttons
    const btnMockWangunsari = document.getElementById('btn-mock-wangunsari');
    const btnMockPasirhalang = document.getElementById('btn-mock-pasirhalang');
    const btnMockLembang = document.getElementById('btn-mock-lembang');

    const allCloseBtns = document.querySelectorAll('[data-close-modal]');
    const allModals = [
        modalPersyaratan, 
        modalForm, 
        modalFormRevisi,
        modalKonfirmasi, 
        popupDiproses, 
        popupRevisi, 
        popupBerhasil
    ];

    // Helper functions
    function openModal(modal) {
        closeAllModals();
        if (modal) {
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeAllModals() {
        allModals.forEach(m => {
            if (m) m.classList.remove('active');
        });
        document.body.style.overflow = '';
    }

    // Helper to reset initial upload form and its UI displays
    function resetUploadForm() {
        const formUpload = document.getElementById('form-upload-berkas');
        if (formUpload) {
            formUpload.reset();
        }
        ['file-surat-permohonan', 'file-sk-kades', 'file-surat-kuasa', 'file-surat-admin'].forEach(id => {
            const el = document.getElementById(id);
            if (el) el.value = '';
        });
        document.querySelectorAll('#form-upload-berkas .file-name-display').forEach(display => {
            display.textContent = 'Pilih file atau drag ke sini';
            display.style.color = '';
            display.style.fontWeight = '';
        });
    }

    // Helper to reset & populate revisi upload form
    function resetRevisiForm() {
        const formUploadRevisi = document.getElementById('form-upload-revisi');
        if (formUploadRevisi) {
            formUploadRevisi.reset();
        }
        ['revisi-file-surat-permohonan', 'revisi-file-sk-kades', 'revisi-file-surat-kuasa', 'revisi-file-surat-admin'].forEach(id => {
            const el = document.getElementById(id);
            if (el) el.value = '';
        });

        const docMap = {};
        if (currentRevisiData && currentRevisiData.dokumens && Array.isArray(currentRevisiData.dokumens)) {
            currentRevisiData.dokumens.forEach(d => {
                docMap[d.jenis_dokumen] = d.nama_file;
            });
        }

        const village = currentRevisiData?.nama_desa || 'Pasirhalang';
        const fPermohonan = docMap['surat_permohonan'] || 'Surat_Permohonan_' + village + '.pdf';
        const fSk = docMap['sk_kepala_desa'] || 'SK_Kades_' + village + '.pdf';
        const fKuasa = docMap['surat_kuasa'] || 'Surat_Kuasa_' + village + '.pdf';
        const fAdmin = docMap['surat_penunjukan_admin'] || 'Surat_Penunjukan_Admin_' + village + '.pdf';

        const dPermohonan = document.getElementById('revisi-display-permohonan');
        const dSk = document.getElementById('revisi-display-sk-kades');
        const dKuasa = document.getElementById('revisi-display-surat-kuasa');
        const dAdmin = document.getElementById('revisi-display-surat-admin');

        if (dPermohonan) {
            dPermohonan.textContent = fPermohonan;
            dPermohonan.dataset.original = fPermohonan;
            dPermohonan.style.color = '#334155';
            dPermohonan.style.fontWeight = '600';
        }
        if (dSk) {
            dSk.textContent = fSk;
            dSk.dataset.original = fSk;
            dSk.style.color = '#334155';
            dSk.style.fontWeight = '600';
        }
        if (dKuasa) {
            dKuasa.textContent = fKuasa;
            dKuasa.dataset.original = fKuasa;
            dKuasa.style.color = '#334155';
            dKuasa.style.fontWeight = '600';
        }
        if (dAdmin) {
            dAdmin.textContent = fAdmin;
            dAdmin.dataset.original = fAdmin;
            dAdmin.style.color = '#334155';
            dAdmin.style.fontWeight = '600';
        }

        const hiddenId = document.getElementById('revisi-pengajuan-id');
        if (hiddenId) hiddenId.value = currentRevisiData?.id_pengajuan || '';
    }

    // Always ensure upload form is pristine on page load / browser back-forward cache
    resetUploadForm();
    window.addEventListener('pageshow', resetUploadForm);

    // 1. Click "Ajukan SIDeKa-NG" -> Open Modal Informasi Persyaratan
    const triggerSubmissionBtns = [btnAjukan, navPengajuan, footerNavPengajuan, linkCekStatusAjukan].filter(Boolean);
    triggerSubmissionBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            resetUploadForm();
            openModal(modalPersyaratan);
        });
    });

    // 2. Click "SELANJUTNYA" in Modal Persyaratan -> Open Modal Form Pengajuan
    if (btnNextToForm) {
        btnNextToForm.addEventListener('click', (e) => {
            e.preventDefault();
            openModal(modalForm);
        });
    }

    // 3. Click "SUBMIT" in Modal Form -> Validasi 4 Dokumen & Submit via AJAX
    if (btnSubmitForm) {
        btnSubmitForm.addEventListener('click', async (e) => {
            e.preventDefault();

            const inputPermohonan = document.getElementById('file-surat-permohonan');
            const inputSkKades = document.getElementById('file-sk-kades');
            const inputKuasa = document.getElementById('file-surat-kuasa');
            const inputAdmin = document.getElementById('file-surat-admin');

            // 1. Validasi Frontend: Semua 4 dokumen harus dipilih, berformat PDF, dan berukuran maksimal 1 MB
            const docInputs = [
                { id: 'file-surat-permohonan', label: 'Surat Permohonan', input: inputPermohonan },
                { id: 'file-sk-kades', label: 'SK Pengangkatan Kepala Desa', input: inputSkKades },
                { id: 'file-surat-kuasa', label: 'Surat Kuasa', input: inputKuasa },
                { id: 'file-surat-admin', label: 'Surat Penunjukan Admin', input: inputAdmin }
            ];

            const maxSizeBytes = 1024 * 1024; // 1 MB (1024 KB)

            for (const doc of docInputs) {
                if (!doc.input || !doc.input.files || doc.input.files.length === 0) {
                    alert('Data belum lengkap di upload! Cek kembali.');
                    return;
                }

                const file = doc.input.files[0];
                const fileName = file.name.toLowerCase();

                if (!fileName.endsWith('.pdf')) {
                    alert(`Format berkas ${doc.label} harus berupa file PDF.`);
                    return;
                }

                if (file.size > maxSizeBytes) {
                    alert(`Ukuran berkas ${doc.label} maksimal 1 MB.`);
                    return;
                }
            }

            // 2. Siapkan FormData (multipart/form-data)
            const formData = new FormData();
            formData.append('surat_permohonan', inputPermohonan.files[0]);
            formData.append('sk_kepala_desa', inputSkKades.files[0]);
            formData.append('surat_kuasa', inputKuasa.files[0]);
            formData.append('surat_penunjukan_admin', inputAdmin.files[0]);

            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') 
                || document.querySelector('input[name="_token"]')?.value;

            // 3. Disable tombol saat pengiriman
            const originalText = btnSubmitForm.textContent;
            btnSubmitForm.disabled = true;
            btnSubmitForm.textContent = 'MENGIRIM...';

            try {
                const response = await fetch('/pengajuan', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken || '',
                        'Accept': 'application/json',
                    },
                });

                let data = null;
                try {
                    data = await response.json();
                } catch (parseErr) {
                    data = null;
                }

                if (response.ok && data && data.success) {
                    resetUploadForm();
                    openModal(modalKonfirmasi);
                } else {
                    const errorMsg = (data && data.message) ? data.message : 'Data belum lengkap di upload! Cek kembali.';
                    alert(errorMsg);
                }
            } catch (err) {
                console.error('Submit error:', err);
                alert('Terjadi kesalahan jaringan atau server saat mengirim pengajuan. Silakan coba lagi.');
            } finally {
                btnSubmitForm.disabled = false;
                btnSubmitForm.textContent = originalText;
            }
        });
    }

    // 4. Click "SUBMIT" in Modal Form Revisi -> Validasi & Kirim Dokumen yang Diunggah Ulang
    if (btnSubmitRevisi) {
        btnSubmitRevisi.addEventListener('click', async (e) => {
            e.preventDefault();

            const inputPermohonan = document.getElementById('revisi-file-surat-permohonan');
            const inputSkKades = document.getElementById('revisi-file-sk-kades');
            const inputKuasa = document.getElementById('revisi-file-surat-kuasa');
            const inputAdmin = document.getElementById('revisi-file-surat-admin');

            const revisiDocInputs = [
                { id: 'revisi-file-surat-permohonan', label: 'Surat Permohonan', input: inputPermohonan, key: 'surat_permohonan' },
                { id: 'revisi-file-sk-kades', label: 'SK Pengangkatan Kepala Desa', input: inputSkKades, key: 'sk_kepala_desa' },
                { id: 'revisi-file-surat-kuasa', label: 'Surat Kuasa', input: inputKuasa, key: 'surat_kuasa' },
                { id: 'revisi-file-surat-admin', label: 'Surat Penunjukan Admin', input: inputAdmin, key: 'surat_penunjukan_admin' }
            ];

            const maxSizeBytes = 1024 * 1024; // 1 MB (1024 KB)
            let hasSelectedFile = false;
            const formData = new FormData();

            for (const doc of revisiDocInputs) {
                if (doc.input && doc.input.files && doc.input.files.length > 0) {
                    const file = doc.input.files[0];
                    const fileName = file.name.toLowerCase();

                    if (!fileName.endsWith('.pdf')) {
                        alert(`Format berkas ${doc.label} harus berupa file PDF.`);
                        return;
                    }

                    if (file.size > maxSizeBytes) {
                        alert(`Ukuran berkas ${doc.label} maksimal 1 MB.`);
                        return;
                    }

                    formData.append(doc.key, file);
                    hasSelectedFile = true;
                }
            }

            if (!hasSelectedFile) {
                alert('Silakan pilih minimal 1 berkas dokumen yang ingin diunggah ulang.');
                return;
            }

            const hiddenId = document.getElementById('revisi-pengajuan-id')?.value;
            if (hiddenId) {
                formData.append('id_pengajuan', hiddenId);
            }

            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') 
                || document.querySelector('input[name="_token"]')?.value;

            const originalText = btnSubmitRevisi.textContent;
            btnSubmitRevisi.disabled = true;
            btnSubmitRevisi.textContent = 'MENGIRIM...';

            try {
                const response = await fetch('/pengajuan/revisi', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken || '',
                        'Accept': 'application/json',
                    },
                });

                let data = null;
                try {
                    data = await response.json();
                } catch (parseErr) {
                    data = null;
                }

                if (response.ok && data && data.success) {
                    resetRevisiForm();
                    openModal(modalKonfirmasi);
                } else {
                    const errorMsg = (data && data.message) ? data.message : 'Terjadi kesalahan saat mengunggah dokumen revisi.';
                    alert(errorMsg);
                }
            } catch (err) {
                console.error('Revisi submit error:', err);
                alert('Terjadi kesalahan jaringan atau server saat mengirim dokumen revisi.');
            } finally {
                btnSubmitRevisi.disabled = false;
                btnSubmitRevisi.textContent = originalText;
            }
        });
    }

    // 5. Click "OK" in Modal Konfirmasi -> Close all & Reset form
    if (btnOkKonfirmasi) {
        btnOkKonfirmasi.addEventListener('click', (e) => {
            e.preventDefault();
            resetUploadForm();
            resetRevisiForm();
            closeAllModals();
        });
    }

    // 6. Trigger Reupload on Revisi popup -> Open Modal Form Revisi
    if (btnTriggerReupload) {
        btnTriggerReupload.addEventListener('click', (e) => {
            e.preventDefault();
            resetRevisiForm();
            openModal(modalFormRevisi);
        });
    }

    // Demo hint badge buttons
    if (btnMockWangunsari) {
        btnMockWangunsari.addEventListener('click', () => openModal(popupDiproses));
    }
    if (btnMockPasirhalang) {
        btnMockPasirhalang.addEventListener('click', () => {
            currentRevisiData = {
                id_pengajuan: null,
                nama_desa: 'Pasirhalang',
                kecamatan: 'Cisarua',
                nama_domain: 'pasirhalang.desa.id',
                tanggal_pengajuan: '10 Januari 2026',
                keterangan_revisi: 'Stempel pada Surat Kuasa belum terlihat jelas dan SK Pengangkatan Kepala Desa belum melampirkan lembar pengesahan terakhir.',
                dokumens: [
                    { jenis_dokumen: 'surat_permohonan', nama_file: 'Surat_Permohonan_Pasirhalang.pdf' },
                    { jenis_dokumen: 'surat_kuasa', nama_file: 'Surat_Kuasa_Pasirhalang.pdf' },
                    { jenis_dokumen: 'sk_kepala_desa', nama_file: 'SK_Kades_Pasirhalang.pdf' },
                    { jenis_dokumen: 'surat_penunjukan_admin', nama_file: 'Surat_Penunjukan_Admin_Pasirhalang.pdf' }
                ]
            };
            openModal(popupRevisi);
        });
    }
    if (btnMockLembang) {
        btnMockLembang.addEventListener('click', () => openModal(popupBerhasil));
    }

    // Close buttons (X) & Backdrop click
    allCloseBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            closeAllModals();
        });
    });

    allModals.forEach(modal => {
        if (modal) {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    closeAllModals();
                }
            });
        }
    });

    // File Upload Display Handler for Initial Form
    const fileInputs = document.querySelectorAll('#form-upload-berkas .file-input');
    fileInputs.forEach(input => {
        input.addEventListener('change', () => {
            const wrapper = input.closest('.file-input-wrapper');
            const display = wrapper ? wrapper.querySelector('.file-name-display') : null;
            if (display) {
                if (input.files && input.files.length > 0) {
                    display.textContent = input.files[0].name;
                    display.style.color = '#1e293b';
                    display.style.fontWeight = '600';
                } else {
                    display.textContent = 'Pilih file atau drag ke sini';
                    display.style.color = '';
                    display.style.fontWeight = '';
                }
            }
        });
    });

    // File Upload Display Handler for Revisi Form
    const fileInputsRevisi = document.querySelectorAll('.file-input-revisi');
    fileInputsRevisi.forEach(input => {
        input.addEventListener('change', () => {
            const wrapper = input.closest('.file-input-wrapper');
            const display = wrapper ? wrapper.querySelector('.file-name-display') : null;
            if (display) {
                if (input.files && input.files.length > 0) {
                    display.textContent = input.files[0].name + ' (File Baru)';
                    display.style.color = '#16a34a';
                    display.style.fontWeight = '700';
                } else {
                    display.textContent = display.dataset.original || 'Pilih file atau drag ke sini';
                    display.style.color = '#334155';
                    display.style.fontWeight = '600';
                }
            }
        });
    });

    // ================================================
    // FAQ ACCORDION / DROPDOWN TOGGLE (Landing Page)
    // ================================================
    const faqAccordionHeaders = document.querySelectorAll('.faq-accordion-header');

    faqAccordionHeaders.forEach(header => {
        header.addEventListener('click', () => {
            const item = header.closest('.faq-accordion-item');
            if (!item) return;

            const body = item.querySelector('.faq-accordion-body');
            const isCurrentlyActive = item.classList.contains('active');

            // Close other open accordion items
            document.querySelectorAll('.faq-accordion-item').forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.classList.remove('active');
                    const otherHeader = otherItem.querySelector('.faq-accordion-header');
                    const otherBody = otherItem.querySelector('.faq-accordion-body');
                    if (otherHeader) otherHeader.setAttribute('aria-expanded', 'false');
                    if (otherBody) otherBody.style.maxHeight = null;
                }
            });

            // Toggle current item
            if (isCurrentlyActive) {
                item.classList.remove('active');
                header.setAttribute('aria-expanded', 'false');
                if (body) body.style.maxHeight = null;
            } else {
                item.classList.add('active');
                header.setAttribute('aria-expanded', 'true');
                if (body) body.style.maxHeight = body.scrollHeight + 'px';
            }
        });
    });

    // Cek Status Search Box Logic (Database Connected)
    const formCekStatus = document.getElementById('form-cek-status');
    const inputSearchDesa = document.getElementById('input-search-desa');

    async function performCekStatusSearch(query) {
        if (!query) {
            alert('Silakan masukkan nama desa atau nama domain terlebih dahulu.');
            return;
        }

        try {
            const response = await fetch('/cek-status/search?keyword=' + encodeURIComponent(query), {
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            const res = await response.json();

            if (!res.found) {
                alert(res.message || 'Data pengajuan tidak ditemukan. Silakan periksa kembali.');
                return;
            }

            const item = res.data;
            const status = (item.status || '').toLowerCase();

            if (status === 'revisi') {
                currentRevisiData = item;

                // Dynamic population for Modal Revisi
                const elTitle = document.getElementById('revisi-village-name');
                const elSub = document.getElementById('revisi-village-sub');
                const elDom = document.getElementById('revisi-domain');
                const elDate = document.getElementById('revisi-date');
                const elNote = document.getElementById('revisi-note-text');

                if (elTitle) elTitle.textContent = 'Desa ' + item.nama_desa;
                if (elSub) elSub.textContent = 'Kecamatan ' + item.kecamatan + ', Kab. Bandung Barat';
                if (elDom) elDom.textContent = item.nama_domain;
                if (elDate) elDate.textContent = item.tanggal_pengajuan;
                if (elNote) elNote.textContent = '"' + (item.keterangan_revisi || 'Mohon melengkapi kembali dokumen persyaratan yang kurang.') + '"';

                const docMap = {};
                if (item.dokumens && Array.isArray(item.dokumens)) {
                    item.dokumens.forEach(d => {
                        docMap[d.jenis_dokumen] = d.nama_file;
                    });
                }
                const village = item.nama_desa || 'Desa';
                const fPermohonan = docMap['surat_permohonan'] || 'Surat_Permohonan_' + village + '.pdf';
                const fKuasa = docMap['surat_kuasa'] || 'Surat_Kuasa_' + village + '.pdf';
                const fSk = docMap['sk_kepala_desa'] || 'SK_Kades_' + village + '.pdf';
                const fAdmin = docMap['surat_penunjukan_admin'] || 'Surat_Penunjukan_Admin_' + village + '.pdf';

                const docFile1 = document.getElementById('revisi-doc-file-1');
                const docFile2 = document.getElementById('revisi-doc-file-2');
                const docFile3 = document.getElementById('revisi-doc-file-3');
                const docFile4 = document.getElementById('revisi-doc-file-4');
                if (docFile1) docFile1.textContent = fPermohonan;
                if (docFile2) docFile2.textContent = fKuasa;
                if (docFile3) docFile3.textContent = fSk;
                if (docFile4) docFile4.textContent = fAdmin;

                openModal(popupRevisi);

            } else if (status === 'berhasil' || status === 'domain berhasil') {
                // Dynamic population for Modal Berhasil
                const elTitle = document.getElementById('berhasil-village-name');
                const elSub = document.getElementById('berhasil-village-sub');
                const elDom = document.getElementById('berhasil-domain');
                const elDate = document.getElementById('berhasil-date');
                const elAktifDate = document.getElementById('berhasil-aktif-date');
                const elExpireDate = document.getElementById('berhasil-expire-date');

                if (elTitle) elTitle.textContent = 'Desa ' + item.nama_desa;
                if (elSub) elSub.textContent = 'Kecamatan ' + item.kecamatan + ', Kab. Bandung Barat';
                if (elDom) elDom.textContent = item.nama_domain;
                if (elDate) elDate.textContent = item.tanggal_pengajuan;
                if (elAktifDate) elAktifDate.textContent = item.tanggal_aktif;
                if (elExpireDate) elExpireDate.textContent = item.tanggal_kadaluarsa;

                openModal(popupBerhasil);

            } else {
                // Dynamic population for Modal Diproses
                const elTitle = document.getElementById('diproses-village-name');
                const elSub = document.getElementById('diproses-village-sub');
                const elDom = document.getElementById('diproses-domain');
                const elDate = document.getElementById('diproses-date');

                if (elTitle) elTitle.textContent = 'Desa ' + item.nama_desa;
                if (elSub) elSub.textContent = 'Kecamatan ' + item.kecamatan + ', Kab. Bandung Barat';
                if (elDom) elDom.textContent = item.nama_domain;
                if (elDate) elDate.textContent = item.tanggal_pengajuan;

                openModal(popupDiproses);
            }

        } catch (err) {
            console.error('Cek status fetch error:', err);
            alert('Terjadi kesalahan saat memeriksa status pengajuan. Silakan coba lagi.');
        }
    }

    if (formCekStatus && inputSearchDesa) {
        formCekStatus.addEventListener('submit', (e) => {
            e.preventDefault();
            const query = inputSearchDesa.value.trim();
            performCekStatusSearch(query);
        });
    }

    // Domain Terdaftar Real-Time Search Logic
    const inputSearchDomain = document.getElementById('input-search-domain');
    let domainSearchTimer = null;

    if (inputSearchDomain) {
        inputSearchDomain.addEventListener('input', () => {
            clearTimeout(domainSearchTimer);
            domainSearchTimer = setTimeout(() => {
                const query = inputSearchDomain.value.trim();
                const url = new URL(window.location.origin + window.location.pathname);
                if (query) {
                    url.searchParams.set('search', query);
                }
                url.hash = 'domain-terdaftar';

                fetch(url.toString(), {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newTbody = doc.querySelector('.domain-table tbody');
                    const newFooter = doc.querySelector('#domain-terdaftar .table-footer-action');

                    const currentTbody = document.querySelector('.domain-table tbody');
                    const currentFooter = document.querySelector('#domain-terdaftar .table-footer-action');

                    if (newTbody && currentTbody) {
                        currentTbody.innerHTML = newTbody.innerHTML;
                    }
                    if (currentFooter && newFooter) {
                        currentFooter.innerHTML = newFooter.innerHTML;
                        currentFooter.style.display = '';
                    } else if (currentFooter && !newFooter) {
                        currentFooter.style.display = 'none';
                    }
                    window.history.replaceState({}, '', url.toString());
                })
                .catch(err => console.error('Domain search error:', err));
            }, 250);
        });
    }

    // ================================================
    // HERO SCROLL FADE-OUT / DISAPPEAR ANIMATION
    // ================================================
    const heroContent = document.querySelector('.hero-content');
    const heroIllustration = document.querySelector('.hero-illustration');
    const heroSection = document.querySelector('.hero-section');

    if (heroSection && (heroContent || heroIllustration)) {
        let isScrollTicking = false;

        function updateHeroScrollAnimation() {
            const scrollY = window.scrollY || window.pageYOffset;
            const heroHeight = heroSection.offsetHeight || 600;
            // Transition range as user scrolls through the hero section
            const fadeThreshold = Math.min(heroHeight * 0.7, 450);
            const progress = Math.min(Math.max(scrollY / fadeThreshold, 0), 1);

            // Opacity: 1 at top -> 0 when scrolled past threshold
            const opacity = Math.max(1 - progress * 1.25, 0);
            // Translate: smoothly drifts out as it fades
            const translateYContent = progress * -50;
            const translateYIllustration = progress * -30;
            const translateXIllustration = progress * 60;

            if (heroContent) {
                heroContent.style.opacity = opacity;
                heroContent.style.transform = `translateY(${translateYContent}px)`;
                heroContent.style.pointerEvents = opacity <= 0.05 ? 'none' : 'auto';
            }

            if (heroIllustration) {
                heroIllustration.style.opacity = opacity;
                heroIllustration.style.transform = `translate(${translateXIllustration}px, ${translateYIllustration}px)`;
                heroIllustration.style.pointerEvents = opacity <= 0.05 ? 'none' : 'auto';
            }

            isScrollTicking = false;
        }

        window.addEventListener('scroll', () => {
            if (!isScrollTicking) {
                window.requestAnimationFrame(updateHeroScrollAnimation);
                isScrollTicking = true;
            }
        }, { passive: true });

        // Initial check on load in case page is refreshed while scrolled down
        updateHeroScrollAnimation();
    }
});
