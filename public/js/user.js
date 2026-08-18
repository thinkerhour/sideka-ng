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

    // FAQ Custom Dropdown Menu Toggle (Landing Page)
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
