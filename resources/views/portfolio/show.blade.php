@extends('layouts.app')

@section('content')

<section class="pt-32 pb-24">
    <div class="max-w-7xl mx-auto px-6">
        <img src="{{ asset('storage/' . ($project->banner ?? $project->thumbnail)) }}" class="w-full h-[500px] object-cover rounded-3xl">
        <div class="mt-12">
            <span class="text-orange-500 uppercase">
                {{ $project->category }}
            </span>
            <h1 class="text-6xl font-black mt-4">
                {{ $project->title }}
            </h1>
        </div>
    </div>
</section>

{{-- PROJECT INFO --}}
<section class="pb-24">
    <div class="max-w-7xl mx-auto px-6">
    <div class="grid md:grid-cols-3 gap-6">
        <div class="glass-card p-6">
            <h3 class="font-semibold">Client</h3>
            <p class="text-gray-400 mt-2">
                {{ $project->client_name ?? 'Personal Project' }}
            </p>
        </div>
        <div class="glass-card p-6">
            <h3 class="font-semibold">Completed</h3>
            <p class="text-gray-400 mt-2">
                {{ optional($project->completed_at)->format('d M Y') }}
            </p>
        </div>
        <div class="glass-card p-6">
            <h3 class="font-semibold">Views</h3>
            <p class="text-gray-400 mt-2">
                👁 {{ $project->views }}
            </p>
        </div>
    </div>
</div>
</section>

{{-- TECH STACK --}}
@if($project->tech_stack)
<section class="pb-24">
    <div class="max-w-7xl mx-auto px-6">
``
    <h2 class="text-3xl font-bold mb-6">
        Technology Stack
    </h2>
    <div class="flex flex-wrap gap-3">
        @foreach(explode(',', $project->tech_stack) as $tech)
            <span class="glass-card px-4 py-2">
                {{ trim($tech) }}
            </span>
        @endforeach
    </div>
</div>
</section>
@endif

{{-- DESCRIPTION --}}
<section class="pb-24">
    <div class="max-w-7xl mx-auto px-6">
    <div class="glass-card p-10">
        <h2 class="text-3xl font-bold mb-6">
            About This Project
        </h2>
        <p class="text-gray-300 leading-8">
            {{ $project->description }}
        </p>
        @if($project->content)
            <div class="mt-8 text-gray-400 leading-8 whitespace-pre-line">
                {{ $project->content }}
            </div>
        @endif
    </div>
</div>
</section>

{{-- GALLERY --}}
@if($project->gallery)
<section class="pb-24">
    <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-3xl font-bold mb-8">
        Project Gallery
    </h2>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($project->gallery as $image)
            <img src="{{ asset('storage/'.$image) }}" class="rounded-2xl w-full h-64 object-cover">
        @endforeach
    </div>
</div>
</section>
@endif

{{-- ACTION BUTTONS --}}
<section class="pb-24">
    <div class="max-w-7xl mx-auto px-6">
    <div class="flex flex-wrap gap-4">
        @if($project->github_url)
        <a href="{{ $project->github_url }}" target="_blank" class="px-8 py-4 bg-orange-500 rounded-xl">
            GitHub Repository
        </a>
        @endif
        @if($project->demo_url)
        <a href="{{ $project->demo_url }}" target="_blank" class="px-8 py-4 border border-white/10 rounded-xl">
            Live Demo
        </a>
        @endif
    </div>
</div>
</section>

{{-- RELATED PROJECTS --}}
@if($relatedProjects->count())
<section class="pb-24">
<div class="max-w-7xl mx-auto px-6">
    <h2 class="text-4xl font-bold mb-10">
        Related Projects
    </h2>
    <div class="grid md:grid-cols-3 gap-8">
        @foreach($relatedProjects as $related)
            <a href="{{ route('portfolio.show', $related->slug) }}" class="glass-card overflow-hidden">
                <img src="{{ asset('storage/'.$related->thumbnail) }}" class="w-full h-56 object-cover">
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
