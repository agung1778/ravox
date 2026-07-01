@extends('layouts.app')

@section('title',$game->seo_title ?? $game->title)

@section('description',
$game->seo_description ?? $game->description)

@section('image',
asset('storage/'.$game->banner))

@section('content')

<section class="pt-32 pb-24">
    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <img loading="lazy" decoding="async" src="{{ asset('storage/' . ($game->banner ?: $game->thumbnail)) }}" class="w-full h-[500px] object-cover rounded-3xl">
        <div class="mt-12">
            <span class="text-orange-500 uppercase">
                {{ ucfirst($game->genre) }}
            </span>
            <h1 class="text-4xl sm:text-5xl lg:text-7xl leading-tight font-black mt-4">
                {{ $game->title }}
            </h1>
            <div class="flex flex-wrap gap-4 mt-6">
                <span class="glass-card px-4 py-2">
                    🎮 {{ ucfirst($game->engine) }}
                </span>
                <span class="glass-card px-4 py-2">
                    📦 v{{ $game->version }}
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
    </div>
</section>

<section class="pb-24">
    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid  sm:grid-cols-2  xl:grid-cols-3  gap-8">
            <div class="glass-card p-8 text-center">
                <span>
                    👁 {{ number_format($game->views) }} Views
                </span>
            </div>
            <div class="glass-card p-8 text-center">
                <span>
                    ⬇ {{ number_format($game->downloads) }} Downloads
                </span>
            </div>
            <div class="glass-card p-8 text-center">
                <span>
                    🎮 {{ number_format($game->plays) }} Plays
                </span>
            </div>
        </div>
    </div>
</section>

<section class="pb-24">
    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="glass-card p-10">
            <h2 class="text-3xl font-bold mb-8">
                Get The Game
            </h2>
            <div class="flex flex-wrap gap-4">
                @if($game->download_file)
                <a href="{{ route('games.download', $game->slug) }}"class="px-8 py-4 bg-orange-500 rounded-xl font-semibold hover:scale-105 transition">⬇ Download Game</a>
                @endif
                @if($game->play_type === 'web' && filled($game->webgl_url))
                <a href="{{ route('games.play',$game->slug) }}" class="bg-orange-500 px-8 py-4 rounded-xl">🎮 Play Now</a>
                @endif
            </div>
        </div>
    </div>
</section>

@if($game->youtube_url)
<section class="pb-24">
    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold mb-8">
            Official Trailer
        </h2>
        <div class="glass-card p-4">
            <div class="aspect-video">
                @php
                preg_match(
                    '/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^&]+)/',
                    $game->youtube_url,
                    $matches
                );
                $videoId = $matches[1] ?? null;
                @endphp
                @if($videoId)
                <iframe
                    src="https://www.youtube.com/embed/{{ $videoId }}"
                ></iframe>
                @endif<iframe
                    class="w-full h-full rounded-2xl"
                    src="{{ str_replace('watch?v=', 'embed/', $game->youtube_url) }}"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
</section>
@endif

@if(!empty($game->gallery))
<section class="py-24">
    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold mb-10">
            Screenshots
        </h2>
        <div class="grid lg:grid-cols-2 gap-12 items-center lg:grid-cols-3 gap-6">
            @foreach($game->gallery as $image)
            <img loading="lazy" decoding="async"
                src="{{ asset('storage/'.$image) }}"
                class="rounded-2xl w-full h-64 object-cover">
            @endforeach
        </div>
    </div>
</section>
@endif

<section class="pb-24">
    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="glass-card p-10">
            <h2 class="text-3xl font-bold mb-6">
                About This Game
            </h2>
            <div class="text-gray-300 leading-8 whitespace-pre-line">
                {{ $game->description }}
            </div>
        </div>
    </div>
</section>

@if($game->patch_notes)
<section class="pb-24">
    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="glass-card p-10">
            <h2 class="text-3xl font-bold mb-6">
                Patch Notes
            </h2>
            <div class="whitespace-pre-line text-gray-300">
                {{ $game->patch_notes }}
            </div>
        </div>
    </div>
</section>
@endif

@if($game->minimum_specs || $game->recommended_specs)
<section class="pb-24">
    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold mb-8">
            System Requirements
        </h2>
        <div class="grid lg:grid-cols-2 gap-12 items-center gap-8">
            @if($game->minimum_specs)
            <div class="glass-card p-8">
                <h3 class="text-xl font-bold mb-4">
                    Minimum
                </h3>
                <div class="whitespace-pre-line text-gray-300">
                    {{ $game->minimum_specs }}
                </div>
            </div>
            @endif
            @if($game->recommended_specs)
            <div class="glass-card p-8">
                <h3 class="text-xl font-bold mb-4">
                    Recommended
                </h3>
                <div class="whitespace-pre-line text-gray-300">
                    {{ $game->recommended_specs }}
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endif

@if($relatedGames->count())
<section class="py-24">
    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold mb-10">
            Related Games
        </h2>
        <p class="text-orange-500 text-sm">
            {{ ucfirst($relatedGames->genre) }}
        </p>
        <p class="text-gray-500 text-sm">
            {{ ucfirst($relatedGames->engine) }}
        </p>
        <div class="grid  sm:grid-cols-2  xl:grid-cols-3  gap-8">
            @foreach($relatedGames as $related)
            <a href="{{ route('games.show',$related->slug) }}"
               class="glass-card overflow-hidden">
                <img loading="lazy" decoding="async"
                    src="{{ asset('storage/'.$related->thumbnail) }}"
                    class="w-full h-56 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold">
                        {{ $related->title }}
                    </h3>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection