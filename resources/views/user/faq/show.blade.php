@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <!-- HEADER / NAVIGATION -->
    <header class="navbar">
        <div class="container navbar-container">
            <div class="brand">
                <a href="{{ url('/') }}" class="brand-link">
                    <img src="{{ asset('assets/images/logo_diskominfotik.png') }}" alt="DISKOMINFOTIK KABUPATEN BANDUNG BARAT" class="brand-logo-img">
                    <div class="brand-text">
                        <span class="brand-title">DISKOMINFOTIK</span>
                        <span class="brand-subtitle">KABUPATEN BANDUNG BARAT</span>
                    </div>
                </a>
            </div>

            <nav class="nav-links">
                <a href="{{ url('/#domain-terdaftar') }}" class="nav-item">Daftar Domain</a>
                <a href="{{ url('/#pengajuan') }}" class="nav-item">Pengajuan</a>
                <a href="{{ url('/#cek-status') }}" class="nav-item">Cek Status</a>
                <a href="{{ url('/#faq') }}" class="nav-item nav-pill-faq">
                    <span>FAQ</span>
                    <img src="{{ asset('assets/icons/question.svg') }}" alt="FAQ" class="faq-icon-img" width="18" height="18">
                </a>
            </nav>
        </div>
    </header>

    <!-- FAQ SECTION -->
    <section class="faq-landing-section" id="faq">
        <div class="container">
            <div class="faq-landing-card">
                <div class="faq-header-group">
                    <h1 class="faq-title">
                        FAQ
                        <span class="faq-icon-group">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </span>
                    </h1>
                    <p class="faq-subtitle-text">
                        Masih memiliki pertanyaan? Klik pertanyaan di bawah ini untuk melihat jawaban seputar layanan SIDeKa-NG.
                    </p>
                </div>

                <!-- FAQ Accordion List -->
                <div class="faq-accordion-list" id="faq-accordion-list">
                    @forelse ($faqs as $index => $faq)
                    <div class="faq-accordion-item" data-faq-id="{{ $faq->id_faq }}">
                        <button type="button" class="faq-accordion-header" aria-expanded="false">
                            <span class="faq-accordion-question">{{ $faq->pertanyaan }}</span>
                            <svg class="faq-accordion-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                        <div class="faq-accordion-body">
                            <div class="faq-accordion-content">
                                <p class="faq-accordion-text">{{ $faq->jawaban }}</p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="faq-empty-state">
                        <p>Belum ada pertanyaan FAQ yang tersedia saat ini.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer-kbb">
        <div class="container">
            <div class="footer-bottom-bar" style="border-top: none; padding: 24px 0;">
                <p>&copy; 2026 Diskominfo - Portal Layanan Domain Desa Resmi (.desa.id)</p>
            </div>
        </div>
    </footer>
</div>
@endsection
