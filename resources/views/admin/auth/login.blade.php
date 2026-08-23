<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - SIDeKa-NG</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Admin CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="login-body">

    <div class="login-card">
        <!-- Bagian Kiri: Ilustrasi & Pattern Geometris Ungu -->
        <div class="login-left">
            <!-- Geometric Triangle Pattern Background (SVG) -->
            <svg class="login-left-bg-svg" viewBox="0 0 500 500" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="polyGrad1" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#ffffff" stop-opacity="0.15" />
                        <stop offset="100%" stop-color="#ffffff" stop-opacity="0.02" />
                    </linearGradient>
                    <linearGradient id="polyGrad2" x1="100%" y1="0%" x2="0%" y2="100%">
                        <stop offset="0%" stop-color="#ffffff" stop-opacity="0.2" />
                        <stop offset="100%" stop-color="#ffffff" stop-opacity="0.05" />
                    </linearGradient>
                </defs>
                <polygon points="0,0 250,0 125,200" fill="url(#polyGrad1)"/>
                <polygon points="250,0 500,0 375,200" fill="url(#polyGrad2)"/>
                <polygon points="125,200 375,200 250,400" fill="url(#polyGrad1)"/>
                <polygon points="0,0 125,200 0,350" fill="url(#polyGrad2)"/>
                <polygon points="500,0 500,350 375,200" fill="url(#polyGrad1)"/>
                <polygon points="0,350 125,200 250,400 0,500" fill="url(#polyGrad2)"/>
                <polygon points="500,350 375,200 250,400 500,500" fill="url(#polyGrad1)"/>
                <polygon points="0,500 250,400 500,500" fill="url(#polyGrad2)"/>
            </svg>

            <!-- Vector Illustration Container -->
            <div class="login-illustration-container">
                <svg class="login-illustration-svg" viewBox="0 0 400 320" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <!-- Background White Soft Blob -->
                    <path d="M50,160 C50,90 120,40 200,50 C280,60 360,100 350,180 C340,260 260,290 180,280 C100,270 50,230 50,160 Z" fill="#ffffff" fill-opacity="0.9" />
                    
                    <!-- Left Character (Man on Laptop) -->
                    <ellipse cx="140" cy="225" rx="35" ry="12" fill="#4c3d8f" opacity="0.3" />
                    <!-- Body -->
                    <path d="M120 180 C120 150 140 140 155 140 C170 140 180 155 180 180 L180 230 L130 230 Z" fill="#7c52d9" />
                    <path d="M135 155 L165 155 L160 195 L140 195 Z" fill="#936be8" />
                    <!-- Head -->
                    <circle cx="150" cy="120" r="18" fill="#ffcca0" />
                    <!-- Hair -->
                    <path d="M132 118 C132 104 142 98 154 98 C166 98 168 108 168 116 C160 114 148 114 132 118 Z" fill="#2d1e50" />
                    <rect x="110" y="170" width="50" height="30" rx="4" fill="#60a5fa" transform="rotate(-15 110 170)" />
                    <!-- Floating Window Left -->
                    <rect x="35" y="130" width="85" height="55" rx="6" fill="#3b82f6" opacity="0.9" />
                    <line x1="45" y1="145" x2="105" y2="145" stroke="#ffffff" stroke-width="3" stroke-linecap="round" />
                    <line x1="45" y1="158" x2="90" y2="158" stroke="#93c5fd" stroke-width="2" stroke-linecap="round" />
                    <line x1="45" y1="168" x2="80" y2="168" stroke="#93c5fd" stroke-width="2" stroke-linecap="round" />

                    <!-- Right Character (Woman on Laptop) -->
                    <ellipse cx="260" cy="235" rx="35" ry="12" fill="#4c3d8f" opacity="0.3" />
                    <!-- Body -->
                    <path d="M235 170 C235 145 255 135 270 135 C285 135 295 150 295 170 L295 240 L245 240 Z" fill="#3b82f6" />
                    <!-- Head -->
                    <circle cx="265" cy="115" r="17" fill="#ffcca0" />
                    <!-- Hair (Long) -->
                    <path d="M245 115 C245 95 275 95 285 110 C290 125 285 150 285 160 C275 155 275 140 270 130 Z" fill="#3e2312" />
                    <rect x="240" y="165" width="50" height="30" rx="4" fill="#a78bfa" transform="rotate(12 240 165)" />
                    
                    <!-- Floating Right Charts & Widgets -->
                    <rect x="270" y="110" width="90" height="60" rx="6" fill="#ffffff" stroke="#c084fc" stroke-width="2" />
                    <path d="M280 150 L300 135 L320 142 L345 125" stroke="#8b5cf6" stroke-width="3" stroke-linecap="round" fill="none" />
                    <circle cx="330" cy="150" r="12" fill="#c084fc" opacity="0.4" />
                    
                    <!-- 3D Cubes Floating -->
                    <path d="M30 180 L50 170 L70 180 L50 190 Z" fill="#60a5fa" />
                    <path d="M30 180 L50 190 L50 210 L30 200 Z" fill="#3b82f6" />
                    <path d="M70 180 L50 190 L50 210 L70 200 Z" fill="#2563eb" />

                    <path d="M340 190 L355 182 L370 190 L355 198 Z" fill="#c084fc" />
                    <path d="M340 190 L355 198 L355 212 L340 204 Z" fill="#a855f7" />
                    <path d="M370 190 L355 198 L355 212 L370 204 Z" fill="#9333ea" />
                </svg>
            </div>
        </div>

        <!-- Bagian Kanan: Form Login Admin -->
        <div class="login-right">
            <div class="login-header-group">
                <!-- Logo SIDeKa-NG -->
                <svg class="login-logo" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="40" cy="40" r="38" fill="url(#logoGrad)" stroke="#6b46b8" stroke-width="3"/>
                    <path d="M24 45 C24 30 35 22 48 24 C55 25 60 30 58 38 C56 46 46 48 38 45 C32 43 28 48 32 54 C36 60 48 58 54 52" stroke="#ffffff" stroke-width="5" stroke-linecap="round" fill="none"/>
                    <circle cx="40" cy="38" r="6" fill="#38bdf8"/>
                    <defs>
                        <linearGradient id="logoGrad" x1="0" y1="0" x2="80" y2="80">
                            <stop offset="0%" stop-color="#4f46e5" />
                            <stop offset="100%" stop-color="#7c3aed" />
                        </linearGradient>
                    </defs>
                </svg>

                <h1 class="login-title">Selamat Datang,</h1>
                <p class="login-subtitle">
                    Silakan masukkan Username dan Kata Sandi untuk akses Dashboard Admin Pengelolaan Data Pengajuan SIDEKA-NG
                </p>
            </div>

            <!-- Error Alerts -->
            @if(session('error'))
                <div class="login-alert-error">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="login-alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="login-alert-error">
                    <ul style="margin-left: 18px; margin-bottom: 0;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="login-form" action="{{ route('admin.login.submit') }}" method="POST">
                @csrf

                <!-- Field Username -->
                <div class="form-group-custom">
                    <div class="input-icon-wrapper">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <input type="text" 
                           name="username" 
                           class="form-input-pill" 
                           placeholder="Username..." 
                           value="{{ old('username') }}" 
                           required 
                           autofocus>
                </div>

                <!-- Field Password -->
                <div class="form-group-custom">
                    <div class="input-icon-wrapper">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <input type="password" 
                           name="password" 
                           class="form-input-pill" 
                           placeholder="Kata Sandi" 
                           required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-login-submit">
                    Masuk
                </button>
            </form>
        </div>
    </div>

</body>
</html>
