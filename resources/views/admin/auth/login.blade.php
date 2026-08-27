<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - SIDeKa-NG</title>
    <!-- Admin CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}?v={{ time() }}">
</head>
<body class="login-body">

    <div class="login-card">
        <!-- Bagian Kiri: Ilustrasi & Pattern Geometris Ungu -->
        <div class="login-left" style="background-image: url('{{ asset('assets/images/bg_admin.png') }}'); background-size: cover; background-position: center center;">
            <div class="login-illustration-container">
                <img src="{{ asset('assets/images/logo_admin.png') }}" alt="Ilustrasi Admin" class="img-admin-illustration">
            </div>
        </div>

        <!-- Bagian Kanan: Form Login Admin -->
        <div class="login-right">
            <div class="login-header-group">
                <!-- Logo Diskominfotik -->
                <img src="{{ asset('assets/images/logo_diskominfotik.png') }}" alt="DISKOMINFOTIK KABUPATEN BANDUNG BARAT" class="login-logo-img">

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
                <div class="login-btn-wrapper">
                    <button type="submit" class="btn-masuk-img" aria-label="Masuk" style="background: transparent; border: none; outline: none; box-shadow: none; padding: 0; cursor: pointer; display: inline-flex;">
                        <img src="{{ asset('assets/images/button_masuk.png') }}" alt="Masuk" class="img-btn-masuk" style="display: block; height: 34px; width: auto; border: none; outline: none;">
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
