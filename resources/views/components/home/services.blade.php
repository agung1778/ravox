<section id="about" class="py-24 lg:py-32">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid lg:grid-cols-2 gap-16 items-center">

            {{-- LEFT --}}
            <div>

                <span class="uppercase tracking-[0.3em] text-orange-500 text-sm">
                    ABOUT RAVØX
                </span>

                <h2 class="text-4xl lg:text-6xl font-black mt-6">
                    Crafting Websites,
                    Software &
                    Indie Games.
                </h2>

                <p class="mt-8 text-gray-400 leading-8">

                    RAVØX is a digital studio founded by
                    <strong>Agung Gumelar</strong>,
                    focusing on web development,
                    software engineering,
                    and indie game creation.

                </p>

                <p class="mt-6 text-gray-400 leading-8">

                    Every project is built with attention to
                    performance, clean architecture,
                    scalability, and user experience.

                </p>

                <a
                    href="{{ route('about') }}"
                    class="inline-flex items-center mt-10 px-8 py-4 bg-orange-500 rounded-xl hover:bg-orange-600 transition">

                    Learn More →

                </a>

            </div>

            {{-- RIGHT --}}
            <div>

                <div class="glass-card rounded-3xl p-10">

                    <h3 class="text-2xl font-bold">

                        Core Technologies

                    </h3>

                    <div class="grid grid-cols-2 gap-4 mt-8">

                        @foreach([
                            'Laravel',
                            'PHP',
                            'MySQL',
                            'Tailwind',
                            'JavaScript',
                            'Unity',
                            'C#',
                            'Git'
                        ] as $tech)

                            <div class="bg-white/5 rounded-xl py-4 text-center hover:bg-orange-500 transition">

                                {{ $tech }}

                            </div>

                        @endforeach

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>