<section id="portfolio" class="py-24 lg:py-32 reveal">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 mb-16">

            <div>

                <span class="uppercase tracking-[0.3em] text-orange-500 text-sm">
                    PORTFOLIO
                </span>

                <h2 class="text-4xl lg:text-4xl sm:text-5xl lg:text-7xl leading-tight font-black mt-4">
                    Featured Projects
                </h2>

                <p class="text-gray-400 mt-4 max-w-2xl">
                    A selection of software, websites, and digital products built with performance, scalability, and user experience in mind.
                </p>

            </div>

            <a href="{{ route('portfolio.index') }}"
               class="px-6 py-3 border border-orange-500 rounded-xl hover:bg-orange-500 transition">

                View All Projects →

            </a>

        </div>

        @if($projects->count())

            @php
                $featured = $projects->first();
            @endphp

            <div class="glass-card rounded-3xl overflow-hidden mb-12">

                <div class="grid lg:grid-cols-2">

                    <img loading="lazy" decoding="async"
                        src="{{ asset('storage/'.$featured->banner) }}"
                        class="w-full h-full object-cover">

                    <div class="p-10">

                        <span class="text-orange-500 uppercase">
                            Featured Project
                        </span>

                        <h3 class="text-4xl font-black mt-4">
                            {{ $featured->title }}
                        </h3>

                        <p class="mt-6 text-gray-400 leading-8">
                            {{ Str::limit($featured->description,220) }}
                        </p>

                        <div class="flex flex-wrap gap-2 mt-8">

                            @foreach(explode(',', $featured->tech_stack ?? '') as $tech)

                                @if(trim($tech))

                                <span class="px-3 py-2 rounded-full bg-white/5">

                                    {{ trim($tech) }}

                                </span>

                                @endif

                            @endforeach

                        </div>

                        <div class="flex flex-col sm:flex-row gap-4 mt-10 flex-wrap">

                            <a
                                href="{{ route('portfolio.show',$featured->slug) }}"
                                class="px-6 py-3 bg-orange-500 rounded-xl">

                                View Project

                            </a>

                            @if($featured->github_url)

                                <a
                                    href="{{ $featured->github_url }}"
                                    target="_blank"
                                    class="px-6 py-3 border border-white/10 rounded-xl">

                                    GitHub

                                </a>

                            @endif

                            @if($featured->demo_url)

                                <a
                                    href="{{ $featured->demo_url }}"
                                    target="_blank"
                                    class="px-6 py-3 border border-white/10 rounded-xl">

                                    Live Demo

                                </a>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        @endif

        <div class="grid lg:grid-cols-2 gap-12 items-center xl:grid-cols-3 gap-8">

            @foreach($projects->skip(1) as $project)

                <div class="glass-card rounded-3xl overflow-hidden hover:-translate-y-3 transition">

                    <img loading="lazy" decoding="async"
                        src="{{ asset('storage/'.$project->thumbnail) }}"
                        class="w-full h-56 object-cover">

                    <div class="p-6">

                        <span class="text-orange-500 text-sm uppercase">

                            {{ $project->category }}

                        </span>

                        <h3 class="text-2xl font-bold mt-2">

                            {{ $project->title }}

                        </h3>

                        <p class="text-gray-400 mt-4">

                            {{ Str::limit($project->description,100) }}

                        </p>

                        <a
                            href="{{ route('portfolio.show',$project->slug) }}"
                            class="inline-block mt-6 text-orange-500">

                            View Project →

                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>