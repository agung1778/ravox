@extends('layouts.app')

@section('content')

<section class="pt-40 pb-24">
    <div class="max-w-7xl mx-auto px-6">
        <span class="text-orange-500 uppercase">
            RAVØX Blog
        </span>
    <h1 class="text-7xl font-black mt-4">
        Insights, Devlogs & Tutorials
    </h1>
    <p class="text-xl text-gray-400 mt-8 max-w-3xl">
        Follow development updates, tutorials, game devlogs, and stories from RAVØX.
    </p>
</div>
</section>
<section class="pb-16">
    <div class="max-w-7xl mx-auto px-6">
    <form method="GET" class="flex flex-col md:flex-row gap-4">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Search article..."
            class="glass-card p-4 flex-1 rounded-xl">
        <select
            name="category"
            class="glass-card p-4 rounded-xl">
            <option value="">
                All Categories
            </option>
            <option value="tutorial">
                Tutorial
            </option>
            <option value="devlog">
                Devlog
            </option>
            <option value="news">
                News
            </option>
            <option value="update">
                Update
            </option>
            <option value="gamedev">
                Game Development
            </option>
            <option value="webdev">
                Web Development
            </option>
        </select>
        <button
            class="px-6 py-4 bg-orange-500 rounded-xl">
            Search
        </button>
    </form>
</div>
</section>

@if($featuredPost)
<section class="pb-24">
    <div class="max-w-7xl mx-auto px-6">
    <a href="{{ route('blog.show',$featuredPost->slug) }}" class="glass-card overflow-hidden block">
        <div class="grid lg:grid-cols-2">
            <img loading="lazy" decoding="async" src="{{ asset('storage/'.$featuredPost->banner ?: $featuredPost->thumbnail) }}" class="w-full h-full object-cover">
            <div class="p-10">
                <span class="text-orange-500">
                    Featured Article
                </span>
                <h2 class="text-5xl font-bold mt-4">
                    {{ $featuredPost->title }}
                </h2>
                <p class="text-gray-400 mt-6">
                    {{ $featuredPost->excerpt }}
                </p>
            </div>
        </div>
    </a>
</div>
</section>
@endif

<section class="pb-24">
    <div class="max-w-7xl mx-auto px-6">
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($posts as $post)
        <a href="{{ route('blog.show',$post->slug) }}" class="glass-card overflow-hidden group">
            <img loading="lazy" decoding="async" src="{{ asset('storage/'.$post->thumbnail) }}" class="w-full h-56 object-cover group-hover:scale-105 transition duration-500">
            <div class="p-6">
                <div class="flex justify-between mb-3">
                    <span class="text-orange-500 text-sm">
                        {{ ucfirst($post->category) }}
                    </span>
                    <span class="text-gray-500 text-sm">
                        👁 {{ $post->views }}
                    </span>
                </div>
                <h3 class="text-2xl font-bold">
                    {{ $post->title }}
                </h3>
                <p class="text-gray-400 mt-3">
                    {{ Str::limit($post->excerpt,120) }}
                </p>
                <div class="mt-4 text-sm text-gray-500">
                    {{ optional($post->published_at)->format('d M Y') }}
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
</section>

<section class="pb-24">
    <div class="max-w-7xl mx-auto px-6">
        {{ $posts->links() }}
    </div>
</section>

@endsection
