<?php
/**
 * SIDeKa-NG Web Entry Point
 * Renders Frontend Wireframe Blade View
 */

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Serve static assets directly if file exists
if ($uri !== '/' && file_exists(__DIR__ . $uri)) {
    return false;
}

// Function to resolve asset path
function asset($path) {
    return '/' . ltrim($path, '/');
}

// Read Blade View Template
$layoutContent = file_get_contents(__DIR__ . '/../resources/views/layouts/app.blade.php');
$viewContent = file_get_contents(__DIR__ . '/../resources/views/user/beranda.blade.php');

// Extract @section('content') ... @endsection
preg_match('/@section\(\'content\'\)(.*?)@endsection/s', $viewContent, $matches);
$sectionContent = isset($matches[1]) ? $matches[1] : $viewContent;

// Inject section content into @yield('content')
$renderedHtml = str_replace("@yield('content')", $sectionContent, $layoutContent);

// Replace {{ asset(...) }} helper strings
$renderedHtml = preg_replace_callback('/\{\{\s*asset\(([\'"])(.*?)\1\)\s*\}\}/', function($m) {
    return asset($m[2]);
}, $renderedHtml);

header('Content-Type: text/html; charset=UTF-8');
echo $renderedHtml;
