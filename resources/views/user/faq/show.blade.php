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
    @include('partials.navbar')

    <!-- FAQ SEARCH SECTION -->
    <section class="faq-search-section" id="faq">
        <div class="container">
            <h1 class="faq-title" style="text-align:center; margin-bottom:24px;">FAQ</h1>
            <input type="text" id="faq-search-input" class="faq-search-input" placeholder="Cari pertanyaan..." autocomplete="off" />
            <ul id="faq-suggestions" class="faq-suggestions"></ul>
            <div id="faq-answer" class="faq-answer" style="margin-top:24px; display:none;">
                <h2 id="faq-answer-question" class="faq-answer-question"></h2>
                <p id="faq-answer-text" class="faq-answer-text"></p>
            </div>
        </div>
    </section>

    <!-- FOOTER SIMPLE WIREFRAME -->
    @include('partials.footer')
</div>
@endsection

@section('scripts')
<script>
    const faqs = [
        {
            q: "Apa itu SIDEKA-NG?",
            a: "Sideka-NG (Sistem Informasi Desa dan Kawasan-New Generation) adalah aplikasi umum buatan pemerintah Indonesia yang dikelola untuk mendukung layanan publik dan administrasi di tingkat desa atau kelurahan."
        },
        {
            q: "Apakah mendaftar SIDEKA-NG sama denganWebsite Desa?",
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

    const searchInput = document.getElementById('faq-search-input');
    const suggestionsEl = document.getElementById('faq-suggestions');
    const answerEl = document.getElementById('faq-answer');
    const answerQuestionEl = document.getElementById('faq-answer-question');
    const answerTextEl = document.getElementById('faq-answer-text');

    function renderSuggestions(matches) {
        suggestionsEl.innerHTML = '';
        if (matches.length === 0) {
            suggestionsEl.style.display = 'none';
            return;
        }
        matches.forEach(item => {
            const li = document.createElement('li');
            li.textContent = item.q;
            li.className = 'faq-suggestion-item';
            li.addEventListener('click', () => showAnswer(item));
            suggestionsEl.appendChild(li);
        });
        suggestionsEl.style.display = 'block';
    }

    function showAnswer(item) {
        answerQuestionEl.textContent = item.q;
        answerTextEl.textContent = item.a;
        answerEl.style.display = 'block';
        suggestionsEl.style.display = 'none';
        searchInput.value = item.q;
    }

    searchInput.addEventListener('input', (e) => {
        const query = e.target.value.trim().toLowerCase();
        if (!query) {
            renderSuggestions([]);
            answerEl.style.display = 'none';
            return;
        }
        const matches = faqs.filter(f => f.q.toLowerCase().includes(query));
        renderSuggestions(matches);
    });

    // Handle Enter key to select first suggestion
    searchInput.addEventListener('keydown', (e) => {
        if (e.key === 'Enter') {
            const firstItem = suggestionsEl.firstElementChild;
            if (firstItem) {
                const q = firstItem.textContent;
                const item = faqs.find(f => f.q === q);
                if (item) showAnswer(item);
            }
            e.preventDefault();
        }
    });
</script>
@endsection
