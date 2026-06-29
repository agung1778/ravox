<section id="blog" class="py-24 lg:py-32 reveal">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between items-end mb-16">

            <div>

                <span class="uppercase tracking-[0.3em] text-orange-500 text-sm">
                    BLOG
                </span>

                <h2 class="text-4xl lg:text-6xl font-black mt-4">
                    Latest Articles
                </h2>

                <p class="text-gray-400 mt-4 max-w-2xl">

                    Development logs, tutorials, programming tips,
                    and behind-the-scenes stories from RAVØX.

                </p>

            </div>

            <a
                href="{{ route('blog.index') }}"
                class="hidden lg:block px-6 py-3 border border-orange-500 rounded-xl hover:bg-orange-500 transition">

                View All →

            </a>

        </div>

        @if($posts->count())

            @php
                $featuredPost = $posts->first();
            @endphp

            <div class="glass-card rounded-3xl overflow-hidden mb-12">

                <div class="grid lg:grid-cols-2">

                    <img loading="lazy" decoding="async"
                        src="{{ asset('storage/'.$featuredPost->banner) }}"
                        class="w-full h-full object-cover">

                    <div class="p-10">

                        <span class="text-orange-500 uppercase">

                            Featured Article

                        </span>

                        <h3 class="text-4xl font-black mt-4">

                            {{ $featuredPost->title }}

                        </h3>

                        <p class="text-gray-400 mt-6 leading-8">

                            {{ Str::limit($featuredPost->excerpt,220) }}

                        </p>

                        <div class="flex flex-wrap gap-3 mt-8">

                            <span class="glass-card px-4 py-2">

                                🏷 {{ ucfirst($featuredPost->category) }}

                            </span>

                            <span class="glass-card px-4 py-2">

                                📅 {{ optional($featuredPost->published_at)->format('d M Y') }}

                            </span>

                            <span class="glass-card px-4 py-2">

                                👁 {{ number_format($featuredPost->views) }}

                            </span>

                        </div>

                        <a
                            href="{{ route('blog.show',$featuredPost->slug) }}"
                            class="inline-block mt-10 px-6 py-3 bg-orange-500 rounded-xl">

                            Read Article

                        </a>

                    </div>

                </div>

            </div>

        @endif

        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">

            @foreach($posts->skip(1) as $post)

                <div class="glass-card rounded-3xl overflow-hidden hover:-translate-y-2 transition">

                    <img loading="lazy" decoding="async"
                        src="{{ asset('storage/'.$post->thumbnail) }}"
                        class="w-full h-56 object-cover">

                    <div class="p-6">

                        <span class="text-orange-500 text-sm">

                            {{ ucfirst($post->category) }}

                        </span>

                        <h3 class="text-2xl font-bold mt-3">

                            {{ $post->title }}

                        </h3>

                        <p class="text-gray-400 mt-4">

                            {{ Str::limit($post->excerpt,100) }}

                        </p>

                        <div class="flex justify-between items-center mt-6">

                            <small class="text-gray-500">

                                {{ optional($post->published_at)->format('d M Y') }}

                            </small>

                            <a
                                href="{{ route('blog.show',$post->slug) }}"
                                class="text-orange-500">

                                Read →

                            </a>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>