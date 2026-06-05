@extends('layouts.app')

@section('content')

<section class="pt-40 pb-24">
    <div class="max-w-5xl mx-auto px-6">
        <span class="text-orange-500">
            {{ $project->category }}
        </span>
        <h1 class="text-6xl font-black mt-4">
            {{ $project->title }}
        </h1>
        <img src="{{ asset('storage/'.$project->thumbnail) }}" class="w-full rounded-3xl mt-12">
        <div class="glass-card p-10 mt-10">
            <p class="leading-8 text-gray-300">
                {{ $project->description }}
            </p>
        </div>
        <div class="flex gap-4 mt-10">
            @if($project->github_url)
            <a href="{{ $project->github_url }}" target="_blank" class="px-6 py-3 bg-orange-500 rounded-xl">
                GitHub
            </a>
            @endif
            @if($project->demo_url)
            <a href="{{ $project->demo_url }}" target="_blank" class="px-6 py-3 border border-white/10 rounded-xl">
                Live Demo
            </a>
            @endif
        </div>
    </div>
</section>

@endsection