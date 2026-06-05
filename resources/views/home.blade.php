@extends('layouts.app')

@section('content')

<section id="home" class="min-h-screen flex items-center ">
<div class="max-w-7xl mx-auto px-6">
    <div class="grid md:grid-cols-2 gap-10 items-center">
        <div>
            <span class="text-orange-500 uppercase tracking-widest">
                {{ setting('tagline', 'Build. Create. Innovate.') }}
            </span>
            <h1 class="hero-title text-6xl font-black mt-4">Building Digital Experiences & Indie Games</h1>
            <p class="hero-description mt-6 text-gray-400 text-lg">Developer, Game Creator, and Founder of RAVØX.</p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-10">
            <div>
                <h3 class="text-3xl font-bold text-orange-500">
                    <span class="counter" data-target="20">
                        0
                    </span>+
                </h3>
                <p class="text-gray-400">Projects
                </p>
            </div>
            <div>
                <h3 class="text-3xl font-bold text-orange-500">
                    <span class="counter" data-target="5">
                        0
                    </span>+
                </h3>
                <p class="text-gray-400">
                    Games
                </p>
            </div>
            <div>
                <h3 class="text-3xl font-bold text-orange-500">
                    <span class="counter" data-target="5">
                        0
                    </span>+
                </h3>
                <p class="text-gray-400">
                    Years Learning
                </p>
            </div>
            <div>
                <h3 class="text-3xl font-bold text-orange-500">
                    <span class="counter" data-target="100">
                        0
                    </span>%
                </h3>
                <p class="text-gray-400">
                    Passion
                </p>
            </div>
        </div>
        <div class="flex gap-4 mt-8">
            <a href="#portfolio" class="px-6 py-3 bg-orange-500 rounded-xl">View Projects</a>
            <a href="#games" class="px-6 py-3 border border-white/20 rounded-xl">Explore Games</a>
        </div>
    </div>
        <div class="flex justify-center">
            <div class="w-80 h-80 rounded-full bg-orange-500/20 blur-3xl absolute"></div>
            <div class="relative">
                <img src="{{ asset('assets/logo-bgremove.png') }}"alt="RAVØX Logo" class="hero-logo w-[420px] animate-pulse drop-shadow-[0_0_50px_rgba(255,122,0,.35)]">
            </div>
        </div>
    </div>
</div>
</section>

<div class="section-divider"></div>

<section id="about" class="py-32">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-16">
            <div>
                <span class="text-orange-500">
                    ABOUT RAVØX
                </span>
                <h2 class="text-5xl font-bold mt-4">
                    Developer, Creator, Problem Solver
                </h2>
                <p class="mt-6 text-gray-400">
                    RAVØX is a creative technology brand focused on web development, game development, and digital innovation.
                </p>
            </div>
            <div class="glass-card p-8">
                <h3 class="text-2xl font-bold">
                    core Technologies
                </h3>
                <div class="grid grid-cols-2 gap-4 mt-6">
                    <div>Laravel</div>
                    <div>PHP</div>
                    <div>MySQL</div>
                    <div>Unity</div>
                    <div>C#</div>
                    <div>Tailwind</div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="section-divider"></div>

<section id="services" class="py-24">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-5xl font-bold text-center">
            Services
        </h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mt-16">
            <div class="glass-card p-6">
                Website Development
            </div>
            <div class="glass-card p-6">
                Game Development
            </div>
            <div class="glass-card p-6">
                UI/UX Design
            </div>
            <div class="glass-card p-6">
                Software Solutions
            </div>
        </div>
    </div>
</section>

<div class="section-divider"></div>

