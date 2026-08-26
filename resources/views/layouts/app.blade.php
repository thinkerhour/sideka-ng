<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SIDeKa-NG - Kabupaten Bandung Barat</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/user.css') }}?v={{ time() }}">
</head>
<body>

    @yield('content')

    <!-- Custom JS -->
    <script src="{{ asset('js/user.js') }}?v={{ time() }}"></script>
</body>
</html>
