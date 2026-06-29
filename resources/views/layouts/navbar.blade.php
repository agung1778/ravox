<nav
    id="navbar"
    class="fixed top-0 left-0 w-full z-50 transition-all duration-300">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex items-center justify-between h-20">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3">

                <img loading="lazy" decoding="async"
                    src="{{ asset(setting('logo') ?: 'assets/logo-ravox-1.png') }}"
                    class="w-12 h-12"
                    alt="RAVØX">

                <span class="text-xl font-black tracking-wider">

                    RAVØX

                </span>

            </a>

            {{-- Desktop Menu --}}
            <div class="hidden lg:flex items-center gap-8">

                <a href="{{ route('home') }}" class="hover:text-orange-500 transition">
                    Home
                </a>

                <a href="{{ route('portfolio.index') }}" class="hover:text-orange-500 transition">
                    Portfolio
                </a>

                <a href="{{ route('games.index') }}" class="hover:text-orange-500 transition">
                    Games
                </a>

                <a href="{{ route('blog.index') }}" class="hover:text-orange-500 transition">
                    Blog
                </a>

                <a href="{{ route('about') }}" class="hover:text-orange-500 transition">
                    About
                </a>

                <a href="{{ route('contact') }}" class="hover:text-orange-500 transition">
                    Contact
                </a>

            </div>

            {{-- Right Side --}}
            <div class="flex items-center gap-3">

                <a
                    href="{{ url('/developer') }}"
                    class="hidden lg:block px-5 py-2 bg-orange-500 rounded-xl hover:scale-105 transition">

                    Developer

                </a>

                <button
                    id="mobile-menu-button"
                    class="lg:hidden">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-8 h-8"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"/>

                    </svg>

                </button>

            </div>

        </div>

    </div>

</nav>

{{-- Mobile Menu --}}
<div
    id="mobile-menu"
    class="fixed top-20 left-0 w-full bg-[#111827]/95 backdrop-blur-xl hidden z-40">

    <div class="flex flex-col p-6 gap-5">

        <a href="{{ route('home') }}">Home</a>

        <a href="{{ route('portfolio.index') }}">Portfolio</a>

        <a href="{{ route('games.index') }}">Games</a>

        <a href="{{ route('blog.index') }}">Blog</a>

        <a href="{{ route('about') }}">About</a>

        <a href="{{ route('contact') }}">Contact</a>

        <a
            href="{{ url('/developer') }}"
            class="bg-orange-500 text-center py-3 rounded-xl">

            Developer Login

        </a>

    </div>

</div>