<section id="portfolio" class="py-24">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-4xl font-bold mb-10">
            Featured Projects
        </h2>
        <div class="grid md:grid-cols-3 gap-8">@foreach($projects as $project)
            <div class="glass-card group">
                <img src="{{ asset('storage/'.$project->thumbnail) }}" alt="{{ $project->title }}" class="w-full h-56 object-cover transition duration-500 group-hover:scale-105"> alt="{{ $project->title }}" class="w-full h-56 object-cover">
                <div class="p-6">
                    <span class="text-orange-500 text-sm">
                        {{ $project->category }}
                    </span>
                    <h3 class="text-xl font-bold mt-2">
                        {{ $project->title }}
                    </h3>
                    <p class="text-gray-400 mt-3">
                        {{ $project->description }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<div class="section-divider"></div>

<section id="games" class="py-32">
    <div class="max-w-7xl mx-auto px-6">
        <span class="text-orange-500 uppercase">
            Featured Games
        </span>
        <h2 class="text-5xl font-bold mt-4">
            Explore Our Games
        </h2>
        <div class="grid md:grid-cols-3 gap-8 mt-16">
            @foreach($games as $game)
            <div class="glass-card overflow-hidden group">
                <img src="{{ asset('storage/'.$game->thumbnail) }}" alt="{{ $game->title }}" class="w-full h-60 object-cover transition duration-500 group-hover:scale-105">
                <div class="p-6">
                    <div class="flex justify-between">
                        <span class="text-orange-500">
                            {{ $game->genre }}
                        </span>
                        <span class="text-gray-400 text-sm">
                            {{ ucfirst($game->engine) }}
                        </span>
                    </div>
                    <h3 class="text-2xl font-bold mt-3">
                        {{ $game->title }}
                    </h3>
                    <p class="text-gray-400 mt-3">
                        {{ Str::limit($game->description, 100) }}
                    </p>
                    <div class="flex gap-3 mt-6">
                        <a href="{{ route('games.show', $game->slug) }}" class="px-4 py-2 bg-orange-500 rounded-lg">View Game</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<div class="section-divider"></div>

<section id="tech-stack" class="py-24">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-5xl font-bold text-center">
            Technology Stack
        </h2>
        <p class="text-center text-gray-400 mt-4">
            Technologies powering RAVØX projects.
        </p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-16">
            <div class="glass-card p-8 text-center">Laravel</div>
            <div class="glass-card p-8 text-center">PHP</div>
            <div class="glass-card p-8 text-center">MySQL</div>
            <div class="glass-card p-8 text-center">JavaScript</div>
            <div class="glass-card p-8 text-center">Unity</div>
            <div class="glass-card p-8 text-center">C#</div>
            <div class="glass-card p-8 text-center">Tailwind CSS</div>
            <div class="glass-card p-8 text-center">Git & GitHub</div>
        </div>
    </div>
</section>

<div class="section-divider"></div>

<section id="testimonials" class="py-24">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-5xl font-bold text-center">
            Testimonials
        </h2>
        <p class="text-center text-gray-400 mt-4">
            What people say about working with RAVØX
        </p>
        <div class="grid md:grid-cols-3 gap-8 mt-16">
            <div class="glass-card p-8">
                <div class="text-orange-500 text-2xl">
                    ★★★★★
                </div>
                <p class="mt-4 text-gray-400">
                    Amazing work and excellent communication.
                </p>
                <h4 class="mt-6 font-bold">
                    Client Name
                </h4>
            </div>
            <div class="glass-card p-8">
                <div class="text-orange-500 text-2xl">
                    ★★★★★
                </div>
                <p class="mt-4 text-gray-400">
                    Professional and fast delivery.
                </p>
                <h4 class="mt-6 font-bold">
                    Client Name
                </h4>
            </div>
            <div class="glass-card p-8">
                <div class="text-orange-500 text-2xl">
                    ★★★★★
                </div>
                <p class="mt-4 text-gray-400">
                    Great quality and attention to detail.
                </p>
                <h4 class="mt-6 font-bold">
                    Client Name
                </h4>
            </div>
        </div>
    </div>
</section>

<div class="section-divider"></div>

<section class="py-24">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-5xl font-bold text-center">
            Client Testimonials
        </h2>
        <div class="grid md:grid-cols-3 gap-8 mt-16">
            @foreach($testimonials as $testimonial)
            <div class="glass-card p-8">
                <p class="text-gray-400">
                    "{{ $testimonial->message }}"
                </p>
                <div class="mt-6">
                    <h3 class="font-bold">
                        {{ $testimonial->name }}
                    </h3>
                    <span class="text-orange-500">
                        {{ $testimonial->position }}
                    </span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<div class="section-divider"></div>

<section id="blog" class="py-24">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-4xl font-bold mb-10">
            Latest Articles
        </h2>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($posts as $post)
            <div class="glass-card">
                <img src="{{ asset('storage/'.$post->thumbnail) }}" alt="{{ $post->title }}" class="w-full h-56 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold">
                        {{ $post->title }}
                    </h3>
                    <p class="text-gray-400 mt-3">
                        {{ $post->excerpt }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<div class="section-divider"></div>

<section class="py-32">
    <div class="max-w-5xl mx-auto px-6">
        <div class="glass-card text-center p-20 relative overflow-hidden">
        <div class="absolute inset-0 bg-orange-500/5"></div>    
        <h2 class="text-6xl font-black relative">
                Ready To Build Something Amazing?
            </h2>
            <p class="mt-6 text-gray-400">
                Let's create websites, software, and games together.
            </p>
            <a href="#contact" class="inline-block mt-8 px-8 py-4 bg-orange-500 rounded-xl text-lg">
                Start A Project
            </a>
        </div>
    </div>
</section>

@endsection
