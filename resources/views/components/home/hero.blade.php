<section id="home" class="relative overflow-hidden min-h-screen flex items-center">

    {{-- Background Glow --}}
    <div class="absolute inset-0 -z-10">
        <div class="absolute top-20 left-20 w-72 h-72 bg-orange-500/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-20 w-80 h-80 bg-orange-400/10 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 w-full">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

            {{-- LEFT --}}
            <div>

                <span class="inline-flex items-center px-4 py-2 rounded-full bg-orange-500/10 border border-orange-500/20 text-orange-400 text-sm uppercase tracking-[0.3em]">
                    {{ setting('tagline', 'Build • Create • Innovate') }}
                </span>

                <h1 class="mt-8 font-black leading-tight
                           text-4xl
                           sm:text-5xl
                           md:text-6xl
                           lg:text-7xl">

                    Building
                    <span class="text-orange-500">
                        Digital Experiences
                    </span>

                    &
                    Indie Games
                </h1>

                <p class="mt-8 text-gray-400 text-lg leading-8 max-w-xl">

                    RAVØX develops websites, software, and indie games with a
                    modern design, high performance, and an exceptional user
                    experience.

                </p>

                {{-- Button --}}
                <div class="flex flex-col sm:flex-row gap-4 mt-10">

                    <a href="{{ route('portfolio.index') }}"
                       class="px-8 py-4 rounded-xl bg-orange-500 hover:bg-orange-600 transition text-center font-semibold">

                        View Portfolio

                    </a>

                    <a href="{{ route('games.index') }}"
                       class="px-8 py-4 rounded-xl border border-white/10 hover:border-orange-500 hover:text-orange-500 transition text-center">

                        Explore Games

                    </a>

                </div>

            </div>

            {{-- RIGHT --}}
            <div class="relative flex justify-center">

                <div class="absolute w-72 h-72 bg-orange-500/20 rounded-full blur-3xl animate-pulse"></div>

                <img
                    src="{{ asset('assets/logo-bgremove.png') }}"
                    alt="RAVØX Logo"
                    class="relative w-56 sm:w-72 md:w-80 lg:w-[420px] drop-shadow-[0_0_50px_rgba(255,120,0,.35)] animate-float"
                >

            </div>

        </div>

    </div>

</section>