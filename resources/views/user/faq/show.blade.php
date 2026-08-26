@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <!-- HEADER / NAVIGATION -->
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
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        <path d="M12 12a2 2 0 0 0 2-2c0-1.1-.9-2-2-2s-2 .9-2 2"></path>
                    </svg>
                </a>
            </nav>
        </div>
    </header>

    <!-- FAQ SEARCH SECTION -->
    <section class="faq-search-section" id="faq">
        <div class="container">
            <h1 class="faq-title" style="text-align:center; margin-bottom:24px;">FAQ</h1>
            <input type="text" id="faq-search-input" class="faq-search-input" placeholder="Cari pertanyaan..." autocomplete="off" />
            <ul id="faq-suggestions" class="faq-suggestions"></ul>
            <div id="faq-answer" class="faq-answer" style="margin-top:24px; {{ $selectedFaq ? '' : 'display:none;' }}">
                <h2 id="faq-answer-question" class="faq-answer-question">{{ $selectedFaq ? $selectedFaq->pertanyaan : '' }}</h2>
                <p id="faq-answer-text" class="faq-answer-text">{{ $selectedFaq ? $selectedFaq->jawaban : '' }}</p>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container footer-container">
            <div class="footer-brand">
                <div class="footer-logo">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2L2 7L12 12L22 7L12 2Z"></path>
                        <path d="M2 17L12 22L22 17"></path>
                        <path d="M2 12L12 17L22 12"></path>
                    </svg>
                </div>
                <div>
                    <div class="footer-title">DISKOMINFOTIK</div>
                    <div class="footer-subtitle">Kabupaten Bandung Barat</div>
                </div>
            </div>
            <div class="footer-copy">
                &copy; {{ date('Y') }} DISKOMINFOTIK KBB. All rights reserved.
            </div>
        </div>
    </footer>
</div>

<script>
    const searchInput = document.getElementById('faq-search-input');
    const suggestionsEl = document.getElementById('faq-suggestions');
    const answerEl = document.getElementById('faq-answer');
    const answerQuestionEl = document.getElementById('faq-answer-question');
    const answerTextEl = document.getElementById('faq-answer-text');

    let searchTimer = null;

    function renderSuggestions(matches) {
        suggestionsEl.innerHTML = '';
        if (!matches || matches.length === 0) {
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

    if (searchInput) {
        searchInput.addEventListener('input', (e) => {
            const query = e.target.value.trim();
            clearTimeout(searchTimer);
            if (!query) {
                renderSuggestions([]);
                answerEl.style.display = 'none';
                return;
            }
            searchTimer = setTimeout(async () => {
                try {
                    const response = await fetch('/faq/search?q=' + encodeURIComponent(query));
                    if (response.ok) {
                        const matches = await response.json();
                        renderSuggestions(matches);
                    }
                } catch (err) {
                    console.error('Error fetching FAQ:', err);
                }
            }, 200);
        });

        searchInput.addEventListener('keydown', async (e) => {
            if (e.key === 'Enter') {
                e.preventDefault();
                const query = searchInput.value.trim();
                if (query) {
                    try {
                        const response = await fetch('/faq/search?q=' + encodeURIComponent(query));
                        if (response.ok) {
                            const matches = await response.json();
                            if (matches.length > 0) {
                                showAnswer(matches[0]);
                            }
                        }
                    } catch (err) {
                        console.error('Error selecting FAQ:', err);
                    }
                }
            }
        });
    }
</script>
@endsection
