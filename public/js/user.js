/**
 * SIDeKa-NG User Wireframe UI Interactions
 * Pure Frontend Interaction (No Backend / API calls)
 */
document.addEventListener('DOMContentLoaded', () => {
    // Elements
    const btnAjukan = document.getElementById('btn-ajukan-sideka');
    const navPengajuan = document.getElementById('nav-pengajuan');
    const btnNextToForm = document.getElementById('btn-next-to-form');
    const btnSubmitForm = document.getElementById('btn-submit-form');
    const btnOkKonfirmasi = document.getElementById('btn-ok-konfirmasi');
    const btnDownloadTemplate = document.getElementById('btn-download-template');

    const modalPersyaratan = document.getElementById('modal-persyaratan');
    const modalForm = document.getElementById('modal-form');
    const modalKonfirmasi = document.getElementById('modal-konfirmasi');

    const allCloseBtns = document.querySelectorAll('[data-close-modal]');
    const allModals = [modalPersyaratan, modalForm, modalKonfirmasi];

    // Helper functions
    function openModal(modal) {
        closeAllModals();
        if (modal) {
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeAllModals() {
        allModals.forEach(m => m && m.classList.remove('active'));
        document.body.style.overflow = '';
    }

    // 1. Click "Ajukan SIDeKa-NG" -> Open Modal Informasi Persyaratan
    if (btnAjukan) {
        btnAjukan.addEventListener('click', (e) => {
            e.preventDefault();
            openModal(modalPersyaratan);
        });
    }

    if (navPengajuan) {
        navPengajuan.addEventListener('click', (e) => {
            e.preventDefault();
            openModal(modalPersyaratan);
        });
    }

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

    // Close buttons (X) & Backdrop click
    allCloseBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            closeAllModals();
        });
    });

    allModals.forEach(modal => {
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeAllModals();
            }
        });
    });

    // File Upload Display Handler
    const fileInputs = document.querySelectorAll('.file-input');
    fileInputs.forEach(input => {
        input.addEventListener('change', (e) => {
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
});
