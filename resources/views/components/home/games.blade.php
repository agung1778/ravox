<section id="games" class="py-24 lg:py-32">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between items-end mb-16">

            <div>

                <span class="uppercase tracking-[0.3em] text-orange-500 text-sm">

                    GAME STUDIO

                </span>

                <h2 class="text-4xl lg:text-6xl font-black mt-4">

                    Featured Games

                </h2>

                <p class="text-gray-400 mt-4 max-w-2xl">

                    Explore games developed by RAVØX Studio.

                </p>

            </div>

            <a href="{{ route('games.index') }}"
               class="hidden lg:block px-6 py-3 border border-orange-500 rounded-xl hover:bg-orange-500 transition">

                View All →

            </a>

        </div>

        @if($featuredGame)

        <div class="glass-card rounded-3xl overflow-hidden mb-12">

            <div class="grid lg:grid-cols-2">

                <img
                    src="{{ asset('storage/'.$featuredGame->banner) }}"
                    class="w-full h-full object-cover">

                <div class="p-10">

                    <span class="text-orange-500 uppercase">

                        Featured Game

                    </span>

                    <h3 class="text-5xl font-black mt-4">

                        {{ $featuredGame->title }}

                    </h3>

                    <p class="text-gray-400 mt-6 leading-8">

                        {{ Str::limit($featuredGame->description,220) }}

                    </p>

                    <div class="flex flex-wrap gap-3 mt-8">

                        <span class="glass-card px-4 py-2">

                            🎮 {{ ucfirst($featuredGame->genre) }}

                        </span>

                        <span class="glass-card px-4 py-2">

                            ⚙ {{ ucfirst($featuredGame->engine) }}

                        </span>

                        <span class="glass-card px-4 py-2">

                            📦 {{ $featuredGame->version }}

                        </span>

                        <span class="glass-card px-4 py-2">

                            🚀 {{ ucfirst($featuredGame->status) }}

                        </span>

                    </div>

                    <div class="grid grid-cols-3 gap-4 mt-8">

                        <div class="text-center">

                            <h3 class="text-3xl font-bold text-orange-500">

                                {{ number_format($featuredGame->views) }}

                            </h3>

                            <p class="text-gray-400">

                                Views

                            </p>

                        </div>

                        <div class="text-center">

                            <h3 class="text-3xl font-bold text-orange-500">

                                {{ number_format($featuredGame->downloads) }}

                            </h3>

                            <p class="text-gray-400">

                                Downloads

                            </p>

                        </div>

                        <div class="text-center">

                            <h3 class="text-3xl font-bold text-orange-500">

                                {{ number_format($featuredGame->plays) }}

                            </h3>

                            <p class="text-gray-400">

                                Plays

                            </p>

                        </div>

                    </div>

                    <div class="flex flex-wrap gap-4 mt-10">

                        <a
                            href="{{ route('games.show',$featuredGame->slug) }}"
                            class="px-6 py-3 bg-orange-500 rounded-xl">

                            View Game

                        </a>

                        @if($featuredGame->play_type == 'web')

                            <a
                                href="{{ route('games.play',$featuredGame->slug) }}"
                                class="px-6 py-3 border border-white/10 rounded-xl">

                                ▶ Play Now

                            </a>

                        @endif

                        @if($featuredGame->download_file)

                            <a
                                href="{{ route('games.download',$featuredGame->slug) }}"
                                class="px-6 py-3 border border-white/10 rounded-xl">

                                ⬇ Download

                            </a>

                        @endif

                    </div>

                </div>

            </div>

        </div>

        @endif

        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">

            @foreach($games as $game)

                <div class="glass-card rounded-3xl overflow-hidden hover:-translate-y-2 transition">

                    <img
                        src="{{ asset('storage/'.$game->thumbnail) }}"
                        class="w-full h-56 object-cover">

                    <div class="p-6">

                        <div class="flex justify-between">

                            <span class="text-orange-500">

                                {{ ucfirst($game->genre) }}

                            </span>

                            <span class="text-gray-400">

                                {{ ucfirst($game->engine) }}

                            </span>

                        </div>

                        <h3 class="text-2xl font-bold mt-3">

                            {{ $game->title }}

                        </h3>

                        <p class="text-gray-400 mt-4">

                            {{ Str::limit($game->description,90) }}

                        </p>

                        <a
                            href="{{ route('games.show',$game->slug) }}"
                            class="inline-block mt-6 text-orange-500">

                            View →

                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>