<footer class="border-t border-white/10 mt-32">
    <div class="max-w-7xl mx-auto px-6 py-20">
        <div class="grid md:grid-cols-4 gap-12">
            {{-- Brand --}}
            <div>
                <img src="{{ asset('assets/logo-bgremove.png') }}" alt="RAVØX" class="w-20 drop-shadow-[0_0_20px_rgba(255,122,0,.5)]">
                <h3 class="text-2xl font-bold mt-4">
                    {{ setting('site_name', 'RAVØX') }}
                </h3>
                <p class="text-gray-400 mt-4">
                    {{ setting('tagline', 'Build. Create. Innovate.') }}
                </p>
            </div>
            {{-- Quick Links --}}
            <div>
                <h4 class="font-bold mb-4">
                    Quick Links
                </h4>
                <div class="space-y-3 text-gray-400">
                    <a href="{{ route('home') }}" class="block hover:text-orange-500">
                        Home
                    </a>
                    <a href="{{ route('portfolio.index') }}" class="block hover:text-orange-500">
                        Portfolio
                    </a>
                    <a href="{{ route('games.index') }}" class="block hover:text-orange-500">
                        Games
                    </a>
                    <a href="{{ route('blog.index') }}" class="block hover:text-orange-500">
                        Blog
                    </a>
                </div>
            </div>
            {{-- Services --}}
            <div>
                <h4 class="font-bold mb-4">
                    Services
                </h4>
                <div class="space-y-3 text-gray-400">
                    <p>Website Development</p>
                    <p>Game Development</p>
                    <p>UI/UX Design</p>
                    <p>Software Solutions</p>
                </div>
            </div>
            {{-- Contact --}}
            <div>
                <h4 class="font-bold mb-4">
                    Contact
                </h4>
                <div class="space-y-3 text-gray-400">
                    <p>
                        {{ setting('email','your@email.com') }}
                    </p>
                    <p>
                        {{ setting('phone','+62 xxx xxxx') }}
                    </p>
                    <p>
                        {{ setting('address','Bogor, Indonesia') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="border-t border-white/10">
        <div class="max-w-7xl mx-auto px-6 py-6 flex flex-col md:flex-row justify-between items-center">
            <p class="text-gray-500">
                © {{ date('Y') }}
                {{ setting('site_name', 'RAVØX') }}
            </p>
            <div class="flex gap-6 mt-4 md:mt-0">
                <a href="{{ setting('github','#') }}" target="_blank" class="hover:text-orange-500">GitHub</a>
                <a href="{{ setting('instagram','#') }}" target="_blank" class="hover:text-orange-500">Instagram</a>
                <a href="{{ setting('linkedin','#') }}"target="_blank"class="hover:text-orange-500">LinkedIn</a>
            </div>
        </div>
    </div>
</footer>