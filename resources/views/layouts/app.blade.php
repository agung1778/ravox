<!DOCTYPE html>
<html lang="en">
<head>
    <link
    rel="preload"
    as="image"
    href="{{ asset('assets/logo-bgremove.png') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title', setting('seo_title', 'RAVØX'))
    </title>
    <meta name="description" content="@yield('description', setting('seo_description'))">
    <meta name="keywords" content="{{ setting('seo_keywords') }}">
    <meta name="author" content="RAVØX Studio">
    <meta name="robots" content="index,follow">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="RAVØX">
    <meta property="og:title" content="@yield('title', setting('seo_title'))">
    <meta property="og:description" content="@yield('description', setting('seo_description'))">
    <meta property="og:image" content="@yield('image', asset('assets/logo-bgremove.png'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title"    content="@yield('title', setting('seo_title'))">
    <meta name="twitter:description" content="@yield('description', setting('seo_description'))">
    <meta name="twitter:image" content="@yield('image', asset('assets/logo-ravox-1.png'))">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="theme-color" content="#ff6a00">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-black text-white overflow-x-hidden ">
    @include('layouts.navbar')
    <div
    id="mouse-glow"
    class="pointer-events-none fixed w-96 h-96 rounded-full blur-3xl opacity-20 bg-orange-500 z-0">
</div>
    <div
    id="scroll-progress"
    class="fixed top-0 left-0 z-[99999] h-1 bg-orange-500"
    style="width:0%">
</div>
    <main>
        @yield('content')
    </main>
    <a href="{{ setting('whatsapp') }}" target="_blank" class=" fixed bottom-6 right-6 z-50 w-16 h-16 rounded-full bg-orange-500 flex items-center justify-center shadow-lg hover:scale-110 transition">💬</a>
@include('components.home.footer')
</body>
</html>