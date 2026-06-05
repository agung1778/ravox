<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-[#0A0A0A] text-white">
<div class="flex">
    @include('admin.partials.sidebar')
    <main class="flex-1 p-10">
        @yield('content')
    </main>
</div>
</body>

</html>