@extends('layouts.app')

@section('content')

<section class="pt-40 pb-24">
    <div class="max-w-7xl mx-auto px-6">
        <span class="text-orange-500 uppercase tracking-widest">
            Portfolio
        </span>

        <h1 class="text-7xl font-black mt-4">
            Featured Projects & Creative Works
        </h1>

        <p class="text-xl text-gray-400 mt-8 max-w-3xl">
            Explore web applications, games, software solutions, and experimental projects.
        </p>
    </div>
</section>

<section class="pb-16">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-wrap gap-4">
            <button class="px-6 py-3 glass-card">
                All
            </button>
            <button class="px-6 py-3 glass-card">
                Website
            </button>
            <button class="px-6 py-3 glass-card">
                Game
            </button>
            <button class="px-6 py-3 glass-card">
                UI Design
            </button>
            <button class="px-6 py-3 glass-card">
                Tools
            </button>
        </div>
    </div>
</section>

<section class="pb-24">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $project)
            <a href="{{ route('portfolio.show', $project->slug) }}" class="glass-card overflow-hidden group">
                <img src="{{ asset('storage/'.$project->thumbnail) }}" alt="{{ $project->title }}" class="w-full h-60 object-cover transition duration-500 group-hover:scale-105">
                <div class="p-6">
                    <span class="text-orange-500 text-sm">
                        {{ $project->category }}
                    </span>
                    <h3 class="text-2xl font-bold mt-2">
                        {{ $project->title }}
                    </h3>
                    <p class="text-gray-400 mt-3">
                        {{ Str::limit($project->description,120) }}
                    </p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<section class="pb-24">
    <div class="max-w-7xl mx-auto px-6">
        {{ $projects->links() }}
    </div>
</section>

@endsection