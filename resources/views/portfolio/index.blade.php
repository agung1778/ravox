@extends('layouts.app')

@section('content')

<section class="pt-40 pb-24">
    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
    <span class="text-orange-500 uppercase">
        RAVØX Portfolio
    </span>
    <h1 class="text-7xl font-black mt-4">
        Our Projects & Creations
    </h1>
    <p class="text-xl text-gray-400 mt-8 max-w-3xl">
        Explore websites, applications, games, and digital products created by RAVØX.
    </p>
</div>
</section>

@if($featuredProject)
<section class="pb-24">
    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
    <div class="glass-card overflow-hidden">
        <div class="grid lg:grid-cols-2">
            <img loading="lazy" decoding="async"
                src="{{ asset('storage/' . ($featuredProject->banner ?? $featuredProject->thumbnail)) }}"
                class="w-full h-full object-cover">
            <div class="p-12">
                <span class="text-orange-500">
                    ⭐ FEATURED PROJECT
                </span>
                <h2 class="text-5xl font-bold mt-4">
                    {{ $featuredProject->title }}
                </h2>
                <p class="mt-6 text-gray-400">
                    {{ Str::limit($featuredProject->description, 180) }}
                </p>
                <div class="flex flex-col sm:flex-row gap-4 mt-8 text-center">
                    <a
                        href="{{ route('portfolio.show', $featuredProject->slug) }}"
                        class="px-6 py-3 bg-orange-500 rounded-xl">
                        View Project
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endif

<section class="pb-12">
    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
    <form method="GET" class="grid  sm:grid-cols-2  xl:grid-cols-3  gap-8">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Search project..."
            class="glass-card p-4 rounded-xl">
        <select
            name="category"
            class="glass-card p-4 rounded-xl">
            <option value="">
                All Categories
            </option>
            @foreach($categories as $category)
                <option
                    value="{{ $category }}"
                    {{ request('category') == $category ? 'selected' : '' }}>
                    {{ ucfirst($category) }}
                </option>
            @endforeach
        </select>
        <button class="bg-orange-500 rounded-xl font-semibold">
            Apply Filter
        </button>
    </form>
</div>
</section>
<section class="pb-32">
<div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
    @if($projects->count())
    <div class="grid lg:grid-cols-2 gap-12 items-center lg:grid-cols-3 gap-8">
        @foreach($projects as $project)
        <a href="{{ route('portfolio.show', $project->slug) }}" class="glass-card overflow-hidden group">
            <img loading="lazy" decoding="async" src="{{ asset('storage/' . ($project->thumbnail ?? 'defaults/project.jpg')) }}" class="w-full h-56 object-cover group-hover:scale-105 transition duration-500">
            <div class="p-6">
                <div class="flex justify-between items-center">
                    <span class="text-orange-500">
                        {{ ucfirst($project->category) }}
                    </span>
                    @if($project->is_featured)
                        <span class="text-yellow-400 text-sm">
                            ⭐ Featured
                        </span>
                    @endif
                </div>
                <h3 class="text-2xl font-bold mt-3">
                    {{ $project->title }}
                </h3>
                <p class="text-gray-400 mt-3">
                    {{ Str::limit($project->description, 100) }}
                </p>
                <div class="flex justify-between mt-6 text-sm text-gray-500">
                    <span>
                        👁 {{ $project->views }}
                    </span>
                    <span>
                        {{ ucfirst($project->status) }}
                    </span>
                </div>
            </div>
        </a>
        @endforeach
    </div>
    <div class="mt-10">
        {{ $projects->withQueryString()->links() }}
    </div>
    @else
    <div class="glass-card p-12 text-center">
        <h3 class="text-2xl font-bold">
            No Projects Found
        </h3>
        <p class="text-gray-400 mt-4">
            Try changing your search or category filter.
        </p>
    </div>
    @endif
</div>
</section>

@endsection
