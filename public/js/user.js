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
    const btnDownloadTemplate = document.getElementById('btn-download-template');
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

    // 1. Click "Ajukan SIDeKa-NG" -> Open Modal Informasi Persyaratan
    const triggerSubmissionBtns = [btnAjukan, navPengajuan, footerNavPengajuan, btnFaqAjukan, linkCekStatusAjukan];
    triggerSubmissionBtns.forEach(btn => {
        if (btn) {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
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

    // 3. Click "SUBMIT" in Modal Form -> Open Modal Konfirmasi Berhasil
    if (btnSubmitForm) {
        btnSubmitForm.addEventListener('click', (e) => {
            e.preventDefault();
            openModal(modalKonfirmasi);
        });
    }

    // 4. Click "OK" in Modal Konfirmasi -> Close all & Return to Beranda
    if (btnOkKonfirmasi) {
        btnOkKonfirmasi.addEventListener('click', (e) => {
            e.preventDefault();
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

    // Template download placeholder alert
    if (btnDownloadTemplate) {
        btnDownloadTemplate.addEventListener('click', (e) => {
            e.preventDefault();
            alert('Placeholder: Template Surat Kuasa akan diunduh.');
        });
    }

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

    const faqData = [
        {
            q: "Apa itu SIDEKA-NG?",
            a: "Sideka-NG (Sistem Informasi Desa dan Kawasan-New Generation) adalah aplikasi umum buatan pemerintah Indonesia yang dikelola untuk mendukung layanan publik dan administrasi di tingkat desa atau kelurahan."
        },
        {
            q: "Apakah mendaftar SIDEKA-NG sama dengan Website Desa?",
            a: "Ya betul SIDEKA-NG Adalah Website Desa dan Layanan Desa"
        },
        {
            q: "Apakah mendaftar SIDEKA-NG gratis?",
            a: "Ya, Pendaftaran SIDEKA-NG gratis untuk tahun pertama gratis, tahun kedua dan seterusnya berbayar hanya untuk domain desa.id saja."
        },
        {
            q: "Berapa biayanya?",
            a: "Biaya untuk perpanjang domain desa.id sebesar 50.000,- + PPn"
        }
    ];

    function faqSearchFilter(query) {
        if (!query) return [];
        const q = query.toLowerCase();
        return faqData.filter(item =>
            item.q.toLowerCase().includes(q) || item.a.toLowerCase().includes(q)
        );
    }

    function renderFaqSuggestions(matches) {
        faqPreviewDropdown.innerHTML = '';
        if (matches.length === 0) {
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
        // On input: show suggestions
        faqSearchInput.addEventListener('input', () => {
            const query = faqSearchInput.value.trim();
            if (!query) {
                hideFaqSuggestions();
                faqAnswerContainer.style.display = 'none';
                return;
            }
            const matches = faqSearchFilter(query);
            renderFaqSuggestions(matches);
        });

        // On Enter key: select first match
        faqSearchInput.addEventListener('keydown', (e) => {
            if (e.key === 'Enter') {
                e.preventDefault();
                const query = faqSearchInput.value.trim();
                const matches = faqSearchFilter(query);
                if (matches.length > 0) {
                    showFaqAnswer(matches[0]);
                }
            }
        });

        // On Cari button click: select first match
        if (btnFaqSearchSubmit) {
            btnFaqSearchSubmit.addEventListener('click', () => {
                const query = faqSearchInput.value.trim();
                const matches = faqSearchFilter(query);
                if (matches.length > 0) {
                    showFaqAnswer(matches[0]);
                } else if (query) {
                    faqAnswerContainer.style.display = 'none';
                    renderFaqSuggestions([]);
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

    // Cek Status Search Box Logic
    const formCekStatus = document.getElementById('form-cek-status');
    const inputSearchDesa = document.getElementById('input-search-desa');

    if (formCekStatus && inputSearchDesa) {
        formCekStatus.addEventListener('submit', (e) => {
            e.preventDefault();
            const query = inputSearchDesa.value.trim().toLowerCase();

            if (!query) {
                alert('Silakan masukkan nama desa atau nama domain terlebih dahulu.');
                return;
            }

            if (query.includes('pasir') || query.includes('revisi')) {
                openModal(popupRevisi);
            } else if (query.includes('lembang') || query.includes('berhasil') || query.includes('aktif')) {
                openModal(popupBerhasil);
            } else if (query.includes('wangun') || query.includes('proses') || query.includes('diproses')) {
                openModal(popupDiproses);
            } else {
                openModal(popupDiproses); // Default mock fallback
            }
        });
    }
});
