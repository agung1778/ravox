<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    {{ setting('seo_title', 'RAVØX') }}
    </title>
    <meta name="description" content="{{ setting('seo_description') }}">
    <meta name="keywords" content="{{ setting('seo_keywords') }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ setting('seo_title') }}">
    <meta property="og:description" content="{{ setting('seo_description') }}">
    <meta property="og:image" content="{{ asset(setting('logo')) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-black text-white overflow-x-hidden ">
    <div
    id="mouse-glow"
    class="pointer-events-none fixed w-96 h-96 rounded-full blur-3xl opacity-20 bg-orange-500 z-0">
</div>
    <div
    id="scroll-progress"
    class="fixed top-0 left-0 z-[99999] h-1 bg-orange-500"
    style="width:0%">
</div>
    @include('components.home.loading')
    <main>
        @yield('content')
    </main>
    <a href="{{ setting('whatsapp') }}" target="_blank" class=" fixed bottom-6 right-6 z-50 w-16 h-16 rounded-full bg-orange-500 flex items-center justify-center shadow-lg hover:scale-110 transition">💬</a>
@include('components.home.footer')
</body>
</html>