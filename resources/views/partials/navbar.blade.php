<nav class="fixed top-0 left-0 w-full z-50 backdrop-blur-xl bg-black/40 border-b border-orange-500/10">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <a href="/" class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-orange-500 flex items-center justify-center font-bold">
                亗
            </div>
            <span class="text-xl font-bold">
                {{ setting('site_name', 'RAVØX') }}
            </span>
        </a>
        <div class="hidden md:flex gap-8">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('about.index') }}">About</a>
            <a href="{{ route('portfolio.index') }}">Portfolio</a>
            <a href="{{ route('games.index') }}">Games</a>
            <a href="#services">Services</a>
            <a href="{{ route('blog.index') }}">Blog</a>
            <a href="{{ route('contact.index') }}">Contact</a>
        </div>
        <a href="{{ route('contact.index') }}" class="px-5 py-2 bg-orange-500 rounded-lg hover:bg-orange-600 transition">
            Hire Me
        </a>
    </div>
</nav>