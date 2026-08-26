/**
 * SIDeKa-NG User Wireframe UI Interactions
 * Pure Frontend Interaction (No Backend / API calls)
 */

// Helper to remove document item on Revisi status popup simulation
function removeDocItem(elementId) {
    const item = document.getElementById(elementId);
    if (item) {
        item.style.opacity = '0.4';
        item.style.textDecoration = 'line-through';
        const btn = item.querySelector('.btn-remove-doc');
        if (btn) btn.textContent = '✓';
    }
}

document.addEventListener('DOMContentLoaded', () => {
    // Elements - Modals & Buttons
    const btnAjukan = document.getElementById('btn-ajukan-sideka');
    const navPengajuan = document.getElementById('nav-pengajuan');
    const footerNavPengajuan = document.getElementById('footer-nav-pengajuan');
    const btnFaqAjukan = document.getElementById('btn-faq-ajukan');
    const linkCekStatusAjukan = document.getElementById('link-cek-status-ajukan');
    const btnNextToForm = document.getElementById('btn-next-to-form');
    const btnSubmitForm = document.getElementById('btn-submit-form');
    const btnOkKonfirmasi = document.getElementById('btn-ok-konfirmasi');
    const btnTriggerReupload = document.getElementById('btn-trigger-reupload');

    // Modals
    const modalPersyaratan = document.getElementById('modal-persyaratan');
    const modalForm = document.getElementById('modal-form');
    const modalKonfirmasi = document.getElementById('modal-konfirmasi');

    const popupDiproses = document.getElementById('popup-status-diproses');
    const popupRevisi = document.getElementById('popup-status-revisi');
    const popupBerhasil = document.getElementById('popup-status-berhasil');

    // Demo hint buttons
    const btnMockWangunsari = document.getElementById('btn-mock-wangunsari');
    const btnMockPasirhalang = document.getElementById('btn-mock-pasirhalang');
    const btnMockLembang = document.getElementById('btn-mock-lembang');

    const allCloseBtns = document.querySelectorAll('[data-close-modal]');
    const allModals = [
        modalPersyaratan, 
        modalForm, 
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

    // Helper to reset upload form and its UI displays
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

    // Always ensure upload form is pristine on page load / browser back-forward cache
    resetUploadForm();
    window.addEventListener('pageshow', resetUploadForm);

    // 1. Click "Ajukan SIDeKa-NG" -> Open Modal Informasi Persyaratan
    const triggerSubmissionBtns = [btnAjukan, navPengajuan, footerNavPengajuan, btnFaqAjukan, linkCekStatusAjukan];
    triggerSubmissionBtns.forEach(btn => {
        if (btn) {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                resetUploadForm();
                openModal(modalPersyaratan);
            });
        }
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

            // 1. Validasi Frontend: Semua 4 dokumen harus dipilih
            const hasPermohonan = inputPermohonan && inputPermohonan.files && inputPermohonan.files.length > 0;
            const hasSkKades = inputSkKades && inputSkKades.files && inputSkKades.files.length > 0;
            const hasKuasa = inputKuasa && inputKuasa.files && inputKuasa.files.length > 0;
            const hasAdmin = inputAdmin && inputAdmin.files && inputAdmin.files.length > 0;

            if (!hasPermohonan || !hasSkKades || !hasKuasa || !hasAdmin) {
                alert('Data belum lengkap di upload! Cek kembali.');
                return;
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
                    // Reset form & UI
                    resetUploadForm();

                    // Buka Modal Konfirmasi Berhasil hanya jika backend sukses
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

    // 4. Click "OK" in Modal Konfirmasi -> Close all & Reset form
    if (btnOkKonfirmasi) {
        btnOkKonfirmasi.addEventListener('click', (e) => {
            e.preventDefault();
            resetUploadForm();
            closeAllModals();
        });
    }

    // 5. Trigger Reupload on Revisi popup -> Open Modal Form
    if (btnTriggerReupload) {
        btnTriggerReupload.addEventListener('click', (e) => {
            e.preventDefault();
            openModal(modalForm);
        });
    }

    // Demo hint badge buttons
    if (btnMockWangunsari) {
        btnMockWangunsari.addEventListener('click', () => openModal(popupDiproses));
    }
    if (btnMockPasirhalang) {
        btnMockPasirhalang.addEventListener('click', () => openModal(popupRevisi));
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

    // File Upload Display Handler
    const fileInputs = document.querySelectorAll('.file-input');
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

    // FAQ Custom Dropdown Menu Toggle (Landing Page) — legacy, no-op if elements removed
    const faqCustomSelect = document.getElementById('faq-custom-select');
    const faqDropdownMenu = document.getElementById('faq-dropdown-menu');

    if (faqCustomSelect && faqDropdownMenu) {
        faqCustomSelect.addEventListener('click', (e) => {
            e.stopPropagation();
            faqCustomSelect.classList.toggle('active');
            faqDropdownMenu.classList.toggle('show');
        });

        document.addEventListener('click', () => {
            faqCustomSelect.classList.remove('active');
            faqDropdownMenu.classList.remove('show');
        });
    }

    // ================================================
    // FAQ SEARCH WITH SUGGESTED SEARCH (Landing Page)
    // ================================================
    const faqSearchInput = document.getElementById('faq-search-input');
    const faqPreviewDropdown = document.getElementById('faq-preview-dropdown');
    const faqAnswerContainer = document.getElementById('faq-answer-container');
    const faqAnswerQuestion = document.getElementById('faq-answer-question');
    const faqAnswerText = document.getElementById('faq-answer-text');
    const btnFaqSearchSubmit = document.getElementById('btn-faq-search-submit');

    let faqDebounceTimer = null;

    async function fetchFaqSuggestions(query) {
        if (!query) {
            hideFaqSuggestions();
            if (faqAnswerContainer) faqAnswerContainer.style.display = 'none';
            return [];
        }

        try {
            const response = await fetch('/faq/search?q=' + encodeURIComponent(query), {
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            if (response.ok) {
                const matches = await response.json();
                renderFaqSuggestions(matches);
                return matches;
            }
        } catch (err) {
            console.error('Error fetching FAQ suggestions from database:', err);
        }
        return [];
    }

    function renderFaqSuggestions(matches) {
        faqPreviewDropdown.innerHTML = '';
        if (!matches || matches.length === 0) {
            faqPreviewDropdown.innerHTML = '<div class="faq-no-result">Tidak ada pertanyaan yang cocok.</div>';
            faqPreviewDropdown.classList.add('show');
            return;
        }
        matches.forEach(item => {
            const div = document.createElement('div');
            div.className = 'faq-suggestion-item';
            div.innerHTML = '<svg class="faq-suggestion-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg><span>' + item.q + '</span>';
            div.addEventListener('click', () => showFaqAnswer(item));
            faqPreviewDropdown.appendChild(div);
        });
        faqPreviewDropdown.classList.add('show');
    }

    function showFaqAnswer(item) {
        faqAnswerQuestion.textContent = item.q;
        faqAnswerText.textContent = item.a;
        faqAnswerContainer.style.display = 'block';
        faqPreviewDropdown.classList.remove('show');
        faqSearchInput.value = item.q;
    }

    function hideFaqSuggestions() {
        faqPreviewDropdown.classList.remove('show');
    }

    if (faqSearchInput && faqPreviewDropdown && faqAnswerContainer) {
        // On input: show suggestions from database via AJAX
        faqSearchInput.addEventListener('input', () => {
            const query = faqSearchInput.value.trim();
            clearTimeout(faqDebounceTimer);
            if (!query) {
                hideFaqSuggestions();
                faqAnswerContainer.style.display = 'none';
                return;
            }
            faqDebounceTimer = setTimeout(() => {
                fetchFaqSuggestions(query);
            }, 200);
        });

        // On Enter key: select first match from database
        faqSearchInput.addEventListener('keydown', async (e) => {
            if (e.key === 'Enter') {
                e.preventDefault();
                const query = faqSearchInput.value.trim();
                if (query) {
                    const matches = await fetchFaqSuggestions(query);
                    if (matches && matches.length > 0) {
                        showFaqAnswer(matches[0]);
                    }
                }
            }
        });

        // On Cari button click: select first match from database
        if (btnFaqSearchSubmit) {
            btnFaqSearchSubmit.addEventListener('click', async () => {
                const query = faqSearchInput.value.trim();
                if (query) {
                    const matches = await fetchFaqSuggestions(query);
                    if (matches && matches.length > 0) {
                        showFaqAnswer(matches[0]);
                    } else {
                        faqAnswerContainer.style.display = 'none';
                        renderFaqSuggestions([]);
                    }
                }
            });
        }

        // Click outside closes suggestions
        document.addEventListener('click', (e) => {
            if (!faqSearchInput.contains(e.target) && !faqPreviewDropdown.contains(e.target) && (!btnFaqSearchSubmit || !btnFaqSearchSubmit.contains(e.target))) {
                hideFaqSuggestions();
            }
        });
    }

    // Accordion Toggle (FAQ Detail Page) - FIXED FOR .faq-accordion-btn
    const accordionBtns = document.querySelectorAll('.faq-accordion-btn, .accordion-trigger');
    accordionBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const row = btn.closest('.faq-accordion-row, .accordion-item');
            if (row) {
                row.classList.toggle('active');
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
});
