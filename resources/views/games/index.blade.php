@extends('layouts.app')

@section('content')

<section class="pt-40 pb-24">
    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <span class="text-orange-500 uppercase">
            RAVØX Game Studio
        </span>
        <h1 class="text-7xl font-black mt-4">
            Creating Indie Games For Everyone
        </h1>
        <p class="text-xl text-gray-400 mt-8 max-w-3xl">
            Explore our game projects, development updates, and future releases.
        </p>
    </div>
</section>

@if($featuredGame)
<section class="pb-24">
    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="glass-card overflow-hidden">
            <div class="grid lg:grid-cols-2">
                <img loading="lazy" decoding="async" src="{{ asset('storage/' . ($featuredGame->banner ?? $featuredGame->thumbnail)) }}" class="w-full h-full object-cover">
                <div class="p-12 flex flex-col justify-center">
                    <span class="text-orange-500 uppercase">
                        Featured Game
                    </span>
                    <h2 class="text-5xl font-bold mt-4">
                        {{ $featuredGame->title }}
                    </h2>
                    <p class="mt-6 text-gray-400">
                    {{ Str::limit($featuredGame->description, 180) }}
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 text-center mt-8">
                        <a href="{{ route('games.show', $featuredGame->slug) }}" class="px-6 py-3 bg-orange-500 rounded-xl">
                            View Game
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<section class="pb-32">
    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 mb-12">
            <div>
                <h2 class="text-5xl font-bold">
                    All Games
                </h2>
            </div>
            <form method="GET" class="flex flex-col md:flex-row gap-4 w-full md:w-auto">
                <input type="text" name="search" value="{{ request('search') }}" paceholder="Search game..." class="glass-card px-4 py-3 rounded-xl min-w-[250px]">
                <select name="genre" class="glass-card px-4 py-3 rounded-xl">
                    <option value="">
                        All Genres
                    </option>
                    <option value="action"
                        {{ request('genre') == 'action' ? 'selected' : '' }}>
                        Action
                    </option>
                    <option value="adventure"
                        {{ request('genre') == 'adventure' ? 'selected' : '' }}>
                        Adventure
                    </option>
                    <option value="rpg"
                        {{ request('genre') == 'rpg' ? 'selected' : '' }}>
                        RPG
                    </option>
                    <option value="simulation"
                        {{ request('genre') == 'simulation' ? 'selected' : '' }}>
                        Simulation
                    </option>
                    <option value="strategy"
                        {{ request('genre') == 'strategy' ? 'selected' : '' }}>
                        Strategy
                    </option>
                    <option value="horror"
                        {{ request('genre') == 'horror' ? 'selected' : '' }}>
                        Horror
                    </option>
                    <option value="indie"
                        {{ request('genre') == 'indie' ? 'selected' : '' }}>
                        Indie
                    </option>
                </select>
                <button type="submit" class="px-6 py-3 bg-orange-500 rounded-xl">
                    Filter
                </button>
            </form>
        </div>
        <div class="grid lg:grid-cols-2 gap-12 items-center lg:grid-cols-3 gap-8">
            @forelse($games as $game)
                <a href="{{ route('games.show', $game->slug) }}" class="glass-card overflow-hidden group">
                    <img loading="lazy" decoding="async" src="{{ asset('storage/'.$game->thumbnail) }}" class="w-full h-56 object-cover group-hover:scale-105 transition duration-500">
                    <div class="p-6">
                        <div class="flex justify-between items-center">
                            <span class="text-orange-500">
                                {{ ucfirst($game->genre) }}
                            </span>
                            <span class="text-sm text-gray-500">
                                {{ ucfirst($game->engine) }}
                            </span>
                        </div>
                        <h3 class="text-2xl font-bold mt-3">
                            {{ $game->title }}
                        </h3>
                        <p class="text-gray-400 mt-3">
                            Version {{ $game->version }}
                        </p>
                        <div class="flex justify-between mt-5 text-sm text-gray-500">
                            <span>
                                👁 {{ number_format($game->views) }}
                            </span>
                            @php
                            $statusColor = match($game->status){
                                'released' => 'bg-green-500/20 text-green-400',
                                'development' => 'bg-yellow-500/20 text-yellow-400',
                                default => 'bg-red-500/20 text-red-400'
                            };
                            @endphp
                            <span class="px-4 py-2 rounded-xl {{ $statusColor }}">
                                {{ ucfirst($game->status) }}
                            </span>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-full text-center py-20">
                    <h3 class="text-3xl font-bold">
                        No Games Found
                    </h3>
                    <p class="text-gray-400 mt-3">
                        Try changing your search or filter.
                    </p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<section class="pb-32">
    <div class="max-w-5xl mx-auto px-6">
        <h2 class="text-5xl font-bold text-center">
            Roadmap
        </h2>
        <div class="space-y-8 mt-16">
            <div class="glass-card p-8">
                ✅ Dungeon Looter
            </div>
            <div class="glass-card p-8">
                🚧 Endless Car Chase
            </div>
            <div class="glass-card p-8">
                🔮 Future Game Project
            </div>
        </div>
    </div>
</section>
@endsection