<footer class="border-t border-white/10 mt-20">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">

        <div class="grid gap-12 md:grid-cols-2 lg:grid-cols-4">

            {{-- Brand --}}
            <div>

                <img
                    src="{{ asset(setting('logo') ?: 'assets/logo-ravox-1.png') }}"
                    alt="RAVØX"
                    class="w-28 mb-6">

                <h3 class="text-2xl font-black">

                    {{ setting('site_name','RAVØX') }}

                </h3>

                <p class="mt-4 text-gray-400 leading-7">

                    {{ setting('tagline','Build • Create • Innovate') }}

                </p>

            </div>

            {{-- Navigation --}}
            <div>

                <h3 class="font-bold text-lg mb-6">

                    Navigation

                </h3>

                <ul class="space-y-3">

                    <li><a href="/" class="hover:text-orange-500 transition">Home</a></li>

                    <li><a href="{{ route('portfolio.index') }}" class="hover:text-orange-500 transition">Portfolio</a></li>

                    <li><a href="{{ route('games.index') }}" class="hover:text-orange-500 transition">Games</a></li>

                    <li><a href="{{ route('blog.index') }}" class="hover:text-orange-500 transition">Blog</a></li>

                    <li><a href="{{ route('about.index') }}" class="hover:text-orange-500 transition">About</a></li>

                    <li><a href="{{ route('contact.index') }}" class="hover:text-orange-500 transition">Contact</a></li>

                </ul>

            </div>

            {{-- Services --}}
            <div>

                <h3 class="font-bold text-lg mb-6">

                    Services

                </h3>

                <ul class="space-y-3 text-gray-400">

                    <li>Website Development</li>

                    <li>Game Development</li>

                    <li>Desktop Software</li>

                    <li>UI / UX Design</li>

                    <li>API Development</li>

                </ul>

            </div>

            {{-- Contact --}}
            <div>

                <h3 class="font-bold text-lg mb-6">

                    Connect

                </h3>

                <div class="space-y-4">

                    @if(setting('email'))
                    <a
                        href="mailto:{{ setting('email') }}"
                        class="block hover:text-orange-500">

                        📧 {{ setting('email') }}

                    </a>
                    @endif

                    @if(setting('phone'))
                    <a
                        href="tel:{{ setting('phone') }}"
                        class="block hover:text-orange-500">

                        📞 {{ setting('phone') }}

                    </a>
                    @endif

                    @if(setting('github'))
                    <a
                        href="{{ setting('github') }}"
                        target="_blank"
                        class="block hover:text-orange-500">

                        GitHub

                    </a>
                    @endif

                    @if(setting('instagram'))
                    <a
                        href="{{ setting('instagram') }}"
                        target="_blank"
                        class="block hover:text-orange-500">

                        Instagram

                    </a>
                    @endif

                    @if(setting('linkedin'))
                    <a
                        href="{{ setting('linkedin') }}"
                        target="_blank"
                        class="block hover:text-orange-500">

                        LinkedIn

                    </a>
                    @endif

                    @if(setting('youtube'))
                    <a
                        href="{{ setting('youtube') }}"
                        target="_blank"
                        class="block hover:text-orange-500">

                        YouTube

                    </a>
                    @endif

                </div>

            </div>

        </div>

        <div class="border-t border-white/10 mt-16 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">

            <p class="text-gray-500 text-center md:text-left">

                © {{ date('Y') }}
                {{ setting('site_name','RAVØX') }}.
                All Rights Reserved.

            </p>

            <button
                onclick="window.scrollTo({top:0,behavior:'smooth'})"
                class="px-5 py-2 border border-white/10 rounded-xl hover:bg-orange-500 transition">

                ↑ Back To Top

            </button>

        </div>

    </div>

</footer>